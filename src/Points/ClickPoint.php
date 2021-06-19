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
        $response = $this->client->send('getCountClicks', [
            $this->countProtocol->request->link => $link,
        ]);

        if (! isset($response['data'][$this->countProtocol->response->count])) {
            throw new GivenInvalidData();
        }

        return $response['data'][$this->countProtocol->response->count];
    }
}
