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
        Schema::create('leases', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('tenant_id')->index('fk_leases_tenants');
            $table->integer('unit_id')->index('fk_leases_units');
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->integer('deposit_amount')->nullable();
            $table->char('lease_status', 100)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leases');
    }
};
