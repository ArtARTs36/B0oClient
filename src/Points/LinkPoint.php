<?php

namespace ArtARTs36\B0oClient\Points;

use ArtARTs36\B0oClient\Data\Link;

class LinkPoint extends Point implements \ArtARTs36\B0oClient\Contracts\LinkPoint
{
    public function cut(string $fullUrl): Link
    {
        $response = $this->client->send('linkCut', [
            'link' => $fullUrl,
        ]);

        return $this->transformToLink($response['data']);
    }

    protected function transformToLink(array $data): Link
    {
        return new Link($data['short'], $data['urlQrImage'], $data['urlStat']);
    }
}
