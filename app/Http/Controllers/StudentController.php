<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Year;
use App\Models\Student;
use App\Models\SchoolClass;
use App\Models\ClassStudentSection;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;

class StudentController extends Controller
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
    public function store(StoreStudentRequest $request)
    {
        //
    }

    public function students_search(Student $student, $yearname, $user_id)
    {
        $year = Year::where('name', $yearname)->first();

        $user = User::where('id', $user_id)->first();
        $student = Student::where('user_id', $user_id)->first();

        $student_class = ClassStudentSection::where('student_id', $student->id)
            ->latest()
            ->first();
        $class = SchoolClass::find($student_class->class_id);
        // dd($student);
        return view("students.show", compact('year', 'student', 'user', 'class'));
    }
    /**
     * Display the specified resource.
     */
    public function show(Student $student, $yearname, $user_id)
    {
        $year = Year::where('name', $yearname)->first();

        $user = User::where('id', $user_id)->first();
        $student = Student::where('user_id', $user_id)->first();

        $student_class = ClassStudentSection::where('student_id', $student->id)
            ->latest()
            ->first();
        $class = SchoolClass::find($student_class->class_id);
        // dd($student);
        return view("students.show", compact('year', 'student', 'user', 'class'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student, $yearname, $user_id)
    {
        $year = Year::where('name', $yearname)->first();
        $user = User::where('id', $user_id)->first();
        $student = Student::where('user_id', $user_id)->first();
        $classes = SchoolClass::where('year_id', $year->id)->get();

        $class = SchoolClass::find($student->class_id);
        return view(
            'students.edit',
            compact(['year', 'yearname', 'student', 'user', 'classes', 'class'])
        );
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStudentRequest $request, Student $student0, $yearname, $user_id)
    {
        $year = Year::where('name', $yearname)->first();
        $classes = SchoolClass::where('year_id', $year->id)->get();

        $faker = \Faker\Factory::create();

        $studentAsUser_after_update = User::find($user_id); // retrieve the model instance

        $studentAsUser_before_update = $studentAsUser_after_update->replicate(); // create a copy of the original model

        $parent_after_update = User::where('id', $studentAsUser_after_update->id + 1)->first();

        $parent_before_update = $parent_after_update->replicate();


        $studentAsUser_after_update->update([
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'last_name' => $request->last_name,
            'birth_date' => $request->birth_date,
        ]);

        $studentAsUser_after_update->save();



        $student_after_update = Student::where('user_id', $user_id)->first(); // after update

        $student_before_update = $student_after_update->replicate(); // create a copy of the original model

        $student_after_update->update([
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
            'password' => $student_after_update->password,
            'parent_password' => $student_after_update->parent_password,

            'user_id' => $user_id,
            'parent_id' => (string) ($user_id + 1),
            'class_id' => $request->class_id,
        ]);

        $student_after_update->save();

        $parent_after_update->update([
            // 'user_id' => Auth::user()->id,
            'first_name' => $request->middle_name,
            'middle_name' => $request->grandfather_name,
            'last_name' => $request->last_name,
            'birth_date' => null,
        ]);

        $parent_after_update->save();

        $student_class_section = ClassStudentSection::where('user_id', $user_id)
            ->where('year_id', $year->id)
            ->where('class_id', $student_before_update->class_id)
            ->first();

        $student_class_section->update([
            // 'user_id' => Auth::user()->id,

            'user_id' => $studentAsUser_after_update->id,
            'student_id' => $student_after_update->id,
            'section_id' => null,
            'class_id' => (int) $request->class_id,
            'year_id' => $year->id,
        ]);

        $student_class_section->save();

        // dd([
        //     "studentAsUser_before_update" => $studentAsUser_before_update,
        //     "parent_before_update" => $parent_before_update,
        //     "studentAsUser_after_update" => $studentAsUser_after_update,
        //     "parent_after_update" => $parent_after_update,
        //     "student_before_update" => $student_before_update,
        //     "student_after_update" => $student_after_update,
        //     "student_class_section" => $student_class_section,

        // ]);

        // Alert::success('تم التعديل بنجاح ', 'تم تعديل بيانات الطالب ' . $request->first_name . ' ' . $request->last_name . ' بنجاح');

        return redirect()->route('students', ['yearname' => $yearname, 'student' => $student0, 'user_id' => $user_id]);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student, $yearname, $user_id)
    {
        $year = Year::where('name', $yearname)->first();
        $user = User::where('id', $user_id)->first();
        $student = Student::where('user_id', $user_id)->first();
        $parent = User::where('first_name', $user->middle_name)
            ->where('last_name', $user->last_name)->first();
        // dd($student);
        $parent->delete();
        $student->delete();
        $user->delete();

        $students = Student::whereDate('created_at', '>=', $year->year_start)
            ->whereDate('created_at', '<=', $year->year_end)
            ->whereNotNull('user_id')
            ->get();

        // return view("students.index", compact('year', 'students'));
        return redirect()->route('students', ['yearname' => $yearname, 'students' => $students]);
    }
}
