<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'Admin Test',
            'email' => 'admin.test@localhost',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('12345678'),
        ]);
        $adminRole = Role::findByName(config('auth.roles.admin'));
        if(isset($adminRole)){
            $admin->assignRole($adminRole);
        }

        $worker = User::create([
            'name' => 'Worker Test',
            'email' => 'worker.test@localhost',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('12345678'),
        ]);
        $workerRole = Role::findByName(config('auth.roles.worker'));
        if(isset($workerRole)){
            $worker->assignRole($workerRole);
        }

        $user = User::create([
            'name' => 'UserTest',
            'email' => 'user.test@localhost',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('12345678'),
        ]);
        $userRole = Role::findByName(config('auth.roles.user'));
        if(isset($userRole)){
            $user->assignRole($userRole);
        }
    }
}
