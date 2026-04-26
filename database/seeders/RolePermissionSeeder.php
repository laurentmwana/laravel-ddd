<?php

namespace Database\Seeders;

use App\Enums\PermissionEnum;
use App\Enums\RoleUserEnum;
use Illuminate\Database\Seeder;
use App\Models\Permission;
use App\Models\Role;

class RolePermissionSeeder extends Seeder
{
   public function run(): void
   {
      // Create roles
      foreach (RoleUserEnum::values() as $role) {
         Role::firstOrCreate(['name' => $role]);
      }

      // Create permissions
      foreach (PermissionEnum::values() as $permission) {
         Permission::firstOrCreate(['name' => $permission]);
      }

      // Assign permissions
      Role::findByName(RoleUserEnum::ADMIN->value)
         ->syncPermissions(PermissionEnum::forAdmin());

      Role::findByName(RoleUserEnum::MANAGER->value)
         ->syncPermissions(PermissionEnum::forManager());

      Role::findByName(RoleUserEnum::CLIENT->value)
         ->syncPermissions(PermissionEnum::forClient());

      Role::findByName(RoleUserEnum::TERMINAL->value)
         ->syncPermissions(PermissionEnum::forTerminal());

      Role::findByName(RoleUserEnum::DISABLE->value)
         ->syncPermissions(PermissionEnum::forDisable());
   }
}
