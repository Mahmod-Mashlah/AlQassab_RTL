<?php

namespace App\Http\Controllers\api;

use App\Models\Test;
use Illuminate\Http\Request;
use App\Traits\HttpResponses;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\TestsResource;
use App\Http\Requests\StoreTestRequest;
use App\Http\Requests\UpdateTestRequest;
use Laratrust\Traits\HasRolesAndPermissions;

class TestController extends Controller
{
    use HttpResponses;
    use HasRolesAndPermissions;
    public function index()
    {
        $tests = Test::all();

        return $this->success(
            TestsResource::collection(
                $tests
            ),
            'المذاكرات',
            //for index relations return that :
            // test::with('seasons')->get();
        );
        // get return tests thats tests are authenticated
        // Test::where('test_id', Auth::user()->id)->get()
    }

    public function store(StoreTestRequest $request)
    {

        $request->validated($request->all());

        $test = Test::where('subject_id', $request->subject_id)
            ->where('season_id', $request->season_id)
            ->where('student_id', $request->student_id)->first();

        $test->update([
            'mark' => $request->mark,
        ]);
        $test->save();

        // $test = Test::create([
        //     // 'user_id' => Auth::class()->id,
        //     'mark' => $request->mark,

        //     'subject_id' => $request->subject_id,
        //     'season_id' => $request->season_id,
        //     'student_id' => $request->student_id,

        // ]);
        return $this->success(
            new TestsResource($test),
            "تمت إضافة علامات المذاكرات" . /* $request->name .*/ " بنجاح",
        );
    }
    public function show(Test $test)
    {
        // without relations :
        //return new TestsResource($test);
        // with relations : $test->load('seasons');
        // like this :
        return $this->success(
            $test->load(['season', 'student', 'subject']),
            " مذاكرة " /*. $test->name*/,
        );
    }
    public function update(UpdateTestRequest $request, Test $test)  // this work correctly
    // in postman make the method : Post (not patch not put)
    // and make in request body : _method = PUT
    {
        $test = Test::find($test->id);
        $test->update($request->all());

        $test->save();

        return $this->success(
            new TestsResource($test),
            "تم تعديل علامات المذاكرات " ./* $test->name .*/ "بنجاح ",
        );
    }
    public function destroy(Test $test)
    {
        // way 1 :
        // $year->delete();
        // return $this->success('Year was Deleted Successfuly ',null,204);

        // way 2 : (it is best to do it in Show & Update functions [Implement Private function below] )

        // if ($this->isNotAuthorized($year)) {
        //     $this->isNotAuthorized($year);
        // } else {
        $test = Test::find($test->id);
        $test->delete();

        return $this->success(
            '',
            'تم حذف علامات المذاكرات ' /*. $test_name . ' من الصف ' . $class_name */ . ' بنجاح ',
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
