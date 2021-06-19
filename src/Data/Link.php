<?php

namespace ArtARTs36\B0oClient\Data;

class Link
{
    public $shortUrl;

    public $qrUrl;

    public $statUrl;

    public $code;

    public function __construct(string $shortUrl, string $qrUrl, string $statUrl, string $code)
    {
        $this->shortUrl = $shortUrl;
        $this->qrUrl = $qrUrl;
        $this->statUrl = $statUrl;
        $this->code = $code;
    }

    public function __toString()
    {
        return $this->code;
    }
}
