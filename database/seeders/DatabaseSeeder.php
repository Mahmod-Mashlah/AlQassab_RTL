<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Year;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //  way 1 :  User::factory(10)->create();
        //  way 2 :
        // User::factory()->create([
        //     'first_name' => 'aa',
        //     'middle_name' => 'aa',
        //     'last_name' => 'aa',
        //     'birth_date' => '2008-11-04',
        //     'password' => 'password',
        // ]);
        //or :
        // User::factory(10)->create();

        // Laratrust Roles & Permissions :
        $this->call(LaratrustSeeder::class);

        //  way 3 : using specific seeders

        $this->call([
            UserSeeder::class,
            YearSeeder::class,
            SchoolClassSeeder::class,
            StudentSeeder::class,
            SeasonSeeder::class,
            ProtestSeeder::class,
            AdvertSeeder::class,
            ChatSeeder::class,
            ArabicDaySeeder::class,
            SectionSeeder::class,
            SubjectSeeder::class,
            HomeworkSeeder::class,
            TestSeeder::class,
            ExamSeeder::class,
            MarkRecordSeeder::class,
            LessonSeeder::class,
            RatingSeeder::class,
            CommentSeeder::class,
            ReplySeeder::class,
            FileSeeder::class,
            FileLessonSeeder::class,
            NoteSeeder::class,
            FileNoteSeeder::class,
            DayScheduleSeeder::class,
            TestScheduleSeeder::class,
            ExamScheduleSeeder::class,
            ClassStudentSectionSeeder::class,
            /* DailyScheduleSeeder::class, */
        ]);
    }
}
