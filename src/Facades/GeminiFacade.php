<?php

declare(strict_types=1);

namespace Scott\LaravelGemini\Facades;

use Illuminate\Support\Facades\Facade;
use Scott\LaravelGemini\GeminiAi;

class GeminiFacade extends Facade
{
    /**
     * @return class-string
     */
    protected static function getFacadeAccessor(): string
    {
        return GeminiAi::class;
    }
}
