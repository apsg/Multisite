# Multisite

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Total Downloads][ico-downloads]][link-downloads]
[![Build Status][ico-travis]][link-travis]
[![StyleCI Status][ico-styleci]][link-styleci]

Package for managing multiple installations of the same code base. It gives the ability to change the views depending 
on the "domain" but preserving the backend core the same. 

It also lets you to define domain-specifig config.

## Installation

Via Composer

``` bash
composer require apsg/multisite
```

## Usage

After the installation:
##### Add your domain to your `.env` file, i.e.:

```
MULTISITE_DOMAIN=test
```

##### Add view folder

Create new view folder for your domain:

``` bash
mkdir resources/views/test
```
##### Override the view service provider

in `config/app.php` find this line (in `providers` section):
``` php
Illuminate\View\ViewServiceProvider::class,
```
and change it to:
```php
\Apsg\Multisite\Providers\ViewServiceProvider::class;
```

And that's it! From now on the Laravel's view engine would look for view files in main view directory (`resources/views/`) as well as in domain-specific directory (`resources/views/test` in the example above).


### Config files and helpers

The package provides helper Facade through which one can access domain-specific configurations.
One can publish default config file using:
```bash
php artisan vendor:publish --tag=multisite.config
``` 

The helper:
```php
\Multisite::config('some.key');
```
would return config equivallent to:
```php
config('multisite.{current_domain}.some.key');
```

##### Current domain helper

To check current domain use the Facade helper:
```php
\Multisite::domain();
```

## Multisite assets

To compile your assets in your `webpack.mix.js` add something like that:

```js
// ----- MULTISITE -----------------
let domains = [
    'site1',
    'site2'
];

for (let domain of domains) {
    mix.js('resources/assets/js/' + domain + '.js', 'public/js', domain + '.js')
        .sass('resources/assets/sass/' + domain + '.scss', 'public/css', domain + '.css');
}
```

This will search automatically for files `resources/js/{domain}.js` and `resources/sass/{domain}.scss`, compile them and move them to directories `public/js/{domain}.js` and `public/css/{domain}.css` respectively.

Then one can use helpers provided with this package to automagically load in your layout file only domain-related files:

```html
    <link href="{{ multisite_css() }}" rel="stylesheet">
    <script src="{{ multisite_js() }}"></script>
```

## Testing

``` bash
composer test
```

## License

license. Please see the [license file](license.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/apsg/multisite.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/apsg/multisite.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/apsg/multisite/master.svg?style=flat-square
[ico-styleci]: https://github.styleci.io/repos/228019147/shield 

[link-packagist]: https://packagist.org/packages/apsg/multisite
[link-downloads]: https://packagist.org/packages/apsg/multisite
[link-travis]: https://travis-ci.org/apsg/multisite
[link-styleci]: https://styleci.io/repos/228019147
[link-author]: https://github.com/apsg
