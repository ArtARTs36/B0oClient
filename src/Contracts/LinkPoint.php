<?php

namespace ArtARTs36\B0oClient\Contracts;

use ArtARTs36\B0oClient\Data\Link;
use ArtARTs36\B0oClient\Exceptions\GivenInvalidData;

interface LinkPoint
{
    /**
     * @throws GivenInvalidData
     */
    public function cut(string $fullUrl): Link;
}
