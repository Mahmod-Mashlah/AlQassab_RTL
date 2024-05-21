<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Traits\HttpResponses;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\ChatsResource;
use App\Http\Requests\StoreChatRequest;
use App\Http\Requests\UpdateChatRequest;

class ChatController extends Controller
{
    use HttpResponses;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $chats = Chat::all();
        return view('chats.index', compact('chats'));
    }

    // public function adminIndex()
    // {
    //     $chats = Advert::all()->where('admin_id', '=', Auth::user()->id);

    //     return
    //         AdvertsResource::collection(
    //             $chats
    //             // Season::where('season_id', Auth::user()->id)->get()
    //         ); // get seasons thats seasons are authenticated
    // }

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

        $chat = Chat::create([
            // 'user_id' => Auth::user()->id,
            'number' => $request->number,
            'chat_start' => $request->chat_start,
            'chat_end' => $request->chat_end,
            'days_number' => $request->days_number,
            'year_id' => $request->year_id,
        ]);

        return new ChatsResource($chat);
    }

    /**
     * Display the specified resource.
     */
    public function show(Chat $chat)
    {
        return new ChatsResource($chat);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Chat $chat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateChatRequest $request, Chat $chat)
    {
        $chat = Chat::find($chat->id);
        $chat->update($request->all());
        $chat->save();

        return new ChatsResource($chat);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Chat $chat)
    {
        // way 1 :
        // $chat->delete();
        // return $this->success('Advert was Deleted Successfuly ',null,204);

        // way 2 : (it is best to do it in Show & Update functions [Implement Private function below] )

        return $this->isNotAuthorized($chat) ? $this->isNotAuthorized($chat) : $chat->delete();
        // return true (1) if the delete successfuly occoured
    }
    private function isNotAuthorized($chat)
    {
        if (Auth::user()->id !== $chat->chat_id) {
            return $this->error('', 'You are not Authorized to make this request', 403);
        }
    }
}
