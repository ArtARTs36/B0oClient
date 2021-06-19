<?php

namespace ArtARTs36\B0oClient;

use ArtARTs36\B0oClient\Enums\Error;

final class Client implements Contracts\Client
{
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
    public function send(string $method, array $data): array
    {
        $response = json_decode(
            $this->execute($this->createContext($this->buildQuery($method, $data))),
            true
        );

        if (! isset($response['isSuccess']) || $response['isSuccess'] === false) {
            throw new \RuntimeException('Request on b0o.ru is failed. ');
        }

        return $response;
    }

    /**
     * @param array|string
     */
    private function buildQuery(string $method, $data): string
    {
        return http_build_query([
            'method' => $method,
            'type' => self::TYPE_FULL,
            'data' => $data,
        ]);
    }

    /**
     * @param resource $context
     */
    private function execute($context): string
    {
        $response = file_get_contents($this->url, false, $context);

        if (false === $response) {
            $this->ensureHttpException();
        }

        if (Error::is($response)) {
            throw new \RuntimeException('Request on b0o.ru is failed. ' . $response);
        }

        return $response;
    }

    private function ensureHttpException(): void
    {
        $error = error_get_last();

        if (empty($error['message'])) {
            return;
        }

        throw new \HttpRuntimeException($error['message']);
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
