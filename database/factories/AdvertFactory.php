<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Advert>
 */
class AdvertFactory extends Factory
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

                DB::table('adverts')->insert([

                    'title' => "advert title #" . $i,
                    'body' => "this is the body for the advert title" . $i,
                    'target' => "any target",

                    'admin_id' => $user->id,
                    'admin_role' => ' 🙂الصلاحيات والأدوار بعدين بعملها',

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
