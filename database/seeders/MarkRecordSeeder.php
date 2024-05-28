<?php

namespace Database\Seeders;

use App\Models\MarkRecord;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MarkRecordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MarkRecord::factory(1)->create();
    }
}
