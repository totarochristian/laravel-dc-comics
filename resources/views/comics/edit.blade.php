@extends('layouts.app');

@section('content')
    <section class="container">
        <h1>Modifica fumetto (id: {{ $comic->id }})</h1>
        <form action="{{ route('comics.update',$comic->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="title" class="form-label">Titolo</label>
                <input type="text" class="form-control" name="title" id="title" aria-describedby="titleHelp" value="{{ $comic->title }}">
                <div id="titleHelp" class="form-text">Inserisci il titolo del fumetto</div>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Descrizione</label>
                <textarea name="description" id="description" cols="30" rows="10">
                    {{ $comic->description }}
                </textarea>
            <div class="mb-3">
                <label for="thumb" class="form-label">Immagine thumb</label>
                <input type="text" class="form-control" name="thumb" id="thumb" aria-describedby="thumbHelp" value="{{ $comic->thumb }}">
                <div id="thumbHelp" class="form-text">Inserisci l'url all'immagine del fumetto</div>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Prezzo</label>
                <input type="number" step="0.01" class="form-control" name="price" id="price" aria-describedby="priceHelp" value="{{ $comic->price }}">
                <div id="priceHelp" class="form-text">Inserisci il prezzo del fumetto</div>
            </div>
            <div class="mb-3">
                <label for="series" class="form-label">Serie</label>
                <input type="text" class="form-control" name="series" id="series" aria-describedby="seriesHelp" value="{{ $comic->series }}">
                <div id="seriesHelp" class="form-text">Inserisci la serie del fumetto</div>
            </div>
            <div class="mb-3">
                <label for="sale_date">Start date:</label>
                <input type="date" id="sale_date" name="sale_date" value="{{ $comic->sale_date }}">
            </div>
            <div class="mb-3">
                <label for="type" class="form-label">Tipologia</label>
                <input type="text" class="form-control" name="type" id="type" aria-describedby="typeHelp" value="{{ $comic->type }}">
                <div id="typeHelp" class="form-text">Inserisci la tipologia del fumetto</div>
            </div>

            <button type="submit" class="btn btn-primary">Modifica</button>
            <button type="reset" class="btn btn-primary">Cancella</button>
        </form>
    </section>
@endsection
