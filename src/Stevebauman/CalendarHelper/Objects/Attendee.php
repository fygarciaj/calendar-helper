<?php

namespace Stevebauman\CalendarHelper\Objects;

use Stevebauman\CalendarHelper\CalendarHelperServiceProvider;
use Stevebauman\Viewer\Traits\ViewableTrait;

class Attendee extends AbstractApiObject
{
    use ViewableTrait;

    /*
     * Stores the event object the attendee is connected to
     */
    public $event;

    /**
     * Constructor.
     *
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        $this->viewer = config('calendar-helper'.CalendarHelperServiceProvider::$configSeparator.'attendee.viewer');

        $this->fillable = config('calendar-helper'.CalendarHelperServiceProvider::$configSeparator.'attendee.attributes');

        $this->fill($attributes);
    }
}
