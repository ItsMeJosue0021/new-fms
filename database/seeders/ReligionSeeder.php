<?php

namespace Database\Seeders;

use App\Models\Religion;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ReligionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $religions = [
            'Roman Catholicism',
            'Islam',
            'Protestantism',
            'Iglesia ni Cristo ',
            'Baptist',
            'Methodist',
            'Latter-day Saints',
            'Jehovah’s Witnesses',
            'Seventh-day Adventist',
            'Aglipayans',
            'Evangelicals'
        ];

        foreach ($religions as $religion) {
            Religion::create(['name' => $religion]);
        }
    }
}
