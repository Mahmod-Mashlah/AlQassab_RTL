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
        Schema::create('file_notes', function (Blueprint $table) {
            $table->id();


            $table->unsignedBigInteger('file_id')->nullable();
            $table->foreign('file_id')->references('id')->on('files')->onDelete('cascade');

            $table->unsignedBigInteger('note_id')->nullable();
            $table->foreign('note_id')->references('id')->on('notes')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('file_notes');
    }
};
