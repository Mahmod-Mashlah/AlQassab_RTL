<?php

namespace App\Http\Controllers;

use App\Models\NoteType;
use App\Http\Requests\StoreNoteTypeRequest;
use App\Http\Requests\UpdateNoteTypeRequest;

class NoteTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StoreNoteTypeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(NoteType $noteType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(NoteType $noteType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateNoteTypeRequest $request, NoteType $noteType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(NoteType $noteType)
    {
        //
    }
}
