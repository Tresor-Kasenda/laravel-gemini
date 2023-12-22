<?php

declare(strict_types=1);

namespace Scott\LaravelGemini;

use Illuminate\Support\ServiceProvider;
use Scott\LaravelGemini\Facades\LaravelGeminiFacade;

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

        $this->app->singleton(LaravelGeminiFacade::class, fn () => new LaravelGemini());
    }
}
