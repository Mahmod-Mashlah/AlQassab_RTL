<?php

namespace Database\Factories;

use App\Models\File;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\Factory;
use Laratrust\Traits\HasRolesAndPermissions;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    use HasRolesAndPermissions;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = \Faker\Factory::create();

        $employees = User::whereHasRole(['manager', 'secretary', 'mentor', 'teacher'])/*->take(6)*/->get();
        $employees_ids = $employees->pluck('id')->toArray();
        $images_ids = File::all()/*->take(6)*/->pluck('id')->toArray();

        foreach ($employees as $employee) {

            DB::table('employees')->insert([

                'user_id' => $employee->id,
                'image_id' => $faker->randomElement($images_ids),
                'password' => "password",
                'birth_place' => "دمشق",
                'phone' => '0998765213',

                'created_at' => now(),
                'updated_at' => now()

            ]);
        }



        return [
            //
        ];
    }
}
