<?php

// namespace App\Http\Controllers\api;

// use App\Models\User;
// use App\Models\DailySchedule;
// use Illuminate\Http\Request;
// use App\Traits\HttpResponses;
// use App\Http\Controllers\Controller;
// use Illuminate\Support\Facades\Auth;
// use App\Http\Resources\DailySchedulesResource;
// use App\Http\Requests\StoreDailyScheduleRequest;
// use App\Http\Requests\UpdateDailyScheduleRequest;
// use App\Models\Season;
// use Laratrust\Traits\HasRolesAndPermissions;

// class DailyScheduleController extends Controller
// {
//     use HttpResponses;
//     use HasRolesAndPermissions;

//     public function show(DailySchedule $dailySchedule)
//     {
//         // DailySchedule $dailySchedule
//         // Season $season

//         $season = Season::find($dailySchedule->season_id);
//         $all_dailySchedule = DailySchedule::all()->where('season_id', $dailySchedule->season_id);
//         // return new DailySchedulesResource($dailySchedule);
//         return response()->json([
//             'season' => $season,
//             'daily-schedule' => $all_dailySchedule,

//         ], 200);
//     }
// }
