<?php

namespace Stevebauman\CalendarHelper;

use Illuminate\Config\Repository;
use Stevebauman\CalendarHelper\Drivers\Google;

/**
 * Class CalendarHelper
 */
class CalendarHelper
{
    /**
     * @var Repository
     */
    protected $config;

    /**
     * Constructor.
     *
     * @param Repository $repository
     */
    public function __construct(Repository $repository)
    {
        $this->config = $repository;
    }

    /**
     * Returns a new Google driver instance.
     *
     * @return Google
     */
    public function google()
    {
        $google = new Google($this);

        return $google;
    }

    /**
     * Returns a calendar helper configuration value.
     *
     * @param int|string $key
     *
     * @return mixed
     */
    public function getConfig($key)
    {
        return $this->config->get('calendar-helper'.CalendarHelperServiceProvider::$configSeparator.$key);
    }
}