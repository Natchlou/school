<?php

namespace App\Http\Controllers;

use App\Models\Timetable;
use App\Http\Requests\StoreTimetableRequest;
use App\Http\Requests\UpdateTimetableRequest;

class TimetableController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('timetable.index', ['timetables' => Timetable::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $timetable = new Timetable();
        $timetable->fill([
            'absent' => 1,
            'prof' => 'JULLIEN N.',
            'salle' => 'Chambre P'
        ]);
        return view('timetable.form', ['timetable' => $timetable]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTimetableRequest $request)
    {
        Timetable::create($request->validated());
        return to_route('timetable.index')->with('success', 'La matière a bien été ajouté');
    }

    /**
     * Display the specified resource.
     */
    public function show(Timetable $timetable)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Timetable $timetable)
    {
        return view('timetable.form', ['timetable' => $timetable]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreTimetableRequest $request, Timetable $timetable)
    {
        $timetable->update($request->validated());
        return to_route('timetable.index')->with('success', 'La matière a bien été modifié');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Timetable $timetable)
    {
        //
    }
}
