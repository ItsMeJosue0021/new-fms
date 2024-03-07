<?php

namespace Database\Seeders;

use App\Models\Hearse;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class HearseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $hearses = [
            [
                'name' => 'Eternal Peace Wooden Casket',
                'description' => 'Beautifully crafted wooden casket for eternal rest.',
                'image' => 'eternal_peace_wooden_casket.jpg',
            ],
            [
                'name' => 'Regal Mahogany Casket',
                'description' => 'Luxurious mahogany casket fit for royalty.',
                'image' => 'regal_mahogany_casket.jpg',
            ],
            [
                'name' => 'Silver Elegance Casket',
                'description' => 'Elegant silver-plated casket with intricate designs.',
                'image' => 'silver_elegance_casket.jpg',

            ],
            [
                'name' => 'Gothic Velvet Casket',
                'description' => 'Gothic-style casket with plush velvet interior.',
                'image' => 'gothic_velvet_casket.jpg',
            ],
            [
                'name' => 'Victorian Rosewood Casket',
                'description' => 'Vintage rosewood casket inspired by the Victorian era.',
                'image' => 'victorian_rosewood_casket.jpg',
            ],
            [
                'name' => 'Golden Majesty Casket',
                'description' => 'Majestic casket adorned with gold accents.',
                'image' => 'golden_majesty_casket.jpg',
            ],
            [
                'name' => 'Crystal Cascade Casket',
                'description' => 'Exquisite crystal-themed casket with cascading crystals.',
                'image' => 'crystal_cascade_casket.jpg',
            ],
            [
                'name' => 'Modern Steel Casket',
                'description' => 'Sleek and modern steel casket with a minimalist design.',
                'image' => 'modern_steel_casket.jpg',
            ],
            [
                'name' => 'Cherry Blossom Casket',
                'description' => 'Casket featuring delicate cherry blossom motifs.',
                'image' => 'cherry_blossom_casket.jpg',
            ],
            [
                'name' => 'Oceanic Reflections Casket',
                'description' => 'Casket inspired by the tranquility of the ocean.',
                'image' => 'oceanic_reflections_casket.jpg',
            ],
        ];

        foreach ($hearses as $hearse) {
            Hearse::create($hearse);
        }
    }
}
