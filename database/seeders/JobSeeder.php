<?php

namespace Database\Seeders;

use App\Models\Job;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jobs = [
            'Software Developer',
            'Teacher',
            'Doctor',
            'Nurse',
            'Engineer',
            'Accountant',
            'Designer',
            'Marketing Specialist',
            'Lawyer',
            'Chef',
            'Police Officer',
            'Firefighter',
        ];

        foreach ($jobs as $job) {
            Job::create(['name' => $job]);
        }
    }
}
