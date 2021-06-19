<?php

namespace ArtARTs36\B0oClient\Tests\Mocks;

use ArtARTs36\B0oClient\Contracts\Client;

class MockClient implements Client
{
    private $response;

    public function send(string $method, array $data): array
    {
        return $this->response;
    }

    public function setResponse(array $response): self
    {
        $this->response = $response;

        return $this;
    }

    public function setResponseData(array $data): self
    {
        return $this->setResponse(compact('data'));
    }
}
