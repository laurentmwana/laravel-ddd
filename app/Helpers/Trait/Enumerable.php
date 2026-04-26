<?php

namespace App\Helpers\Trait;

trait Enumerable
{
   public static function values(): array
   {
      return array_map(fn($enum) => $enum->value, self::cases());
   }
}
