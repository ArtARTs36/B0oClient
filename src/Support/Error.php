<?php

namespace ArtARTs36\B0oClient\Support;

final class Error
{
    public const ERROR_METHOD = 'Нет такого метода!';
    public const ERROR_PARAMETERS = 'Не переданы все параметры';
    public const ERROR_INCORRECT_PARAMETERS = 'Некорректные параметры!';

    public static function is(string $response): bool
    {
        return in_array($response, [
            static::ERROR_METHOD,
            static::ERROR_PARAMETERS,
            static::ERROR_INCORRECT_PARAMETERS,
        ]);
    }
}
