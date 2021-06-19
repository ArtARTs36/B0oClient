<?php

namespace ArtARTs36\B0oClient\Enums;

final class Error
{
    public const ERROR_METHOD = 'Нет такого метода!';
    public const ERROR_PARAMETERS = 'Не переданы все параметры';
    public const ERROR_INCORRECT_PARAMETERS = 'Некорректные параметры!';

    public static function cases(): array
    {
        return [
            self::ERROR_METHOD,
            self::ERROR_PARAMETERS,
            self::ERROR_INCORRECT_PARAMETERS,
        ];
    }

    public static function is(string $response): bool
    {
        return in_array($response, self::cases());
    }
}
