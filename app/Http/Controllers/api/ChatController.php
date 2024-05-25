<?php

namespace App\Http\Controllers\api;

use App\Models\User;
use App\Models\Chat;
use Illuminate\Http\Request;
use App\Traits\HttpResponses;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\ChatsResource;
use App\Http\Resources\ProtestsResource;
use App\Http\Requests\StoreChatRequest;
use App\Http\Requests\UpdateChatRequest;
use Laratrust\Traits\HasRolesAndPermissions;

class ChatController extends Controller
{
    use HttpResponses;
    use HasRolesAndPermissions;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $chats = Chat::all();

        return $this->success(ChatsResource::collection($chats), 'غرف المناقشة', 200);


        // Season::where('season_id', Auth::user()->id)->get()
        // get seasons thats seasons are authenticated
    }

    public function adminIndex()
    {
        $chats = Chat::all()->where('admin_id', '=', Auth::user()->id);
        $admin = Auth::user();
        $admin_fullname = $admin->first_name . ' ' . $admin->middle_name . ' ' . $admin->last_name;
        return  $this->success([
            'admin_name' => $admin_fullname,
            'chats' => ChatsResource::collection(
                $chats
            ),
        ], 'غرف المناقشة الخاصة بـ' . $admin_fullname, 200);

        // Season::where('season_id', Auth::user()->id)->get()
        // get seasons thats seasons are authenticated
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreChatRequest $request)
    {
        $request->validated($request->all());
        $user = Auth::user();
        $admin_fullname = $user->first_name . ' ' . $user->middle_name . ' ' . $user->last_name;

        if ($user->hasRole(['manager'])) {
            $firstRoleName = 'manager';
        } elseif ($user->hasRole(['mentor'])) {
            $firstRoleName = 'mentor';
        } elseif ($user->hasRole(['teacher'])) {
            $firstRoleName = 'teacher';
        } else {
            $firstRoleName = 'you dont hava permissions to do this !!';
            return $this->error('', 'you dont hava permissions to do this !!', 401);
        }
        // $firstRole = $user->roles->first();
        // $firstRoleName = $firstRole->name;
        $chat = Chat::create([
            // 'user_id' => Auth::user()->id,

            'summery' => $request->summery,
            'target' => $request->target,


            'admin_id' => $user->id,

            'admin_role' => $firstRoleName,

        ]);

        return $this->success(
            [
                'chat' => new ChatsResource($chat),
                'admin_name' => $admin_fullname,
            ],
            "تمت إضافة غرفة المناقشة " . " بنجاح",
            200
        );
    }


    /**
     * Display the specified resource.
     */
    public function show(Chat $chat)
    {
        $admin = User::find($chat->admin_id);
        // return new ProtestsResource($chat);

        return $this->success(
            [
                'chat' => $chat,
                'admin_name' => $admin->first_name . ' ' . $admin->middle_name . ' ' . $admin->last_name,
            ],
            " معلومات غرفة المناقشة ",
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(chat $chat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateChatRequest $request, Chat $chat)
    {
        $user = Auth::user();

        if ($user->hasRole(['manager'])) {
            $firstRoleName = 'manager';
        } elseif ($user->hasRole(['mentor'])) {
            $firstRoleName = 'mentor';
        } elseif ($user->hasRole(['teacher'])) {
            $firstRoleName = 'teacher';
        } else {
            $firstRoleName = 'you dont hava permissions to do this !!';
            return $this->error('', 'you dont hava permissions to do this !!', 401);
        }
        $chat = Chat::find($chat->id);
        $chat->update($request->all());
        $chat->save();

        return $this->success(
            new ChatsResource($chat),
            "تم تعديل غرفة المناقشة " . " بنجاح",
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Chat $chat)
    {
        // way 1 :
        // $chat->delete();
        // return $this->success('Advert was Deleted Successfuly ',null,204);
        // return $this->success(['id' => $chat->id], 'تم حذف الشكوى بنجاح ', 200);
        // way 2 : (it is best to do it in Show & Update functions [Implement Private function below] )

        if ($this->isNotAuthorized($chat)) {
            return  $this->isNotAuthorized($chat);
        } else {
            $chat->delete();
            return $this->success(['id' => $chat->id], 'تم حذف المناقشة بنجاح ', 200);
        }
    }
    private function isNotAuthorized($chat)
    {
        if (Auth::user()->id !== $chat->admin_id) {
            return $this->error('', 'You are not Authorized to make this request', 403);
        }
    }
}
