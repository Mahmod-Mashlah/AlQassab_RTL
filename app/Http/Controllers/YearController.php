<?php

namespace App\Http\Controllers;

use App\Models\Year;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\YearsResource;
use App\Http\Requests\StoreYearRequest;
use App\Http\Requests\UpdateYearRequest;
use App\Models\User;
use App\Traits\HttpResponses;
use Carbon\Carbon;



class YearController extends Controller
{
    use HttpResponses;

    /**
     * Display a listing of the resource.
     */
    public function index($format = 'view')
    {
        $years = Year::all();
        $studentCount = User::whereHasRole('student')->count();
        $employeesCount = User::whereHasRole(['manager', 'secretary', 'mentor', 'teacher'])->count();
        return view('years.index', compact('years', 'studentCount', 'employeesCount'));
    }
    public function dashboard($yearname)
    {
        $year = Year::where('name', $yearname)->first();
        $user = Auth::user();
        return view('dashboard', compact('year', 'user'));
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
    public function store(StoreYearRequest $request)
    {
        $request->validated($request->all());

        $year_start = new Carbon($request->year_start);
        $year_end = new Carbon($request->year_end);

        $year = Year::create([
            // 'user_id' => Auth::user()->id,
            'year_start' => $request->year_start,
            'year_end' => $request->year_end,
            'name' => $year_start->format('Y') . '-' . $year_end->format('Y'),
        ]);
        return redirect()->intended(route('years'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Year $year)
    {

        return new YearsResource($year);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Year $year)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
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
