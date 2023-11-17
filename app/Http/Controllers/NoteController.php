<?php

namespace App\Http\Controllers;

use App\Http\Requests\NoteFormRequest;
use App\Models\Note;
use App\Models\Timetable;
use App\Models\User;
use Illuminate\Http\Request;

class NoteController extends Controller
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
        $note = new Note();
        return view('note.form', ['note' => $note, 'users' => User::pluck('name', 'id'), 'timetables' => Timetable::pluck('matiere', 'id')]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(NoteFormRequest $request)
    {
        $note = Note::create($request->validated());
        return to_route('note.create')->with('success', 'La note a bien été ajouté ');
    }

    /**
     * Display the specified resource.
     */
    public function show(Note $note)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Note $note)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(NoteFormRequest $request, Note $note)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Note $note)
    {
        //
    }
}
