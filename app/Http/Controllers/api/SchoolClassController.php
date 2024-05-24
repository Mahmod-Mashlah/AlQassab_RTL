<?php

namespace App\Http\Controllers\api;

use App\Models\SchoolClass;
use Illuminate\Http\Request;
use App\Traits\HttpResponses;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laratrust\Traits\HasRolesAndPermissions;
use App\Http\Resources\SchoolClassesResource;
use App\Http\Requests\StoreSchoolClassRequest;
use App\Http\Requests\UpdateSchoolClassRequest;

class SchoolClassController extends Controller
{
    use HttpResponses;
    use HasRolesAndPermissions;
    public function index()
    {
        $classes = SchoolClass::all();

        return $this->success(
            SchoolClassesResource::collection(
                $classes
            ),
            ' الصّفوف',
            //for index relations return that :
            // class::with('seasons')->get();
        );
        // get return classs thats classs are authenticated
        // SchoolClass::where('class_id', Auth::user()->id)->get()
    }

    public function store(StoreSchoolClassRequest $request)
    {
        $request->validated($request->all());
        $class = SchoolClass::create([
            // 'user_id' => Auth::class()->id,
            'name' => $request->name,
            'number' => $request->number,
            'section_count' => $request->section_count,
            'mentor_id' => $request->mentor_id,

        ]);
        return $this->success(
            new SchoolClassesResource($class),
            "تمت إضافة الصف " . $request->name . " بنجاح",
        );
    }
    public function show(SchoolClass $class)
    {
        // without relations :
        //return new SchoolClasssResource($class);
        // with relations : $class->load('seasons');
        // like this :
        return $this->success(
            $class->load(['mentor', 'sections']),
            " الصف " . $class->name,
        );
    }
    public function update(UpdateSchoolClassRequest $request, SchoolClass $class)  // this work correctly
    // in postman make the method : Post (not patch not put)
    // and make in request body : _method = PUT
    {
        $class = SchoolClass::find($class->id);
        $class->update($request->all());

        $class->save();

        return $this->success(
            new SchoolClassesResource($class),
            "تم تعديل الصف " . $class->name . " بنجاح ",
        );
    }
    public function destroy(SchoolClass $class)
    {
        // way 1 :
        // $year->delete();
        // return $this->success('Year was Deleted Successfuly ',null,204);

        // way 2 : (it is best to do it in Show & Update functions [Implement Private function below] )

        // if ($this->isNotAuthorized($year)) {
        //     $this->isNotAuthorized($year);
        // } else {
        $name = $class->name;
        $class->delete();

        return $this->success(
            '',
            'تم حذف الصف ' . $name . ' بنجاح',
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
