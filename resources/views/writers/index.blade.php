@extends('layouts.app')

@section('content')
    <section class="container">
        <h1>Scrittori</h1>
        <div class="row gy-4">
            @foreach ($writers as $writer)
                <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"> {{ $writer->surname }} {{ $writer->name }}</h5>
                            {{-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> --}}
                            <a href="{{ route('artists.show', $writer->id) }}" class="btn btn-primary">Vai al dettaglio</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>


    </section>
@endsection
