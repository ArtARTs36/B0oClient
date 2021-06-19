<?php

namespace ArtARTs36\B0oClient\Points;

use ArtARTs36\B0oClient\Contracts\Client;
use ArtARTs36\B0oClient\Data\Link;
use ArtARTs36\B0oClient\Exceptions\GivenInvalidData;
use ArtARTs36\B0oClient\Protocols\CutLinkProtocol;

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

        if (! $this->protocol->valid($response['data'])) {
            throw new GivenInvalidData();
        }

        return $this->transformToLink($response['data']);
    }

    protected function transformToLink(array $data): Link
    {
        return new Link(
            $data[$this->protocol->shortUrl],
            $data[$this->protocol->qrUrl],
            $data[$this->protocol->statUrl]
        );
    }
}
