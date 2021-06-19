<?php

namespace ArtARTs36\B0oClient\Protocols\Click;

class GetClicksCountProtocol
{
    public $request;

    public $response;

    public function __construct(GetClicksCountRequestProtocol $request, GetClicksCountResponseProtocol $response)
    {
        $this->request = $request;
        $this->response = $response;
    }
}
