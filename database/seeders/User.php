<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class User extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $users = [
            [
                'id' => '1',
                'username' => 'Member',
                'Fullname' => 'Member',
                'password' => Hash::make("password"),
                'role' => 'member',
                'profile_picture' => 'pp.jpg',
                'level' => '0',
            ],
            [
                'id' => '2',
                'username' => 'Admin',
                'Fullname' => 'Admin',
                'password' => Hash::make("password"),
                'role' => 'admin',
                'profile_picture' => 'pp.jpg',
                'level' => '0',
            ]
        ];
        DB::table('users')->insert($users);
    }
}
