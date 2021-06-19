<?php

namespace ArtARTs36\B0oClient\Protocols;

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
}
