<?php

namespace Database\Seeders;

use App\Models\CivilStatus;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CivilStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $civilStatuses = [
            'Single',
            'Married',
            'Widowed',
            'Separated',
            'Divorced',
            'Annulled',
            'Common-law'
        ];

        foreach ($civilStatuses as $civilStatus) {
            CivilStatus::create(['name' => $civilStatus]);
        }
    }
}
