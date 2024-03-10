<?php

namespace Database\Seeders;

use App\Models\DeathCause;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DeathCauseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $causesOfDeath = [
            'Cardiovascular Diseases',
            'Cancer',
            'Respiratory Diseases',
            'Infectious Diseases',
            'Diabetes',
            'Neurological Disorders',
            'Accidents',
            'Chronic Liver Disease and Cirrhosis',
            'Kidney Diseases',
            'Suicide',
            'Hypertension',
            'Septicemia',
            'Chronic Lower Respiratory Diseases',
            'Digestive Diseases',
            'Malnutrition',
        ];

        foreach ($causesOfDeath as $cause) {
            DeathCause::create(['name' => $cause]);
        }
    }
}
