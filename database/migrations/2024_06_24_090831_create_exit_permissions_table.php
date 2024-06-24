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
        Schema::create('exit_permissions', function (Blueprint $table) {
            $table->id();
            $table->string('reason')->nullable();
            $table->date('date')->nullable();

            $table->unsignedBigInteger('mentor_id')->nullable();
            $table->foreign('mentor_id')->references('id')->on('users')->onDelete('cascade');

            $table->unsignedBigInteger('student_id')->nullable();
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');

            $table->unsignedBigInteger('class_id')->nullable();
            $table->foreign('class_id')->references('id')->on('school_classes')->onDelete('cascade');

            // $table->unsignedBigInteger('section_id')->nullable();
            // $table->foreign('section_id')->references('id')->on('sections')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exit_permissions');
    }
};
