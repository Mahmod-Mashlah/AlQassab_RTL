<?php

namespace App\Http\Controllers\api;

use App\Models\protest;
use Illuminate\Http\Request;
use App\Traits\HttpResponses;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProtestRequest;
use App\Http\Requests\UpdateProtestRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\ProtestsResource;

class ProtestController extends Controller
{
    use HttpResponses;

    public function index()
    {
        $protests = Protest::all();

        return
            ProtestsResource::collection(
                $protests->where('user_id', Auth::user()->id)

                // Season::where('season_id', Auth::user()->id)->get()
            ); // get seasons thats seasons are authenticated

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
    public function store(StoreProtestRequest $request)
    {
        $request->validated($request->all());

        $protest = Protest::create([
            // 'user_id' => Auth::user()->id,

            'title' => $request->title,
            'body' => $request->body,

            'user_id' => Auth::user()->id,

        ]);

        return new ProtestsResource($protest);
    }

    /**
     * Display the specified resource.
     */
    public function show(Protest $protest)
    {
        // return new ProtestsResource($protest);
        return response()->json($protest->load('user'), 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Protest $protest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProtestRequest $request, Protest $protest)
    {
        // in postman make the method : Post (not patch not put)
        // and make in request body : _method = PUT
        {
            $protest = Protest::find($protest->id);
            $protest->update($request->all());
            $protest->save();

            return new ProtestsResource($protest);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Protest $protest)
    {
        // way 1 :
        // $protest->delete();
        // return $this->success('Protest was Deleted Successfuly ',null,204);
        return $this->success('', 'تم حذف الشكوى بنجاح ', 200);
        // way 2 : (it is best to do it in Show & Update functions [Implement Private function below] )
    }

    private function isNotAuthorized($protest)
    {
        if (Auth::user()->id !== $protest->protest_id) {
            return $this->error('', 'You are not Authorized to make this request', 403);
        }
    }
}
