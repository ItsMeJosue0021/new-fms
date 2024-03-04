<?php

use App\Models\Casket;
use App\Models\Deceased;
use App\Models\Hearse;
use App\Models\Informant;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Deceased::class)->nullable();
            $table->foreignIdFor(Informant::class)->nullable();
            $table->foreignIdFor(Casket::class)->nullable();
            $table->foreignIdFor(Hearse::class)->nullable();
            $table->integer('water')->nullable();
            $table->string('service_type')->nullable();
            $table->string('others')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
