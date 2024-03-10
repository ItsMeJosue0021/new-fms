<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Database\Seeders\JobSeeder;
use Illuminate\Database\Seeder;
use Database\Seeders\RoleSeeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\CasketSeeder;
use Database\Seeders\HearseSeeder;
use Database\Seeders\ReligionSeeder;
use Database\Seeders\DeathCauseSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(CasketSeeder::class);
        $this->call(HearseSeeder::class);
        $this->call(JobSeeder::class);
        $this->call(ReligionSeeder::class);
        $this->call(DeathCauseSeeder::class);
    }
}
