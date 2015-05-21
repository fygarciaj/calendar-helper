<?php

namespace Stevebauman\CalendarHelper\Objects;

use Stevebauman\CalendarHelper\CalendarHelperServiceProvider;
use Stevebauman\Viewer\Traits\ViewableTrait;

/**
 * Event class used for common objects between API drivers.
 */
class Event extends AbstractApiObject
{
    use ViewableTrait;

    /**
     * Constructor.
     *
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        $this->timeZone = config('app.timezone');

        $this->viewer = config('calendar-helper'.CalendarHelperServiceProvider::$configSeparator.'event.viewer');

        $this->fillable = config('calendar-helper'.CalendarHelperServiceProvider::$configSeparator.'event.attributes');

        $this->fill($attributes);

        /*
         * Try to assign rrule to attributes if the key is present
         * in the attribute array
         */
        $this->rruleToAttributeArray();
    }

    /**
     * Converts the RRULE string property to an array.
     */
    public function rruleToAttributeArray()
    {
        if ($this->rrule && str_contains($this->rrule, 'FREQ')) {
            $rrule = str_replace('RRULE:', '', $this->rrule);

            $rules = explode(';', $rrule);

            foreach ($rules as $rule) {
                $attributes = explode('=', $rule);

                /*
                 * Make sure there are arguements in rule
                 */
                if (array_key_exists(1, $attributes)) {
                    $arguments = explode(',', $attributes[1]);

                    if (count($arguments) > 1) {
                        $this->attributes['rruleArray'][$attributes[0]] = $arguments;
                    } else {
                        $this->attributes['rruleArray'][$attributes[0]] = $attributes[1];
                    }
                }
            }
        }
    }
}
