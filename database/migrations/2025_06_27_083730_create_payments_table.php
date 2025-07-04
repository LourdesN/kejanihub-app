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
        Schema::create('payments', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('lease_id')->index('fk_payments_leases');
            $table->date('payment_date');
            $table->integer('amount_paid');
            $table->string('payment_method', 100);
            $table->string('transaction_code', 100)->nullable();
            $table->tinyText('month_paid_for');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
