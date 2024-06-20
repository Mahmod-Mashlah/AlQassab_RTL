<?php

namespace Database\Factories;

use App\Models\Exam;
use App\Models\Homework;
use App\Models\User;
use App\Models\Season;
use App\Models\Subject;
use App\Models\Test;
use App\Models\Year;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MarkRecord>
 */
class MarkRecordFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = \Faker\Factory::create();

        $subjects_ids = Subject::all()->pluck('id');
        // $years_ids = Year::all()->take(2)->pluck('id');
        $years_ids = [1, 2];

        $students = User::whereHasRole('student')/*->take(6)*/->get();
        $students_ids = $students->pluck('id')->toArray();

        foreach ($years_ids as $years_id) {

            $seasons_number1_id = Season::where('year_id', $years_id)
                ->where('number', 1)->pluck('id');

            $seasons_number2_id = Season::where('year_id', $years_id)
                ->where('number', 2)->pluck('id');

            foreach ($students as $student) {

                foreach ($subjects_ids as $subjects_id) {

                    // $homework1 = Homework::where('student_id', $student->id)
                    //     ->where('subject_id', $subjects_id)
                    //     ->first();
                    // $test1 = Test::where('student_id', $student->id)
                    //     ->where('subject_id', $subjects_id)
                    //     ->first();
                    // $exam1 = Exam::where('student_id', $student->id)
                    //     ->where('subject_id', $subjects_id)
                    //     ->first();

                    $homework1 = Homework::where('student_id', $student->id)
                        ->where('subject_id', $subjects_id)
                        ->where('season_id', $seasons_number1_id)
                        ->first();
                    $h1_mark = $homework1->mark;
                    // $h1_mark = $homework1->pluck('mark');
                    // $h1_mark = $homework1->getIntegerMark;


                    $homework2 = Homework::where('student_id', $student->id)
                        ->where('subject_id', $subjects_id)
                        ->where('season_id', $seasons_number2_id)
                        ->first();
                    $h2_mark = $homework2->mark;
                    // $h2_mark = $homework2->pluck('mark');
                    // $h2_mark = $homework2->getIntegerMark;

                    $test1 = Test::where('student_id', $student->id)
                        ->where('subject_id', $subjects_id)
                        ->where('season_id', $seasons_number1_id)
                        ->first();
                    $t1_mark = $test1->mark;
                    // $t1_mark = $test1->pluck('mark');
                    // $t1_mark = $test1->getIntegerMark;

                    $test2 = Test::where('student_id', $student->id)
                        ->where('subject_id', $subjects_id)
                        ->where('season_id', $seasons_number2_id)
                        ->first();
                    $t2_mark = $test2->mark;
                    // $t2_mark = $test2->pluck('mark');
                    // $t2_mark = $test2->getIntegerMark;

                    $exam1 = Exam::where('student_id', $student->id)
                        ->where('subject_id', $subjects_id)
                        ->where('season_id', $seasons_number1_id)
                        ->first();
                    $e1_mark = $exam1->mark;
                    // $e1_mark = $exam1->pluck('mark');
                    // $e1_mark = $exam1->getIntegerMark;

                    $exam2 = Exam::where('student_id', $student->id)
                        ->where('subject_id', $subjects_id)
                        ->where('season_id', $seasons_number2_id)
                        ->first();
                    $e2_mark = $exam2->mark;
                    // $e2_mark = $exam2->pluck('mark');
                    // $e2_mark = $exam2->getIntegerMark;

                    $sum1 =
                        (int)(($h1_mark + $t1_mark) / 2) + $e1_mark;
                    $sum2 =
                        (int)(($h2_mark + $t2_mark) / 2) + $e2_mark;
                    $final_sum = $sum1 + $sum2;
                    $final_result = $final_sum / 2;
                    DB::table('mark_records')->insert([

                        'sum1' => $sum1,
                        'sum2' => $sum2,

                        'final_sum' => $final_sum,

                        'final_result' => $final_result,

                        'year_id' => $years_id,
                        'subject_id' => $subjects_id,
                        'student_id' => $student->id,

                        'homework1_id' => $homework1->id,
                        'test1_id' => $test1->id,
                        'exam1_id' => $exam1->id,

                        'homework2_id' => $homework2->id,
                        'test2_id' => $test2->id,
                        'exam2_id' => $exam2->id,

                        'created_at' => now(),
                        'updated_at' => now()

                    ]);
                }
            }
        }



        return [
            //
        ];
    }
}
