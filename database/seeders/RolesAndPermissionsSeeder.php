<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run(): void
    {
        // Limpiar cache de permisos/roles
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Crear permisos base (solo los que tú definas)
        $permissions = [
            'view users',
            'assign roles',
            // agrega más según necesidades
        ];

        foreach ($permissions as $perm) {
            Permission::firstOrCreate(['name' => $perm, 'guard_name' => 'web']);
        }

        // Crear roles base
        $roles = ['superadmin', 'admin', 'user'];
        foreach ($roles as $role) {
            $r = Role::firstOrCreate(['name' => $role, 'guard_name' => 'web']);

            // Asignar permisos al superadmin o admin según convenga
            if ($role === 'superadmin') {
                $r->syncPermissions(Permission::all());
            }
        }
    }
}
