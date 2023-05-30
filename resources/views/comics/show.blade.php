@extends('layouts.app')

@section('content')
    <section class="container">
        <h1>{{ $comic->title }}</h1>
        <div class="card">
            <img src="{{ $comic->thumb }}" class="card-img-top" alt="{{ $comic->title }}">
            <div class="card-body">
                <h5 class="card-title"> {{ $comic->title }}</h5>
                <p class="card-text">{!! $comic->description !!}</p>
                <p class="card-text"><strong>Prezzo ($):</strong> {{ $comic->price }}</p>
                <p class="card-text"><strong>Serie:</strong> {{ $comic->series }}</p>
                <p class="card-text"><strong>Tipologia:</strong> {{ $comic->type }}</p>
                <p class="card-text"><strong>Data di uscita:</strong> {{ $comic->sale_date }}</p>
            </div>
        </div>
        @if(count($artists)>0)
            <h1>Artisti</h1>
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
            <h1>Scrittori</h1>
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
