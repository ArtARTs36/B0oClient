<?php

namespace ArtARTs36\B0oClient\Points;

use ArtARTs36\B0oClient\Contracts\Client;

abstract class Point
{
    protected $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }
}
