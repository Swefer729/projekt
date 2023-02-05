<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        Permission::create(['name'=>'users.index']);
        Permission::create(['name'=>'users.store']);
        Permission::create(['name'=>'users.destroy']);
        Permission::create(['name'=>'users.change_role']);

        Permission::create(['name'=>'log-viewer']);

        Permission::create(['name'=>'categories.index']);
        Permission::create(['name'=>'categories.manage']);

        Permission::create(['name'=>'producers.index']);
        Permission::create(['name'=>'producers.manage']);

        Permission::create(['name'=>'phonemodels.index']);
        Permission::create(['name'=>'phonemodels.manage']);

        Permission::create(['name'=>'devices.index']);
        Permission::create(['name'=>'devices.manage']);

        Permission::create(['name'=>'glasses.index']);
        Permission::create(['name'=>'glasses.manage']);

        Permission::create(['name'=>'products.index']);
        Permission::create(['name'=>'products.manage']);





        $adminRole = Role::findByName(config('auth.roles.admin'));
        $adminRole->givePermissionTo('users.index');
        $adminRole->givePermissionTo('users.store');
        $adminRole->givePermissionTo('users.destroy');
        $adminRole->givePermissionTo('users.change_role');

        $adminRole->givePermissionTo('log-viewer');

        $adminRole->givePermissionTo('categories.index');
        $adminRole->givePermissionTo('categories.manage');

        $adminRole->givePermissionTo('producers.index');
        $adminRole->givePermissionTo('producers.manage');

        $adminRole->givePermissionTo('phonemodels.index');
        $adminRole->givePermissionTo('phonemodels.manage');

        $adminRole->givePermissionTo('devices.index');
        $adminRole->givePermissionTo('devices.manage');

        $adminRole->givePermissionTo('glasses.index');
        $adminRole->givePermissionTo('glasses.manage');

        $adminRole->givePermissionTo('products.index');
        $adminRole->givePermissionTo('products.manage');

        $workerRole = Role::findByName(config('auth.roles.worker'));
        $workerRole->givePermissionTo('categories.index');
        $workerRole->givePermissionTo('producers.index');
        $workerRole->givePermissionTo('phonemodels.index');
        $workerRole->givePermissionTo('devices.index');
        $workerRole->givePermissionTo('glasses.index');
        $workerRole->givePermissionTo('products.index');

        $userRole = Role::findByName(config('auth.roles.user'));
        $userRole->givePermissionTo('categories.index');
        $userRole->givePermissionTo('producers.index');
        $userRole->givePermissionTo('phonemodels.index');
        $userRole->givePermissionTo('devices.index');
        $userRole->givePermissionTo('glasses.index');
        $userRole->givePermissionTo('products.index');

    }
}
