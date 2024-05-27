<?php

namespace Database\Factories;

use App\Models\Season;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Homework>
 */
class HomeworkFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = \Faker\Factory::create();

        $subjects = Subject::all();
        $seasons_ids = Season::all()->pluck('id');

        $students = User::whereHasRole('student')/*->take(6)*/->get();
        $students_ids = $students->pluck('id')->toArray();

        foreach ($students_ids as $students_id) {

            foreach ($subjects as $subject) {

                DB::table('homework')->insert([

                    'mark' => $faker->numberBetween(0, $subject->max),
                    'subject_id' => $subject->id,
                    'season_id' => $faker->randomElement($seasons_ids),
                    'student_id' => $students_id,

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