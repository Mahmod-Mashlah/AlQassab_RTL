<?php

namespace Database\Factories;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\File>
 */
class FileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = \Faker\Factory::create();

        for ($i = 20; $i < 40; $i++) {

            DB::table('files')->insert([

                'name' => "logo.png",
                'user_id' => $i,

                'created_at' => now(),
                'updated_at' => now()

            ]);
        }
        return [
            //
        ];
    }
}
