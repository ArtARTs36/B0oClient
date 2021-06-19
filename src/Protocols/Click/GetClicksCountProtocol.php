<?php

namespace ArtARTs36\B0oClient\Protocols\Click;

class GetClicksCountProtocol
{
    public $request;

    public $response;

    public function __construct(GetClicksCountRequest $request, GetClicksCountResponse $response)
    {
        $this->request = $request;
        $this->response = $response;
    }
}
