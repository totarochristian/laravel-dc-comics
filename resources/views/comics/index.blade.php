@extends('layouts.app')

@section('content')
    <section class="container">
        <h1>Fumetti</h1>
        <div class="row gy-4">
            @foreach ($comics as $comic)
                <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                    <div class="card">
                        <img src="{{ $comic->thumb }}" class="card-img-top" alt="{{ $comic->title }}">
                        <div class="card-body">
                            <h5 class="card-title"> {{ $comic->title }}</h5>
                            <a href="{{ route('comics.show', $comic->id) }}" class="btn btn-primary">Vai al dettaglio</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>


    </section>
@endsection
