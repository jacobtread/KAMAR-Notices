<?php

namespace App\Http\Controllers;
require __DIR__ . '/../../../vendor/jacobtread/kni/src/KNI.php';

use Exception;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Response;
use Jacobtread\KNI\KNI;
use Symfony\Component\HttpClient\Exception\ClientException;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;

class NoticesController extends Controller {

    public function render_embed(?string $date = null) {
        return $this->render($date, true);
    }

    public function render(?string $date = null, bool $embed = false) {
        try {
            $data = $this->get($date);
            return view('notices', array_merge($data, ['embed' => $embed]));
        } catch (Exception $e) {
            $title = 'Unable to connect to KAMAR portal';
            $message = $e->getMessage();
            if ($e instanceof TransportExceptionInterface) {
                $message = 'Failed to reach the KAMAR server: ' . $message;
            } else if ($e instanceof ClientException) {
                $message = 'Request seemed to be invalid at the fault of the client create a github issue: ' . $message;
            } else if ($e instanceof ServerExceptionInterface) {
                $message = 'Internal KAMAR error occurred: ' . $message;
            }
            return view('error', ['title' => $title, 'message' => $message]);
        }
    }

    /**
     * @param string|null $date
     * @param bool $ignore_cache
     * @return array
     * @throws Exception
     */
    private function get(?string $date = null, bool $ignore_cache = false): array {
        $ignore_cache = env('IGNORE_CACHE', $ignore_cache);
        if ($date == null || $date == 'latest') {
            $date = date(KAMAR_DATE_FORMAT);
        }
        if ($date !== null) {
            $date = str_replace('-', '/', $date);
        }
        $date_euro = str_replace('/', '-', $date);
        $cache_name = 'notices-' . str_replace('/', '-', $date);
        if (!$ignore_cache && Cache::has($cache_name)) {
            $data = Cache::get($cache_name);
            if ($data == null) {
                return $this->get($date, true);
            }
            return ['cache' => true, 'date' => $date_euro, 'notices' => $data];
        } else {
            $kni = new KNI(env('APP_PORTAL', true));
            $notices = $kni->retrieve($date);
            if ($notices->isSuccess()) {
                if (!$ignore_cache) {
                    Cache::put($cache_name, $notices->getNotices(), now()->addMinutes(60));
                }
                return ['cache' => false, 'date' => $date_euro, 'notices' => $notices->getNotices()];
            } else {
                $cause = $notices->getErrorCause();
                if ($cause != null) {
                    throw $cause;
                } else {
                    throw new Exception($notices->getErrorMessage());
                }
            }
        }
    }

    public function api(?string $date = null) {
        try {
            return $this->get($date);
        } catch (Exception $e) {
            return Response::json(['code' => $e->getCode(), 'message' => $e->getMessage()])->setStatusCode(500);
        }
    }


}
