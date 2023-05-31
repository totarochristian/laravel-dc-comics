@extends('layouts.app');

@section('content')
    <section class="container">
        <h1>Modifica fumetto (id: {{ $comic->id }})</h1>
        <form action="{{ route('comics.update',$comic->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="title" class="form-label">Titolo</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" aria-describedby="titleHelp" value="{{ old('title',$comic->title) }}">
                <div id="titleHelp" class="form-text">Inserisci il titolo del fumetto</div>
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Descrizione</label>
                <textarea name="description" class="@error('description') is-invalid @enderror" id="description" cols="30" rows="10">{{ old('description',$comic->description) }}</textarea>
                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            <div class="mb-3">
                <label for="thumb" class="form-label">Immagine thumb</label>
                <input type="text" class="form-control @error('thumb') is-invalid @enderror" name="thumb" id="thumb" aria-describedby="thumbHelp" value="{{ old('thumb',$comic->thumb) }}">
                <div id="thumbHelp" class="form-text">Inserisci l'url all'immagine del fumetto</div>
                @error('thumb')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Prezzo</label>
                <input type="number" step="0.01" class="form-control @error('price') is-invalid @enderror" name="price" id="price" aria-describedby="priceHelp" value="{{ old('price',$comic->price) }}">
                <div id="priceHelp" class="form-text">Inserisci il prezzo del fumetto</div>
                @error('price')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="series" class="form-label">Serie</label>
                <input type="text" class="form-control @error('series') is-invalid @enderror" name="series" id="series" aria-describedby="seriesHelp" value="{{ old('series',$comic->series) }}">
                <div id="seriesHelp" class="form-text">Inserisci la serie del fumetto</div>
                @error('series')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="sale_date">Data d'uscita:</label>
                <input type="date" class="@error('sale_date') is-invalid @enderror" id="sale_date" name="sale_date" value="{{ old('sale_date',$comic->sale_date) }}">
                @error('sale_date')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="type" class="form-label">Tipologia</label>
                <input type="text" class="form-control @error('type') is-invalid @enderror" name="type" id="type" aria-describedby="typeHelp" value="{{ old('type',$comic->type) }}">
                <div id="typeHelp" class="form-text">Inserisci la tipologia del fumetto</div>
                @error('type')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Modifica</button>
            <button type="reset" class="btn btn-primary">Cancella</button>
        </form>
    </section>
@endsection
