<?php

namespace App\Http\Controllers;

use App\Models\Files;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FilesController extends Controller
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
        $files = new Files();
        return view('file.form', ['file' => $files]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $path = $request->file('filename')->store('fichierPublic', 'public');
        Files::create([
            'filename' => $request->file('filename')->getClientOriginalName(),
            'filepath' => $path,
            'sizefile' => $request->file('filename')->getSize()
        ]);
        return to_route('prof.index')->with('success', 'Le fichier a bien été enregistré');
    }

    /**
     * Display the specified resource.
     */
    public function show(Files $files)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Files $files)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Files $files)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Files $files)
    {
        //
    }
}
