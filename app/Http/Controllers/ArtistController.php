<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ArtistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $artists = Artist::all();
        return view("artists.index", compact('artists'));
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        return view('artists.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $form_data = $this->validation($request->all());
        $newArtist = new Artist();
        $newArtist->fill($form_data);
        $newArtist->save();
        return redirect()->route('artists.show', $newArtist->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Artist  $artist
     */
    public function show(Artist $artist)
    {
        return view('artists.show', compact('artist'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Artist  $artist
     */
    public function edit(Artist $artist)
    {
        return view('artists.edit', compact('artist'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Artist  $artist
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Artist $artist)
    {
        $form_data = $this->validation($request->all());
        $artist->update($form_data);
        return redirect()->route('artists.show', $artist->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Artist  $artist
     */
    public function destroy(Artist $artist)
    {
        $artist->delete();
        return redirect()->route('artists.index')->with('message', "Artista con id {$artist->id} cancellato con successo!");
    }

    /**
     * Validate the data passed.
     *
     * @param mixed $data Data to be validated.
     * @return array Array of data validated.
     */
    private function validation($data){
        $validator = Validator::make($data, [
            'name' => 'required|min:3|max:120',
            'surname' => 'required|min:3|max:120',
        ],[
            'name.required' => 'Il nome è obbligatorio!',
            'name.min' => 'Il nome deve essere composto almeno da 3 caratteri!',
            'name.max' => 'Il nome non deve superare i 120 caratteri!',
            'surname.required' => 'Il cognome è obbligatorio!',
            'surname.min' => 'Il cognome deve essere composto almeno da 3 caratteri!',
            'surname.max' => 'Il cognome non deve superare i 120 caratteri!',
        ])->validate();
        return $validator;
    }
}
