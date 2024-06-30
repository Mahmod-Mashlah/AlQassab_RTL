<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\Test;
use App\Models\User;
use App\Models\Year;
use App\Models\Season;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Homework;
use App\Models\MarkRecord;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreMarkRecordRequest;
use App\Http\Requests\UpdateMarkRecordRequest;
use App\Models\SchoolClass;

class MarkRecordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMarkRecordRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($yearname, $user_id)
    {
        $year = Year::where('name', $yearname)->first();
        $user = User::where('id', $user_id)->first();
        $student = Student::where('user_id', $user_id)->first();
        $class = SchoolClass::where('id', $student->class_id)->first();

        $subjects = Subject::whereDate('created_at', '>=', $year->year_start)
            ->whereDate('created_at', '<=', $year->year_end)
            ->where('school_class_id', $student->class_id)->get();


        $subjects_ids = $subjects->pluck('id')->toArray();

        $seasons_number1_id = Season::where('year_id', $year->id)
            ->where('number', 1)->pluck('id');

        $seasons_number2_id = Season::where('year_id', $year->id)
            ->where('number', 2)->pluck('id');

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

            $homework1 = Homework::where('student_id', $student->user->id)
                ->where('subject_id', $subjects_id)
                ->where('season_id', $seasons_number1_id)
                ->first();
            $h1_mark = $homework1->mark;
            // $h1_mark = $homework1->pluck('mark');
            // $h1_mark = $homework1->getIntegerMark;


            $homework2 = Homework::where('student_id', $student->user->id)
                ->where('subject_id', $subjects_id)
                ->where('season_id', $seasons_number2_id)
                ->first();
            $h2_mark = $homework2->mark;
            // $h2_mark = $homework2->pluck('mark');
            // $h2_mark = $homework2->getIntegerMark;

            $test1 = Test::where('student_id', $student->user->id)
                ->where('subject_id', $subjects_id)
                ->where('season_id', $seasons_number1_id)
                ->first();
            $t1_mark = $test1->mark;
            // $t1_mark = $test1->pluck('mark');
            // $t1_mark = $test1->getIntegerMark;

            $test2 = Test::where('student_id', $student->user->id)
                ->where('subject_id', $subjects_id)
                ->where('season_id', $seasons_number2_id)
                ->first();
            $t2_mark = $test2->mark;
            // $t2_mark = $test2->pluck('mark');
            // $t2_mark = $test2->getIntegerMark;

            $exam1 = Exam::where('student_id', $student->user->id)
                ->where('subject_id', $subjects_id)
                ->where('season_id', $seasons_number1_id)
                ->first();
            $e1_mark = $exam1->mark;
            // $e1_mark = $exam1->pluck('mark');
            // $e1_mark = $exam1->getIntegerMark;

            $exam2 = Exam::where('student_id', $student->user->id)
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

            $mark = MarkRecord::where('subject_id', $subjects_id)
                ->where('year_id', $year->id)
                ->where('student_id', $student->user->id)->first();
            $mark->update([

                'sum1' => $sum1,
                'sum2' => $sum2,

                'final_sum' => $final_sum,

                'final_result' => $final_result,
            ]);
            $mark->save();
        }

        // $test_mark = MarkRecord::where('year_id', $year->id)->where('student_id', $student->user->id)->where('subject_id', 32)->get();
        // dd($test_mark);
        $all_marks = MarkRecord::where('year_id', $year->id)->where('student_id', $student->user->id)->with([
            'homework1:mark',
            'homework2:mark',
            'test1:mark',
            'test2:mark',
            'exam1:mark',
            'exam2:mark'
        ])->get();
        return view("marks.show", compact(
            'year',
            'yearname',
            'user_id',
            'subjects',
            'all_marks',
            'student',
            'user',
            'class',
        ));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MarkRecord $markRecord)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMarkRecordRequest $request, MarkRecord $markRecord)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MarkRecord $markRecord)
    {
        //
    }
}
