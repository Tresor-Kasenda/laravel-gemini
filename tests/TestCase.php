<?php

namespace Tests;

use PHPUnit\Framework\TestCase as BaseTestCase;
use Scott\LaravelGemini\LaravelGeminiServiceProvider;

abstract class TestCase extends BaseTestCase
{
    protected function getPackageProviders($app): array
    {
        return [
            LaravelGeminiServiceProvider::class,
        ];
    }
}