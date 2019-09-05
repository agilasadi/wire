# Wire

###### Admin Panel for Laravel Applications





Install The package By running



```

composer require rapkit/wire

```

Once the package is installed you need to publish it by running the following command:



```

php artisan vendor:publish --provider="Rapkit\Wire\WireServiceProvider"

```

You will also need to register a service provider that has been published to modify some of the functionalities of Wire.


Either register it in **config/app.php**

```

App\Providers\WireServiceProvider::class,

```

If you register it inside `config/app.php` make sure to clear config cache with `php artisan config:cache`


or inside register method of AppServiceProvider:

```

$this->app->register(WireServiceProvider::class);

```


To create an **identifier** run:



```

php artisan wire:identifier User

```

An `identifier` is where you place your Model parameter to be used within **wire**.

**User**, in this case, is your Model name. 



Identifiers will be located in `App\Wire\Identifiers`



If your model is located in an unusall Path, 

you can configure that in `config\wire.php` by updating:



```   

'model_path' => 'App\\',

```

___



When an identifier was created, Wire will automatically cache it to show in the menu, but if you would like to specifically cache each identifier that you would like to show in the menu, you can run:

```

php artisan identifier:cache --User

```

If you run `php artisan identifier:cache` with no Identifier name, then it will cache all of the identifiers.



You can remove identifier list with `php artisan cache:clear` command of laravel.



Refer to https://github.com/rapkit/wire/wiki/Fields for more information about fields

