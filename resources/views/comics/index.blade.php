@extends('layouts.app')

@section('content')
    <section class="container">
        <h1>Fumetti</h1>
        <a href="{{ route('comics.create') }}" class="btn btn-primary">Aggiungi</a>
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif
        <div class="row gy-4">
            @foreach ($comics as $comic)
                <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                    <div class="card">
                        <img src="{{ $comic->thumb }}" class="card-img-top" alt="{{ $comic->title }}">
                        <div class="card-body">
                            <h5 class="card-title"> {{ $comic->title }}</h5>
                            <a href="{{ route('comics.show', $comic->id) }}" class="btn btn-primary">Vai al dettaglio</a>
                            <a href="{{ route('comics.edit', $comic->id) }}" class="btn btn-warning">Modifica</a>
                            <form action="{{ route('comics.destroy', $comic->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="delete-button btn btn-danger ms-3"
                                    data-item-title="{{ $comic->title }}">Cancella</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    @include('partials.popup');
@endsection
