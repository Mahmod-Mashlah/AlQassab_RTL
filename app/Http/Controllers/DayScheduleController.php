<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\Year;
use App\Models\DaySchedule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Laratrust\Traits\HasRolesAndPermissions;
use App\Http\Requests\StoreDayScheduleRequest;
use App\Http\Requests\UpdateDayScheduleRequest;
use Illuminate\Support\Facades\File as FacadeFile;


class DayScheduleController extends Controller
{
    use HasRolesAndPermissions;
    /**
     * Display a listing of the resource.
     */


    public function index($yearname)
    {
        $year = Year::where('name', $yearname)->first();
        // $daySchedules = DaySchedule::whereDate('created_at', '>=', $year->year_start)
        //     ->whereDate('created_at', '<=', $year->year_end)
        //     ->get();
        $daySchedules = DB::table('day_schedules')
            ->leftJoin('files', 'day_schedules.file_id', '=', 'files.id')
            ->where('day_schedules.created_at', '>=', $year->year_start)
            ->where('day_schedules.created_at', '<=', $year->year_end)
            ->leftJoin('seasons', 'day_schedules.season_id', '=', 'seasons.id')
            ->leftJoin('users', 'files.user_id', '=', 'users.id')
            ->whereNotNull('season_id')
            ->get();
        // dd($daySchedules);
        return view('schedules.daily.index', compact('yearname', 'year', 'daySchedules'));
        // return redirect()->route('daily', ['yearname' => $yearname, 'daySchedules' => $daySchedules]);
    }

    public function create($yearname)
    {
        $year = Year::where('name', $yearname)->first();
        $seasons = $year->seasons;

        return view('schedules.daily.add', compact('year', 'yearname', 'seasons'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDayScheduleRequest $request, $yearname)
    {
        $user = Auth::user();
        $request->validated($request->all());

        if ($user->hasRole('mentor') || $user->hasRole('secretary')) {

            $file_name = $request->file->getClientOriginalName();

            $request->file->move(public_path('project-files/' . $file_name));

            $file = File::create([
                'name' => $file_name,
                'user_id' => auth()->user()->id,
            ]);
            $daySchedule = DaySchedule::create([
                // 'user_id' => Auth::user()->id,

                'file_id' => $file->id,
                'season_id' => $request->season_id,
            ]);
        }
        $year = Year::where('name', $yearname)->first();
        $daySchedules = DaySchedule::whereDate('created_at', '>=', $year->year_start)
            ->whereDate('created_at', '<=', $year->year_end)
            // ->whereNotNull('file_id')
            ->get();
        // return view('DaySchedules.index', compact('yearname', 'year'));
        return redirect()->route('daily', ['yearname' => $yearname, 'daySchedules' => $daySchedules]);
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
     * Display the specified resource.
     */
    // public function show(DaySchedule $daySchedule, $yearname, $daySchedule_id)
    // {

    //     $year = Year::where('name', $yearname)->first();

    //     $daySchedule = DaySchedule::where('id', $daySchedule_id)->first();

    //     return view("schedules.daily.show", compact('yearname', 'year', 'daySchedule'));
    // }

    /**
     * Show the form for editing the specified resource.
     */
    // public function edit(DaySchedule $daySchedule, $yearname, $daySchedule_id)
    // {
    //     $year = Year::where('name', $yearname)->first();
    //     $daySchedule = DaySchedule::where('id', $daySchedule_id)->first();
    //     return view(
    //         "schedules.daily.edit",
    //         compact(['year', 'yearname', 'daySchedule'])
    //     );
    // }

    /**
     * Update the specified resource in storage.
     */

    // public function update(UpdateDayScheduleRequest $request, DaySchedule $daySchedule, $yearname, $daySchedule_id)
    // {
    //     $user = Auth::user();
    //     $year = Year::where('name', $yearname)->first();
    //     $daySchedule = DaySchedule::where('id', $daySchedule_id)->first();


    //     $oldFile = File::find($request->file_id);

    //     $file_name = $request->file->getClientOriginalName();

    //     $request->file->move(public_path('project-files/' . $file_name));

    //     $oldFile->update([
    //         'name' => $file_name,
    //         'user_id' => auth()->user()->id,
    //     ]);

    //     $daySchedule->update([
    //         'title' => $request->title,
    //         'body' => $request->body,
    //         'target' => $request->target,

    //         'admin_id' => Auth::user()->id,
    //         'admin_role' => "مدير",
    //     ]);

    //     $daySchedule->save();

    //     return redirect()->route('daily', ['yearname' => $yearname, 'year' => $year, 'daySchedule' => $daySchedule, 'daySchedule_id' => $daySchedule_id]);
    // }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DaySchedule $daySchedule, $yearname, $day_schedule_id)
    {
        $year = Year::where('name', $yearname)->first();
        $daySchedule = DaySchedule::where('id', $day_schedule_id)->first();
        dd($day_schedule_id);
        $file = File::where('id', $daySchedule->file_id)->first();


        if ($file->user_id == Auth::user()->id /*|| Auth::user()->roles()->first()->name == 'manager'*/) {

            $daySchedule->delete();

            $file_path = public_path('project-files/' . $file->name);

            if (FacadeFile::exists($file_path)) {
                FacadeFile::delete($file_path);
                $file->delete();
            }

            // $daySchedules = DaySchedule::whereDate('created_at', '>=', $year->year_start)
            //     ->whereDate('created_at', '<=', $year->year_end)
            //     // ->whereNotNull('admin_id')
            //     ->get();
            $daySchedules = DB::table('day_schedules')
                ->leftJoin('files', 'day_schedules.file_id', '=', 'files.id')
                ->where('day_schedules.created_at', '>=', $year->year_start)
                ->where('day_schedules.created_at', '<=', $year->year_end)
                ->leftJoin('seasons', 'day_schedules.season_id', '=', 'seasons.id')
                ->leftJoin('users', 'files.user_id', '=', 'users.id')
                ->whereNotNull('season_id')
                ->get();
            // return view("students.index", compact('year', 'students'));
            return redirect()->route('daily', ['yearname' => $yearname, 'daySchedules' => $daySchedules]);
        }
        // else {

        //     $daySchedules = DaySchedule::whereDate('created_at', '>=', $year->year_start)
        //         ->whereDate('created_at', '<=', $year->year_end)
        //         ->whereNotNull('admin_id')
        //         ->get();

        //     echo "<br>
        //     <h1 style='font-size: 40px;color: red ;text-align: center;vertical-align: middle;'
        //     > 😅 مع الأسف 😅</h1>
        //     <br>
        //     <h1 style='font-size: 35px;text-align: center;'>
        //      أنت غير قادر على حذف هذا الإعلان لأنك لست  مدير المدرسة ولست ناشر هذا الإعلان أيضاً</h1>";
        //     echo "<br>";
        // }

    }
}
