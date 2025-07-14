<?php

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
    Schema::create('mpesa_payments', function (Blueprint $table) {
        $table->id();
        $table->string('transaction_code')->unique();
        $table->string('phone_number');
        $table->decimal('amount', 10, 2);
        $table->string('account_reference')->nullable(); // BillRefNumber
        $table->timestamp('payment_date')->nullable();
        $table->json('raw_data'); // Optional: Store full Safaricom response
        $table->timestamps();
    });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mpesa_payments');
    }
};
