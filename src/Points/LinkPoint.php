<?php

namespace ArtARTs36\B0oClient\Points;

use ArtARTs36\B0oClient\Contracts\Client;
use ArtARTs36\B0oClient\Data\Link;
use ArtARTs36\B0oClient\Protocols\Link\CutLinkProtocol;

class LinkPoint extends Point implements \ArtARTs36\B0oClient\Contracts\LinkPoint
{
    protected $protocol;

    public function __construct(Client $client, CutLinkProtocol $protocol)
    {
        parent::__construct($client);

        $this->protocol = $protocol;
    }

    public function cut(string $fullUrl): Link
    {
        $response = $this->client->send('linkCut', [
            'link' => $fullUrl,
        ]);

        $this->protocol->response->ensureExceptionWhenInvalidData($response['data']);

        return $this->transformToLink($response['data']);
    }

    protected function transformToLink(array $data): Link
    {
        return new Link(
            $data[$this->protocol->response->shortUrl],
            $data[$this->protocol->response->qrUrl],
            $data[$this->protocol->response->statUrl],
            $this->extractLinkCode($data[$this->protocol->response->shortUrl])
        );
    }

    protected function extractLinkCode(string $url): string
    {
        $parts = explode(DIRECTORY_SEPARATOR, $url);

        return end($parts);
    }
}
