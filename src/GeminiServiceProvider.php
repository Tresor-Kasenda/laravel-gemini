<?php

declare(strict_types=1);

namespace Scott\LaravelGemini;

use Illuminate\Support\ServiceProvider;
use Scott\LaravelGemini\Facades\GeminiFacade;

class GeminiServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->publishes([
            __DIR__.'/../config/gemini.php' => config_path('gemini.php'),
        ], 'config');
    }

    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/gemini.php', 'gemini');

        $this->app->singleton(GeminiFacade::class, fn () => new GeminiAi());
    }
}
