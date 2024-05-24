<?php

namespace App\Http\Controllers\api;

use App\Models\Section;
use Illuminate\Http\Request;
use App\Traits\HttpResponses;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\SectionsResource;
use App\Http\Requests\StoreSectionRequest;
use App\Http\Requests\UpdateSectionRequest;
use Laratrust\Traits\HasRolesAndPermissions;

class SectionController extends Controller
{
    use HttpResponses;
    use HasRolesAndPermissions;
    public function index()
    {
        $sections = Section::all();

        return $this->success(
            SectionsResource::collection(
                $sections
            ),
            ' الشعب',
            //for index relations return that :
            // section::with('seasons')->get();
        );
        // get return sections thats sections are authenticated
        // Section::where('section_id', Auth::user()->id)->get()
    }

    public function store(StoreSectionRequest $request)
    {
        $request->validated($request->all());
        $section = Section::create([
            // 'user_id' => Auth::class()->id,
            'section_number' => $request->section_number,
            'max_students_number' => $request->max_students_number,
            'class_id' => $request->class_id,

        ]);
        return $this->success(
            new SectionsResource($section),
            "تمت إضافة الشعبة " . $request->section_number . " بنجاح",
        );
    }
    public function show(Section $section)
    {
        // without relations :
        //return new SectionsResource($section);
        // with relations : $section->load('seasons');
        // like this :
        return $this->success(
            $section->load(['class']),
            " الشعبة " . $section->section_number,
        );
    }
    public function update(UpdateSectionRequest $request, Section $section)  // this work correctly
    // in postman make the method : Post (not patch not put)
    // and make in request body : _method = PUT
    {
        $section = Section::find($section->id);
        $section->update($request->all());

        $section->save();

        return $this->success(
            new SectionsResource($section),
            "تم تعديل الشعبة " . $section->section_number . " بنجاح ",
        );
    }
    public function destroy(Section $section)
    {
        // way 1 :
        // $year->delete();
        // return $this->success('Year was Deleted Successfuly ',null,204);

        // way 2 : (it is best to do it in Show & Update functions [Implement Private function below] )

        // if ($this->isNotAuthorized($year)) {
        //     $this->isNotAuthorized($year);
        // } else {
        $name = $section->name;
        $section->delete();

        return $this->success(
            '',
            'تم حذف الشعبة ' . $name . ' بنجاح',
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
