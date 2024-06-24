<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\Year;
use App\Models\ExamSchedule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Laratrust\Traits\HasRolesAndPermissions;
use App\Http\Requests\StoreExamScheduleRequest;
use App\Http\Requests\UpdateExamScheduleRequest;
use Illuminate\Support\Facades\File as FacadeFile;


class ExamScheduleController extends Controller
{
    use HasRolesAndPermissions;

    /**
     * Display a listing of the resource.
     */
    public function index($yearname)
    {
        $year = Year::where('name', $yearname)->first();
        $exam_schedules = ExamSchedule::whereDate('created_at', '>=', $year->year_start)
            ->whereDate('created_at', '<=', $year->year_end)
            ->get();
        // dd($exam_schedules->season);
        // $examSchedules = DB::table('exam_schedules')
        //     ->leftJoin('files', 'exam_schedules.file_id', '=', 'files.id')
        //     ->where('exam_schedules.created_at', '>=', $year->year_start)
        //     ->where('exam_schedules.created_at', '<=', $year->year_end)
        //     ->leftJoin('seasons', 'exam_schedules.season_id', '=', 'seasons.id')
        //     ->leftJoin('users', 'files.user_id', '=', 'users.id')
        //     ->whereNotNull('season_id')
        //     ->get();
        // dd($examSchedules);
        return view('schedules.exams.index', compact('yearname', 'year', 'exam_schedules'));
        // return redirect()->route('daily', ['yearname' => $yearname, 'examSchedules' => $examSchedules]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create($yearname)
    {
        $year = Year::where('name', $yearname)->first();
        $seasons = $year->seasons;

        return view('schedules.exams.add', compact('year', 'yearname', 'seasons'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreExamScheduleRequest $request, $yearname)
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
                $examSchedule = ExamSchedule::create([
                    // 'user_id' => Auth::user()->id,

                    'file_id' => $file->id,
                    'season_id' => $request->season_id,
                ]);
            }
            $year = Year::where('name', $yearname)->first();
            $examSchedules = ExamSchedule::whereDate('created_at', '>=', $year->year_start)
                ->whereDate('created_at', '<=', $year->year_end)
                // ->whereNotNull('file_id')
                ->get();
            // return view('ExamSchedules.index', compact('yearname', 'year'));
            return redirect()->route('schedules.exams', ['yearname' => $yearname, 'examSchedules' => $examSchedules]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(ExamSchedule $examSchedule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ExamSchedule $examSchedule)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateExamScheduleRequest $request, ExamSchedule $examSchedule)
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
    public function destroy(ExamSchedule $examSchedule, $yearname, $exam_schedule_id)
    {
        $year = Year::where('name', $yearname)->first();
        $examSchedule = ExamSchedule::where('id', $exam_schedule_id)->first();

        $file = File::where('id', $examSchedule->file_id)->first();

        if ($file->user_id == Auth::user()->id /*|| Auth::user()->roles()->first()->name == 'manager'*/) {


            $file_path = public_path('project-files/' . $file->name);

            if (FacadeFile::exists($file_path)) {
                FacadeFile::delete($file_path);
                $file->delete();
            }
            $examSchedule->delete();
            $exam_schedules = ExamSchedule::whereDate('created_at', '>=', $year->year_start)
                ->whereDate('created_at', '<=', $year->year_end)
                ->get();
            // return view("students.index", compact('year', 'students'));
            return redirect()->route('schedules.exams', ['yearname' => $yearname, 'examSchedules' => $exam_schedules]);
        } else {
            $exam_schedules = ExamSchedule::whereDate('created_at', '>=', $year->year_start)
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
