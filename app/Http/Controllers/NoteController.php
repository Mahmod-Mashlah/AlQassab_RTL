<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\Note;
use App\Models\User;
use App\Models\Year;
use App\Models\Student;
use App\Models\FileNote;
use App\Models\NoteType;
use Illuminate\Http\Request;
use App\Traits\HttpResponses;
use App\Models\ClassStudentSection;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreNoteRequest;
use App\Http\Requests\UpdateNoteRequest;
use Illuminate\Support\Facades\Response;
use Laratrust\Traits\HasRolesAndPermissions;
use Illuminate\Support\Facades\File as FacadeFile;


class NoteController extends Controller
{
    use HttpResponses;
    use HasRolesAndPermissions;
    /**
     * Display a listing of the resource.
     */

    public function index($yearname)
    {
        $year = Year::where('name', $yearname)->first();
        $user = Auth::user();

        $notes = Note::where('admin_id', Auth::user()->id)
            ->whereDate('created_at', '>=', $year->year_start)
            ->whereDate('created_at', '<=', $year->year_end)
            // ->whereNotNull('admin_id')
            ->get();
        if ($user->hasRole('manager')) {
            $notes = Note::whereDate('created_at', '>=', $year->year_start)
                ->whereDate('created_at', '<=', $year->year_end)
                // ->whereNotNull('admin_id')
                ->get();
        }
        $notes_types = NoteType::all();
        // $exitPermission = $notes->first();
        // dd($exitPermission->user->first_name);
        return view('behavioral-notes.index', compact('yearname', 'year', 'notes', 'notes_types'));
        // return redirect()->route('notes', ['yearname' => $yearname, 'notes' => $notes]);
    }
    // public function adminIndex()
    // {
    //     $notes = Note::all()->where('admin_id', '=', Auth::user()->id);

    //     return
    //         NotesResource::collection(
    //             $notes
    //             // Season::where('season_id', Auth::user()->id)->get()
    //         ); // get seasons thats seasons are authenticated
    // }
    /**
     * Show the form for creating a new resource.
     */
    public function create($yearname)
    {
        $year = Year::where('name', $yearname)->first();
        $notes_types = NoteType::all();
        // dd($notes_types);
        $student_ids = ClassStudentSection::where('year_id', $year->id) // or line below 👇
            // ->whereDate('created_at', '>=', $year->year_start)
            // ->whereDate('created_at', '<=', $year->year_end)
            ->pluck('student_id');
        // dd($student_ids);
        $students = Student::findMany($student_ids);
        // dd($students);

        return view('behavioral-notes.add', compact('year', 'yearname', 'notes_types', 'students'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreNoteRequest $request, $yearname)
    {
        dd($request);
        $user = Auth::user();
        $request->validated($request->all());

        if ($user->hasRole('mentor')) {
            $exitPermission = Note::create([
                // 'user_id' => Auth::user()->id,

                'reason' => $request->reason,
                'date' => $request->date,

                'mentor_id' => Auth::user()->id,
                'student_id' => $request->student_id,
                'class_id' => $request->class_id,
            ]);
        }
        // else // other users
        // {
        //     $exitPermission = Note::create([
        //         // 'user_id' => Auth::user()->id,

        //         'title' => $request->title,
        //         'body' => $request->body,
        //         'admin_role' =>  "",
        //         'target' => $request->target,

        //         'admin_id' => Auth::user()->id,
        //     ]);
        // }
        $year = Year::where('name', $yearname)->first();
        $notes = Note::where('mentor_id', Auth::user()->id)
            ->whereDate('created_at', '>=', $year->year_start)
            ->whereDate('created_at', '<=', $year->year_end)
            // ->whereNotNull('admin_id')
            ->get();
        // return view('Notes.index', compact('yearname', 'year'));
        return route('behavioral-notes', ['yearname' => $yearname, 'notes' => $notes]);
    }

    /**
     * Display the specified resource.
     */
    public function store_note_type(Request $request, $yearname)
    {
        $year = Year::where('name', $yearname)->first();
        $note_type_name = $request->name;
        $note_type_name_exists = NoteType::where('name', $note_type_name)->exists();

        if ($note_type_name_exists) {
            echo "<br>
            <h1 style='font-size: 40px;color: red ;text-align: center;vertical-align: middle;'
            > 😅 مع الأسف 😅</h1>
            <br>
            <h1 style='font-size: 35px;text-align: center;'>
             لايمكن عمل هذا الإجراء لأن اسم نوع الملاحظة هذا موجود مسبقاً بالفعل</h1>";
            echo "<br>";
        } else {
            if (auth()->user()->hasRole('mentor')) {
                $notes_type = NoteType::create([
                    'name' => $request->name
                ]);
            } else {
                echo "<br>
            <h1 style='font-size: 40px;color: red ;text-align: center;vertical-align: middle;'
            > 😅 مع الأسف 😅</h1>
            <br>
            <h1 style='font-size: 35px;text-align: center;'>
             أنت غير قادر على إضافة هذا النوع من الملاحظات لأنك لا تملك الصلاحيات</h1>";
                echo "<br>";
            }
        }

        $notes_types = NoteType::all();

        return redirect()->route('behavioral-notes', ['yearname' => $yearname, 'notes_types' => $notes_types]);
    }
    public function show($yearname, $behavioral_note_id)
    {

        $year = Year::where('name', $yearname)->first();

        $note = Note::where('id', $behavioral_note_id)->first();
        $notes_files_ids = FileNote::where('note_id', $behavioral_note_id)->pluck('file_id');

        // ->pluck('file_id');
        $notes_files = File::findMany($notes_files_ids);
        // $notes_files = File::whereIn('id', $notes_files_ids)->get();

        // dd($notes_files);

        return view("behavioral-notes.show", compact('yearname', 'year', 'note', 'notes_files'));
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
    public function deleteNoteFile($yearname, $file_name, $note_id)
    {
        $year = Year::where('name', $yearname)->first();
        $note = Note::where('id', $note_id)->first();
        $file = File::where('name', $file_name)->latest()->first();
        $fileNote = FileNote::where('note_id', $note_id)
            ->where("file_id", $file->id)->first();
        // dd($fileNote);
        if ($file->user_id == Auth::user()->id /*|| Auth::user()->roles()->first()->name == 'manager'*/) {

            $file_path = public_path('project-files/' . $file->name);

            if (FacadeFile::exists($file_path)) {
                FacadeFile::delete($file_path);
                $file->delete();
            }
            $fileNote->delete();
            $file->delete();

            $note = Note::where('id', $note_id)->first();
            $notes_files_ids = FileNote::where('note_id', $note_id)->pluck('file_id');
            $notes_files = File::findMany($notes_files_ids);

            // dd($notes_files);
            // return view("behavioral-notes.show", compact('yearname', 'year', 'note', 'notes_files'));
            return redirect()->route('behavioral-notes.show', [
                'yearname' => $yearname,
                // 'note' => $note,
                // 'year' => $year,
                'notes_files' => $notes_files,
                'behavioral_note_id' => $note->id
            ]);
        } else {
            $notes = DaySchedule::whereDate('created_at', '>=', $year->year_start)
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
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Note $note, $yearname, $behavioral_note_id)
    {
        $year = Year::where('name', $yearname)->first();
        $note = Note::where('id', $behavioral_note_id)->first();
        $student_ids = ClassStudentSection::where('year_id', $year->id) // or line below 👇
            // ->whereDate('created_at', '>=', $year->year_start)
            // ->whereDate('created_at', '<=', $year->year_end)
            ->pluck('student_id');
        // dd($student_ids);
        $students = Student::findMany($student_ids);
        $classes = SchoolClass::where('year_id', $year->id) // or line below 👇
            // ->whereDate('created_at', '>=', $year->year_start)
            // ->whereDate('created_at', '<=', $year->year_end)
            ->get();

        $student = Student::where("id", $note->student_id)->first();
        return view(
            'behavioral-notes.edit',
            compact(['year', 'yearname', 'note', 'student', 'students', 'classes'])
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateNoteRequest $request, Note $exitPermission, $yearname, $exit_permission_id)  // this work correctly
    // in postman make the method : Post (not patch not put)
    // and make in request body : _method = PUT
    {

        $user = Auth::user();
        $year = Year::where('name', $yearname)->first();
        $exitPermission = Note::where('id', $exit_permission_id)->first();

        if ($user->hasRole('mentor')) {

            $exitPermission->update([
                'reason' => $request->reason,
                'date' => $request->date,

                'mentor_id' => Auth::user()->id,
                'student_id' => $request->student_id,
                'class_id' => $request->class_id,
            ]);
        }
        $notes = Note::where('mentor_id', Auth::user()->id)
            ->whereDate('created_at', '>=', $year->year_start)
            ->whereDate('created_at', '<=', $year->year_end)
            // ->whereNotNull('admin_id')
            ->get();
        $exitPermission->save();

        return redirect()->route('behavioral-notes', ['yearname' => $yearname, 'year' => $year, 'notes' => $notes, 'exit_permission_id' => $exit_permission_id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function store_note_file(Request $request, $yearname, $note_id)
    {
        $year = Year::where('name', $yearname)->first();
        $behavioral_note_id = $note_id;
        $note = Note::where('id', $note_id)->first();
        $file_request = $request->file;

        $file_name = $request->file->getClientOriginalName();

        $request->file->move(public_path('project-files/'), $file_name);

        $file = File::create([
            'name' => $file_name,
            'user_id' => auth()->user()->id,
        ]);
        $noteFile = FileNote::create([
            // 'user_id' => Auth::user()->id,

            'file_id' => $file->id,
            'note_id' => $note_id,
        ]);

        $note = Note::where('id', $note_id)->first();
        $notes_files_ids = FileNote::where('note_id', $note_id)->pluck('file_id');
        $notes_files = File::findMany($notes_files_ids);

        // dd($notes_files);
        // return view("behavioral-notes.show", compact('yearname', 'year', 'note', 'notes_files', 'behavioral_note_id'));
        return redirect()->route('behavioral-notes.show', [
            'yearname' => $yearname,
            // 'note' => $note,
            // 'year' => $year,
            'notes_files' => $notes_files,
            'behavioral_note_id' => $note->id
        ]);
    }
    public function delete_note_type($yearname, $note_type_id)
    {
        $year = Year::where('name', $yearname)->first();
        $note_type = NoteType::find($note_type_id);
        $note_type->delete();
        $notes = Note::where('admin_id', Auth::user()->id)
            ->whereDate('created_at', '>=', $year->year_start)
            ->whereDate('created_at', '<=', $year->year_end)
            // ->whereNotNull('admin_id')
            ->get();
        return redirect()->route('behavioral-notes', ['yearname' => $yearname, 'notes' => $notes]);
    }


    public function destroy(Note $note, $yearname, $note_id)
    {
        $year = Year::where('name', $yearname)->first();
        $note = Note::where('id', $note_id)->first();

        // dd($note);


        if (
            $note->admin_id == Auth::user()->id /*|| Auth::user()->roles()->first()->name == 'manager'*/
        ) {
            $notes_files_ids = FileNote::where('note_id', $note_id)->pluck('file_id');

            // ->pluck('file_id');
            $notes_files = File::findMany($notes_files_ids);
            foreach ($notes_files as $file) {
                $file_path = public_path('project-files/' . $file->name);

                if (FacadeFile::exists($file_path)) {
                    FacadeFile::delete($file_path);
                    $file->delete();
                }
            }
            $note->delete();

            $notes = Note::where('admin_id', Auth::user()->id)
                ->whereDate('created_at', '>=', $year->year_start)
                ->whereDate('created_at', '<=', $year->year_end)
                // ->whereNotNull('admin_id')
                ->get();
            // return view("students.index", compact('year', 'students'));
            return redirect()->route('behavioral-notes', ['yearname' => $yearname, 'notes' => $notes]);
        } else {
            echo "<br>
            <h1 style='font-size: 40px;color: red ;text-align: center;vertical-align: middle;'
            > 😅 مع الأسف 😅</h1>
            <br>
            <h1 style='font-size: 35px;text-align: center;'>
             أنت غير قادر على حذف هذه الملاحظة السلوكية </h1>";
            echo "<br>";
        }

        // way 1 :
        // $note->delete();
        // return $this->success('Note was Deleted Successfuly ',null,204);

        // way 2 : (it is best to do it in Show & Update functions [Implement Private function below] )

        // return $this->isNotAuthorized($note) ? $this->isNotAuthorized($note) : $note->delete();
        // return true (1) if the delete successfuly occoured
    }

    private function isNotAuthorized($note)
    {
        if (Auth::user()->id !== $note->note_id) {
            return $this->error('', 'You are not Authorized to make this request', 403);
        }
    }
}
