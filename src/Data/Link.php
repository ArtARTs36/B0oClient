<?php

namespace ArtARTs36\B0oClient\Data;

class Link
{
    public $shortUrl;

    public $qrUrl;

    public $statUrl;

    public function __construct(string $shortUrl, string $qrUrl, string $statUrl)
    {
        $this->shortUrl = $shortUrl;
        $this->qrUrl = $qrUrl;
        $this->statUrl = $statUrl;
    }
}
