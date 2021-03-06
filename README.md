# Laravel Easy Seo Titles

[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Laravel Version](https://img.shields.io/badge/laravel-5.1-orange.svg?style=flat-square)](http://laravel.com)
[![Packagist](https://img.shields.io/packagist/dt/garf/laravel-title.svg)]()
[![Licence](https://img.shields.io/packagist/l/garf/laravel-title.svg)](https://github.com/garf/laravel-title/blob/master/LICENSE)

Let your site to have nice SEO-titles on Laravel 5.

Sometimes, creating seo-titles may be tricky. Just try this package and you will be happy!

## Install

Add

``` JSON
"garf/laravel-title": "2.*"
```

to your `composer.json` file into `require` section.

Then type in console

``` BASH
$ composer update
```

When update completed, add to your `config/app.conf` file to `providers` section

``` PHP
'providers' => [
    // ...
    Garf\LaravelTitle\LaravelTitleServiceProvider::class,
]
```

If you want to use `Title` facade, add to same file at the `aliases` section

``` PHP
'aliases' => [
    // ...
  'Title' => Garf\LaravelTitle\TitleFacade::class,
]
```

### Publishing configs

Type in your console:

``` bash
php artisan vendor:publish --provider="Garf\LaravelTitle\LaravelTitleServiceProvider"
```

## Usage

### Add segment to the end

``` php
Title::append('Title segment');
```

### Add segment to the beginning

``` PHP
Title::prepend('Title segment');
```

### Display title

``` php
Title::render([$delimiter = null, $no_additions = false]);
```

Additionally, you can add parameters to this method:

 - first parameter `$delimiter` sets the delimiter config manually. If `null`, will be used default delimiter
 - second parameter `$no_additions` will cancel suffix and prefix adding to rendered title. 
Also sets `on_empty` config parameter to empty string.


``` php
Title::renderr([$delimiter = null, $no_additions = false]);
```

This method is similar to `render()` method, except it will render title in reversed order.

#### Check if segments exist

``` PHP
Title::has();
```

#### Render custom title

``` PHP
Title::make(Array $segments, [$delimiter = ' - ', $suffix = '', $prefix = '', $on_empty = '']);
```

Method will return title with your own params

#### Clear title stack

``` PHP
Title::clear();
```

Method will empty title segments.

#### Get raw segments array

``` PHP
Title::get();
```

#### Get segments in JSON-object

``` PHP
Title::toJson();
```

## Plans

- add variables to JS export
- additional meta-tags


## Contributions

Contributions are highly appreciated.

Send your pull requests to `master` branch.


## License

The MIT License (MIT). Please see [License File](https://github.com/garf/laravel-title/blob/master/LICENSE) for more information.

