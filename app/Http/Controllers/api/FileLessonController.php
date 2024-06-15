<?php

namespace App\Http\Controllers\api;

use App\Models\File;
use App\Models\Lesson;
use App\Models\FileLesson;
use Illuminate\Http\Request;
use App\Traits\HttpResponses;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use App\Http\Resources\FileLessonsResource;
use Laratrust\Traits\HasRolesAndPermissions;
use App\Http\Requests\StoreFileLessonRequest;
use Illuminate\Support\Facades\File as facadeFile;

class FileLessonController extends Controller
{
    use HttpResponses;
    use HasRolesAndPermissions;
    public function index()
    {
        $fileLessons = FileLesson::all();

        return $this->success(
            FileLessonsResource::collection(
                $fileLessons
            ),
            'الحصص مع الملفات',
            //for index relations return that :
            // fileLesson::with('seasons')->get();
        );
        // get return fileLessons thats fileLessons are authenticated
        // FileLesson::where('fileLesson_id', Auth::user()->id)->get()
    }

    public function store(StoreFileLessonRequest $request)
    {
        $request->validated($request->all());

        $file_extension = $request->file->getClientOriginalName();
        $filename = $file_extension;

        $file = File::create([
            'name' => $filename,
            'user_id' => auth()->user()->id,
        ]);

        $request->file->move(public_path("project-files"), $filename);

        $fileLesson = FileLesson::create([

            'lesson_id' => $request->lesson_id,
            'file_id' => $file->id,

        ]);

        $lesson = Lesson::find($request->lesson_id);

        return $this->success(
            new FileLessonsResource($fileLesson),
            "تم إضافة الملف " . $filename . " للحصة " .   $lesson->lecture_number . " بنجاح",
        );
    }
    public function showFiles($lesson_id)
    {
        $lesson = Lesson::findOrFail($lesson_id);
        $files = FileLesson::where('lesson_id', $lesson->id)
            ->join('files', 'file_id', '=', 'files.id')
            ->get();
        return $this->success(
            [

                "lesson" => $lesson,
                "files" => $files
            ],
            "ملفات الحصة " . $lesson->lecture_number,

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
        $lessonFile = FileLesson::where('file_id', $file->id)->first();

        $file_path = public_path('project-files/' . $file_name);

        // Check if the file exists before attempting to delete
        if (facadeFile::exists($file_path)) {
            // Delete the file
            $file->delete();
            // or : File::destroy($file->id);
            $lessonFile->delete();

            facadeFile::delete($file_path);
            return $this->success(
                '',
                'تم حذف الملف ' /*. $fileLesson_name . ' من الصف ' . $class_name */ . 'بنجاح ',
                /*status-code */
            );
        }

        return $this->error("", "الملف غير موجود", 404);
    }
    /*
    public function update(UpdateFileLessonRequest $request, FileLesson $fileLesson)  // this work correctly
    // in postman make the method : Post (not patch not put)
    // and make in request body : _method = PUT
    {
        $fileLesson = FileLesson::find($fileLesson->id);
        $fileLesson->update($request->all());

        $fileLesson->save();

        return $this->success(
            new FileLessonsResource($fileLesson),
            "تم تعديل علامات الوظائف " . $fileLesson->name . " بنجاح ",
        );
    }
    */

    public function destroy(FileLesson $fileLesson)
    {
        // way 1 :
        // $year->delete();
        // return $this->success('Year was Deleted Successfuly ',null,204);

        // way 2 : (it is best to do it in Show & Update functions [Implement Private function below] )

        // if ($this->isNotAuthorized($year)) {
        //     $this->isNotAuthorized($year);
        // } else {
        $hmoework = FileLesson::find($fileLesson->id);
        $fileLesson->delete();

        return $this->success(
            '',
            'تم حذف الملف ' /*. $fileLesson_name . ' من الصف ' . $class_name */ . 'بنجاح ',
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
