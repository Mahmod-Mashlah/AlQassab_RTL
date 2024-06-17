<?php

namespace App\Http\Controllers\api;

use App\Models\Season;
use App\Models\ExamSchedule;
use Illuminate\Http\Request;
use App\Traits\HttpResponses;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;
use Laratrust\Traits\HasRolesAndPermissions;

class ExamScheduleController extends Controller
{
    use HttpResponses;
    use HasRolesAndPermissions;


    public function showFiles($season_id)
    {
        $season = Season::findOrFail($season_id);
        $file = ExamSchedule::where('season_id', $season_id)
            ->join('files', 'file_id', '=', 'files.id')
            ->get();
        return $this->success(
            [

                "season" => $season,
                "file" => $file
            ],
            "برنامج الامتحانات",

        );
    }

    public function downloadFile($file_name)
    {
        $file_path = public_path('project-files/' . $file_name);
        if (file_exists($file_path)) {
            return Response::download($file_path, $file_name);
        }
        return $this->error("", "File not found", 404);
    }
}
