<?php

namespace App\Http\Controllers\api;

use App\Models\Homework;
use Illuminate\Http\Request;
use App\Traits\HttpResponses;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\HomeworksResource;
use App\Http\Requests\StoreHomeworkRequest;
use App\Http\Requests\UpdateHomeworkRequest;
use Laratrust\Traits\HasRolesAndPermissions;

class HomeworkController extends Controller
{
    use HttpResponses;
    use HasRolesAndPermissions;
    public function index()
    {
        $homeworks = Homework::all();

        return $this->success(
            HomeworksResource::collection(
                $homeworks
            ),
            'الوظائف',
            //for index relations return that :
            // homework::with('seasons')->get();
        );
        // get return homeworks thats homeworks are authenticated
        // Homework::where('homework_id', Auth::user()->id)->get()
    }

    public function store(StoreHomeworkRequest $request)
    {
        $request->validated($request->all());
        $homework = Homework::create([
            // 'user_id' => Auth::class()->id,
            'mark' => $request->mark,

            'subject_id' => $request->subject_id,
            'season_id' => $request->season_id,
            'student_id' => $request->student_id,

        ]);
        return $this->success(
            new HomeworksResource($homework),
            "تمت إضافة علامات الوظائف  " . /* $request->name .*/ " بنجاح",
        );
    }
    public function show(Homework $homework)
    {
        // without relations :
        //return new HomeworksResource($homework);
        // with relations : $homework->load('seasons');
        // like this :
        return $this->success(
            $homework->load(['season', 'student', 'subject']),
            " وظيفة " . $homework->name,
        );
    }
    public function update(UpdateHomeworkRequest $request, Homework $homework)  // this work correctly
    // in postman make the method : Post (not patch not put)
    // and make in request body : _method = PUT
    {
        $homework = Homework::find($homework->id);
        $homework->update($request->all());

        $homework->save();

        return $this->success(
            new HomeworksResource($homework),
            "تم تعديل علامات الوظائف " ./* $homework->name .*/ " بنجاح ",
        );
    }
    public function destroy(Homework $homework)
    {
        // way 1 :
        // $year->delete();
        // return $this->success('Year was Deleted Successfuly ',null,204);

        // way 2 : (it is best to do it in Show & Update functions [Implement Private function below] )

        // if ($this->isNotAuthorized($year)) {
        //     $this->isNotAuthorized($year);
        // } else {
        $hmoework = Homework::find($homework->id);
        $homework->delete();

        return $this->success(
            '',
            'تم حذف علامات الوظائف ' /*. $homework_name . ' من الصف ' . $class_name */ . ' بنجاح ',
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
