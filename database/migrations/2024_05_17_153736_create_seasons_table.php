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
        Schema::create('seasons', function (Blueprint $table) {
            $table->id();
            $table->unsignedTinyInteger('number')->nullable();
            $table->date('season_start')->nullable();
            $table->date('season_end')->nullable();
            $table->integer('days_number')->nullable();
            $table->timestamps();

            $table->unsignedBigInteger('year_id')->nullable();
            $table->foreign('year_id')->references('id')->on('years')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seasons');
    }
};
