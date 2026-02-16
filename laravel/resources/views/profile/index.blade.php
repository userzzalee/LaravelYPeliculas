@extends('layouts.app')

@section('title', 'Mi Perfil')

@section('content')
    <div class="container py-5">

        <div class="card p-4 mb-4">
            <h2>Mi Información</h2>
            <p><strong>Nombre:</strong> {{ $user->name }}</p>
            <p><strong>Email:</strong> {{ $user->email }}</p>
            <p><strong>Miembro desde:</strong> {{ $user->created_at->format('d/m/Y') }}</p>
        </div>

        <div class="card p-4">
            <h3>Mis Reseñas</h3>

            @if($reviews->count() > 0)
                @foreach($reviews as $review)
                    <div class="mb-3">
                        <strong>{{ $review->movie->title ?? 'Película' }}</strong>
                        <p>{{ $review->content }}</p>
                    </div>
                @endforeach
            @else
                <p>No has creado reseñas todavía.</p>
            @endif
        </div>

    </div>
@endsection
