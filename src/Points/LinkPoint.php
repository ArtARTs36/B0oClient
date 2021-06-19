<?php

namespace ArtARTs36\B0oClient\Points;

class LinkPoint extends Point implements \ArtARTs36\B0oClient\Contracts\LinkPoint
{
    public function cut(string $fullUrl)
    {
        return $this->client->send('linkCut', [
            'link' => $fullUrl,
        ]);
    }
}
