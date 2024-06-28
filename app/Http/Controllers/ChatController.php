<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\Year;
use App\Traits\HttpResponses;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\ChatsResource;
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


    public function index($yearname)
    {
        $year = Year::where('name', $yearname)->first();

        $chats = Chat::where('admin_id', Auth::user()->id)
            ->whereDate('created_at', '>=', $year->year_start)
            ->whereDate('created_at', '<=', $year->year_end)
            // ->whereNotNull('admin_id')
            ->get();

        // $chat = $chats->first();
        // dd($chat->user->first_name);
        return view('chats.index', compact('yearname', 'year', 'chats'));
        // return redirect()->route('chats', ['yearname' => $yearname, 'chats' => $chats]);
    }
    // public function adminIndex()
    // {
    //     $chats = Chat::all()->where('admin_id', '=', Auth::user()->id);

    //     return
    //         ChatsResource::collection(
    //             $chats
    //             // Season::where('season_id', Auth::user()->id)->get()
    //         ); // get seasons thats seasons are authenticated
    // }
    /**
     * Show the form for creating a new resource.
     */
    public function create($yearname)
    {
        $year = Year::where('name', $yearname)->first();
        // $student_ids = ClassStudentSection::where('year_id', $year->id) // or line below 👇
        //     // ->whereDate('created_at', '>=', $year->year_start)
        //     // ->whereDate('created_at', '<=', $year->year_end)
        //     ->pluck('student_id');
        // // dd($student_ids);
        // $students = Student::findMany($student_ids);
        // // dd($students);
        // $classes = SchoolClass::where('year_id', $year->id) // or line below 👇
        //     // ->whereDate('created_at', '>=', $year->year_start)
        //     // ->whereDate('created_at', '<=', $year->year_end)
        //     ->get();
        return view('chats.add', compact('year', 'yearname'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreChatRequest $request, $yearname)
    {
        // dd($request);
        $user = Auth::user();
        $request->validated($request->all());

        if ($user->hasRole('manager')) {
            $chat = Chat::create([
                // 'user_id' => Auth::user()->id,

                'summery' => $request->summery,
                'target' => $request->target,

                'admin_id' => Auth::user()->id,
                'admin_role' => "manager",
            ]);
        }
        // else // other users
        // {
        //     $chat = Chat::create([
        //         // 'user_id' => Auth::user()->id,

        //         'title' => $request->title,
        //         'body' => $request->body,
        //         'admin_role' =>  "",
        //         'target' => $request->target,

        //         'admin_id' => Auth::user()->id,
        //     ]);
        // }
        $year = Year::where('name', $yearname)->first();
        $chats = Chat::where('admin_id', Auth::user()->id)
            ->whereDate('created_at', '>=', $year->year_start)
            ->whereDate('created_at', '<=', $year->year_end)
            // ->whereNotNull('admin_id')
            ->get();
        // return view('Chats.index', compact('yearname', 'year'));
        return redirect()->route('chats', ['yearname' => $yearname, 'chats' => $chats]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Chat $chat, $yearname, $chat_id)
    {

        $year = Year::where('name', $yearname)->first();

        $chat = Chat::where('id', $chat_id)->first();

        return view("chats.show", compact('yearname', 'year', 'chat'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Chat $chat, $yearname, $chat_id)
    {
        $year = Year::where('name', $yearname)->first();
        $chat = Chat::where('id', $chat_id)->first();
        // $student_ids = ClassStudentSection::where('year_id', $year->id) // or line below 👇
        //     // ->whereDate('created_at', '>=', $year->year_start)
        //     // ->whereDate('created_at', '<=', $year->year_end)
        //     ->pluck('student_id');
        // // dd($student_ids);
        // $students = Student::findMany($student_ids);
        // $classes = SchoolClass::where('year_id', $year->id) // or line below 👇
        //     // ->whereDate('created_at', '>=', $year->year_start)
        //     // ->whereDate('created_at', '<=', $year->year_end)
        //     ->get();

        // $student = Student::where("id", $chat->student_id)->first();
        return view(
            'chats.edit',
            compact(['year', 'yearname', 'chat'])
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateChatRequest $request, Chat $chat, $yearname, $chat_id)  // this work correctly
    // in postman make the method : Post (not patch not put)
    // and make in request body : _method = PUT
    {

        $user = Auth::user();
        $year = Year::where('name', $yearname)->first();
        $chat = Chat::where('id', $chat_id)->first();

        if ($user->hasRole('manager')) {

            $chat->update([
                'summery' => $request->summery,
                'target' => $request->target,

                'admin_id' => Auth::user()->id,
                'admin_role' => "manager",
            ]);
        }
        $chats = Chat::where('admin_id', Auth::user()->id)
            ->whereDate('created_at', '>=', $year->year_start)
            ->whereDate('created_at', '<=', $year->year_end)
            // ->whereNotNull('admin_id')
            ->get();
        $chat->save();

        return redirect()->route('chats', ['yearname' => $yearname, 'year' => $year, 'chats' => $chats, 'chat_id' => $chat_id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Chat $chat, $yearname, $chat_id)
    {
        $year = Year::where('name', $yearname)->first();
        $chat = Chat::where('id', $chat_id)->first();

        // dd($chat);


        if (
            $chat->admin_id == Auth::user()->id /*|| Auth::user()->roles()->first()->name == 'manager'*/
        ) {

            $chat->delete();

            $chats = Chat::where('admin_id', Auth::user()->id)
                ->whereDate('created_at', '>=', $year->year_start)
                ->whereDate('created_at', '<=', $year->year_end)
                // ->whereNotNull('admin_id')
                ->get();
            // return view("students.index", compact('year', 'students'));
            return redirect()->route('chats', ['yearname' => $yearname, 'chats' => $chats]);
        } else {
            echo "<br>
            <h1 style='font-size: 40px;color: red ;text-align: center;vertical-align: middle;'
            > 😅 مع الأسف 😅</h1>
            <br>
            <h1 style='font-size: 35px;text-align: center;'>
             أنت غير قادر على حذف هذه المناقشة لأنك لست  مدير المدرسة </h1>";
            echo "<br>";
        }

        // way 1 :
        // $chat->delete();
        // return $this->success('Chat was Deleted Successfuly ',null,204);

        // way 2 : (it is best to do it in Show & Update functions [Implement Private function below] )

        // return $this->isNotAuthorized($chat) ? $this->isNotAuthorized($chat) : $chat->delete();
        // return true (1) if the delete successfuly occoured
    }

    private function isNotAuthorized($chat)
    {
        if (Auth::user()->id !== $chat->chat_id) {
            return $this->error('', 'You are not Authorized to make this request', 403);
        }
    }
}
