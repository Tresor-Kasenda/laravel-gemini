<?php

namespace Scott\LaravelGemini\Facades;

use Illuminate\Support\Facades\Facade;
use Scott\LaravelGemini\LaravelGemini;

class LaravelGeminiFacade extends Facade
{
    /**
     * @return class-string
     */
    protected static function getFacadeAccessor(): string
    {
        return LaravelGemini::class;
    }
}
