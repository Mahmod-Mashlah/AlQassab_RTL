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
        Schema::create('daily_schedules', function (Blueprint $table) {
            $table->id();
            $table->string('day')->nullable();
            $table->string('lesson_number')->nullable();
            $table->string('class')->nullable();
            $table->string('section')->nullable();
            $table->string('teacher_name')->nullable();
            $table->string('subject_name')->nullable();

            $table->unsignedBigInteger('season_id')->nullable();
            $table->foreign('season_id')->references('id')->on('seasons')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('daily_schedules');
    }
};
