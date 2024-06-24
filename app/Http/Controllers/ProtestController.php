<?php

namespace App\Http\Controllers;

use App\Models\Year;
use App\Models\Protest;
use App\Http\Requests\StoreProtestRequest;
use App\Http\Requests\UpdateProtestRequest;

class ProtestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($yearname)
    {
        $year = Year::where('name', $yearname)->first();

        $protests = Protest::whereDate('created_at', '>=', $year->year_start)
            ->whereDate('created_at', '<=', $year->year_end)
            ->whereNotNull('user_id')
            ->get();

        // $protest = $protests->first();
        // dd($protest->user->first_name);
        return view('protests.index', compact('yearname', 'year', 'protests'));
        // return redirect()->route('protests', ['yearname' => $yearname, 'protests' => $protests]);
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
    }

    /**
     * Display the specified resource.
     */
    public function show(Protest $protest)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Protest $protest)
    {
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProtestRequest $request, Protest $protest)
    {
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Protest $protest, $yearname, $protest_id)
    {
        $year = Year::where('name', $yearname)->first();
        $protest = Protest::where('id', $protest_id)->first();
        // dd($protest);

        $protest->delete();

        $protests = Protest::whereDate('created_at', '>=', $year->year_start)
            ->whereDate('created_at', '<=', $year->year_end)
            ->whereNotNull('user_id')
            ->get();

        // return view("students.index", compact('year', 'students'));
        return redirect()->route('protests', ['yearname' => $yearname, 'protests' => $protests]);
    }
}
