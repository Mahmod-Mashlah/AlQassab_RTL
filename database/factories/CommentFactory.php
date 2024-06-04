<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Lesson;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = \Faker\Factory::create();

        for ($student_id = 40; $student_id < 50; $student_id++) {

            for ($lesson_id = 1; $lesson_id < 250; $lesson_id++) {

                DB::table('comments')->insert([

                    'comment' => "this is comment for student " . $student_id . " and the lesson " . $lesson_id,
                    // "comment for student $student_id at lesson $lesson_id ",
                    'lesson_id' => $lesson_id,
                    'student_id' => $student_id,

                    'created_at' => now(),
                    'updated_at' => now()

                ]);
            }
        }

        return [
            //
        ];
    }
}
