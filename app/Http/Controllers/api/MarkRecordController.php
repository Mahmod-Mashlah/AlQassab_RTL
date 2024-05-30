<?php

namespace App\Http\Controllers\api;

use App\Models\Exam;
use App\Models\Test;
use App\Models\User;
use App\Models\Homework;
use App\Models\MarkRecord;
use Illuminate\Http\Request;
use App\Traits\HttpResponses;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\MarkRecordsResource;
use Laratrust\Traits\HasRolesAndPermissions;
use App\Http\Requests\StoreMarkRecordRequest;
use App\Http\Requests\UpdateMarkRecordRequest;
use App\Models\Subject;
use App\Models\Year;

class MarkRecordController extends Controller
{
    use HttpResponses;
    use HasRolesAndPermissions;
    public function index()
    {
        $markRecords = MarkRecord::all();

        return $this->success(
            MarkRecordsResource::collection(
                $markRecords
            ),
            'سجلات العلامات',
            //for index relations return that :
            // markRecord::with('seasons')->get();
        );
        // get return markRecords thats markRecords are authenticated
        // MarkRecord::where('markRecord_id', Auth::user()->id)->get()
    }

    public function show($id)
    {
        $markRecord = MarkRecord::find($id);

        $homework1 = Homework::find($markRecord->homework1_id);
        $homework2 = Homework::find($markRecord->homework2_id);

        $test1 = Test::find($markRecord->test1_id);
        $test2 = Test::find($markRecord->test2_id);

        $exam1 = Exam::find($markRecord->exam1_id);
        $exam2 = Exam::find($markRecord->exam2_id);

        // without relations :
        //return new MarkRecordsResource($markRecord);
        // with relations : $markRecord->load('seasons');
        // like this :
        return $this->success(
            [
                'mark' => $markRecord->load([
                    'year', 'subject', 'student',
                ]),

                'homework1' => $homework1,
                'test1' => $test1,
                'exam1' => $exam1,

                'test2' => $test2,
                'homework2' => $homework2,
                'exam2' => $exam2,
            ],
            " سجلات العلامات " /*. $markRecord->name*/,
        );
    }
    public function showByYear_Student($year_id, $student_id)
    {
        $year = Year::find($year_id);
        $student = User::find($student_id);

        $markRecord =
            MarkRecord::where('student_id', $student_id)
            ->where('year_id', $year_id)
            ->get();
        return $this->success(
            [
                'year' => $year,
                'student' => $student,
                'marks' => $markRecord->load('subject')
            ],
            "علامات الطالب "
                . $student->first_name . ' ' . $student->middle_name . ' ' . $student->last_name . ' في سنة ' . $year->name,
        );
    }
    public function showByYear_Student_subject($year_id, $student_id, $subject_id)
    {
        $student = User::find($student_id);
        $year = Year::find($year_id);
        $subject = Subject::find($subject_id);
        $markRecord =
            MarkRecord::where('student_id', $student_id)
            ->where('year_id', $year_id)
            ->where('subject_id', $subject_id)
            ->first();

        $homework1 = Homework::find($markRecord->homework1_id);
        $homework2 = Homework::find($markRecord->homework2_id);

        $test1 = Test::find($markRecord->test1_id);
        $test2 = Test::find($markRecord->test2_id);

        $exam1 = Exam::find($markRecord->exam1_id);
        $exam2 = Exam::find($markRecord->exam2_id);


        return $this->success(
            [
                'year' => $year,
                'student' => $student,
                'subject' => $subject->load('class'),
                'marks' => $markRecord,
                'marks_details' => [
                    'homework1' => $homework1,
                    'test1' => $test1,
                    'exam1' => $exam1,

                    'homework2' => $homework2,
                    'test2' => $test2,
                    'exam2' => $exam2,
                ]
            ],
            "علامة الطالب " . $student->first_name . ' ' . $student->middle_name . ' ' . $student->last_name
                . ' في سنة ' . $year->name
                . ' في مادة ' . $subject->name,
        );
    }
    public function destroy(MarkRecord $markRecord)
    {
        // way 1 :
        // $year->delete();
        // return $this->success('Year was Deleted Successfuly ',null,204);

        // way 2 : (it is best to do it in Show & Update functions [Implement Private function below] )

        // if ($this->isNotAuthorized($year)) {
        //     $this->isNotAuthorized($year);
        // } else {
        $markRecord = MarkRecord::find($markRecord->id);
        $markRecord->delete();

        return $this->success(
            '',
            'تم حذف علامات الوظائف ' /*. $markRecord_name . ' من الصف ' . $class_name */ . ' بنجاح ',
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
