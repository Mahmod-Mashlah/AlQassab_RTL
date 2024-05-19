<?php

namespace App\Http\Controllers;

use App\Models\Advert;
use App\Traits\HttpResponses;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\AdvertsResource;
use App\Http\Requests\StoreAdvertRequest;
use App\Http\Requests\UpdateAdvertRequest;

class AdvertController extends Controller
{
    use HttpResponses;
    /**
     * Display a listing of the resource.
     */


    public function index($format = 'view')
    {
        $adverts = Advert::all();
        return view('adverts.index', compact('adverts'));
    }
    // public function adminIndex()
    // {
    //     $adverts = Advert::all()->where('admin_id', '=', Auth::user()->id);

    //     return
    //         AdvertsResource::collection(
    //             $adverts
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
    public function store(StoreAdvertRequest $request)
    {
        $request->validated($request->all());

        $advert = Advert::create([
            // 'user_id' => Auth::user()->id,
            'number' => $request->number,
            'advert_start' => $request->advert_start,
            'advert_end' => $request->advert_end,
            'days_number' => $request->days_number,
            'year_id' => $request->year_id,
        ]);

        return new AdvertsResource($advert);
    }

    /**
     * Display the specified resource.
     */
    public function show(Advert $advert)
    {

        return new AdvertsResource($advert);
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
    public function update(UpdateAdvertRequest $request, Advert $advert)  // this work correctly
    // in postman make the method : Post (not patch not put)
    // and make in request body : _method = PUT
    {
        $advert = Advert::find($advert->id);
        $advert->update($request->all());
        $advert->save();

        return new AdvertsResource($advert);
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Advert $advert)
    {
        // way 1 :
        // $advert->delete();
        // return $this->success('Advert was Deleted Successfuly ',null,204);

        // way 2 : (it is best to do it in Show & Update functions [Implement Private function below] )

        return $this->isNotAuthorized($advert) ? $this->isNotAuthorized($advert) : $advert->delete();
        // return true (1) if the delete successfuly occoured
    }

    private function isNotAuthorized($advert)
    {
        if (Auth::user()->id !== $advert->advert_id) {
            return $this->error('', 'You are not Authorized to make this request', 403);
        }
    }
}
