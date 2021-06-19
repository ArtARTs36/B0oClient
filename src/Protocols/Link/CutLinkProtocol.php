<?php

namespace ArtARTs36\B0oClient\Protocols\Link;

class CutLinkProtocol
{
    public $request;

    public $response;

    public function __construct(CutLinkRequest $request, CutLinkResponse $response)
    {
        $this->request = $request;
        $this->response = $response;
    }
}
