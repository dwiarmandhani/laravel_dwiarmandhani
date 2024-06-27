<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'username' => 'admin',
                'name' => 'admin',
                'email' => 'admin@example.com',
                'password' => Hash::make('password'),
            ],
            [
                'username' => 'user1',
                'name' => 'user1',
                'email' => 'user1@example.com',
                'password' => Hash::make('password'),
            ],
            [
                'username' => 'user2',
                'name' => 'user2',
                'email' => 'user2@example.com',
                'password' => Hash::make('password'),
            ],
        ]);
    }
}
