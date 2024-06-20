<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Year;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SchoolClass>
 */
class SchoolClassFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = \Faker\Factory::create();

        // $users = User::all();
        // $mentors = User::whereRoleIs('mentor')->get();
        $years = Year::all();
        // $mentors = User::whereHasRole('mentor')->take(6)->get();
        // $mentor_ids = $mentors->pluck('id')->toArray();
        $mentor_ids = [20, 21, 22, 23, 24, 25, 26, 27, 28, 29];

        for ($i = 7; $i <= 12; $i++) {

            foreach ($years as $year) {
                DB::table('school_classes')->insert([

                    'name' => "class #" . $i,
                    'number' =>  $i,
                    'section_count' => 3,

                    'mentor_id' => $faker->randomElement($mentor_ids),
                    'year_id' => $year->id,

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
