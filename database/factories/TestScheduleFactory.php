<?php

namespace Database\Factories;

use App\Models\Season;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TestSchedule>
 */
class TestScheduleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = \Faker\Factory::create();

        // $seasons = Season::all();
        $seasons_ids = Season::all()->pluck('id');

        foreach ($seasons_ids as $seasons_id) {

            DB::table('test_schedules')->insert([

                'file_id' => $faker->unique()->numberBetween(1, 20),
                'season_id' => $seasons_id,

                'created_at' => now(),
                'updated_at' => now()

            ]);
        }

        return [
            //
        ];
    }
}
