<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = \Faker\Factory::create();

        $students = User::whereHasRole('student')/*->take(6)*/->get();
        $students_ids = $students->pluck('id')->toArray();

        foreach ($students_ids as $students_id) {

            DB::table('students')->insert([

                'user_id' => $students_id,
                'class_id' => $faker->numberBetween(1, 18),
                'grandfather_name' => 'محمود',

                'created_at' => now(),
                'updated_at' => now()

            ]);
        }



        return [
            //
        ];
    }
}
