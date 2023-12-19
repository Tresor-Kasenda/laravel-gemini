<?php

declare(strict_types=1);

namespace Scott\LaravelGemini;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class LaravelGemini
{
    /**
     * @throws GuzzleException
     */
    public static function generateMessage(string $message)
    {
        $client = new Client();
        $response = $client->post(config('laravel-gemini.url').'/chat-bison-001:generateMessage', [
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'query' => [
                'key' => config('laravel-gemini.api_key'),
            ],
            'json' => [
                'prompt' => [
                    'context' => '',
                    'examples' => [],
                    'messages' => [
                        ['content' => $message],
                    ],
                ],
                'temperature' => 0.25,
                'top_k' => 40,
                'top_p' => 0.95,
                'candidate_count' => 1,
            ],
        ]);

        return json_decode($response->getBody()->getContents(), true);
    }
}
