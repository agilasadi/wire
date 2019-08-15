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

To create an **identifier** run:

```
php artisan wire:identifier User
```
An `identifier` is where you place your Model parameter to be used within **wire**.
**User** in this case is your Model name. 

Identifiers will be located in `App\Wire\Identifiers`

If your model is located in an unusall Path, 
you can configure that in `config\wire.php` by updating:

```   
'model_path' => 'App\\',
```


    
