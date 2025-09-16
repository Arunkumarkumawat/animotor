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
        Schema::create('car_availabilities', function (Blueprint $table) {
            $table->id();
            $table->integer('car_id');
            $table->string('day_of_week');
            $table->time('pickup_hours_start');
            $table->time('pickup_hours_end');
            $table->time('return_hours_start');
            $table->time('return_hours_end');
            $table->enum('status', ['Active', 'Inactive'])->default('Active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('car_availabilities');
    }
};
