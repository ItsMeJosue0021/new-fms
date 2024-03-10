<?php

use App\Models\Deceased;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('death_details', function (Blueprint $table) {
            $table->id();
            $table->string('death_time');
            $table->string('death_date');
            $table->string('death_cause')->nullable();
            $table->string('death_place')->nullable();
            $table->string('cementery_address')->nullable();
            $table->string('viewing_place')->nullable();
            $table->string('internment_time');
            $table->string('internment_date');
            $table->foreignIdFor(Deceased::class)->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('death_details');
    }
};
