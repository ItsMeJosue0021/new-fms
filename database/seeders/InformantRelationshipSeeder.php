<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\InformantRelationship;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class InformantRelationshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $relationships = [
            'Parent',
            'Grandparent',
            'Sibling',
            'Child',
            'Grandchild',
            'Spouse',
            'Aunt',
            'Uncle',
            'Cousin',
            'Nephew',
            'Niece',
            'Father-in-law',
            'Mother-in-law',
            'Brother-in-law',
            'Sister-in-law',
            'Stepfather',
            'Stepmother',
            'Stepbrother',
            'Stepsister',
            'Guardian',
            'Foster Parent',
            'Foster Child',
            'Legal Guardian',
            'Adoptive Parent',
            'Adopted Child',
            'Godparent',
            'Godchild',
        ];

        foreach ($relationships as $relationship) {
            InformantRelationship::create([
                'name' => $relationship,
            ]);
        }
    }
}
