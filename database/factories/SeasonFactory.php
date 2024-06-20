<?php

namespace Database\Factories;

use App\Models\Year;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Season>
 */
class SeasonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = \Faker\Factory::create();

        $years = Year::all()->take(2);

        foreach ($years as $year) {

            $season1_start = Carbon::parse($year->year_start);
            $season1_end = Carbon::parse($year->year_start)->addMonths(5);
            $season2_start = Carbon::parse($season1_end)->addWeeks(2);
            $season2_end = Carbon::parse($season2_start)->addMonths(5);
            DB::table('seasons')->insert([
                'number' => 1,
                'season_start' => $season1_start,
                'season_end' => $season1_end,
                'days_number' => 150,
                'year_id' => $year->id,

                'created_at' => now(),
                'updated_at' => now()
            ]);
            DB::table('seasons')->insert([
                'number' => 2,
                'season_start' => $season2_start,
                'season_end' =>  $season2_end,
                'days_number' => 150,
                'year_id' => $year->id,

                'created_at' => now(),
                'updated_at' => now()
            ]);
            // DB::table('years')->insert([
            //     'number' =>'2',
            //     'season_start'=> $year->year_start->addDays(121),
            //     'season_end' =>,
            //     'days_number' => 150,
            //     'year_id' => $year->id,

            //     'created_at' => now(),
            //     'updated_at' => now()
            // ]);
        }

        return [
            //
        ];
    }
}
