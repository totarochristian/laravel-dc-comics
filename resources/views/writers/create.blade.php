@extends('layouts.app');

@section('content')
    <section class="container">
        <h1>Inserisci un nuovo scrittore</h1>
        <form action="{{ route('writers.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nome</label>
                <input type="text" class="form-control" name="name" id="name" aria-describedby="nameHelp" value="{{old('name')}}">
                <div id="nameHelp" class="form-text">Inserisci il nome dello scrittore</div>
            </div>
            <div class="mb-3">
                <label for="surname" class="form-label">Cognome</label>
                <input type="text" class="form-control" name="surname" id="surname" aria-describedby="surnameHelp" value="{{old('surname')}}">
                <div id="surnameHelp" class="form-text">Inserisci il cognome dello scrittore</div>
            </div>
            <button type="submit" class="btn btn-primary">Inserisci</button>
            <button type="reset" class="btn btn-primary">Cancella</button>
        </form>
    </section>
@endsection
