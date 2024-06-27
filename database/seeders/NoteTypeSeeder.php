<?php

namespace Database\Seeders;

use App\Models\NoteType;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class NoteTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        NoteType::factory(1)->create();
    }
}
