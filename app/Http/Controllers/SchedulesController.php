<?php

namespace App\Http\Controllers;

use App\Models\Year;
use Illuminate\Http\Request;

class SchedulesController extends Controller
{
    public function index($yearname)
    {
        $year = Year::where('name', $yearname)->first();

        // $daySchedules = DaySchedule::whereDate('created_at', '>=', $year->year_start)
        //     ->whereDate('created_at', '<=', $year->year_end)
        //     // ->whereNotNull('admin_id')
        //     ->get();

        // $daySchedule = $daySchedules->first();
        // dd($daySchedule->user->first_name);
        return view('schedules.index', compact('yearname', 'year'));
        // return redirect()->route('daily', ['yearname' => $yearname, 'daySchedules' => $daySchedules]);
    }
}
