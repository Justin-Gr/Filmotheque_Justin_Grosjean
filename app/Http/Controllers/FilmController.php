<?php

namespace App\Http\Controllers;

use App\Http\Requests\InsertFilmRequest;
use App\Modeles\Categorie;
use App\Modeles\Film;
use Illuminate\Http\Request;

class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($laCategorie = null)
    {
        $query = $laCategorie ? Categorie::where('libelle',"$laCategorie")->firstOrFail()->films() : Film::query();
        $lesFilms = $query->get();
        $categories = Categorie::all();
        return view('listeFilms', compact('lesFilms', 'categories', 'laCategorie'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = array();
        foreach (Categorie::all() as $categorie) {
            $categories[$categorie->id] = $categorie->libelle;
        }
        return view('formAjoutFilm', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InsertFilmRequest $insertFilmRequest)
    {
        Film::create($insertFilmRequest->all());
        return redirect()->route('films.index')->with('info', 'Le film a bien été créé');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Film $film)
    {
        return view('afficherFilm', compact('film'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Film $film)
    {
        $categories = array();
        foreach (Categorie::all() as $categorie) {
            $categories[$categorie->id] = $categorie->libelle;
        }
        return view('formModificationFilm', compact('film','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(InsertFilmRequest $insertFilmRequest, Film $film)
    {
        $film->update($insertFilmRequest->all());
        return redirect()->route('films.index')->with('info', 'Le film a bien été modifié');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Film $film)
    {
        $film->delete();
        return back()->with('info', 'Le film a bien été supprimé dans la base de données.');
    }
}
