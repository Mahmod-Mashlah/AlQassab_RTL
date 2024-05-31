<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Subject;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Lesson>
 */
class LessonFactory extends Factory
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

        // $teachers = User::whereHasRole('teacher')/*->take(6)*/->get();
        // $teachers_ids = $teachers->pluck('id')->toArray();

        foreach ($subjects as $subject) {

            for ($i = 1; $i < 5; $i++) {

                DB::table('lessons')->insert([

                    'lecture_number' => $i,
                    'date' => '2023-' . '0' . $i . '-01',
                    'summery' => 'summery for lesson ' . $i,
                    'ideas' => 'ideas for lesson ' . $i,
                    'teacher_id' => $subject->teacher_id,
                    'subject_id' => $subject->id,

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
