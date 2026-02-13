<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index(){
        $movies = Movie::paginate(15);
        return view('movies.index', compact('movies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(){
        return view('movies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){
        $validated = $request->validate([
            'titulo' => 'required|string|max:255',
            'director' => 'required|string|max:255',
            'año' => 'required|integer',
            'genero' => 'required|string',
            'duracion' => 'required|integer',
            'sinopsis' => 'required|string',
            'reparto' => 'nullable|string',
        ]);

        Movie::create($validated);

        return redirect()->route('movies.index')
            ->with('success', 'Película creada correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Movie $movie){
        return view('movies.show', compact('movie'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Movie $movie){
        return view('movies.edit', compact('movie'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Movie $movie){
        $validated = $request->validate([
            'titulo' => 'required|string|max:255',
            'director' => 'required|string|max:255',
            'año' => 'required|integer',
            'genero' => 'required|string',
            'duracion' => 'required|integer',
            'sinopsis' => 'required|string',
            'reparto' => 'nullable|string',
        ]);

        $movie->update($validated);

        return redirect()->route('movies.show', $movie)
                            ->with('success', 'Película actualizada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Movie $movie){
        $movie->delete();

        return redirect()->route('movies.index')
            ->with('success', 'Película eliminada correctamente');
    }

}
