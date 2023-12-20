<?php

declare(strict_types=1);

namespace Scott\LaravelGemini;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class LaravelGemini
{
    protected array $messages = [];

    /**
     * @throws GuzzleException
     */
    public function generateText(string $prompt): array
    {
        return $this->makeApiRequest(config('laravel-gemini.url'), $prompt);
    }

    /**
     * @throws GuzzleException
     */
    protected function makeApiRequest(string $url, string $requestData): array
    {
        $client = new Client();
        $response = $client->post($url, [
            'query' => ['key' => config('laravel-gemini.api_key')],
            'headers' => ['Content-Type' => 'application/json'],
            'json' => ['contents' => [['parts' => [['text' => $requestData]]]]],
        ]);

        $responseContent = json_decode($response->getBody()->getContents(), true);
        $content = $responseContent['candidates'][0]['content'];

        return [
            'role' => 'user',
            'prompt' => $requestData,
            'model_role' => $content['role'],
            'model_prompt' => $content['parts'][0]['text']
        ];
    }
}
