<?php

declare(strict_types=1);

namespace Scott\LaravelGemini;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use InvalidArgumentException;
use Scott\LaravelGemini\Contracts\HasSetConfiguration;
use Scott\LaravelGemini\Exceptions\InvalidUrlException;

class LaravelGemini
{
    use HasSetConfiguration;

    /**
     * @param string $prompt
     * @return array<string, mixed>
     * @throws GuzzleException
     */
    public function generateText(string $prompt): array
    {
        $url = config('laravel-gemini.url');
        if (!is_string($url)) {
            throw new InvalidUrlException("Invalid URL configuration.");
        }
        return $this->makeApiRequest($url, $prompt);
    }

    /**
     * @param string $url
     * @param string $requestData
     * @param string|null $base64Image
     * @return array<string, mixed>
     * @throws GuzzleException
     */
    protected function makeApiRequest(string $url, string $requestData, string|null $base64Image): array
    {
        $client = new Client();
        $response = $client->post($url . $this->getModel() . ":generateContent", [
            'query' => ['key' => config('laravel-gemini.api_key')],
            'headers' => ['Content-Type' => 'application/json'],
            'json' => [
                'model' => $this->getModel(),
                'contents' => [['parts' => [
                    ['text' => $requestData],
                    [
                        'inline_data' => [
                            'mime_type' => config('laravel-gemini.mime_type'),
                            'data' => $base64Image,
                        ],
                    ],
                ]]],
                'safetySettings' => [
                    'category' => 'HARM_CATEGORY_DANGEROUS_CONTENT',
                    'threshold' => 'BLOCK_ONLY_HIGH',
                ],
                'generationConfig' => [
                    'stopSequences' => ['Title'],
                    'temperature' => $this->temperature(),
                    'maxOutputTokens' => $this->maxOutputTokens(),
                    'topP' => $this->topP(),
                    'topK' => $this->topK(),
                ],
            ],
        ]);

        $responseContent = json_decode($response->getBody()->getContents(), true);
        if (!is_array($responseContent) || !isset($responseContent['candidates'][0]['content'])) {
            throw new InvalidArgumentException('Invalid response format.');
        }
        $content = $responseContent['candidates'][0]['content'];

        return [
            'model_role' => $content['role'],
            'model_prompt' => $content['parts'][0]['text']
        ];
    }

    public function getModel(): string
    {
        return $this->models;
    }

    public function temperature(): string
    {
        return $this->temperature ?? config('laravel-gemini.temperature');
    }

    public function generateTextWithImages(string $prompt, string $imagePath)
    {
        $base64Image = base64_encode(file_get_contents($imagePath));

        $request = [
            'contents' => [
                'parts' => [
                    ['text' => $prompt],
                    [
                        'inline_data' => [
                            'mime_type' => 'image/jpeg',
                            'data' => $base64Image,
                        ],
                    ],
                ],
            ],
        ];

        return $request;
    }

    public function generateConversation(string $prompt): void
    {
        $conversation = [
            [
                'role' => 'user',
                'parts' => [
                    ['text' => "Write the first line of a story about a magic backpack."],
                ],
            ],
            [
                'role' => 'model',
                'parts' => [
                    ['text' => "In the bustling city of Meadow brook, lived a young girl named Sophie. She was a bright and curious soul with an imaginative mind."],
                ],
            ],
            [
                'role' => 'user',
                'parts' => [
                    ['text' => "Can you set it in a quiet village in 1600s France?"],
                ],
            ],
        ];
    }

    public function streamContentToFile(string $prompt, string $imagePath): void
    {

    }

    public function countToken(): void
    {

    }

    public function generateEmbeddingContent(string $prompt): void
    {

    }

    public function getModelInfos(string $model): void
    {

    }

    public function getModelLists(): void
    {

    }
}
