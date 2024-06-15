<?php

namespace Database\Factories;

use App\Models\Lesson;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FileLesson>
 */
class FileLessonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = \Faker\Factory::create();

        $lessons = Lesson::all();
        // $seasons_ids = Season::all()->pluck('id');

        for ($i = 1; $i <= 20; $i = $i + 3) {
            foreach ($lessons as $lesson) {

                DB::table('file_lessons')->insert([

                    'file_id' => $i,
                    'lesson_id' => $lesson->id,

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
