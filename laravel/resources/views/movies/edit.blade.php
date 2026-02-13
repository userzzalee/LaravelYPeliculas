@extends('layouts.app')

@section('title', 'Editar Película')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <h1 class="mb-4">Editar Película</h1>

                <form action="{{ route('movies.update', $movie) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    {{-- Titulo --}}
                    <div class="mb-3">
                        <label class="form-label">Título</label>
                        <input type="text" name="titulo" class="form-control @error('titulo') is-invalid @enderror"
                                value="{{ old('titulo', $movie->titulo) }}">
                        @error('titulo')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Director --}}
                    <div class="mb-3">
                        <label class="form-label">Director</label>
                        <input type="text" name="director" class="form-control @error('director') is-invalid @enderror"
                                value="{{ old('director', $movie->director) }}">
                        @error('director')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Año --}}
                    <div class="mb-3">
                        <label class="form-label">Año de estreno</label>
                        <input type="number" name="año" class="form-control @error('año') is-invalid @enderror"
                                value="{{ old('año', $movie->año) }}">
                        @error('año')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Género --}}
                    <div class="mb-3">
                        <label class="form-label">Género</label>
                        <input type="text" name="genero" class="form-control @error('genero') is-invalid @enderror"
                                value="{{ old('genero', $movie->genero) }}">
                        @error('genero')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Duración --}}
                    <div class="mb-3">
                        <label class="form-label">Duración (minutos)</label>
                        <input type="number" name="duracion" class="form-control @error('duracion') is-invalid @enderror"
                                value="{{ old('duracion', $movie->duracion) }}">
                        @error('duracion')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Sinopsis --}}
                    <div class="mb-3">
                        <label class="form-label">Sinopsis</label>
                        <textarea name="sinopsis" class="form-control @error('sinopsis') is-invalid @enderror"
                                    rows="4">{{ old('sinopsis', $movie->sinopsis) }}</textarea>
                        @error('sinopsis')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Reparto --}}
                    <div class="mb-3">
                        <label class="form-label">Reparto (opcional)</label>
                        <textarea name="reparto" class="form-control @error('reparto') is-invalid @enderror"
                                    rows="2">{{ old('reparto', $movie->reparto) }}</textarea>
                        @error('reparto')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Imagen actual --}}
                    <div class="mb-3">
                        <label class="form-label">Imagen actual</label>
                        <div>
                            @if($movie->image)
                                <img src="{{ asset('storage/'.$movie->image) }}" width="150" class="mb-2">
                            @else
                                <p>No hay imagen</p>
                            @endif
                        </div>
                    </div>

                    {{-- Nueva imagen --}}
                    <div class="mb-3">
                        <label class="form-label">Cambiar imagen (opcional)</label>
                        <input type="file" name="image"
                                class="form-control @error('image') is-invalid @enderror">
                        @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Botones --}}
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                    <a href="{{ route('movies.index') }}" class="btn btn-secondary">Cancelar</a>
                </form>
            </div>
        </div>
    </div>
@endsection
