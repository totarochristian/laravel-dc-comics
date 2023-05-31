@extends('layouts.app')

@section('content')
    <section class="container showDetailGroup">
        <h1>{{ $comic->title }}</h1>
        <div class="d-flex gap-4 mb-4">
            <img src="{{ $comic->thumb }}" alt="{{ $comic->title }}">
            <div class="d-flex flex-column">
                <h3> {{ $comic->title }}</h3>
                <p>{!! $comic->description !!}</p>
                <p><strong>Prezzo ($):</strong> {{ $comic->price }}</p>
                <p><strong>Serie:</strong> {{ $comic->series }}</p>
                <p><strong>Tipologia:</strong> {{ $comic->type }}</p>
                <p><strong>Data di uscita:</strong> {{ $comic->sale_date }}</p>
            </div>
        </div>
        @if(count($artists)>0)
            <h2>Artisti</h2>
            <div class="row gy-4">
                @foreach ($artists as $artist)
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title"> {{ $artist->surname }} {{ $artist->name }}</h5>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
        @if(count($writers)>0)
            <h2 class="mt-4">Scrittori</h2>
            <div class="row gy-4">
                @foreach ($writers as $writer)
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title"> {{ $writer->surname }} {{ $writer->name }}</h5>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </section>
@endsection
