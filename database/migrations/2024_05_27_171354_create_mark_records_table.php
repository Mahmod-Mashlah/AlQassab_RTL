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
        Schema::create('mark_records', function (Blueprint $table) {
            $table->id();

            $table->integer('sum1')->nullable();
            $table->integer('sum2')->nullable();
            $table->integer('final_sum')->nullable();
            $table->integer('final_result')->nullable();

            $table->unsignedBigInteger('year_id')->nullable();
            $table->foreign('year_id')->references('id')->on('years')->onDelete('cascade');

            $table->unsignedBigInteger('subject_id')->nullable();
            $table->foreign('subject_id')->references('id')->on('subjects')->onDelete('cascade');

            $table->unsignedBigInteger('student_id')->nullable();
            $table->foreign('student_id')->references('id')->on('users')->onDelete('cascade');

            $table->unsignedBigInteger('homework1_id')->nullable();
            $table->foreign('homework1_id')->references('id')->on('homework')->onDelete('cascade');

            $table->unsignedBigInteger('test1_id')->nullable();
            $table->foreign('test1_id')->references('id')->on('tests')->onDelete('cascade');

            $table->unsignedBigInteger('exam1_id')->nullable();
            $table->foreign('exam1_id')->references('id')->on('exams')->onDelete('cascade');

            $table->unsignedBigInteger('homework2_id')->nullable();
            $table->foreign('homework2_id')->references('id')->on('homework')->onDelete('cascade');

            $table->unsignedBigInteger('test2_id')->nullable();
            $table->foreign('test2_id')->references('id')->on('tests')->onDelete('cascade');

            $table->unsignedBigInteger('exam2_id')->nullable();
            $table->foreign('exam2_id')->references('id')->on('exams')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mark_records');
    }
};
