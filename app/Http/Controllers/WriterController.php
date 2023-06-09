<?php

namespace App\Http\Controllers;

use App\Models\Writer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class WriterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $writers = Writer::all();
        return view("writers.index", compact('writers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        return view('writers.create');
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
        $newWriter = new Writer();
        $newWriter->fill($form_data);
        $newWriter->save();
        return redirect()->route('writers.show', $newWriter->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Writer  $writer
     */
    public function show(Writer $writer)
    {
        return view('writers.show', compact('writer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Writer  $writer
     */
    public function edit(Writer $writer)
    {
        return view('writers.edit', compact('writer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Writer  $writer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Writer $writer)
    {
        $form_data = $this->validation($request->all());
        $writer->update($form_data);
        return redirect()->route('writers.show', $writer->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Writer  $writer
     */
    public function destroy(Writer $writer)
    {
        $writer->delete();
        return redirect()->route('writers.index')->with('message', "Scrittore con id {$writer->id} cancellato con successo!");
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
