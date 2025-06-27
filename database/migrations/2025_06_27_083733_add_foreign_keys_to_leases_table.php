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
        Schema::table('leases', function (Blueprint $table) {
            $table->foreign(['tenant_id'], 'fk_leases_tenants')->references(['id'])->on('tenants')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['unit_id'], 'fk_leases_units')->references(['id'])->on('units')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('leases', function (Blueprint $table) {
            $table->dropForeign('fk_leases_tenants');
            $table->dropForeign('fk_leases_units');
        });
    }
};
