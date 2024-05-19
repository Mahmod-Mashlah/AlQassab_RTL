<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Protest>
 */
class ProtestFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = \Faker\Factory::create();

        $users = User::all();

        foreach ($users as $user) {

            for ($i = 1; $i <= 10; $i++) {

                DB::table('protests')->insert([

                    'title' => "title #" . $i,
                    'body' => "this is the body for the title" . $i,

                    'user_id' => $user->id,

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
