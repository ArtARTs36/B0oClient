<?php

namespace ArtARTs36\B0oClient;

use ArtARTs36\B0oClient\Contracts\ClickPoint;
use ArtARTs36\B0oClient\Contracts\LinkPoint;
use ArtARTs36\B0oClient\Protocols\Click\GetClicksCountProtocol;
use ArtARTs36\B0oClient\Protocols\Click\GetClicksCountRequest;
use ArtARTs36\B0oClient\Protocols\Click\GetClicksCountResponse;
use ArtARTs36\B0oClient\Protocols\CutLinkResponse;
use ArtARTs36\B0oClient\Protocols\Link\CutLinkProtocol;
use ArtARTs36\B0oClient\Protocols\Link\CutLinkRequest;

class Api implements Contracts\Api
{
    protected $client;

    public function __construct(\ArtARTs36\B0oClient\Contracts\Client $client)
    {
        $this->client = $client;
    }

    public function link(): LinkPoint
    {
        return new Points\LinkPoint($this->client, new CutLinkProtocol(new CutLinkRequest(), new CutLinkResponse()));
    }

    public function click(): ClickPoint
    {
        return new Points\ClickPoint($this->client, new GetClicksCountProtocol(
            new GetClicksCountRequest(),
            new GetClicksCountResponse()
        ));
    }
}
