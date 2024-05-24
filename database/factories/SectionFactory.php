<?php

namespace Database\Factories;

use App\Models\SchoolClass;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Section>
 */
class SectionFactory extends Factory
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

        foreach ($classes as $class) {

            for ($i = 1; $i <= $class->section_count; $i++) {

                DB::table('sections')->insert([

                    'section_number' => $i,
                    'max_students_number' => 30 + $i,

                    'class_id' => $class->id,
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
