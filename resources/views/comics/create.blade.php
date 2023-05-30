@extends('layouts.app');

@section('content')
    <section class="container">
        <h1>Inserisci un nuovo fumetto</h1>
        <form action="{{ route('comics.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Titolo</label>
                <input type="text" class="form-control" name="title" id="title" aria-describedby="titleHelp">
                <div id="titleHelp" class="form-text">Inserisci il titolo del fumetto</div>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Descrizione</label>
                <textarea name="description" id="description" cols="30" rows="10">

            </textarea>
            <div class="mb-3">
                <label for="thumb" class="form-label">Immagine thumb</label>
                <input type="text" class="form-control" name="thumb" id="thumb" aria-describedby="thumbHelp">
                <div id="thumbHelp" class="form-text">Inserisci l'url all'immagine del fumetto</div>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Prezzo</label>
                <input type="number" class="form-control" name="price" id="price" aria-describedby="priceHelp">
                <div id="priceHelp" class="form-text">Inserisci il prezzo del fumetto</div>
            </div>
            <div class="mb-3">
                <label for="series" class="form-label">Serie</label>
                <input type="text" class="form-control" name="series" id="series" aria-describedby="seriesHelp">
                <div id="seriesHelp" class="form-text">Inserisci la serie del fumetto</div>
            </div>
            <div class="mb-3">
                <label for="sale_date">Start date:</label>
                <input type="date" id="sale_date" name="sale_date">
            </div>
            <div class="mb-3">
                <label for="type" class="form-label">Tipologia</label>
                <input type="text" class="form-control" name="type" id="type" aria-describedby="typeHelp">
                <div id="typeHelp" class="form-text">Inserisci la tipologia del fumetto</div>
            </div>

            <button type="submit" class="btn btn-primary">Inserisci</button>
            <button type="reset" class="btn btn-primary">Cancella</button>
        </form>
    </section>
@endsection
