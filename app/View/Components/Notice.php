<?php

namespace App\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Notice extends Component {

    protected $level;
    protected $subject;
    protected $body;
    protected $teacher;

    /**
     * Create a new component instance.
     *
     * @param $level string
     * @param $subject string
     * @param $body string
     * @param $teacher string
     */
    public function __construct(string $level, string $subject, string $body, string $teacher) {
        $this->level = $level;
        $this->subject = $subject;
        $this->body = $body;
        $this->teacher = $teacher;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|string
     */
    public function render() {
        return view('components.notice', ['level' => $this->level, 'subject' => $this->subject, 'body' => $this->body, 'teacher' => $this->teacher]);
    }
}
