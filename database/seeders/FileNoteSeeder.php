<?php

namespace Database\Seeders;

use App\Models\FileNote;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FileNoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FileNote::factory(1)->create();
    }
}
