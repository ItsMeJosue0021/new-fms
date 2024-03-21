<?php

namespace Database\Seeders;

use App\Models\Casket;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CasketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $caskets = [
            [
                'name' => 'Eternal Peace Wooden Casket',
                'description' => 'Beautifully crafted wooden casket for eternal rest.',
                'price' => 2500,
                'quantity' => 8,
            ],
            [
                'name' => 'Regal Mahogany Casket',
                'description' => 'Luxurious mahogany casket fit for royalty.',
                'price' => 3500,
                'quantity' => 6,
            ],
            [
                'name' => 'Silver Elegance Casket',
                'description' => 'Elegant silver-plated casket with intricate designs.',
                'price' => 4000,
                'quantity' => 4,
            ],
            [
                'name' => 'Gothic Velvet Casket',
                'description' => 'Gothic-style casket with plush velvet interior.',
                'price' => 2800,
                'quantity' => 7,
            ],
            [
                'name' => 'Victorian Rosewood Casket',
                'description' => 'Vintage rosewood casket inspired by the Victorian era.',
                'price' => 3200,
                'quantity' => 5,
            ],
            [
                'name' => 'Golden Majesty Casket',
                'description' => 'Majestic casket adorned with gold accents.',
                'price' => 4500,
                'quantity' => 3,
            ],
            [
                'name' => 'Crystal Cascade Casket',
                'description' => 'Exquisite crystal-themed casket with cascading crystals.',
                'price' => 5000,
                'quantity' => 2,
            ],
            [
                'name' => 'Modern Steel Casket',
                'description' => 'Sleek and modern steel casket with a minimalist design.',
                'price' => 2700,
                'quantity' => 9,
            ],
            [
                'name' => 'Cherry Blossom Casket',
                'description' => 'Casket featuring delicate cherry blossom motifs.',
                'price' => 3000,
                'quantity' => 6,
            ],
            [
                'name' => 'Oceanic Reflections Casket',
                'description' => 'Casket inspired by the tranquility of the ocean.',
                'price' => 3800,
                'quantity' => 4,
            ],
        ];

        foreach ($caskets as $casket) {
            Casket::create($casket);
        }
    }
}
