@extends('layouts.app')

@section('content')
    <section class="container">
        <h1>Artisti</h1>
        <a href="{{ route('artists.create') }}" class="btn btn-primary">Aggiungi</a>
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif
        <div class="row gy-4">
            @foreach ($artists as $artist)
                <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"> {{ $artist->surname }} {{ $artist->name }}</h5>
                            <a href="{{ route('artists.show', $artist->id) }}" class="btn btn-primary">Vai al dettaglio</a>
                            <a href="{{ route('artists.edit', $artist->id) }}" class="btn btn-warning">Modifica</a>
                            <form action="{{ route('artists.destroy', $artist->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="delete-button btn btn-danger ms-3"
                                    data-item-title="{{ $artist->title }}">Cancella</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    @include('partials.popup');
@endsection
