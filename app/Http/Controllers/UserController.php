<?php

namespace App\Http\Controllers;

use App\Models\ClassStudentSection;
use App\Models\User;
use App\Models\Year;
use App\Models\Student;
use App\Models\SchoolClass;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Laratrust\Traits\HasRolesAndPermissions;
use RealRashid\SweetAlert\Facades\Alert;


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
