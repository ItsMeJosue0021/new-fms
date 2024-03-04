<?php

use App\Models\Deceased;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('deceased_addresses', function (Blueprint $table) {
            $table->id();
            $table->string('lot');
            $table->string('block');
            $table->string('street');
            $table->string('brgy');
            $table->string('city');
            $table->string('province');
            $table->foreignIdFor(Deceased::class)->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deceased_addresses');
    }
};
