<?php

namespace SrsRegistrar;

class Configuration
{
    public const string DEFAULT_ENDPOINT = 'https://rr-n1-tor.opensrs.net:55443';

    private string $username;

    private string $apiKey;

    private string $endpoint;

    public function __construct(
        string $apiKey,
        string $username,
        string $endpoint = self::DEFAULT_ENDPOINT,
    ) {
        $this->setEndpoint($endpoint);
        $this->setApiKey($apiKey);
        $this->setUsername($username);
    }

    public function setEndpoint(string $endpoint): void
    {
        $this->endpoint = $endpoint;
    }

    public function setApiKey(string $apiKey): void
    {
        $this->apiKey = $apiKey;
    }

    public function setUsername(string $username): void
    {
        $this->username = $username;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function getApiKey(): string
    {
        return $this->apiKey;
    }

    public function getEndpoint(): string
    {
        return $this->endpoint;
    }
}
