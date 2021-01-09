<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $administrative= Role::find(1);
        $provider= Role::find(2);
        $user= Role::find(3);

        //administrative access
        $permission = Permission::create(['name' => 'administrative-access']);
        $administrative->givePermissionTo($permission);

        //provider access
        $permission = Permission::create(['name' => 'provider-access']);
        $provider->givePermissionTo($permission);

        //user access
        $permission = Permission::create(['name' => 'user-access']);
        $user->givePermissionTo($permission);

    }
}
