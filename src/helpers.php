<?php

/*
 * The Calendar Helpers File.
 */

if (!function_exists('strToRfc3339')) {
    /**
     * Converts a date string into RFC3339 format for google calendar api.
     * This is used for start/end dates for the creation/modification of events.
     *
     * If $allDay and $isEnd are true, a day is added onto the date
     * since the Google calendar thinks an all day event that spans
     * multiple days ends on the day before rather than consuming the day it
     * ends on.
     *
     * Example: For an all day event that starts January 1st and ends January 3rd,
     * Google will end the event on the 2nd since the idea here is that the event
     * is 'till' the 3rd.
     *
     * @param string $dateStr
     * @param bool   $allDay
     * @param bool   $isEnd
     *
     * @return string
     */
    function strToRfc3339($dateStr, $allDay = false, $isEnd = false)
    {
        $date = new \DateTime();

        /*
         * Check if the date is already in unix time or not
         */
        if (isValidTimeStamp($dateStr)) {
            $date->setTimestamp($dateStr);
        } else {
            $date->setTimestamp(strtotime($dateStr));
        }

        /*
         * If the event is all day, google only accepts Y-m-d formats instead
         * of RFC3339
         */
        if ($allDay) {
            if ($isEnd) {
                $date->add(new \DateInterval('P1D'));
            }

            return $date->format('Y-m-d');
        } else {
            return $date->format(\DateTime::RFC3339);
        }
    }
}

if (!function_exists('strToRfc2445')) {
    /**
     * Converts a date string into RFC2445 format for google
     * calendar api. This is used for recurrence rule dates.
     *
     * @param $dateStr
     *
     * @return string
     */
    function strToRfc2445($dateStr)
    {
        $date = new \DateTime();

        $date->setTimestamp(strtotime($dateStr));

        return $date->format('Ymd\THis\Z');
    }
}

if (!function_exists('isValidTimeStamp')) {
    /**
     * Checks if the inputted integer
     * timestamp is a valid unix timestamp.
     *
     * @param $timestamp
     *
     * @return bool
     */
    function isValidTimeStamp($timestamp)
    {
        return ((int) $timestamp === $timestamp)
            && ($timestamp <= PHP_INT_MAX)
            && ($timestamp >= ~PHP_INT_MAX);
    }
}
