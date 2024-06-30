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
use App\Models\SchoolClass;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ClassStudentSection;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;
use Laratrust\Traits\HasRolesAndPermissions;


class UserController extends Controller
{
    use HasRolesAndPermissions;
    /**
     * Display a listing of the resource.
     */
    public function students_index($yearname)
    {
        $year = Year::where('name', $yearname)->first();

        // $students = User::whereHasRole("student")
        //     ->whereDate('created_at', '>=', $year->year_start)
        //     ->whereDate('created_at', '<=', $year->year_end)
        //     ->get();
        $students = Student::whereDate('created_at', '>=', $year->year_start)
            ->whereDate('created_at', '<=', $year->year_end)
            ->whereNotNull('user_id')
            ->get();
        // dd($students);
        return view("students.index", compact('year', 'students'));
    }
    public function students_add($yearname, Request $request)
    {
        $year = Year::where('name', $yearname)->first();
        $classes = SchoolClass::where('year_id', $year->id)->get();

        $faker = \Faker\Factory::create();

        $student_random_number = $faker->numberBetween(1000, 9999);
        $student_password = $request->first_name . ' ' . $request->last_name . ' ' . $student_random_number;

        $parent_random_number = $faker->numberBetween(1000, 9999);
        $parent_password = $request->middle_name . ' ' . $request->last_name . ' ' . $parent_random_number;

        $studentAsUser = User::create([
            // 'user_id' => Auth::user()->id,
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'last_name' => $request->last_name,
            'birth_date' => $request->birth_date,
            'password' => $student_password,

        ]);

        $student = Student::create([
            // 'user_id' => Auth::user()->id,
            'serial_number' => $request->serial_number,
            'last_serial_number' => $request->last_serial_number,
            'father_work' => $request->father_work,
            'grandfather_name' => $request->grandfather_name,
            'mother_name' => $request->mother_name,
            'birth_place' => $request->birth_place,
            'restrict_place' => $request->restrict_place,
            'restrict_number' => $request->restrict_number,
            'nationality' => $request->nationality,
            'in_date' => $request->in_date,
            'from_school' => $request->from_school,
            'failed_class' => $request->failed_class,
            'phone_number' => $request->phone_number,
            'password' => $student_password,
            'parent_password' => $parent_password,
            'parent_id' => null, //updated below 'after create parent'
            'user_id' => $studentAsUser->id,
            'class_id' => $request->class_id,

        ]);

        $studentAsUser->addRole('student');

        $seasons = Season::where('year_id', $year->id)->get();
        // dd($seasons);
        $subjects = Subject::whereDate('created_at', '>=', $year->year_start)
            ->whereDate('created_at', '<=', $year->year_end)
            ->where('school_class_id', $student->class_id)->get();
        // dd($subjects);

        foreach ($subjects as $subject) {
            foreach ($seasons as $season) {

                $homework = Homework::create([
                    'mark' => 0,
                    'season_id' => $season->id,
                    'student_id' => $studentAsUser->id,
                    'subject_id' => $subject->id,

                ]);

                // dd($homework);

                $test = Test::create([
                    'mark' => 0,
                    'season_id' => $season->id,
                    'student_id' => $studentAsUser->id,
                    'subject_id' => $subject->id,

                ]);
                // dd($test);

                $exam = Exam::create([
                    'mark' => 0,
                    'season_id' => $season->id,
                    'student_id' => $studentAsUser->id,
                    'subject_id' => $subject->id,

                ]);
                // dd($test);
            }
        }

        $subjects_ids = Subject::whereDate('created_at', '>=', $year->year_start)
            ->whereDate('created_at', '<=', $year->year_end)
            ->where('school_class_id', $student->class_id)->pluck('id');

        $seasons_number1_id = Season::where('year_id', $year->id)
            ->where('number', 1)->pluck('id');

        $seasons_number2_id = Season::where('year_id', $year->id)
            ->where('number', 2)->pluck('id');

        foreach ($subjects_ids as $subject_id) {

            // $homework1 = Homework::where('student_id', $student->id)
            //     ->where('subject_id', $subjects_id)
            //     ->first();
            // $test1 = Test::where('student_id', $student->id)
            //     ->where('subject_id', $subjects_id)
            //     ->first();
            // $exam1 = Exam::where('student_id', $student->id)
            //     ->where('subject_id', $subjects_id)
            //     ->first();

            $homework1 = Homework::where('student_id', $studentAsUser->id)
                ->where('subject_id', $subject_id)
                ->where('season_id', $seasons_number1_id)
                ->first();
            $h1_mark = $homework1->mark;
            // $h1_mark = $homework1->pluck('mark');
            // $h1_mark = $homework1->getIntegerMark;


            $homework2 = Homework::where('student_id', $studentAsUser->id)
                ->where('subject_id', $subject_id)
                ->where('season_id', $seasons_number2_id)
                ->first();
            $h2_mark = $homework2->mark;
            // $h2_mark = $homework2->pluck('mark');
            // $h2_mark = $homework2->getIntegerMark;

            $test1 = Test::where('student_id', $studentAsUser->id)
                ->where('subject_id', $subject_id)
                ->where('season_id', $seasons_number1_id)
                ->first();
            $t1_mark = $test1->mark;
            // $t1_mark = $test1->pluck('mark');
            // $t1_mark = $test1->getIntegerMark;

            $test2 = Test::where('student_id', $studentAsUser->id)
                ->where('subject_id', $subject_id)
                ->where('season_id', $seasons_number2_id)
                ->first();
            $t2_mark = $test2->mark;
            // $t2_mark = $test2->pluck('mark');
            // $t2_mark = $test2->getIntegerMark;

            $exam1 = Exam::where('student_id', $studentAsUser->id)
                ->where('subject_id', $subject_id)
                ->where('season_id', $seasons_number1_id)
                ->first();
            $e1_mark = $exam1->mark;
            // $e1_mark = $exam1->pluck('mark');
            // $e1_mark = $exam1->getIntegerMark;

            $exam2 = Exam::where('student_id', $studentAsUser->id)
                ->where('subject_id', $subject_id)
                ->where('season_id', $seasons_number2_id)
                ->first();
            $e2_mark = $exam2->mark;
            // $e2_mark = $exam2->pluck('mark');
            // $e2_mark = $exam2->getIntegerMark;

            $sum1 = 0;
            // (int)(($h1_mark + $t1_mark) / 2) + $e1_mark;
            $sum2 = 0;
            // (int)(($h2_mark + $t2_mark) / 2) + $e2_mark;
            $final_sum = 0;
            // $sum1 + $sum2;
            $final_result = 0;
            // $final_sum / 2;
            DB::table('mark_records')->insert([

                'sum1' => $sum1,
                'sum2' => $sum2,

                'final_sum' => $final_sum,

                'final_result' => $final_result,

                'year_id' => $year->id,
                'subject_id' => $subject_id,
                'student_id' => $studentAsUser->id,

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
        // $season1 = Season::where('year_id', $year->id)->first();
        // $season2 = Season::where('year_id', $year->id)
        //     ->skip(1) // skip the first user
        //     ->take(1) // retrieve only one user
        //     ->first();

        // $homework1_id = Homework::where('season_id', $season1->id)->pluck('id');
        // $test1_id = Test::where('season_id', $season1->id)->pluck('id');
        // $exam1_id = Exam::where('season_id', $season1->id)->pluck('id');

        // $homework2_id = Homework::where('season_id', $season2->id)->pluck('id');
        // $test2_id = Test::where('season_id', $season2->id)->pluck('id');
        // $exam2_id = Exam::where('season_id', $season2->id)->pluck('id');

        // $mark_record = MarkRecord::create([
        //     'year_id' => $year->id,
        //     'student_id' => $studentAsUser->id,
        //     'subject_id' => $subject->id,

        //     'sum1' => 0,
        //     'sum2' => 0,

        //     'final_sum' => 0,

        //     'final_result' => 0,

        //     'homework1_id' => $homework1_id,
        //     'test1_id' => $test1_id,
        //     'exam1_id' => $exam1_id,

        //     'homework2_id' => $homework2_id,
        //     'test2_id' => $test2_id,
        //     'exam2_id' => $exam2_id,

        // ]);

        $parent = User::create([
            // 'user_id' => Auth::user()->id,
            'first_name' => $request->middle_name,
            'middle_name' => $request->grandfather_name,
            'last_name' => $request->last_name,
            'birth_date' => null,
            'password' => $parent_password,

        ]);

        $student->update([
            'parent_id' => $studentAsUser->id + 1,
        ]);
        $student->save();

        $parent->addRole('parent');

        $student_class = ClassStudentSection::create([
            // 'user_id' => Auth::user()->id,

            'user_id' => $studentAsUser->id,
            'student_id' => $student->id,
            'section_id' => null,
            'class_id' => $request->class_id,
            'year_id' => $year->id,
        ]);


        Alert::success('تمت الإضافة بنجاح ', 'تم إضافة الطالب ' . $request->first_name . ' ' . $request->last_name . ' بنجاح');

        return view('students.add', compact('yearname', 'year', 'classes'));
    }

    function students_create($yearname)
    {
        $year = Year::where('name', $yearname)->first();
        $classes = SchoolClass::where('year_id', $year->id)->get();
        return view('students.add', compact('year', 'classes'));
    }
}
