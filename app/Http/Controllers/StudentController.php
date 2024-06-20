<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Year;
use App\Models\Student;
use App\Models\ClassStudentSection;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Models\SchoolClass;

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
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStudentRequest $request, Student $student)
    {
        //
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

        return view("students.index", compact('year', 'students'));
    }
}
