<?php

namespace App\Http\Controllers;

use App\Http\Requests\DevoirRequest;
use App\Models\Devoir;
use App\Models\Timetable;
use Illuminate\Http\Request;

class DevoirController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('prof.devoir', [
            'cours' => Timetable::all(),
            'matiere' => Timetable::pluck('matiere', 'id')
        ]);
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
    public function store(DevoirRequest $request)
    {
        $devoir = Devoir::create($request->validated());
        return to_route('devoir.index')->with('success', 'Le devoir a bien été ajouté');
    }

    /**
     * Display the specified resource.
     */
    public function show(Devoir $devoir)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Devoir $devoir)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Devoir $devoir)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Devoir $devoir)
    {
        //
    }
}
