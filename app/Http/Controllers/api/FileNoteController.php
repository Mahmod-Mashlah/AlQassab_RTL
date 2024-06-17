<?php

namespace App\Http\Controllers\api;

use App\Models\File;
use App\Models\Note;
use App\Models\FileNote;
use Illuminate\Http\Request;
use App\Traits\HttpResponses;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\FileNotesResource;
use App\Http\Requests\StoreFileNoteRequest;
use Laratrust\Traits\HasRolesAndPermissions;
use Illuminate\Support\Facades\File as facadeFile;
use Illuminate\Support\Facades\Response;

class FileNoteController extends Controller
{
    use HttpResponses;
    use HasRolesAndPermissions;
    public function index()
    {
        $fileNotes = FileNote::all();

        return $this->success(
            FileNotesResource::collection(
                $fileNotes
            ),
            'الملاحظات مع الملفات',
            //for index relations return that :
            // fileNote::with('seasons')->get();
        );
        // get return fileNotes thats fileNotes are authenticated
        // FileNote::where('fileNote_id', Auth::user()->id)->get()
    }

    public function store(StoreFileNoteRequest $request)
    {
        $request->validated($request->all());

        $file_extension = $request->file->getClientOriginalName();
        $filename = $file_extension;

        $file = File::create([
            'name' => $filename,
            'user_id' => auth()->user()->id,
        ]);

        $request->file->move(public_path("project-files"), $filename);

        $fileNote = FileNote::create([

            'note_id' => $request->note_id,
            'file_id' => $file->id,

        ]);

        $note = Note::find($request->note_id);

        return $this->success(
            new FileNotesResource($fileNote),
            "تم إضافة الملف " . $filename . " للملاحظة " . "بنجاح",
        );
    }
    public function showFiles($note_id)
    {
        $note = Note::findOrFail($note_id);
        $files = FileNote::where('note_id', $note->id)
            ->join('files', 'file_id', '=', 'files.id')
            ->get();
        return $this->success(
            [

                "note" => $note,
                "files" => $files
            ],
            "ملفات الملاحظة ",

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
    public function deleteFile($file_name)
    {
        $file = File::where('name', $file_name)->first();
        $noteFile = FileNote::where('file_id', $file->id)->first();

        $file_path = public_path('project-files/' . $file_name);

        // Check if the file exists before attempting to delete
        if (facadeFile::exists($file_path)) {
            // Delete the file
            $file->delete();
            // or : File::destroy($file->id);
            $noteFile->delete();

            facadeFile::delete($file_path);
            return $this->success(
                '',
                'تم حذف الملف ' /*. $fileNote_name . ' من الصف ' . $class_name */ . 'بنجاح ',
                /*status-code */
            );
        }

        return $this->error("", "الملف غير موجود", 404);
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

    public function destroy(FileNote $fileNote)
    {
        // way 1 :
        // $year->delete();
        // return $this->success('Year was Deleted Successfuly ',null,204);

        // way 2 : (it is best to do it in Show & Update functions [Implement Private function below] )

        // if ($this->isNotAuthorized($year)) {
        //     $this->isNotAuthorized($year);
        // } else {
        $hmoework = FileNote::find($fileNote->id);
        $fileNote->delete();

        return $this->success(
            '',
            'تم حذف الملف ' /*. $fileNote_name . ' من الصف ' . $class_name */ . 'بنجاح ',
            /*status-code */
        );

        // return true (1) if the delete successfuly occoured
    }

    private function isNotAuthorized($user)
    {
        if (Auth::user()->id /*!== $user->user_id */) {
            return $this->error('', 'You are not Authorized to make this request', 403);
        }
    }
}
