<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Limpiar Cache de permisos/roles
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        //Crear Permisos
        Permission::firstOrCreate(['name' => 'view users', 'guard_name' => 'web']);
        Permission::firstOrCreate(['name' => 'assign roles', 'guard_name' => 'web' ]);

        //Crear Roles

        $adminRole = Role::firstOrCreate(['name' => 'admin','guard_name' => 'web' ]);
        $userRole = Role::firstOrCreate(['name' => 'user', 'guard_name' => 'web']);

        //Asignar Admin Permisos
        $adminRole -> givePermissionTo(Permission::all());


    }
}
