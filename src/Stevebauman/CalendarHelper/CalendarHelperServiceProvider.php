<?php

namespace Stevebauman\CalendarHelper;

use Illuminate\Support\ServiceProvider;

/**
 * Class CalendarHelperServiceProvider.
 */
class CalendarHelperServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * The configuration separator for packages.
     * Allows compatibility with Laravel 4 and 5.
     *
     * @var string
     */
    public static $configSeparator = '::';

    public function boot()
    {
        if (method_exists($this, 'package')) {
            $this->package('stevebauman/calendar-helper');
        } else {
            $this::$configSeparator = '.';

            $this->publishes([
                __DIR__.'../../../config/config.php' => config_path('calendar-helper.php'),
            ], 'config');

            $this->loadTranslationsFrom(__DIR__.'../../../lang', 'calendar-helper');
        }

        parent::boot();
    }

    /**
     * Register the service provider.
     */
    public function register()
    {
        $this->app['calendar-helper'] = $this->app->share(function ($app) {
            return new CalendarHelper($app['config']);
        });

        include __DIR__.'/../../helpers.php';
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['calendar-helper'];
    }
}
