<?php

namespace App\Http\Controllers;

use App\Movie;
use Illuminate\Http\Request;

class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dati_film = Movie::all();
        $data = [
            'films' => $dati_film
        ];
        return view('films.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('films.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $request->validate([
            'titolo' => 'required|unique:movies|max:255',
            'genere' => 'required|max:23',
            'trama' => 'required|max:255',
            'regista' => 'required|max:80',
            'anno' => 'required'
        ]);

        $nuovoFilm = new Movie();


        $nuovoFilm->fill($data);
        $nuovoFilm->save();


        return redirect()->route('film.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $movie = Movie::find($id);
        if ($movie) {
            $data = [
                'film' => $movie
            ];
            return view('films.show',$data);
        }
        abort('404');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $movie = Movie::find($id);
        if ($movie) {
            $data = [
                'film' => $movie
            ];
            return view('films.edit',$data);
        }
        abort('404');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Movie $movie)
    {
        $data = $request->all();
        $request->validate([
            'titolo' => 'required|unique:movies|max:255',
            'genere' => 'required|max:23',
            'trama' => 'required|max:255',
            'regista' => 'required|max:80',
            'anno' => 'required'
        ]);
        $movie->update($data);

        return redirect()->route('film.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $movie = Movie::find($id);
        $movie->delete();

        return redirect()->route('film.index');
    }
}
