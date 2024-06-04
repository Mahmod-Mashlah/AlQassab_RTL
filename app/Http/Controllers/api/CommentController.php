<?php

namespace App\Http\Controllers\api;

use App\Models\Lesson;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Traits\HttpResponses;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\CommentsResource;
use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use App\Models\User;
use Laratrust\Traits\HasRolesAndPermissions;

class CommentController extends Controller
{
    use HttpResponses;
    use HasRolesAndPermissions;
    public function index()
    {
        $comments = Comment::all();

        return $this->success(
            CommentsResource::collection(
                $comments
            ),
            'الاستفسارات',
            //for index relations return that :
            // comment::with('seasons')->get();
        );
        // get return comments thats comments are authenticated
        // Comment::where('comment_id', Auth::user()->id)->get()
    }

    public function store(StoreCommentRequest $request)
    {
        $request->validated($request->all());
        $comment = Comment::create([
            // 'user_id' => Auth::user()->id,
            'comment' => $request->comment,

            'lesson_id' => $request->lesson_id,
            'student_id' => Auth::user()->id,

        ]);
        return $this->success(
            new CommentsResource($comment),
            "تم إضافة الاستفسار " . /* $request->name .*/ "بنجاح",
        );
    }
    public function show(Comment $comment)
    {

        $student = User::findOrFail($comment->student_id);
        $lesson = Lesson::findOrFail($comment->lesson_id);

        // without relations :
        //return new CommentsResource($comment);
        // with relations : $comment->load('seasons');
        // like this :
        return $this->success(
            [

                'comment' => $comment, //->load(['lesson', 'student']),
                'lesson'  => $lesson,
                'student_name'  => $student->first_name . " " . $student->middle_name . " " . $student->last_name,
                'student'  => $student,
            ],
            " الاستفسار " /*. $comment->name*/,
        );
    }
    public function update(UpdateCommentRequest $request, Comment $comment)  // this work correctly
    // in postman make the method : Post (not patch not put)
    // and make in request body : _method = PUT
    {
        $comment = Comment::find($comment->id);
        $comment->update($request->all());

        $comment->save();

        return $this->success(
            new CommentsResource($comment),
            "تم تعديل الاستفسار" ./* $comment->name .*/ " بنجاح ",
        );
    }
    public function destroy(Comment $comment)
    {
        // way 1 :
        // $year->delete();
        // return $this->success('Year was Deleted Successfuly ',null,204);

        // way 2 : (it is best to do it in Show & Update functions [Implement Private function below] )

        // if ($this->isNotAuthorized($year)) {
        //     $this->isNotAuthorized($year);
        // } else {
        $hmoework = Comment::find($comment->id);
        $comment->delete();

        return $this->success(
            '',
            'تم حذف الاستعلام' /*. $comment_name . ' من الصف ' . $class_name */ . ' بنجاح ',
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
