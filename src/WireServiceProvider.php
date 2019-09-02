<?php

namespace Rapkit\Wire;

use Illuminate\Support\ServiceProvider;

class WireServiceProvider extends ServiceProvider
{
	/**
	 * Register services.
	 *
	 * @return void
	 */
	public function register()
	{
		/**
		 * Register the wire middleware.
		 */
		$this->app['router']->aliasMiddleware('wire_interface', Http\Middleware\BeforeWireInterface::class);
	}

	/**
	 * Bootstrap services.
	 *
	 * @return void
	 */
	public function boot()
	{
		if ($this->app->runningInConsole())
		{
			$this->publishes([
				__DIR__ . '/Console/stubs/publish/WireServiceProvider.stub' => app_path('Providers/WireServiceProvider.php'),
			], 'wire-provider');
		}

		/**
		 * Loading Wire Routes
		 */
		$this->loadRoutesFrom(__DIR__ . '/routes/web.php');

		/**
		 * ===> usage trans('wire::filename.key');
		 */
		$this->loadTranslationsFrom(__DIR__ . '/resources/lang', 'wire');

		/**
		 * ===> usage wire::filename
		 */
		$this->loadViewsFrom(__DIR__ . "/resources/views", "wire");

		$this->publishes([
			__DIR__ . '/resources' => resource_path('views/wire'),
		]);

		/**
		 * Public assets for application interface to be used,
		 * these are going to be published into public folder.
		 */
		$this->publishes([
			__DIR__ . '/public/css' => public_path('wire-assets/css'),
			__DIR__ . '/public/js' => public_path('wire-assets/js'),
			__DIR__ . '/public/images' => public_path('wire-assets/images'),
		], 'public');

		/**
		 * Controllers will be published
		 */
		$this->publishes([
			__DIR__ . '/Console/stubs/publish/CrudController.stub' => base_path('app/Wire/Http/Controllers/CrudController.php'),
			__DIR__ . '/Console/stubs/publish/DashboardController.stub' => base_path('app/Wire/Http/Controllers/DashboardController.php'),
			__DIR__ . '/Console/stubs/publish/LoginController.stub' => base_path('app/Wire/Http/Controllers/Authentication/LoginController.php'),
			__DIR__ . '/Console/stubs/publish/LogoutController.stub' => base_path('app/Wire/Http/Controllers/Authentication/LogoutController.php'),
			__DIR__ . '/Console/stubs/publish/WireController.stub' => base_path('app/Wire/Http/Controllers/WireController.php'),
		]);

		/**
		 * Identifier and Provider will be published
		 */
		$this->publishes([
			__DIR__ . '/Console/stubs/publish/BaseIdentifier.stub' => base_path('app/Wire/Identifiers/BaseIdentifier.php'),
		]);

		/**
		 * Wire config file
		 */
		$this->publishes([
			__DIR__ . '/config/wire.php' => config_path('wire.php'),
		]);

		$this->commands([
			Console\Commands\IdentifierCache::class,
			Console\Commands\MakeIdentifier::class,
			Console\Commands\IdentifierLoad::class
		]);
	}
}
