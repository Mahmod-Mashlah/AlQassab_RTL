<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // User::factory()->create([
        //     'first_name' => 'aa',
        //     'middle_name' => 'aa',
        //     'last_name' => 'aa',
        //     'birth_date' => '2008-11-04',
        //     'password' => 'password',
        // ]);

        // Manager :

        for ($i = 1; $i < 10; $i++) {
            User::factory()->create([
                'first_name' => 'a' . $i,
                'middle_name' => 'a' . $i,
                'last_name' => 'a' . $i,
                'birth_date' => "2000-01-$i",
                'password' => 'password',
                // 'password' => Hash::make('password'),
            ]);

            $manager = User::get()
                ->where('id', $i)
                ->first();
            $manager->addRole('manager');
        }
        // Secretary :

        for ($i = 10; $i < 20; $i++) {
            User::factory()->create([
                'first_name' => 'a' . $i,
                'middle_name' => 'a' . $i,
                'last_name' => 'a' . $i,
                'birth_date' => "2000-01-$i",
                'password' => 'password',
                // 'password' => Hash::make('password'),
            ]);

            $secretary = User::get()
                ->where('id', $i)
                ->first();
            $secretary->addRole('secretary');
        }

        // Mentor :

        for ($i = 20; $i < 30; $i++) {
            User::factory()->create([
                'first_name' => 'a' . $i,
                'middle_name' => 'a' . $i,
                'last_name' => 'a' . $i,
                'birth_date' => "2000-01-" . $i - 10,
                'password' => 'password',
                // 'password' => Hash::make('password'),
            ]);

            $mentor = User::get()
                ->where('id', $i)
                ->first();
            $mentor->addRole('mentor');
        }

        // Teacher :

        for ($i = 30; $i < 40; $i++) {
            User::factory()->create([
                'first_name' => 'a' . $i,
                'middle_name' => 'a' . $i,
                'last_name' => 'a' . $i,
                'birth_date' => "2000-01-" . $i - 20,
                'password' => 'password',
                // 'password' => Hash::make('password'),
            ]);

            $teacher = User::get()
                ->where('id', $i)
                ->first();
            $teacher->addRole('teacher');
        }

        // Student & Parent :

        for ($i = 40; $i < 80; $i++) {

            if ($i % 2 == 0) {
                // Student :
                $student =  User::factory()->create([
                    'first_name' => 'a' . $i,
                    'middle_name' => 'a' . $i,
                    'last_name' => 'a' . $i,
                    'birth_date' => "2010-10-10",
                    'password' => 'password',
                    // 'password' => Hash::make('password'),
                ]);

                $student->addRole('student');
            } else {

                //Parent :

                $parent = User::factory()->create([
                    'first_name' => 'a' . $i,
                    'middle_name' => 'a' . $i,
                    'last_name' => 'a' . $i,
                    'birth_date' => "1971-11-11",
                    'password' => 'password',
                    // 'password' => Hash::make('password'),
                ]);

                $parent->addRole('parent');
            }
        }
    }
}
