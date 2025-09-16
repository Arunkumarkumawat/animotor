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
        Schema::create('car_blackouts', function (Blueprint $table) {
            $table->id();
            $table->integer('car_id');
            $table->datetime('start_date_time');
            $table->datetime('end_date_time');
            $table->string('reason');
            $table->enum('hard_block', ['1', '0'])->default('0');
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('car_blackouts');
    }
};
