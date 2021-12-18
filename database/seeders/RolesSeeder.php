<?php

namespace Database\Seeders;

use App\Models\User;
use App\Permission\Models\Permission;
use App\Permission\Models\Role;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roladmin = Role::create([
            'name' => 'Admin',
            'slug' => 'admin',
            'description' => 'Administrado',
            'full-access' => 'yes',
            'eliminar' => 'no'
        ]);
        $useradmin = User::first();
        $useradmin->roles()->sync([$roladmin->id]);
        $permission_all = [];

        //permiso

        $permission = Permission::create([
            'name' => 'Listar Tipo empleados',
            'slug' => 'tipoEmpleado.index',
            'description' => 'Un usuario puede ver el modulo de Tipos de Empleados'
        ]);
        $permission_all[] = $permission->id;

        $permission = Permission::create([
            'name' => 'Listar Empleados',
            'slug' => 'empleado.index',
            'description' => 'Un usuario puede ver el modulo de Empleados'
        ]);
        $permission_all[] = $permission->id;

        $permission = Permission::create([
            'name' => 'Listar Roles',
            'slug' => 'rol.index',
            'description' => 'Un usuario puede ver el modulo de roles'
        ]);
        $permission_all[] = $permission->id;

        $permission = Permission::create([
            'name' => 'Listar Grado',
            'slug' => 'grado.index',
            'description' => 'Un usuario puede ver el modulo de Grado'
        ]);
        $permission_all[] = $permission->id;

        $roladmin->permissions()->sync($permission_all);
    }
}
