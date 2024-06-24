<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\Year;
use App\Models\TestSchedule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Laratrust\Traits\HasRolesAndPermissions;
use App\Http\Requests\StoreTestScheduleRequest;
use App\Http\Requests\UpdateTestScheduleRequest;
use Illuminate\Support\Facades\File as FacadeFile;

class TestScheduleController extends Controller
{
    use HasRolesAndPermissions;

    /**
     * Display a listing of the resource.
     */
    public function index($yearname)
    {
        $year = Year::where('name', $yearname)->first();
        $test_schedules = TestSchedule::whereDate('created_at', '>=', $year->year_start)
            ->whereDate('created_at', '<=', $year->year_end)
            ->get();
        // dd($test_schedules->season);
        // $testSchedules = DB::table('test_schedules')
        //     ->leftJoin('files', 'test_schedules.file_id', '=', 'files.id')
        //     ->where('test_schedules.created_at', '>=', $year->year_start)
        //     ->where('test_schedules.created_at', '<=', $year->year_end)
        //     ->leftJoin('seasons', 'test_schedules.season_id', '=', 'seasons.id')
        //     ->leftJoin('users', 'files.user_id', '=', 'users.id')
        //     ->whereNotNull('season_id')
        //     ->get();
        // dd($testSchedules);
        return view('schedules.tests.index', compact('yearname', 'year', 'test_schedules'));
        // return redirect()->route('daily', ['yearname' => $yearname, 'testSchedules' => $testSchedules]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create($yearname)
    {
        $year = Year::where('name', $yearname)->first();
        $seasons = $year->seasons;

        return view('schedules.tests.add', compact('year', 'yearname', 'seasons'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTestScheduleRequest $request, $yearname)
    {
        // public function upload_file(Request $request)
        {
            $user = Auth::user();
            $request->validated($request->all());
            $file_request = $request->file;
            if ($user->hasRole('mentor') || $user->hasRole('secretary')) {

                $file_name = $request->file->getClientOriginalName();

                $request->file->move(public_path('project-files/'), $file_name);

                $file = File::create([
                    'name' => $file_name,
                    'user_id' => auth()->user()->id,
                ]);
                $testSchedule = TestSchedule::create([
                    // 'user_id' => Auth::user()->id,

                    'file_id' => $file->id,
                    'season_id' => $request->season_id,
                ]);
            }
            $year = Year::where('name', $yearname)->first();
            $testSchedules = TestSchedule::whereDate('created_at', '>=', $year->year_start)
                ->whereDate('created_at', '<=', $year->year_end)
                // ->whereNotNull('file_id')
                ->get();
            // return view('TestSchedules.index', compact('yearname', 'year'));
            return redirect()->route('schedules.tests', ['yearname' => $yearname, 'testSchedules' => $testSchedules]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(TestSchedule $testSchedule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TestSchedule $testSchedule)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTestScheduleRequest $request, TestSchedule $testSchedule)
    {
        //
    }
    public function downloadFile($yearname, $file_name)
    {
        $file_path = public_path('project-files/' . $file_name);
        if (file_exists($file_path)) {
            return Response::download($file_path, $file_name);
        }
        return "<br>
        //     <h1 style='font-size: 40px;color: red ;text-align: center;vertical-align: middle;'
        //     > 😅 مع الأسف 😅</h1>
        //     <br>
        //     <h1 style='font-size: 35px;text-align: center;'>
        //      هذا الملف غير موجود</h1>";
        //     echo "<br>";
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TestSchedule $testSchedule, $yearname, $test_schedule_id)
    {
        $year = Year::where('name', $yearname)->first();
        $testSchedule = TestSchedule::where('id', $test_schedule_id)->first();

        $file = File::where('id', $testSchedule->file_id)->first();

        if ($file->user_id == Auth::user()->id /*|| Auth::user()->roles()->first()->name == 'manager'*/) {


            $file_path = public_path('project-files/' . $file->name);

            if (FacadeFile::exists($file_path)) {
                FacadeFile::delete($file_path);
                $file->delete();
            }
            $testSchedule->delete();
            $test_schedules = TestSchedule::whereDate('created_at', '>=', $year->year_start)
                ->whereDate('created_at', '<=', $year->year_end)
                ->get();
            // return view("students.index", compact('year', 'students'));
            return redirect()->route('schedules.tests', ['yearname' => $yearname, 'testSchedules' => $test_schedules]);
        } else {
            $test_schedules = TestSchedule::whereDate('created_at', '>=', $year->year_start)
                ->whereDate('created_at', '<=', $year->year_end)
                ->get();

            echo "<br>
            <h1 style='font-size: 40px;color: red ;text-align: center;vertical-align: middle;'
            > 😅 مع الأسف 😅</h1>
            <br>
            <h1 style='font-size: 35px;text-align: center;'>
             أنت غير قادر على حذف ملف برنامج المذاكرات هذا لأنك لست من قام بنشره</h1>";
            echo "<br>";
        }
    }
}
