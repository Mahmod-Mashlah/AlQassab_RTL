<?php

namespace App\Http\Controllers\api;

use App\Models\User;
use App\Models\Reply;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Traits\HttpResponses;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\RepliesResource;
use App\Http\Requests\StoreReplyRequest;
use App\Http\Requests\UpdateReplyRequest;
use Laratrust\Traits\HasRolesAndPermissions;

class ReplyController extends Controller
{
    use HttpResponses;
    use HasRolesAndPermissions;
    public function index()
    {
        $replies = Reply::all();

        return $this->success(
            RepliesResource::collection(
                $replies
            ),
            'الردود',
            //for index relations return that :
            // reply::with('seasons')->get();
        );
        // get return replies thats replies are authenticated
        // Reply::where('reply_id', Auth::user()->id)->get()
    }

    public function store(StoreReplyRequest $request)
    {
        $request->validated($request->all());
        $reply = Reply::create([
            // 'user_id' => Auth::user()->id,
            'reply' => $request->reply,

            'comment_id' => $request->comment_id,
            'teacher_id' => Auth::user()->id,

        ]);
        return $this->success(
            new RepliesResource($reply),
            "تم إضافة الرد " . /* $request->name .*/ "بنجاح",
        );
    }
    public function show($comment_id)
    {

        $comment = Comment::findOrFail($comment_id);
        $reply = Reply::where('comment_id', $comment->id)->first();
        $teacher = User::findOrFail($reply->teacher_id);

        // without relations :
        //return new RepliesResource($reply);
        // with relations : $reply->load('seasons');
        // like this :
        return $this->success(
            [

                'comment'  => $comment,
                'reply' => $reply, //->load(['comment', 'teacher']),
                'teacher_name'  => $teacher->first_name . " " . $teacher->middle_name . " " . $teacher->last_name,
                'teacher'  => $teacher,
            ],
            " الرد " /*. $reply->name*/,
        );
    }
    public function update(UpdateReplyRequest $request, Reply $reply)  // this work correctly
    // in postman make the method : Post (not patch not put)
    // and make in request body : _method = PUT
    {
        $reply = Reply::find($reply->id);
        $reply->update($request->all());

        $reply->save();

        return $this->success(
            new RepliesResource($reply),
            "تم تعديل الرد" ./* $reply->name .*/ " بنجاح ",
        );
    }
    public function destroy(Reply $reply)
    {
        // way 1 :
        // $year->delete();
        // return $this->success('Year was Deleted Successfuly ',null,204);

        // way 2 : (it is best to do it in Show & Update functions [Implement Private function below] )

        // if ($this->isNotAuthorized($year)) {
        //     $this->isNotAuthorized($year);
        // } else {
        // $hmoework = Reply::find($reply->id);
        $reply->delete();

        return $this->success(
            '',
            'تم حذف الرد' /*. $reply_name . ' من الصف ' . $class_name */ . ' بنجاح ',
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
