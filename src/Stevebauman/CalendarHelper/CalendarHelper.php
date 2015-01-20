<?php

namespace Stevebauman\CalendarHelper;

use Stevebauman\CalendarHelper\Drivers\Google;

class CalendarHelper {

    /**
     * Returns a new Google driver instance
     *
     * @return \Stevebauman\CalendarHelper\Drivers\Google
     */
    public function google()
    {
        $google = new Google;

        return $google;
    }

}