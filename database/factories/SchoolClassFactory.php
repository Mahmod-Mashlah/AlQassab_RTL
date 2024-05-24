<?php

namespace Database\Factories;

use App\Models\User;
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
        $mentors = User::whereRoleIs('mentor')->take(6)->get();
        $mentor_ids = $mentors->pluck('id')->toArray();

        for ($i = 7; $i <= 12; $i++) {

            DB::table('school_classes')->insert([

                'name' => "class #" . $i,
                'number' =>  $i,
                'section_count' => 3,

                'mentor_id' => $faker->unique()->randomElement($mentor_ids),

                'created_at' => now(),
                'updated_at' => now()

            ]);
        }


        return [
            //
        ];
    }
}
