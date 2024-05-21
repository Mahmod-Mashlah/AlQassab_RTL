<?php

namespace Database\Seeders;

use App\Models\ArabicDay;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArabicDaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ArabicDay::factory(1)->create();
    }
}
