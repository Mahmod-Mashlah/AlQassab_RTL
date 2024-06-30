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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();


            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->unsignedBigInteger('image_id')->nullable();
            $table->foreign('image_id')->references('id')->on('files')->onDelete('cascade');

            $table->string('mother_name')->nullable();
            $table->string('birth_place')->nullable();
            $table->string('restrict_place')->nullable();
            $table->string('nationality')->nullable();
            $table->string('family_mode')->nullable();
            $table->string('children_number')->nullable();
            $table->string('family_compensation_number')->nullable();
            $table->date('work_date')->nullable();
            $table->string('school_from')->nullable();
            $table->unsignedBigInteger('book_number')->nullable();
            $table->date('book_date')->nullable();
            $table->date('work_start_date')->nullable();
            $table->date('leave_date')->nullable();
            $table->string('school_to')->nullable();
            $table->string('military_is')->nullable();
            $table->string('military_rank')->nullable();
            $table->string('salary_place')->nullable();
            $table->text('address')->nullable();
            $table->text('phone')->nullable();
            $table->text('certifications')->nullable();
            $table->string('password')->nullable();


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
