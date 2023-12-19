<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Google Gemimi API Key
    |--------------------------------------------------------------------------
    |
    |
    */
    'api_key' => env('GOOGLE_GEMINI_API_KEY', ''),

    /*
    |--------------------------------------------------------------------------
    | Google Gemini Model
    |--------------------------------------------------------------------------
    |
    |
    */
    'model' => env('GOOGLE_GEMINI_MODEL', 'gemini'),

    /*
     * The path to the json file containing the credentials.
     */
    'url' => env('GOOGLE_GEMINI_URL', 'https://generativelanguage.googleapis.com/v1beta3/models'),
];
