<?php

namespace ArtARTs36\B0oClient\Points;

use ArtARTs36\B0oClient\Contracts\Client;
use ArtARTs36\B0oClient\Exceptions\GivenInvalidData;
use ArtARTs36\B0oClient\Protocols\Click\GetClicksCountProtocol;

class ClickPoint extends Point implements \ArtARTs36\B0oClient\Contracts\ClickPoint
{
    protected $countProtocol;

    public function __construct(Client $client, GetClicksCountProtocol $countProtocol)
    {
        parent::__construct($client);

        $this->countProtocol = $countProtocol;
    }

    /**
     * @throws GivenInvalidData
     */
    public function count(string $link): int
    {
        $response = $this->client->send($this->countProtocol->request->methodName, [
            $this->countProtocol->request->link => $link,
        ]);

        $this->countProtocol->response->ensureExceptionWhenInvalidData($response['data'] ?? []);

        return $response['data'][$this->countProtocol->response->count];
    }
}
