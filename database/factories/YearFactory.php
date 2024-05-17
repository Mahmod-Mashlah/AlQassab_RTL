<?php

namespace Database\Factories;

use Carbon\Carbon;
use App\Models\Year;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Year>
 */
class YearFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $datetime = "2000-09-09 00:00:00";
        $date = new Carbon($datetime);

        // or
        // $date = Carbon::parse('2022-12-31');

        $year = $date->year;
        $month = $date->month;
        $day = $date->day;
        // or $year = $date->format('Y');

        $faker = \Faker\Factory::create();
        for ($i = 0; $i < 50; $i++) {
            $startYear = $year + $i;
            $endYear = $year + $i + 1;

            DB::table('years')->insert([
                'name' => "$startYear-$endYear",
                'year_start' => "$startYear-$month-$day",
                'year_end' => "$endYear-$month-$day",

                'created_at' => now(),
                'updated_at' => now()
            ]);
        }

        return [

            /*
            'user_id' => User::all()->random()->id ,
            'name'   => $this->faker->unique()->sentence(),
            'description' => $this->faker->text(),
            'priority' =>$this->faker->randomElement(['low','medium','high'])
            */];
    }
}
