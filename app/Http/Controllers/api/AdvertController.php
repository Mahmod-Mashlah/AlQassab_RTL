<?php

namespace App\Http\Controllers\api;

use App\Models\User;
use App\Models\Advert;
use Illuminate\Http\Request;
use App\Traits\HttpResponses;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\AdvertsResource;
use App\Http\Resources\ProtestsResource;
use App\Http\Requests\StoreAdvertRequest;
use App\Http\Requests\UpdateAdvertRequest;
use Laratrust\Traits\HasRolesAndPermissions;

class AdvertController extends Controller
{
    use HttpResponses;
    use HasRolesAndPermissions;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $adverts = Advert::all();

        return response()->json([
            'adverts' => AdvertsResource::collection($adverts),

        ], 200);

        // Season::where('season_id', Auth::user()->id)->get()
        // get seasons thats seasons are authenticated

    }
    public function adminIndex()
    {
        $adverts = Advert::all()->where('admin_id', '=', Auth::user()->id);
        $admin = Auth::user();

        return response()->json([
            'admin_name' => $admin->first_name . ' ' . $admin->middle_name . ' ' . $admin->last_name,
            'adverts' => AdvertsResource::collection(
                $adverts
            ),


        ], 200);
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
    public function store(StoreAdvertRequest $request)
    {
        $request->validated($request->all());
        $user = Auth::user();

        if ($user->hasRole(['manager'])) {
            $firstRoleName = 'manager';
        } elseif ($user->hasRole(['mentor'])) {
            $firstRoleName = 'mentor';
        } else {
            $firstRoleName = 'you dont hava permissions to do this !!';
            return $this->error('', 'you dont hava permissions to do this !!', 401);
        }
        // $firstRole = $user->roles->first();
        // $firstRoleName = $firstRole->name;
        $advert = Advert::create([
            // 'user_id' => Auth::user()->id,

            'title' => $request->title,
            'body' => $request->body,
            'target' => $request->target,


            'admin_id' => $user->id,

            'admin_role' => $firstRoleName,

        ]);

        return response()->json([
            'advert' => new AdvertsResource($advert),
            'admin_name' => $user->first_name . ' ' . $user->middle_name . ' ' . $user->last_name,

        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Advert $advert)
    {
        $admin = User::find($advert->admin_id);
        // return new ProtestsResource($advert);
        return response()->json([
            'advert' => $advert,
            'admin_name' => $admin->first_name . ' ' . $admin->middle_name . ' ' . $admin->last_name,

        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Advert $advert)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAdvertRequest $request, Advert $advert)
    {
        // in postman make the method : Post (not patch not put)
        // and make in request body : _method = PUT
        {
            $user = Auth::user();

            if ($user->hasRole(['manager'])) {
                $firstRoleName = 'manager';
            } elseif ($user->hasRole(['mentor'])) {
                $firstRoleName = 'mentor';
            } else {
                $firstRoleName = 'you dont hava permissions to do this !!';
                return $this->error('', 'you dont hava permissions to do this !!', 401);
            }
            $advert = Advert::find($advert->id);
            $advert->update($request->all());
            $advert->save();

            return new AdvertsResource($advert);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Advert $advert)
    {
        // way 1 :
        // $advert->delete();
        // return $this->success('Advert was Deleted Successfuly ',null,204);
        // return $this->success(['id' => $advert->id], 'تم حذف الشكوى بنجاح ', 200);
        // way 2 : (it is best to do it in Show & Update functions [Implement Private function below] )

        if ($this->isNotAuthorized($advert)) {
            return  $this->isNotAuthorized($advert);
        } else {
            $advert->delete();
            return $this->success(['id' => $advert->id], 'تم حذف الإعلان بنجاح ', 200);
        }
    }
    private function isNotAuthorized($advert)
    {
        if (Auth::user()->id !== $advert->admin_id) {
            return $this->error('', 'You are not Authorized to make this request', 403);
        }
    }
}
