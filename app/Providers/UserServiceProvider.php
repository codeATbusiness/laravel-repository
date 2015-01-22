<?php namespace Laravel_Repository\Providers;

use Illuminate\Support\ServiceProvider;

class UserServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		//
	}

	/**
	 * Register the application services.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app->bind(
                        'Laravel_Repository\Domain\Repositories\UserRepositoryInterface',
                        'Laravel_Repository\Infraestructure\Repositories\UserEloquentRepository');
	}

}
