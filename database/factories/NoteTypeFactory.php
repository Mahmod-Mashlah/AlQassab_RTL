<?php

namespace Database\Factories;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\NoteType>
 */
class NoteTypeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = \Faker\Factory::create();
        $note_types = [
            "التأخر الصباحي",
            "الغش",
            "عدم الحضور باللباس المدرسي",
            "تجاهل الواجبات المدرسية",
            "تعطيل الأجهزة في المدرسة",
            "التدخين",
            "ضرب أحد الطلاب",
            "ضرب أحد من الكادر",
            "التشهير بالمعلمين",
            "التحدث أثناء الحصة",
            "إتلاف الكتب المدرسية",
            "إتلاف الأثاث المدرسي",
            "التغيب دون إذن",
        ];

        foreach ($note_types as $note_type) {

            DB::table('note_types')->insert([

                'name' => $note_type,

                'created_at' => now(),
                'updated_at' => now()

            ]);
        }

        return [
            //
        ];
    }
}
