<?php

declare(strict_types=1);

namespace Scott\LaravelGemini;

use Illuminate\Support\ServiceProvider;

class LaravelGeminiServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->publishes([
            __DIR__.'/../config/laravel-gemini.php' => config_path('laravel-gemini.php'),
        ], 'config');
    }

    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/laravel-gemini.php', 'laravel-gemini');

        $this->app->singleton(LaravelGemini::class, fn () => new LaravelGemini());
    }
}
