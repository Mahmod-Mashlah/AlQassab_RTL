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
        $datetime1 = "2020-09-09 00:00:00";
        $date1 = new Carbon($datetime1);
        $datetime2 = "2021-09-09 00:00:00";
        $date2 = new Carbon($datetime2);

        // or
        // $date = Carbon::parse('2022-12-31');

        // or $year = $date->format('Y');

        $faker = \Faker\Factory::create();
        for ($i = 0; $i < 5; $i++) {

            $startYear = $date1->addYears(1);
            $endYear = $date2->addYears(1);

            DB::table('years')->insert([
                'name' => $startYear->format('Y') . '-' . $endYear->format('Y'),
                'year_start' => "$startYear",
                'year_end' => "$endYear",

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
