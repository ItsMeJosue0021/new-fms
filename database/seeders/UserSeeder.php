<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'email' => 'admin@email.com',
            'password' => Hash::make('password'),
            'role_id' => 1,
        ]);

        DB::table('users')->insert([
            'email' => 'user@email.com',
            'password' => Hash::make('password'),
            'role_id' => 2,
        ]);
    }
}
