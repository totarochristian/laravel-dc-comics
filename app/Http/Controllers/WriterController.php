<?php

namespace App\Http\Controllers;

use App\Models\Writer;
use Illuminate\Http\Request;

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
        $request->validate([
            'name' => 'required|min:3|max:120',
            'surname' => 'required|min:3|max:120',
        ]);
        $form_data = $request->all();
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
        $form_data = $request->all();
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
}
