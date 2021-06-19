<?php

namespace ArtARTs36\B0oClient\Contracts;

interface Client
{
    /**
     * Send Request on Full Api B0o.ru
     */
    public function send(string $method, array $data): array;
}
