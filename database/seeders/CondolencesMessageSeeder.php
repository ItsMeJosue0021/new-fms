<?php

namespace Database\Seeders;

use App\Models\CondolencesMessage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CondolencesMessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CondolencesMessage::create([
            'message' => 'We have received your request, and in this difficult time, we want to extend our deepest condolences. Please know that you are not alone in your grief. Rest assured that we are fully committed to supporting you and easing your feelings. Now to complete your transaction pls. go to our main office at 110 Bayanan Rd, Bacoor, 4102 Cavite Thank you for choosing Torres Escaro. We are here to stand by your side with understanding and empathy.'
        ]);
    }
}
