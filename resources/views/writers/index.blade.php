@extends('layouts.app')

@section('content')
    <section class="container">
        <h1>Scrittori</h1>
        <a href="{{ route('writers.create') }}" class="btn btn-primary">Aggiungi</a>
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif
        <div class="row gy-4">
            @foreach ($writers as $writer)
                <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"> {{ $writer->surname }} {{ $writer->name }}</h5>
                            <a href="{{ route('writers.show', $writer->id) }}" class="btn btn-primary">Vai al dettaglio</a>
                            <a href="{{ route('writers.edit', $writer->id) }}" class="btn btn-warning">Modifica</a>
                            <form action="{{ route('writers.destroy', $writer->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="delete-button btn btn-danger ms-3"
                                    data-item-title="{{ $writer->title }}">Cancella</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    @include('partials.popup');
@endsection
