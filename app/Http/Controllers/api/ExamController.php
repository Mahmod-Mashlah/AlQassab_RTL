<?php

namespace App\Http\Controllers\api;

use App\Models\Exam;
use Illuminate\Http\Request;
use App\Traits\HttpResponses;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\ExamsResource;
use App\Http\Requests\StoreExamRequest;
use App\Http\Requests\UpdateExamRequest;
use Laratrust\Traits\HasRolesAndPermissions;

class ExamController extends Controller
{
    use HttpResponses;
    use HasRolesAndPermissions;
    public function index()
    {
        $exams = Exam::all();

        return $this->success(
            ExamsResource::collection(
                $exams
            ),
            'الامتحانات',
            //for index relations return that :
            // exam::with('seasons')->get();
        );
        // get return exams thats exams are authenticated
        // Exam::where('exam_id', Auth::user()->id)->get()
    }

    public function store(StoreExamRequest $request)
    {
        $request->validated($request->all());
        $exam = Exam::create([
            // 'user_id' => Auth::class()->id,
            'mark' => $request->mark,

            'subject_id' => $request->subject_id,
            'season_id' => $request->season_id,
            'student_id' => $request->student_id,

        ]);
        return $this->success(
            new ExamsResource($exam),
            "تمت إضافة علامات الامتحان" . /* $request->name .*/ " بنجاح",
        );
    }
    public function show(Exam $exam)
    {
        // without relations :
        //return new ExamsResource($exam);
        // with relations : $exam->load('seasons');
        // like this :
        return $this->success(
            $exam->load(['season', 'student', 'subject']),
            " امتحان " /*. $exam->name*/,
        );
    }
    public function update(UpdateExamRequest $request, Exam $exam)  // this work correctly
    // in postman make the method : Post (not patch not put)
    // and make in request body : _method = PUT
    {
        $exam = Exam::find($exam->id);
        $exam->update($request->all());

        $exam->save();

        return $this->success(
            new ExamsResource($exam),
            "تم تعديل علامات الامتحان" ./* $exam->name .*/ " بنجاح ",
        );
    }
    public function destroy(Exam $exam)
    {
        // way 1 :
        // $year->delete();
        // return $this->success('Year was Deleted Successfuly ',null,204);

        // way 2 : (it is best to do it in Show & Update functions [Implement Private function below] )

        // if ($this->isNotAuthorized($year)) {
        //     $this->isNotAuthorized($year);
        // } else {
        $hmoework = Exam::find($exam->id);
        $exam->delete();

        return $this->success(
            '',
            'تم حذف علامات الامتحان ' /*. $exam_name . ' من الصف ' . $class_name */ . ' بنجاح ',
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
