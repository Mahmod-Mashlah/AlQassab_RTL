<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'first_name' => 'mahmod',
            'middle_name' => 'mahmod',
            'last_name' => 'mahmod',
            'birth_date' => '2008-11-04',
            'password' => 'password',
        ]);
    }
}
