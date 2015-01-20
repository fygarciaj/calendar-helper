<?php namespace Stevebauman\CalendarHelper;

use Illuminate\Support\ServiceProvider;

class CalendarHelperServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;
        
	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
            $this->package('stevebauman/calendar-helper');
            
            $this->app['calendar-helper'] = $this->app->share(function($app)
            {
                    return new CalendarHelper();
            });
            
            include __DIR__ .'/../../helpers.php';
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array('calendar-helper');
	}

}
