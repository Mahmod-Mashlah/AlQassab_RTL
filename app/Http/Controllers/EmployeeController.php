<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\User;
use App\Models\Year;
use App\Models\Subject;
use App\Models\Employee;
use Laratrust\Models\Role;
use App\Models\SchoolClass;
use Illuminate\Http\Request;
use Laratrust\Traits\HasRolesAndPermissions;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;

class EmployeeController extends Controller
{
    use HasRolesAndPermissions;
    /**
     * Display a listing of the resource.
     */
    public function index($yearname)
    {
        $year = Year::where('name', $yearname)->first();
        // $employees = User::whereHasRole("student")
        //     ->whereDate('created_at', '>=', $year->year_start)
        //     ->whereDate('created_at', '<=', $year->year_end)
        //     ->get();
        $employees = Employee::whereDate('created_at', '>=', $year->year_start)
            ->whereDate('created_at', '<=', $year->year_end)
            ->whereNotNull('user_id')
            ->get();
        // dd($employees);
        return view("employees.index", compact('year', 'yearname', 'employees'));
    }
    /**
     * Show the form for creating a new resource.
     */


    public function create($yearname)
    {
        $year = Year::where('name', $yearname)->first();
        $roles = Role::whereIn('name', ['manager', 'secretary', 'mentor', 'teacher'])->get();
        return view('employees.add', compact('year', 'roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store($yearname, StoreEmployeeRequest $request)
    {

        $year = Year::where('name', $yearname)->first();
        $roles = Role::whereIn('name', ['manager', 'secretary', 'mentor', 'teacher'])->get();
        $role_from_request_id = Role::find($request->role_id);
        // dd($role_from_request_id);
        $rolename = $role_from_request_id->name;


        $faker = \Faker\Factory::create();

        $employee_random_number = $faker->numberBetween(1000, 9999);
        $employee_password = $request->first_name . ' ' . $request->last_name . ' ' . $employee_random_number;


        $employeeAsUser = User::create([
            // 'user_id' => Auth::user()->id,
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'last_name' => $request->last_name,
            'birth_date' => $request->birth_date,
            'password' => $employee_password,

        ]);

        $request->validated($request->all());
        // image :
        $file_request = $request->file;

        $file_name = $request->file->getClientOriginalName();

        $request->file->move(public_path('project-files/'), $file_name);

        $file = File::create([
            'name' => $file_name,
            'user_id' => auth()->user()->id,
        ]);

        $employee = Employee::create([
            // 'user_id' => Auth::user()->id,
            'user_id' => $employeeAsUser->id,
            'image_id' => $file->id,
            'password' => $employee_password,
            'mother_name' => $request->mother_name,
            'birth_place' => $request->birth_place,
            'restrict_place' => $request->restrict_place,
            'nationality' => $request->nationality,
            'family_mode' => $request->family_mode,
            'children_number' => $request->children_number,
            'family_compensation_number' => $request->family_compensation_number,
            'work_date' => $request->work_date,
            'school_from' => $request->school_from,
            'book_number' => $request->book_number,
            'book_date' => $request->book_date,
            'work_start_date' => $request->work_start_date,
            'leave_date' => $request->leave_date,
            'school_to' => $request->school_to,
            'military_is' => $request->military_is,
            'military_rank' => $request->military_rank,
            'salary_place' => $request->salary_place,
            'address' => $request->address,
            'phone' => $request->phone,
            'certifications' => $request->certifications,

        ]);

        // $employeeAsUser->assignRole($rolename);
        // $employeeAsUser->attachRole($role_from_request_id);
        // $employeeAsUser->syncRoles([$role_from_request_id]);
        $employeeAsUser->syncRoles([$role_from_request_id->id]);
        // $student_class = ClassStudentSection::create([
        //     // 'user_id' => Auth::user()->id,

        //     'user_id' => $studentAsUser->id,
        //     'student_id' => $student->id,
        //     'section_id' => null,
        //     'class_id' => $request->class_id,
        //     'year_id' => $year->id,
        // ]);


        Alert::success('تمت الإضافة بنجاح ', 'تم إضافة الموظف ' . $request->first_name . ' ' . $request->last_name . ' بنجاح');

        return view('employees.add', compact('yearname', 'year', 'roles'));
    }

    /**
     * Display the specified resource.
     */
    public function employees_search(Employee $employee, $yearname, Request $request)
    {
        $employee_id = $request->employee_id;
        dd($employee_id);
        $year = Year::where('name', $yearname)->first();

        $employee = Employee::where('id', $employee_id)->first();
        $user = User::where('id', $employee->user_id)->first();
        $user_id = $user->id;
        $imageAsFile = File::where('id', $employee->image->id)->first();
        $subjectsIfTeacher = Subject::where("teacher_id", $user->id)
            ->whereDate('created_at', '>=', $year->year_start)
            ->whereDate('created_at', '<=', $year->year_end)->get();

        $classesIfMentor = SchoolClass::where("mentor_id", $user->id)
            ->whereDate('created_at', '>=', $year->year_start)
            ->whereDate('created_at', '<=', $year->year_end)->get();
        // $employee_class = ClassStudentSection::where('employee_id', $employee->id)
        //     ->latest()
        //     ->first();
        // $class = SchoolClass::find($employee_class->class_id);
        // dd($employee);
        return view("employees.show", compact('employee', 'yearname', 'user_id', 'year', 'user', 'imageAsFile', "subjectsIfTeacher", "classesIfMentor"));
        // return redirect()->route('employees.show', ['yearname' => $yearname, 'employee' => $employee, 'user_id' => $user_id]);
    }
    public function show(Employee $employee, $yearname, $user_id)
    {

        $year = Year::where('name', $yearname)->first();

        $user = User::where('id', $user_id)->first();
        $employee = Employee::where('user_id', $user_id)->first();
        // dd($employee);
        $imageAsFile = File::where('id', $employee->image_id)->first();
        $subjectsIfTeacher = Subject::where("teacher_id", $user_id)
            ->whereDate('created_at', '>=', $year->year_start)
            ->whereDate('created_at', '<=', $year->year_end)->get();

        $classesIfMentor = SchoolClass::where("mentor_id", $user_id)
            ->whereDate('created_at', '>=', $year->year_start)
            ->whereDate('created_at', '<=', $year->year_end)->get();

        // $employee_class = ClassEmployeeSection::where('employee_id', $employee->id)
        //     ->latest()
        //     ->first();
        // $class = SchoolClass::find($employee_class->class_id);
        // dd($employee);
        return view("employees.show", compact('year', 'employee', 'user', 'imageAsFile', "subjectsIfTeacher", "classesIfMentor"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEmployeeRequest $request, Employee $employee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        //
    }
}
