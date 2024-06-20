<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ClassStudentSection;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ClassStudentSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         ClassStudentSection::factory(1)->create();
    }
}
