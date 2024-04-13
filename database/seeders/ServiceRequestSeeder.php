<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Service;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ServiceRequestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        for ($i = 1; $i <= 40; $i++) {

            $randomDate = Carbon::create(
                rand(2023, 2024), // Random year between 2023 and 2024
                rand(1, 12), // Random month (1 to 12)
                rand(1, 28) // Random day (1 to 28)
            );

            DB::table('service_requests')->insert([
                'service_id' => 1,
                'user_id' => 1,
                'status' => 'completed',
                'payment_status' => 'Paid',
                'payment_method' => 'Cash',
                'total_amount' => rand(1000, 30000),
                'discount_amount' => rand(500, 2500),
                'recieved_amount' => rand(1000, 30000),
                'gl' => rand(10000, 99999),
                'payment_reference' => 'REF' . rand(10000, 99999),
                'paid_by' => 'Mark Bautista',
                'payment_date' => $randomDate,
                'created_at' => $randomDate
            ]);
        }
    }
}
