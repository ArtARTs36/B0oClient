<?php

namespace ArtARTs36\B0oClient\Points;

use ArtARTs36\B0oClient\Contracts\Client;
use ArtARTs36\B0oClient\Exceptions\GivenInvalidData;

class ClickPoint extends Point implements \ArtARTs36\B0oClient\Contracts\ClickPoint
{
    public function __construct(Client $client)
    {
        parent::__construct($client);
    }

    /**
     * @throws GivenInvalidData
     */
    public function count(string $link): int
    {
        $response = $this->client->send('getCountClicks', [
            'short' => $link,
        ]);

        if (! isset($response['data']['count'])) {
            throw new GivenInvalidData();
        }

        return $response['data']['count'];
    }
}
