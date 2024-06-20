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

        // Student :

        for ($i = 40; $i < 50; $i++) {
            User::factory()->create([
                'first_name' => 'a' . $i,
                'middle_name' => 'a' . $i,
                'last_name' => 'a' . $i,
                'birth_date' => "2000-01-" . $i - 30,
                'password' => 'password',
                // 'password' => Hash::make('password'),
            ]);


            $student = User::get()
                ->where('id', $i)
                ->first();
            $student->addRole('student');
        }

        // Parent :

        for ($i = 50; $i < 60; $i++) {
            User::factory()->create([
                'first_name' => 'a' . $i,
                'middle_name' => 'a' . $i,
                'last_name' => 'a' . $i,
                'birth_date' => "2000-01-" . $i - 40,
                'password' => 'password',
                // 'password' => Hash::make('password'),
            ]);

            $parent = User::get()
                ->where('id', $i)
                ->first();
            $parent->addRole('parent');
        }

        // Student2 :

        for ($i = 60; $i < 70; $i++) {
            User::factory()->create([
                'first_name' => 'a' . $i,
                'middle_name' => 'a' . $i,
                'last_name' => 'a' . $i,
                'birth_date' => "2000-01-03",
                'password' => 'password',
                // 'password' => Hash::make('password'),
            ]);


            $student = User::get()
                ->where('id', $i)
                ->first();
            $student->addRole('student');
        }

        // Parent :

        for ($i = 70; $i < 80; $i++) {
            User::factory()->create([
                'first_name' => 'a' . $i,
                'middle_name' => 'a' . $i,
                'last_name' => 'a' . $i,
                'birth_date' => "2000-01-10",
                'password' => 'password',
                // 'password' => Hash::make('password'),
            ]);

            $parent = User::get()
                ->where('id', $i)
                ->first();
            $parent->addRole('parent');
        }
    }
}
