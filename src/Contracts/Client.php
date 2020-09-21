<?php

namespace ArtARTs36\B0oClient\Contracts;

interface Client
{
    /**
     * Send Request on Quick Api B0o.ru
     */
    public function sendToQuick(string $method, string $data): string;

    /**
     * Send Request on Full Api B0o.ru
     */
    public function sendToFull(string $method, array $data): array;
}
