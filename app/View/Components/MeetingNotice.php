<?php

namespace App\View\Components;

use Illuminate\Contracts\View\View;

class MeetingNotice extends Notice {

    private $place;
    private $date;
    private $time;

    /**
     * Create a new component instance.
     *
     * @param $level string
     * @param $subject string
     * @param $body string
     * @param $teacher string
     * @param string $place
     * @param string $date
     * @param string $time
     */
    public function __construct(string $level, string $subject, string $body, string $teacher, string $place, string $date, string $time) {
        parent::__construct($level, $subject, $body, $teacher);
        $this->place = $place;
        $this->date = $date;
        $this->time = $time;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|string
     */
    public function render() {
        return view('components.notice', ['level' => $this->level, 'subject' => $this->subject, 'body' => $this->body, 'teacher' => $this->teacher, 'place' => $this->place, 'date' => $this->date, 'time' => $this->time]);
    }
}
