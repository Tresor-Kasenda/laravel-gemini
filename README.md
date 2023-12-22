# Laravel Gemini

[![Latest Version on Packagist](https://img.shields.io/packagist/v/scott/laravel-gemini.svg?style=flat-square)](https://packagist.org/packages/scott/laravel-gemini)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/scott/laravel-gemini/run-tests?label=tests)]()
[![Total Downloads](https://img.shields.io/packagist/dt/scott/laravel-gemini.svg?style=flat-square)](https://packagist.org/packages/scott/laravel-gemini)

This package provides a simple way to use the [Gemini API](https://docs.gemini.com/rest-api/) in your Laravel
applications.
The Laravel Gemini package provides a convenient interface for interacting with the Gemini API to generate text based on
a given prompt.
This documentation outlines how to use the `GeminiAi` class, its methods, and configuration.

## Get Started

> **Requires [PHP 8.1+](https://php.net/releases/)**

First, install GeminiAI via the [Composer](https://getcomposer.org/) package manager:

## Installation

You can install the package via composer:

```bash
composer require scott/laravel-gemini
```

## Configuration

The Laravel Gemini package can be configured using environment variables. The following environment variables are
available:

This will create a `config/gemini.php` configuration file in your project, which you can modify to your needs
using environment variables.
Blank environment variables for the Google gemini API key and organization id are already appended to your `.env` file.

```env
GOOGLE_GEMINI_API_KEY=
```

You can publish the config file with:

```bash
php artisan vendor:publish --provider="Scott\LaravelGemini\LaravelGeminiServiceProvider" --tag="laravel-gemini-config"
```

## Usage

To use the Laravel Gemini package for text generation, follow these steps:

1. **Create a new instance of Gemini AI:**

```php
use Scott\LaravelGemini\GeminiAi;
$prompt = GeminiAi::models('gemini-pro')
    ->generateText('I am a web developer');
```

2. **Call the `generateText` method:**

```php
echo $prompt;
```

## Testing

``` bash
composer test
```

## Security

If you discover any security related issues, please email [tresorkasendat@gmail.com](mailto:tresorkasendat@gmail.com)
instead of using the issue tracker.

## Credits

- [All Contributors](../../contributors)
- [Laravel Package Boilerplate](https://laravelpackageboilerplate.com)
- [Gemini API](https://docs.gemini.com/rest-api/)
- [Laravel](https://laravel.com)
