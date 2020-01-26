<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RolesAndPermissionsSeeder extends Seeder
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

        // create permissions
        Permission::create(['name' => 'edit user']);
        Permission::create(['name' => 'delete user']);
        Permission::create(['name' => 'create user']);

        Permission::create(['name' => 'edit thread']);
        Permission::create(['name' => 'delete thread']);
        Permission::create(['name' => 'create thread']);

        // create roles and assign created permissions

        // this can be done as separate statements
        $role = Role::create(['name' => 'member']);

        $role->givePermissionTo('edit thread');
        $role->givePermissionTo('create thread');
        $role->givePermissionTo('delete thread');


        $role = Role::create(['name' => 'super-admin']);
        $role->givePermissionTo(Permission::all());
    }
}
