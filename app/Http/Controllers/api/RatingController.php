<?php

namespace App\Http\Controllers\api;

use App\Models\Rating;
use Illuminate\Http\Request;
use App\Traits\HttpResponses;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\RatingsResource;
use App\Http\Requests\StoreRatingRequest;
use App\Http\Requests\UpdateRatingRequest;
use App\Models\Lesson;
use App\Models\Subject;
use Laratrust\Traits\HasRolesAndPermissions;

class RatingController extends Controller
{
    use HttpResponses;
    use HasRolesAndPermissions;
    public function index()
    {
        $ratings = Rating::all();

        return $this->success(
            RatingsResource::collection(
                $ratings
            ),
            'التقييمات',
            //for index relations return that :
            // rating::with('seasons')->get();
        );
        // get return ratings thats ratings are authenticated
        // Rating::where('rating_id', Auth::user()->id)->get()
    }

    public function store(StoreRatingRequest $request)
    {
        $lesson = Lesson::findOrFail($request->lesson_id);

        $request->validated($request->all());
        $rating = Rating::create([
            // 'user_id' => Auth::class()->id,

            'rating' => $request->rating,

            'student_id' => Auth::user()->id,
            'lesson_id' => $request->lesson_id,
        ]);
        return $this->success(
            new RatingsResource($rating),
            "تم إضافة التقييم " . $request->rating . " للحصة " . $lesson->lecture_number . " بنجاح",
        );
    }
    public function show(Rating $rating)
    {
        $lesson = Lesson::findOrFail($rating->lesson_id);
        $subject = Subject::findOrFail($lesson->subject_id);
        // without relations :
        //return new RatingsResource($rating);
        // with relations : $rating->load('seasons');
        // like this :
        return $this->success(
            [
                'rating' => $rating->load(['student', 'lesson']),
                'subject' => $subject,
            ],
            " تقييم الحصة " /*. $rating->name*/,
        );
    }
    public function update(UpdateRatingRequest $request, Rating $rating)  // this work correctly
    // in postman make the method : Post (not patch not put)
    // and make in request body : _method = PUT
    {
        $rating = Rating::find($rating->id);
        $rating->update($request->all());

        $rating->save();

        return $this->success(
            new RatingsResource($rating),
            "تم تعديل تقييم الحصة " ./* $rating->name .*/ "بنجاح ",
        );
    }
    public function destroy(Rating $rating)
    {
        // way 1 :
        // $year->delete();
        // return $this->success('Year was Deleted Successfuly ',null,204);

        // way 2 : (it is best to do it in Show & Update functions [Implement Private function below] )

        // if ($this->isNotAuthorized($year)) {
        //     $this->isNotAuthorized($year);
        // } else {
        $hmoework = Rating::find($rating->id);
        $rating->delete();

        return $this->success(
            '',
            'تم حذف التقييم ' /*. $rating_name . ' من الصف ' . $class_name */ . 'بنجاح ',
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
