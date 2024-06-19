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
        Schema::create('students', function (Blueprint $table) {

            $table->id();

            $table->unsignedBigInteger('serial_number')->nullable();
            $table->unsignedBigInteger('last_serial_number')->nullable();

            $table->string('father_work')->nullable();
            $table->string('grandfather_name')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('birth_place')->nullable();
            $table->string('restrict_place')->nullable();
            $table->unsignedBigInteger('restrict_number')->nullable();
            $table->string('nationality')->nullable();
            $table->date('in_date')->nullable();
            $table->string('from_school')->nullable();
            $table->string('failed_class')->nullable();
            $table->string('phone_number')->nullable();

            $table->string('password')->nullable();
            $table->string('parent_password')->nullable();

            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->unsignedBigInteger('class_id')->nullable();
            $table->foreign('class_id')->references('id')->on('school_classes')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
