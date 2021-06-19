<?php

namespace ArtARTs36\B0oClient;

use ArtARTs36\B0oClient\Contracts\LinkPoint;

class Api implements Contracts\Api
{
    protected $client;

    public function __construct(\ArtARTs36\B0oClient\Contracts\Client $client)
    {
        $this->client = $client;
    }

    public function link(): LinkPoint
    {
        return new Points\LinkPoint($this->client);
    }
}
