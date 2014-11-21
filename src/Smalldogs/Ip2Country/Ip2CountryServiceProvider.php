<?php namespace Smalldogs\Ip2Country;

use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\AliasLoader;

class Ip2CountryServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->package('smalldogs/ip2country');
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		//
		AliasLoader::getInstance()->alias('Ip2Country', 'Smalldogs\Ip2Country\Ip2Country');
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array();
	}

}
