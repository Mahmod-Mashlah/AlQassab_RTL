<?php

namespace App\Http\Controllers\api;

use App\Models\Lesson;
use App\Models\Subject;
use App\Models\SchoolClass;
use Illuminate\Http\Request;
use App\Traits\HttpResponses;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\LessonsResource;
use App\Http\Requests\StoreLessonRequest;
use App\Http\Requests\UpdateLessonRequest;
use Laratrust\Traits\HasRolesAndPermissions;

class LessonController extends Controller
{
    use HttpResponses;
    use HasRolesAndPermissions;
    public function index()
    {
        $lessons = Lesson::all();

        return $this->success(
            LessonsResource::collection(
                $lessons
            ),
            'الحصص الدراسية',
            //for index relations return that :
            // lesson::with('seasons')->get();
        );
        // get return lessons thats lessons are authenticated
        // Lesson::where('lesson_id', Auth::user()->id)->get()
    }

    public function store(StoreLessonRequest $request)
    {
        $request->validated($request->all());
        $lesson = Lesson::create([
            // 'user_id' => Auth::class()->id,

            'lecture_number' => $request->lecture_number,
            'date' => $request->date,
            'summery' => $request->summery,
            'ideas' => $request->ideas,

            'subject_id' => $request->subject_id,
            'teacher_id' => Auth::user()->id,

        ]);
        return $this->success(
            new LessonsResource($lesson),
            "تمت إضافة الحصة " .  $request->lecture_number . " بنجاح",
        );
    }
    public function showBySubject($subject_id)
    {
        $subject = Subject::find($subject_id);
        $class = SchoolClass::findOrFail($subject->school_class_id);

        $lessons =
            Lesson::where('subject_id', $subject_id)
            ->get();
        return $this->success(
            [
                'class' => $class,
                'subject' => $subject,
                'lessons' => $lessons->load('teacher')
            ],
            "حصص مادة "
                . $subject->name,
        );
    }
    public function show(Lesson $lesson)
    {
        $subject = Subject::findOrFail($lesson->subject_id);
        $class = SchoolClass::findOrFail($subject->school_class_id);

        $lesson_Comments = $lesson->comments;

        // Rating :
        $ratings = DB::table('ratings')
            // ->where('rating', '>=', 1)
            // ->where('rating', '<=', 5)
            ->where('lesson_id', $lesson->id)
            ->whereNotNull('rating');

        // $sum = DB::table('ratings')
        // // ->where('rating', '>=', 1)
        // //->where('rating', '<=', 5)
        // ->where('lesson_id',  $lesson->id)
        // ->whereNotNull('rating')
        // ->sum('rating');
        $sum = $ratings->sum('rating');

        // $count = DB::table('ratings')
        // ->where('lesson_id',  $lesson->id)
        // ->whereNotNull('rating')
        // ->count('rating');
        $count = $ratings->count('rating');

        $result = $sum / $count;

        $ratingPercent = round($result / 5 * 100, 1);

        // without relations :
        //return new LessonsResource($lesson);
        // with relations : $lesson->load('seasons');
        // like this :
        return $this->success(
            [

                'lesson' => $lesson->load(['teacher', 'subject']),
                'ratingPercent' => $ratingPercent . "%",
                'class' => $class,
                'comments' => $lesson_Comments,
            ],
            " الحصة " . $lesson->lecture_number,
        );
    }
    public function update(UpdateLessonRequest $request, Lesson $lesson)  // this work correctly
    // in postman make the method : Post (not patch not put)
    // and make in request body : _method = PUT
    {
        $lesson = Lesson::find($lesson->id);
        $lesson->update($request->all());

        $lesson->save();

        return $this->success(
            new LessonsResource($lesson),
            "تم تعديل الحصة " . $lesson->lecture_number . " بنجاح ",
        );
    }
    public function destroy(Lesson $lesson)
    {
        // way 1 :
        // $year->delete();
        // return $this->success('Year was Deleted Successfuly ',null,204);

        // way 2 : (it is best to do it in Show & Update functions [Implement Private function below] )

        // if ($this->isNotAuthorized($year)) {
        //     $this->isNotAuthorized($year);
        // } else {
        $hmoework = Lesson::find($lesson->id);
        $lesson->delete();

        return $this->success(
            '',
            'تم حذف الحصة ' . $lesson->lecture_number . ' بنجاح ',
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
