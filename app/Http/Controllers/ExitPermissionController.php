<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Year;
use App\Models\Student;
use App\Models\SchoolClass;
use Illuminate\Http\Request;
use App\Traits\HttpResponses;
use App\Models\ExitPermission;
use App\Models\ClassStudentSection;
use Illuminate\Support\Facades\Auth;
use Laratrust\Traits\HasRolesAndPermissions;
use App\Http\Requests\StoreExitPermissionRequest;
use App\Http\Requests\UpdateExitPermissionRequest;

class ExitPermissionController extends Controller
{
    use HttpResponses;
    use HasRolesAndPermissions;
    /**
     * Display a listing of the resource.
     */


    public function index($yearname)
    {
        $year = Year::where('name', $yearname)->first();

        $exitPermissions = ExitPermission::where('mentor_id', Auth::user()->id)
            ->whereDate('created_at', '>=', $year->year_start)
            ->whereDate('created_at', '<=', $year->year_end)
            // ->whereNotNull('admin_id')
            ->get();

        // $exitPermission = $exitPermissions->first();
        // dd($exitPermission->user->first_name);
        return view('exit-permissions.index', compact('yearname', 'year', 'exitPermissions'));
        // return redirect()->route('exitPermissions', ['yearname' => $yearname, 'exitPermissions' => $exitPermissions]);
    }
    // public function adminIndex()
    // {
    //     $exitPermissions = ExitPermission::all()->where('admin_id', '=', Auth::user()->id);

    //     return
    //         ExitPermissionsResource::collection(
    //             $exitPermissions
    //             // Season::where('season_id', Auth::user()->id)->get()
    //         ); // get seasons thats seasons are authenticated
    // }
    /**
     * Show the form for creating a new resource.
     */
    public function create($yearname)
    {
        $year = Year::where('name', $yearname)->first();
        $student_ids = ClassStudentSection::where('year_id', $year->id) // or line below 👇
            // ->whereDate('created_at', '>=', $year->year_start)
            // ->whereDate('created_at', '<=', $year->year_end)
            ->pluck('student_id');
        // dd($student_ids);
        $students = Student::findMany($student_ids);
        // dd($students);
        $classes = SchoolClass::where('year_id', $year->id) // or line below 👇
            // ->whereDate('created_at', '>=', $year->year_start)
            // ->whereDate('created_at', '<=', $year->year_end)
            ->get();
        return view('exit-permissions.add', compact('year', 'yearname', 'students', 'classes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreExitPermissionRequest $request, $yearname)
    {
        // dd($request);
        $user = Auth::user();
        $request->validated($request->all());

        if ($user->hasRole('mentor')) {
            $exitPermission = ExitPermission::create([
                // 'user_id' => Auth::user()->id,

                'reason' => $request->reason,
                'date' => $request->date,

                'mentor_id' => Auth::user()->id,
                'student_id' => $request->student_id,
                'class_id' => $request->class_id,
            ]);
        }
        // else // other users
        // {
        //     $exitPermission = ExitPermission::create([
        //         // 'user_id' => Auth::user()->id,

        //         'title' => $request->title,
        //         'body' => $request->body,
        //         'admin_role' =>  "",
        //         'target' => $request->target,

        //         'admin_id' => Auth::user()->id,
        //     ]);
        // }
        $year = Year::where('name', $yearname)->first();
        $exitPermissions = ExitPermission::where('mentor_id', Auth::user()->id)
            ->whereDate('created_at', '>=', $year->year_start)
            ->whereDate('created_at', '<=', $year->year_end)
            // ->whereNotNull('admin_id')
            ->get();
        // return view('ExitPermissions.index', compact('yearname', 'year'));
        return redirect()->route('exit-permissions', ['yearname' => $yearname, 'exitPermissions' => $exitPermissions]);
    }

    /**
     * Display the specified resource.
     */
    public function show(ExitPermission $exitPermission, $yearname, $exitPermission_id)
    {

        $year = Year::where('name', $yearname)->first();

        $exitPermission = ExitPermission::where('id', $exitPermission_id)->first();

        return view("exitPermissions.show", compact('yearname', 'year', 'exitPermission'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ExitPermission $exitPermission, $yearname, $exit_permission_id)
    {
        $year = Year::where('name', $yearname)->first();
        $exitPermission = ExitPermission::where('id', $exit_permission_id)->first();
        $student_ids = ClassStudentSection::where('year_id', $year->id) // or line below 👇
            // ->whereDate('created_at', '>=', $year->year_start)
            // ->whereDate('created_at', '<=', $year->year_end)
            ->pluck('student_id');
        // dd($student_ids);
        $students = Student::findMany($student_ids);
        $classes = SchoolClass::where('year_id', $year->id) // or line below 👇
            // ->whereDate('created_at', '>=', $year->year_start)
            // ->whereDate('created_at', '<=', $year->year_end)
            ->get();

        $student = Student::where("id", $exitPermission->student_id)->first();
        return view(
            'exit-permissions.edit',
            compact(['year', 'yearname', 'exitPermission', 'student', 'students', 'classes'])
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateExitPermissionRequest $request, ExitPermission $exitPermission, $yearname, $exit_permission_id)  // this work correctly
    // in postman make the method : Post (not patch not put)
    // and make in request body : _method = PUT
    {

        $user = Auth::user();
        $year = Year::where('name', $yearname)->first();
        $exitPermission = ExitPermission::where('id', $exit_permission_id)->first();

        if ($user->hasRole('mentor')) {

            $exitPermission->update([
                'reason' => $request->reason,
                'date' => $request->date,

                'mentor_id' => Auth::user()->id,
                'student_id' => $request->student_id,
                'class_id' => $request->class_id,
            ]);
        }
        $exitPermissions = ExitPermission::where('mentor_id', Auth::user()->id)
            ->whereDate('created_at', '>=', $year->year_start)
            ->whereDate('created_at', '<=', $year->year_end)
            // ->whereNotNull('admin_id')
            ->get();
        $exitPermission->save();

        return redirect()->route('exit-permissions', ['yearname' => $yearname, 'year' => $year, 'exitPermissions' => $exitPermissions, 'exit_permission_id' => $exit_permission_id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ExitPermission $exitPermission, $yearname, $exitPermission_id)
    {
        $year = Year::where('name', $yearname)->first();
        $exitPermission = ExitPermission::where('id', $exitPermission_id)->first();

        // dd($exitPermission);


        if (
            $exitPermission->mentor_id == Auth::user()->id /*|| Auth::user()->roles()->first()->name == 'manager'*/
        ) {

            $exitPermission->delete();

            $exitPermissions = ExitPermission::where('mentor_id', Auth::user()->id)
                ->whereDate('created_at', '>=', $year->year_start)
                ->whereDate('created_at', '<=', $year->year_end)
                // ->whereNotNull('admin_id')
                ->get();
            // return view("students.index", compact('year', 'students'));
            return redirect()->route('exit-permissions', ['yearname' => $yearname, 'exitPermissions' => $exitPermissions]);
        } else {
            echo "<br>
            <h1 style='font-size: 40px;color: red ;text-align: center;vertical-align: middle;'
            > 😅 مع الأسف 😅</h1>
            <br>
            <h1 style='font-size: 35px;text-align: center;'>
             أنت غير قادر على حذف هذا الإعلان لأنك لست  مدير المدرسة ولست ناشر هذا الإعلان أيضاً</h1>";
            echo "<br>";
        }

        // way 1 :
        // $exitPermission->delete();
        // return $this->success('ExitPermission was Deleted Successfuly ',null,204);

        // way 2 : (it is best to do it in Show & Update functions [Implement Private function below] )

        // return $this->isNotAuthorized($exitPermission) ? $this->isNotAuthorized($exitPermission) : $exitPermission->delete();
        // return true (1) if the delete successfuly occoured
    }

    private function isNotAuthorized($exitPermission)
    {
        if (Auth::user()->id !== $exitPermission->exitPermission_id) {
            return $this->error('', 'You are not Authorized to make this request', 403);
        }
    }
}
