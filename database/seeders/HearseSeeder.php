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
            ],
            [
                'name' => 'Regal Mahogany Casket',
                'description' => 'Luxurious mahogany casket fit for royalty.',
            ],
            [
                'name' => 'Silver Elegance Casket',
                'description' => 'Elegant silver-plated casket with intricate designs.',

            ],
            [
                'name' => 'Gothic Velvet Casket',
                'description' => 'Gothic-style casket with plush velvet interior.',
            ],
            [
                'name' => 'Victorian Rosewood Casket',
                'description' => 'Vintage rosewood casket inspired by the Victorian era.',
            ],
            [
                'name' => 'Golden Majesty Casket',
                'description' => 'Majestic casket adorned with gold accents.',
            ],
            [
                'name' => 'Crystal Cascade Casket',
                'description' => 'Exquisite crystal-themed casket with cascading crystals.',
            ],
            [
                'name' => 'Modern Steel Casket',
                'description' => 'Sleek and modern steel casket with a minimalist design.',
            ],
            [
                'name' => 'Cherry Blossom Casket',
                'description' => 'Casket featuring delicate cherry blossom motifs.',
            ],
            [
                'name' => 'Oceanic Reflections Casket',
                'description' => 'Casket inspired by the tranquility of the ocean.',
            ],
        ];

        foreach ($hearses as $hearse) {
            Hearse::create($hearse);
        }
    }
}
