<?php

// namespace Database\Factories;

// use App\Models\ArabicDay;
// use App\Models\Season;
// use Illuminate\Support\Facades\DB;
// use Illuminate\Database\Eloquent\Factories\Factory;

// /**
//  * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DailySchedule>
//  */
// class DailyScheduleFactory extends Factory
// {
//     /**
//      * Define the model's default state.
//      *
//      * @return array<string, mixed>
//      */
//     public function definition(): array
//     {
//         $faker = \Faker\Factory::create();
//         $seasons = Season::all();
//         $arabic_days = ArabicDay::all();

//         $subjects = [
//             'الرياضيات', 'العلوم',
//             'اللغة العربية', 'التاريخ',
//             'الجغرافيا', 'اللغة الإنجليزية',
//             'علوم الحاسوب', 'الفيزياء', 'الكيمياء', 'الفلسفة', 'اللغة الفرنسية'
//         ];

//         $names = [
//             "محمد عبد الله", "أحمد الرشيد", "علي السعيد", "مصطفى الجمال", "حسن الفراس", "حسين المروان", "عبد الله النزار", "عمر الزياد", "يوسف الباسل", "إبراهيم الرائد",
//             "عبد الرحمن السامر", "سليمان الطارق", "عادل النبيل", "مالك الخالد", "رشيد العزيز", "سعيد الرحمن", "توفيق الكريم", "رامي الحكيم", "سامي العدل", "جمال الصبور",
//             "فراس الغفور", "مروان الشكور", "نزار الصبر", "زياد الحليم", "باسل العظيم", "رائد الكبير", "سامر الجبار", "طارق المتكبر", "نبيل الخبير", "خالد الشهيد"
//         ];

//         foreach ($seasons as $season) {


//             for ($i = 1; $i <= 7; $i++) // Lesson numbersال
//             {
//                 foreach ($arabic_days as $day) //days
//                 {
//                     if ($day->day != 'الجمعة' && $day->day != 'السبت' && $day->day != null) {
//                         for ($c = 7; $c <= 12; $c++) // classes
//                         {
//                             for ($s = 1; $s <= 4; $s++) // Sections
//                             {
//                                 DB::table('daily_schedules')->insert([

//                                     'day' => $day->day,
//                                     'lesson_number' => $i,
//                                     'class' => $c,
//                                     'section' => $s,
//                                     'teacher_name' => $faker->randomElement($names),
//                                     'subject_name' => $faker->randomElement($subjects),

//                                     'season_id' => $season->id,

//                                     'created_at' => now(),
//                                     'updated_at' => now()

//                                 ]);
//                             }
//                         }
//                     }
//                 }
//             }
//         }

//         return [
//             //
//         ];
//     }
// }
