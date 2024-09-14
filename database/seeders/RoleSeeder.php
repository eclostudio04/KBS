<?php

namespace Database\Seeders;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\User;


class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        $adminRole = Role::create([
            'name' => 'admin'
        ]);

        $fundraiserRole = Role::create([
            'name' => 'fundraiser'
        ]);

        $userAdmin = \App\Models\User::create([
            'name' => 'SuperAdminKbs',
            'avatar' => 'images/avatar/default.jpg',
            'email' => 'kbskomunitasberbagisodara@gmail.com',
            'password' => bcrypt('adminkbs123')
        ]);
    }
}
