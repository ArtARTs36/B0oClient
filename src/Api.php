<?php

namespace ArtARTs36\B0oClient;

use ArtARTs36\B0oClient\Contracts\ClickPoint;
use ArtARTs36\B0oClient\Contracts\LinkPoint;
use ArtARTs36\B0oClient\Protocols\CutLinkProtocol;

class Api implements Contracts\Api
{
    protected $client;

    public function __construct(\ArtARTs36\B0oClient\Contracts\Client $client)
    {
        $this->client = $client;
    }

    public function link(): LinkPoint
    {
        return new Points\LinkPoint($this->client, new CutLinkProtocol());
    }

    public function click(): ClickPoint
    {
        return new Points\ClickPoint($this->client);
    }
}
