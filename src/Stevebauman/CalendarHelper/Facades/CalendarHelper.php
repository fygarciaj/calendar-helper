<?php

namespace Stevebauman\CalendarHelper\Facades;

use Illuminate\Support\Facades\Facade;

class CalendarHelper extends Facade {
    
    protected static function getFacadeAccessor() { return 'calendar-helper'; }
    
}