<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $employees = [
            [
                'first_name' => 'John',
                'middle_name' => 'Doe',
                'last_name' => 'Smith',
                'type' => 'Driver',
                'image' => null,
            ],
            [
                'first_name' => 'Mark',
                'middle_name' => 'Jewel',
                'last_name' => 'Betes',
                'type' => 'Driver',
                'image' => null,
            ],
            [
                'first_name' => 'Sammy',
                'middle_name' => 'Orton',
                'last_name' => 'Lomera',
                'type' => 'Helper',
                'image' => null,
            ],
            [
                'first_name' => 'Mario',
                'middle_name' => 'Lorrendo',
                'last_name' => 'Marrima',
                'type' => 'Helper',
                'image' => null,
            ],
        ];

        foreach ($employees as $employee) {
            Employee::create($employee);
        }
    }
}
