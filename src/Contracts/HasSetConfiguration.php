<?php

declare(strict_types=1);

namespace Scott\LaravelGemini\Contracts;

trait HasSetConfiguration
{
    /**
     * @var array<string> $messages
     */
    protected array $messages = [];

    protected string|int $temperature;

    protected string|int $maxOutputTokens;

    protected string $topP;

    protected string $topK;

    protected string $modelVersion;

    public function setModelVersion(string $modelVersion): static
    {
        $this->modelVersion = $modelVersion;

        return $this;
    }

    public function modelVersion(): string
    {
        return $this->modelVersion;
    }

    public function setTemperature(string|int $temperature): static
    {
        $this->temperature = $temperature;

        return $this;
    }

    public function setMaxOutputTokens(string|int $maxOutputTokens): static
    {
        $this->maxOutputTokens = $maxOutputTokens;

        return $this;
    }

    public function setTopP(string $topP): static
    {
        $this->topP = $topP;

        return $this;
    }

    public function maxOutputTokens(): string
    {
        return $this->maxOutputTokens ?? config('laravel-gemini.max_output_tokens');
    }

    public function topK(): string
    {
        return $this->topK ?? config('laravel-gemini.top_k');
    }

    public function topP(): string
    {
        return $this->topP ?? config('laravel-gemini.top_p');
    }

    public function setTopK(string $topK): static
    {
        $this->topK = $topK;

        return $this;
    }

    public function temperature(): string
    {
        return $this->temperature ?? config('laravel-gemini.temperature');
    }
}
