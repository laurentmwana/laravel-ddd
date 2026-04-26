<?php

namespace App\Helpers\Trait;

trait Enumerable
{
    /**
     * @return string[]
     */
    public static function values(): array
    {
        return array_map(fn ($enum) => $enum->value, self::cases());
    }
}
