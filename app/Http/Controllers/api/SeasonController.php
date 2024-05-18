<?php

namespace App\Http\Controllers\api;

use App\Models\season;
use Illuminate\Http\Request;
use App\Traits\HttpResponses;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\SeasonsResource;
use App\Http\Requests\StoreSeasonRequest;
use App\Http\Requests\UpdateSeasonRequest;

class SeasonController extends Controller
{
    use HttpResponses;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $seasons = Season::all();

        return
            SeasonsResource::collection(
                $seasons

                // Season::where('season_id', Auth::user()->id)->get()
            ); // get seasons thats seasons are authenticated

    }
    public function store(StoreSeasonRequest $request)
    {
        $request->validated($request->all());

        $season = Season::create([
            // 'user_id' => Auth::user()->id,
            'number' => $request->number,
            'season_start' => $request->season_start,
            'season_end' => $request->season_end,
            'days_number' => $request->days_number,
            'year_id' => $request->year_id,
        ]);

        return new SeasonsResource($season);
    }

    public function show(Season $season)
    {

        // return new SeasonsResource($season);
        return response()->json($season->load('year'), 200);
    }

    public function update(UpdateSeasonRequest $request, Season $season)  // this work correctly
    // in postman make the method : Post (not patch not put)
    // and make in request body : _method = PUT
    {
        $season = Season::find($season->id);
        $season->update($request->all());
        $season->save();

        return new SeasonsResource($season);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Season $season)
    {
        // way 1 :
        // $season->delete();
        // return $this->success('Season was Deleted Successfuly ',null,204);

        // way 2 : (it is best to do it in Show & Update functions [Implement Private function below] )

        return $this->isNotAuthorized($season) ? $this->isNotAuthorized($season) : $season->delete();
        // return true (1) if the delete successfuly occoured
    }

    private function isNotAuthorized($season)
    {
        if (Auth::user()->id !== $season->season_id) {
            return $this->error('', 'You are not Authorized to make this request', 403);
        }
    }
}
