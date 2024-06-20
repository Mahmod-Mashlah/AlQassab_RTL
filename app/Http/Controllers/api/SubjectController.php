<?php

namespace App\Http\Controllers\api;

use App\Models\Subject;
use Illuminate\Http\Request;
use App\Traits\HttpResponses;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\SubjectsResource;
use App\Http\Requests\StoreSubjectRequest;
use App\Http\Requests\UpdateSubjectRequest;
use App\Models\SchoolClass;
use App\Models\Student;
use App\Models\User;
use Laratrust\Traits\HasRolesAndPermissions;

class SubjectController extends Controller
{
    use HttpResponses;
    use HasRolesAndPermissions;
    public function index()
    {
        $subjects = Subject::all();

        return $this->success(
            SubjectsResource::collection(
                $subjects
            ),
            'المواد',
            //for index relations return that :
            // subject::with('seasons')->get();
        );
        // get return subjects thats subjects are authenticated
        // Subject::where('subject_id', Auth::user()->id)->get()
    }

    public function store(StoreSubjectRequest $request)
    {
        $request->validated($request->all());
        $subject = Subject::create([
            // 'user_id' => Auth::class()->id,
            'name' => $request->name,
            'min' => $request->min,
            'max' => $request->max,

            'school_class_id' => $request->school_class_id,
            'teacher_id' => $request->teacher_id,

        ]);
        return $this->success(
            new SubjectsResource($subject),
            "تمت إضافة مادة " . $request->name . " بنجاح",
        );
    }
    public function showByTeacher($teacher_id)
    {
        $teacher = User::find($teacher_id);
        $subjects = Subject::where('teacher_id', $teacher_id)->get();

        return $this->success(
            [
                'teacher' => $teacher,
                'subjects' => $subjects->load('class')
            ],
            "مواد الأستاذ "
                . $teacher->first_name . ' ' . $teacher->last_name,
        );
    }
    public function showStudents($subject_id)
    {

        $subject = Subject::where('id', $subject_id)->first();
        $class = $subject->class;
        $students = Student::where('class_id', $class->id)
            ->join('users', 'user_id', '=', 'users.id')->get();

        return $this->success(
            [
                'subject' => $subject,
                'students' => $students
            ],
            "طلاب مادة "
                . $subject->name,
        );
    }

    public function show(Subject $subject)
    {
        // without relations :
        //return new SubjectsResource($subject);
        // with relations : $subject->load('seasons');
        // like this :
        return $this->success(
            $subject->load(['class', 'teacher']),
            " مادة " . $subject->name,
        );
    }
    public function update(UpdateSubjectRequest $request, Subject $subject)  // this work correctly
    // in postman make the method : Post (not patch not put)
    // and make in request body : _method = PUT
    {
        $subject = Subject::find($subject->id);
        $subject->update($request->all());

        $subject->save();

        return $this->success(
            new SubjectsResource($subject),
            "تم تعديل مادة " . $subject->name . " بنجاح ",
        );
    }
    public function destroy(Subject $subject)
    {
        // way 1 :
        // $year->delete();
        // return $this->success('Year was Deleted Successfuly ',null,204);

        // way 2 : (it is best to do it in Show & Update functions [Implement Private function below] )

        // if ($this->isNotAuthorized($year)) {
        //     $this->isNotAuthorized($year);
        // } else {
        $subject_name = $subject->name;
        $class = SchoolClass::find($subject->school_class_id);
        $class_name = $class->name;
        $subject->delete();

        return $this->success(
            '',
            'تم حذف مادة ' . $subject_name . ' من الصف ' . $class_name . ' بنجاح ',
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
