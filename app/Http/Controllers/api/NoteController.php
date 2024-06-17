<?php

namespace App\Http\Controllers\api;

use App\Models\Note;
use Illuminate\Http\Request;
use App\Traits\HttpResponses;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\NotesResource;
use App\Http\Requests\StoreNoteRequest;
use App\Http\Requests\UpdateNoteRequest;
use App\Models\User;
use Laratrust\Traits\HasRolesAndPermissions;

class NoteController extends Controller
{
    use HttpResponses;
    use HasRolesAndPermissions;
    public function index()
    {
        $notes = Note::where('student_id', Auth::user()->id)->get();

        $student = User::where('id', Auth::user()->id)->get();

        return $this->success(
            [
                "notes" =>  NotesResource::collection($notes),
                "student" => $student
            ],

            'الملاحظات السلوكية',
            //for index relations return that :
            // note::with('seasons')->get();
        );
        // get return notes thats notes are authenticated
        // Note::where('note_id', Auth::user()->id)->get()
    }

    public function store(StoreNoteRequest $request)
    {
        $request->validated($request->all());
        $note = Note::create([
            // 'user_id' => Auth::class()->id,
            'type' => $request->type,
            'details' => $request->details,

            'admin_id' => Auth::user()->id,
            'student_id' => $request->student_id,

        ]);
        return $this->success(
            new NotesResource($note),
            "تمت إضافة ملاحظة  " . /* $request->name .*/ " بنجاح",
        );
    }
    public function show(Note $note)
    {
        // without relations :
        //return new NotesResource($note);
        // with relations : $note->load('seasons');
        // like this :
        return $this->success(
            $note->load(['admin', 'student']),
            " الملاحظة السلوكية " /*. $note->name*/,
        );
    }
    public function update(UpdateNoteRequest $request, Note $note)  // this work correctly
    // in postman make the method : Post (not patch not put)
    // and make in request body : _method = PUT
    {
        $note = Note::find($note->id);
        $note->update($request->all());

        $note->save();

        return $this->success(
            new NotesResource($note),
            "تم تعديل الملاحظة  " ./* $note->name .*/ " بنجاح ",
        );
    }
    public function destroy(Note $note)
    {
        // way 1 :
        // $year->delete();
        // return $this->success('Year was Deleted Successfuly ',null,204);

        // way 2 : (it is best to do it in Show & Update functions [Implement Private function below] )

        // if ($this->isNotAuthorized($year)) {
        //     $this->isNotAuthorized($year);
        // } else {
        $note = Note::find($note->id);
        $note->delete();

        return $this->success(
            '',
            'تم حذف علامات الوظائف ' /*. $note_name . ' من الصف ' . $class_name */ . ' بنجاح ',
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
