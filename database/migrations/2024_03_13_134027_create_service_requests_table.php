<?php

use App\Models\User;
use App\Models\Service;
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
        Schema::create('service_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Service::class)->cascadeOnDelete(); //->constrained()
            $table->foreignIdFor(User::class)->constrained();
            $table->string('status');
            $table->string('payment_status')->default('Unpaid');
            $table->string('payment_method')->nullable();
            $table->string('total_amount')->nullable();
            $table->string('discount_amount')->nullable();
            $table->string('recieved_amount')->nullable();
            $table->string('gl')->nullable();
            $table->string('payment_reference')->nullable();
            $table->string('paid_by')->nullable();
            $table->date('payment_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_requests');
    }
};
