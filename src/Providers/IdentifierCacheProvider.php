<?php

namespace App\Wire\Providers;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\ServiceProvider;

class IdentifierCacheProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * todo: generate the menu if only it does not already exist
     * Currently it generates menu in every request
     *
     * @return void
     */
    public function boot()
    {
        $classes = [];

        $identifiers = glob((base_path('app/Wire/Identifiers/*.php')));

        foreach ($identifiers as $identifier)
        {
            if (class_basename($identifier) != "BaseIdentifier.php")
            {
                $route_prefix = strtolower(str_replace(".php", "", class_basename($identifier)));

                $class_name = "App\\Wire\\Identifiers\\".str_replace(".php", "", class_basename($identifier));

                $classes[$route_prefix] = $class_name;
            }
        }

        //todo rename the cache key so other applications have a lower chance of same cache key usage
        Cache::put('identifier_classes', $classes, 100);
    }
}
