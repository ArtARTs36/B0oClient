<?php

namespace ArtARTs36\B0oClient\Protocols;

use ArtARTs36\B0oClient\Exceptions\GivenInvalidData;

abstract class Protocol
{
    /**
     * @param array $data
     * @return bool
     */
    public function valid(array $data): bool
    {
        foreach (get_object_vars($this) as $field) {
            if (empty($data[$field])) {
                return false;
            }
        }

        return true;
    }

    /**
     * @throws GivenInvalidData
     */
    public function ensureExceptionWhenInvalidData(array $data): void
    {
        if (! $this->valid($data)) {
            throw new GivenInvalidData();
        }
    }
}
