<?php

namespace Database\Seeders;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\Models\User;
// use Spatie\Permission\Models\User;


class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        $ownerRole = Role::create([
            'name' => 'owner'
        ]);

        $fundraiserRole = Role::create([
            'name' => 'fundraiser'
        ]);

        $userOwner = User::create([
            'name' => 'Admin KBS',
            'avatar' => 'images/default-avatar.png',
            'email' => 'kbs@gmail.com',
            'password' => bcrypt('adminkbs123')
        ]);

        $userOwner->assignRole($ownerRole);
    }
}
