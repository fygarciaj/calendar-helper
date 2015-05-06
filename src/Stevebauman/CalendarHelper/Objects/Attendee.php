<?php

namespace Stevebauman\CalendarHelper\Objects;

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
        $this->viewer = config('calendar-helper::attendee.viewer');
        
        $this->fillable = config('calendar-helper::attendee.attributes');
        
        $this->fill($attributes);
    }
}
