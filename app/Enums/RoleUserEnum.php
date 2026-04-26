<?php

namespace App\Enums;

use App\Helpers\Trait\Enumerable;

enum RoleUserEnum: string
{
    use Enumerable;

    case ADMIN = 'admin';
    case MANAGER = 'manager';
    case CLIENT = 'client';
    case TERMINAL = 'terminal';

    /**
     * @return string[]
     */
    public static function forAdmin(): array
    {
        return [
            self::ADMIN->value,
        ];
    }

    /**
     * @return string[]
     */
    public static function forManager(): array
    {
        return [
            self::MANAGER->value,
        ];
    }

    /**
     * @return string[]
     */
    public static function forClient(): array
    {
        return [
            self::CLIENT->value,
        ];
    }

    /**
     * @return string[]
     */
    public static function forTerminal(): array
    {
        return [
            self::TERMINAL->value,
        ];
    }
}
