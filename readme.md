# Multisite

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Total Downloads][ico-downloads]][link-downloads]
[![Build Status][ico-travis]][link-travis]
[![StyleCI][ico-styleci]][link-styleci]

This is where your description should go. Take a look at [contributing.md](contributing.md) to see a to do list.

## Installation

Via Composer

``` bash
$ composer require apsg/multisite
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
\Apsg\Multisite\Providers\ViewServiceProvider::class,
```

And that's it! 

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
$ composer test
```

## License

license. Please see the [license file](license.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/apsg/multisite.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/apsg/multisite.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/apsg/multisite/master.svg?style=flat-square
[ico-styleci]: https://styleci.io/repos/12345678/shield

[link-packagist]: https://packagist.org/packages/apsg/multisite
[link-downloads]: https://packagist.org/packages/apsg/multisite
[link-travis]: https://travis-ci.org/apsg/multisite
[link-styleci]: https://styleci.io/repos/12345678
[link-author]: https://github.com/apsg
[link-contributors]: ../../contributors
