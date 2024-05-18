<?php

namespace App\Http\Controllers\api;

use App\Models\year;
use Illuminate\Http\Request;
use App\Traits\HttpResponses;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\YearsResource;
use App\Http\Requests\StoreYearRequest;
use App\Http\Requests\UpdateYearRequest;

class YearController extends Controller
{
    use HttpResponses;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $years = Year::all();

        return $this->success(
            YearsResource::collection(
                $years
            )
            //for index relations return that :
            // year::with('seasons')->get();
        );
        // get return years thats years are authenticated
        // Year::where('year_id', Auth::user()->id)->get()
    }
    public function store(StoreYearRequest $request)
    {
        $request->validated($request->all());

        $year = Year::create([
            // 'year_id' => Auth::year()->id,
            'name' => $request->name,
            'year_start' => $request->year_start,
            'year_end' => $request->year_end,
        ]);

        return new YearsResource($year);
    }

    public function show(Year $year)
    {

        // without relations :
        //return new YearsResource($year);
        // with relations : $year->load('seasons');
        // like this :
        return response()->json($year->load('seasons'), 200);
    }

    public function update(UpdateYearRequest $request, Year $year)  // this work correctly
    // in postman make the method : Post (not patch not put)
    // and make in request body : _method = PUT
    {
        $year = Year::find($year->id);
        $year->update($request->all());
        $year->save();

        return new YearsResource($year);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Year $year)
    {
        // way 1 :
        // $year->delete();
        // return $this->success('Year was Deleted Successfuly ',null,204);

        // way 2 : (it is best to do it in Show & Update functions [Implement Private function below] )

        return $this->isNotAuthorized($year) ? $this->isNotAuthorized($year) : $year->delete();
        // return true (1) if the delete successfuly occoured
    }

    private function isNotAuthorized($year)
    {
        if (Auth::user()->id !== $year->year_id) {
            return $this->error('', 'You are not Authorized to make this request', 403);
        }
    }
}
