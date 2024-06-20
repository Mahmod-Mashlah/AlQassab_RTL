<?php

namespace Database\Factories;

use App\Models\Student;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ClassStudentSection>
 */
class ClassStudentSectionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = \Faker\Factory::create();

        $students = Student::whereNotNull(['user_id', 'class_id'],)->get();
        $year_ids = [1, 2];

        foreach ($students as $student) {

            foreach ($year_ids as $year_id) {

                DB::table('class_student_section')->insert([

                    'user_id' => $student->user->id,
                    'student_id' => $student->id,
                    'section_id' => null,
                    'class_id' => $student->class_id,
                    'year_id' => $year_id,

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
