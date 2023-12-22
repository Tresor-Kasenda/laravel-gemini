<?php

declare(strict_types=1);

return [
    /*
    |--------------------------------------------------------------------------
    | GeminiAi API Key
    |--------------------------------------------------------------------------
    | The API key to use for authenticating with the Google GeminiAi API. You can get
    | an API key from the Google Cloud Console. You must have the Google GeminiAi API
    */
    'api_key' => env('GOOGLE_GEMINI_API_KEY', ''),

    /*
    |--------------------------------------------------------------------------
    | GeminiAi API URL
    |--------------------------------------------------------------------------
    | The URL to the Google GeminiAi API endpoint to use. This is useful if you want
    | to use a different endpoint for testing purposes. The default is the production
    */
    'url' => env('GOOGLE_GEMINI_URL', 'https://generativelanguage.googleapis.com/v1beta/models/'),

    /*
    |--------------------------------------------------------------------------
    | GeminiAi API Temperature
    |--------------------------------------------------------------------------
    | The temperature to use for generating content. The default is 0.25. You can use
    | the 'gemini-pro' model for testing purposes. You can also use the 'gemini-pro' model
    | for testing purposes. You can also use the 'gemini-pro' model
    */
    'temperature' => env('GOOGLE_GEMINI_TEMPERATURE', 0.25),

    /*
    |--------------------------------------------------------------------------
    | GeminiAi API Top K
    |--------------------------------------------------------------------------
    | The top k to use for generating content. The default is 40. You can use the 'gemini-pro'
    | model for testing purposes. You can also use the 'gemini-pro' model for testing purposes.
    */
    'top_k' => env('GOOGLE_GEMINI_TOP_K', 40),

    /*
    |--------------------------------------------------------------------------
    | GeminiAi API Top K
    |--------------------------------------------------------------------------
    | The top p to use for generating content. The default is 0.95. You can use the 'gemini-pro' model
    | for testing purposes. You can also use the 'gemini-pro' model for testing purposes.
    */
    'top_p' => env('GOOGLE_GEMINI_TOP_P', 0.95),

    /*
    |--------------------------------------------------------------------------
    | GeminiAi Candidate Count
    |--------------------------------------------------------------------------
    | The candidate count to use for generating content. The default is 1. You can use the 'gemini-pro' model for
    | testing purposes. You can also use the 'gemini-pro' model for testing purposes.
    */
    'candidate_count' => env('GOOGLE_GEMINI_CANDIDATE_COUNT', 1),

    /*
    |--------------------------------------------------------------------------
    | GeminiAi Mime type
    |--------------------------------------------------------------------------
    |
    |
    */
    'mime_type' => env('GOOGLE_GEMINI_MIME_TYPE', 'image/jpeg'),
];
