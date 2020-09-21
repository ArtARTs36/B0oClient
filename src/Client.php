<?php

namespace ArtARTs36\B0oClient;

use ArtARTs36\B0oClient\Support\Error;

final class Client implements Contracts\Client
{
    public const TYPE_QUICK = 1;
    public const TYPE_FULL = 2;

    public const BASE_URL = 'https://b0o.ru/api/';

    private $url;

    public function __construct(string $url = self::BASE_URL)
    {
        $this->url = $url;
    }

    /**
     * Send Request on Full Api B0o.ru
     */
    public function sendToFull(string $method, array $data): array
    {
        $response = json_decode(
            $this->execute($this->createContext($this->buildQuery($method, static::TYPE_FULL, $data))),
            true
        );

        if (! isset($response['isSuccess']) || $response['isSuccess'] === false) {
            throw new \RuntimeException('Request on b0o.ru is failed. ');
        }

        return $response;
    }

    /**
     * Send Request on Quick Api B0o.ru
     */
    public function sendToQuick(string $method, string $data): string
    {
        return $this->execute($this->createContext($this->buildQuery($method, static::TYPE_QUICK, $data)));
    }

    /**
     * @param array|string
     */
    private function buildQuery(string $method, int $type, $data): string
    {
        return http_build_query(compact('method', 'type', 'data'));
    }

    /**
     * @param resource $context
     */
    private function execute($context): string
    {
        $response = file_get_contents($this->url, false, $context);

        if (false === $response || Error::is($response)) {
            throw new \RuntimeException('Request on b0o.ru is failed. ' . $response);
        }

        return $response;
    }

    /**
     * @return resource
     */
    private function createContext(string $data)
    {
        return stream_context_create([
            'http' => [
                'method' => 'POST',
                'header' => 'Content-type: application/x-www-form-urlencoded',
                'content' => $data
            ]
        ]);
    }
}
