@extends('layouts.app')

@section('content')
    <section class="container">
        <h1>Codice artista: {{ $artist->id }}</h1>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title"> {{ $artist->surname }} {{ $artist->name }}</h5>
            </div>
        </div>
    </section>
@endsection
