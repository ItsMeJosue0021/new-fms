<?php

namespace Database\Seeders;

use App\Models\PaymentTerm;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaymentTermsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PaymentTerm::create([
            'memorial' => 'Down payment is optional not required. Full payment for the memorial service should be settle 1 Day before the interment.',
            'cremation' => 'Down payment is optional not required. Full payment is required before the scheduled time and date of cremation.',
            'lowertext' => 'By accepting this agreement, I understand the above stated information and it has been properly discussed to me and I hereby agree to engage and avail the abovementioned memorial service. Withdrawal will be subject for approval and changes.'
        ]);
    }
}
