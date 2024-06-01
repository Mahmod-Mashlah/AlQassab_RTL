<?php

namespace Database\Factories;

use App\Models\Lesson;
use App\Models\User;
use App\Models\Subject;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Rating>
 */
class RatingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = \Faker\Factory::create();

        // $subjects = Subject::all();

        // $lessons = Lesson::all();

        // $students = User::whereHasRole('student')->take(10)->get();
        // $students_ids = $students->pluck('id')->toArray();


        for ($student_id = 40; $student_id < 47; $student_id++) {


            for ($lesson_id = 1; $lesson_id <= 150; $lesson_id++) {

                DB::table('ratings')->insert([

                    'rating' => $faker->numberBetween(1, 5),
                    'student_id' => $student_id,
                    'lesson_id' => $lesson_id,

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
