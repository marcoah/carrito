<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        //definir los roles para cada usuario en funcion a los requisitos del sistema
        $roleAdmin = Role::create(['name' => 'Admin']);
        $roleCliente = Role::create(['name' => 'Cliente']);
        $role3 = Role::create(['name' => 'super-admin']); // gets all permissions via Gate::before rule; see AuthServiceProvider

        //definir las acciones en funcion a los requisitos del sistema
        $permission1 = Permission::create(['name' => 'Eliminar clientes']);
        $permission2 = Permission::create(['name' => 'Eliminar proveedores']);
        $permission3 = Permission::create(['name' => 'Eliminar productos']);
        $permission4 = Permission::create(['name' => 'Eliminar servicios']);
        $permission5 = Permission::create(['name' => 'Eliminar categorias']);

        $roleAdmin->givePermissionTo($permission1, $permission2, $permission3, $permission4, $permission5);
        $roleCliente->givePermissionTo($permission3, $permission4, $permission5);
    }
}
