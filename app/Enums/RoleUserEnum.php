<?php

namespace App\Enums;

use App\Helpers\Trait\Enumerable;

enum RoleUserEnum: string
{
   use Enumerable;

   case ADMIN   = "admin";
   case MANAGER  = "manager";
   case CLIENT        = "client";
   case TERMINAL       = "terminal";
   case DISABLE       = "disable";

   public static function forAdmin(): array
   {
      return [
         self::ADMIN->value
      ];
   }

   public static function forManager(): array
   {
      return [
         self::MANAGER->value,
      ];
   }

   public static function forClient(): array
   {
      return [
         self::CLIENT->value,
      ];
   }

   public static function forTerminal(): array
   {
      return [
         self::TERMINAL->value,
      ];
   }

   public static function forDisable(): array
   {
      return [
         self::DISABLE->value,
      ];
   }
}
