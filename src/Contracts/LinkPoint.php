<?php

namespace ArtARTs36\B0oClient\Contracts;

use ArtARTs36\B0oClient\Data\Link;

interface LinkPoint
{
    public function cut(string $fullUrl): Link;
}
