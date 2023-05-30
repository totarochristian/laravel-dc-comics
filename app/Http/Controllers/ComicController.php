<?php

namespace App\Http\Controllers;

use App\Models\Comic;
use Illuminate\Http\Request;
use App\Models\ComicArtist;
use App\Models\ComicWriter;
use App\Models\Artist;
use App\Models\Writer;

class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comics = Comic::all();
        return view("comics.index", compact('comics'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('comics.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $form_data = $request->all();
        $newComic = new Comic();
        $newComic->fill($form_data);
        $newComic->save();
        return redirect()->route('comics.show', $newComic->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comic  $comic
     */
    public function show(Comic $comic)
    {
        //Gets the artists related to this comic
        $artistsId = ComicArtist::all()->where('id_comic', $comic->id);
        $artists = [];
        foreach($artistsId as $el)
            $artists[] = Artist::find($el->id_artist);

        //Gets the writers related to this comic
        $writersId = ComicWriter::all()->where('id_comic', $comic->id);
        $writers = [];
        foreach($writersId as $el)
            $writers[] = Writer::find($el->id_writer);

        //Returns the view showing the detail about the comic passing artists and writers related
        return view('comics.show', compact('comic','artists','writers'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comic  $comic
     */
    public function edit(Comic $comic)
    {
        return view('comics.edit', compact('comic'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comic  $comic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comic $comic)
    {
        $form_data = $request->all();
        $comic->update($form_data);
        return redirect()->route('comics.show', $comic->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comic  $comic
     */
    public function destroy(Comic $comic)
    {
        $comic->delete();
        return redirect()->route('comics.index')->with('message', "Fumetto con id {$comic->id} cancellato con successo!");
    }
}
