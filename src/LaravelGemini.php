<?php

declare(strict_types=1);

namespace Scott\LaravelGemini;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use InvalidArgumentException;

class LaravelGemini
{
    /**
     * @var array<string> $messages
     */
    protected array $messages = [];

    /**
     * @param string $prompt
     * @return array<string, mixed>
     * @throws GuzzleException
     */
    public function generateText(string $prompt): array
    {
        $url = config('laravel-gemini.url');
        if ( ! is_string($url)) {
            throw new InvalidArgumentException('Invalid URL configuration.');
        }
        return $this->makeApiRequest($url, $prompt);
    }

    /**
     * @param string $url
     * @param string $requestData
     * @return array<string, mixed>
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
        if ( ! is_array($responseContent) || ! isset($responseContent['candidates'][0]['content'])) {
            throw new InvalidArgumentException('Invalid response format.');
        }
        $content = $responseContent['candidates'][0]['content'];

        return [
            'model_role' => $content['role'],
            'model_prompt' => $content['parts'][0]['text']
        ];
    }
}
