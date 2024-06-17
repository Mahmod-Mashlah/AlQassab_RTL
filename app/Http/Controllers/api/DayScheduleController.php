<?php

namespace App\Http\Controllers\api;

use App\Models\File;
use App\Models\Season;
use App\Models\DaySchedule;
use Illuminate\Http\Request;
use App\Traits\HttpResponses;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;
use Laratrust\Traits\HasRolesAndPermissions;

class DayScheduleController extends Controller
{
    use HttpResponses;
    use HasRolesAndPermissions;


    public function showFiles($season_id)
    {
        $season = Season::findOrFail($season_id);
        $file = DaySchedule::where('season_id', $season_id)
            ->join('files', 'file_id', '=', 'files.id')
            ->get();
        return $this->success(
            [

                "season" => $season,
                "file" => $file
            ],
            "الجدول اليومي",

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

    /*
    public function update(UpdateFileNoteRequest $request, FileNote $fileNote)  // this work correctly
    // in postman make the method : Post (not patch not put)
    // and make in request body : _method = PUT
    {
        $fileNote = FileNote::find($fileNote->id);
        $fileNote->update($request->all());
        $fileNote->save();
        return $this->success(
            new FileNotesResource($fileNote),
            "تم تعديل علامات الوظائف " . $fileNote->name . " بنجاح ",
        );
    }
    */
}
