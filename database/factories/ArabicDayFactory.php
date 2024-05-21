<?php

namespace Database\Factories;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ArabicDay>
 */
class ArabicDayFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $data = [
            ['day' => 'السبت', 'created_at' => now(), 'updated_at' => now()],
            ['day' => 'الأحد', 'created_at' => now(), 'updated_at' => now()],
            ['day' => 'الاثنين', 'created_at' => now(), 'updated_at' => now()],
            ['day' => 'الثلاثاء', 'created_at' => now(), 'updated_at' => now()],
            ['day' => 'الأربعاء', 'created_at' => now(), 'updated_at' => now()],
            ['day' => 'الخميس', 'created_at' => now(), 'updated_at' => now()],
            ['day' => 'الجمعة', 'created_at' => now(), 'updated_at' => now()],
            //...
        ];

        DB::table('arabic_days')->insert($data);
        // DB::table('arabic_days')->where('id', 8)->delete();
        return [
            //
        ];
    }
}
