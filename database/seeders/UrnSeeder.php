<?php

namespace Database\Seeders;

use App\Models\Urn;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UrnSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $urns = [
            [
                'name' => 'Urn 1',
                'description' => 'Urn 1 description',
                'image' => 'urn1.jpg',
                'stock' => 10,
                'price' => 50000,
                'water' => 4,
            ],
        ];

        foreach ($urns as $urn) {
            Urn::create($urn);
        }
    }
}
