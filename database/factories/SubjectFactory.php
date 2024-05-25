<?php

namespace Database\Factories;

use App\Models\SchoolClass;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Subject>
 */
class SubjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = \Faker\Factory::create();

        $classes = SchoolClass::all();
        $teacher_ids = array(30, 31, 32, 33, 34, 35, 36, 37, 38, 39);

        $subjects = [
            'الرياضيات', 'العلوم',
            'اللغة العربية', 'التاريخ',
            'الجغرافيا', 'اللغة الإنجليزية',
            'علوم الحاسوب', 'الفيزياء', 'الكيمياء', 'الفلسفة', 'اللغة الفرنسية'
        ];


        foreach ($classes as $class) {

            for ($i = 1; $i <= 10; $i++) {

                DB::table('subjects')->insert([

                    'name' => $subjects[$i],
                    'min' => 80,
                    'max' => 200,

                    'school_class_id' => $class->id,
                    'teacher_id' => $faker->randomElement($teacher_ids),

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
