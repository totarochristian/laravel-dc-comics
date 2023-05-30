@extends('layouts.app')

@section('content')
    <section class="container">
        <h1>Codice scrittore: {{ $writer->id }}</h1>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title"> {{ $writer->surname }} {{ $writer->name }}</h5>
            </div>
        </div>
    </section>
@endsection
