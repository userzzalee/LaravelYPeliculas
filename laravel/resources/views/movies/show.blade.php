@extends('layouts.app')

@section('content')
    <h1>{{ $movie->titulo }}</h1>

    @if(isset($movie->image))
        <img src="{{ asset('storage/' . $movie->image) }}" width="300">
    @endif

    <p>{{ $movie->sinopsis }}</p>
    <p>Género: {{ $movie->genero }}</p>
    <p>Creado por: {{ $movie->user->name }}</p>

    <p>Valoración promedio: {{ number_format($movie->ratings->avg('score'), 1) }}</p>

    @auth
        @if(auth()->id() === $movie->user_id || auth()->user()->is_admin)
            <a href="{{ route('movies.edit', $movie) }}">Editar</a>

            <form action="{{ route('movies.destroy', $movie) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Eliminar</button>
            </form>
        @endif
    @endauth

    <hr>

    <h2>Valoraciones</h2>
    @forelse ($movie->ratings as $rating)
        <p>{{ $rating->user->name }} → {{ $rating->score }}</p>
    @empty
        <p>No hay valoraciones.</p>
    @endforelse

    <hr>

    <h2>Comentarios</h2>
    @forelse ($movie->reviews as $review)
        <p><strong>{{ $review->user->name }}</strong>: {{ $review->title }} - {{ $review->content }}</p>
    @empty
        <p>No hay comentarios.</p>
    @endforelse

    <a href="{{ route('movies.index') }}">Volver al inicio</a>
@endsection
