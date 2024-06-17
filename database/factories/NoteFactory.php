<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Note>
 */
class NoteFactory extends Factory
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

            DB::table('notes')->insert([

                'type' => $faker->word(),
                'details' => $faker->paragraph(),

                'admin_id' => $faker->numberBetween(20, 29),
                'student_id' => $students_id,

                'created_at' => now(),
                'updated_at' => now()

            ]);
        }

        return [
            //
        ];
    }
}
