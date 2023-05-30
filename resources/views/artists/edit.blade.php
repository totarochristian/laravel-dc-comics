@extends('layouts.app');

@section('content')
    <section class="container">
        <h1>Modifica artista (id: {{ $artist->id }})</h1>
        <form action="{{ route('artists.update',$artist->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Nome</label>
                <input type="text" class="form-control" name="name" id="name" aria-describedby="nameHelp" value="{{ $artist->name }}">
                <div id="nameHelp" class="form-text">Inserisci il nome dell'artista</div>
            </div>
            <div class="mb-3">
                <label for="surname" class="form-label">Cognome</label>
                <input type="text" class="form-control" name="surname" id="surname" aria-describedby="surnameHelp" value="{{ $artist->surname }}">
                <div id="surnameHelp" class="form-text">Inserisci il cognome dell'artista</div>
            </div>
            <button type="submit" class="btn btn-primary">Modifica</button>
            <button type="reset" class="btn btn-primary">Cancella</button>
        </form>
    </section>
@endsection
