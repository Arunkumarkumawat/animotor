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
        Schema::table('cars', function (Blueprint $table) {
            $table->string('mileage_policy')->nullable();
            $table->string('mileage_limit')->nullable();
            $table->string('excess_mileage_rate')->nullable();
            $table->text('cancellation_policy')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('cars', function (Blueprint $table) {
            $table->dropColumn('mileage_policy');
            $table->dropColumn('mileage_limit');
            $table->dropColumn('excess_mileage_rate');
            $table->dropColumn('cancellation_policy');
        });
    }
};
