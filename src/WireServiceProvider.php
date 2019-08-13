<?php

namespace rapkit\wire;

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
        $this->app['router']->aliasMiddleware('wire_interface', \App\Wire\Middleware\BeforeWireInterface::class);

        /**
         * Register the service provider to cache identifiers.
         */
//        $this->app->register('App\Wire\Providers\IdentifierCacheProvider');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        /**
         * Loading Wire Routes
         */
        $this->loadRoutesFrom(__DIR__ . '/routes/web.php');

        /**
         * todo: Loading Wire Translations, this also has application name...
         * todo: ...which should be moved into config for better conventions.
         *
         * ===> usage trans('wire::filename.key');
         */
        $this->loadTranslationsFrom(__DIR__ . '/resources/lang', 'wire');

        /**
         * loads views to be used
         * todo rename master blade in all of the views that extends to admin_master
         * todo rename image, crud_actions and user_actions view path in other views and controllers
         *
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
            __DIR__ . '/public/wire-css' => public_path('wire/wire-css'),
            __DIR__ . '/public/wire-js' => public_path('wire/wire-js'),
            __DIR__ . '/public/wire-images' => public_path('wire/wire-images'),
        ], 'public');

        /**
         * Controllers and Middleware will be published
         */
        $this->publishes([
            __DIR__ . '/Http' => base_path('app/Wire/Http'),
        ]);

        /**
         * Identifier and Provider will be published
         */
        $this->publishes([
            __DIR__ . '/Identifiers' => base_path('app/Wire/Identifiers'),
//            __DIR__ . '/Providers' => base_path('app/Wire/Providers'),
        ]);

        /**
         * Wire config file
         */
        $this->publishes([
            __DIR__.'/config/wire.php' => config_path('wire.php'),
        ]);
    }
}
