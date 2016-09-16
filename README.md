** In Development **

# Laravel View Defender

<img src="https://cloud.githubusercontent.com/assets/647407/18585846/4e74f0a4-7c11-11e6-88fc-a5989e0f740b.jpg"/>

*Defending Laravel Views from evil*

## The story so far...

Views are great, they make outputting HTML etc nice 'n' easy. However, some developers from the dark side have been passing magical objects to their views, causing chaos in the view galaxy.

Designers (and even developers showing signs of the dark side) have been known to use these objects for evil, creating hundreds of database queries through lazy-loading relationships, and sometimes even more sinister!

NEON brings you **View Defender** to the rescue. Simply adding the package to your Laravel application will defend your views against evil objects such as Eloquent Models and Doctrine Entities.


## Use the Force

Require this package

```php
composer require neondigital/laravel-view-defender
```

After adding the package, add the ServiceProvider (Force) to the providers array in `config/app.php`

```php
Neondigital\LaravelViewDefender\ViewDefenderServiceProvider::class,
```

To publish the config use:

```php
php artisan vendor:publish --tag="config"
```

## License

This package is licensed under the [MIT license](https://github.com/neondigita/view-defender/blob/master/LICENSE).