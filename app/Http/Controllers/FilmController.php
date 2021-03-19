<?php

namespace App\Http\Controllers;

use App\Movie;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Redirect;

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
    public function store(Request $request, Movie $film)
    {
        
        $data = $request->validate([
            'titolo' => 'required|unique:movies|max:255',
            'genere' => 'required|max:23',
            'trama' => 'required|max:255',
            'regista' => 'required|max:80',
            'anno' => 'required'
        ]);

        $film->fill($data);
        $film->save();

        return redirect()->route('film.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Movie $film)
    {
        if ($film) {
            $data = [
                'film' => $film
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
    public function edit(Movie $film)
    {
        if ($film) {
            $data = [
                'film' => $film
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
    public function update(Request $request, Movie $film)
    {
        
        $data = $request->validate([
            'titolo' => ['required',Rule::unique('movies')->ignore($film),'max:255'],
            'genere' => 'required|max:23',
            'trama' => 'required|max:255',
            'regista' => 'required|max:80',
            'anno' => 'required'
        ]);
        $film->update($data);

        return redirect()->route('film.show',$film)->with(['messaggio' => 'Complimenti il tuo film è stato modificato!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Movie $film)
    {
        $film->delete();
        return redirect()->route('film.index')->with(['messaggio' => 'Il tuo film è stato eliminato!']);;
    }
}
