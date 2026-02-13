@extends('layouts.app')

@section('content')

<form action="{{ route('movies.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <!-- Título -->
    <div class="mb-3">
        <label for="titulo" class="form-label fw-bold">
            Título <span class="text-danger">*</span>
        </label>
        <input type="text" class="form-control @error('titulo') is-invalid @enderror"
            id="titulo" name="titulo" value="{{ old('titulo') }}" placeholder="Ingresa el título">
        @error('titulo')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <!-- Director -->
    <div class="mb-3">
        <label for="director" class="form-label fw-bold">
            Director <span class="text-danger">*</span>
        </label>
        <input type="text" class="form-control @error('director') is-invalid @enderror"
            id="director" name="director" value="{{ old('director') }}" placeholder="Nombre del director">
        @error('director')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <!-- Año -->
    <div class="mb-3">
        <label for="año" class="form-label fw-bold">
            Año <span class="text-danger">*</span>
        </label>
        <input type="number" class="form-control @error('año') is-invalid @enderror"
            id="año" name="año" value="{{ old('año') }}" placeholder="2024" min="1900" max="2030">
        @error('año')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <!-- Género -->
    <div class="mb-3">
        <label for="genero" class="form-label fw-bold">
            Género <span class="text-danger">*</span>
        </label>
        <select class="form-select @error('genero') is-invalid @enderror" id="genero" name="genero">
            <option value="">Selecciona un género</option>
            <option value="Ciencia Ficción" {{ old('genero') == 'Ciencia Ficción' ? 'selected' : '' }}>Ciencia Ficción</option>
            <option value="Acción" {{ old('genero') == 'Acción' ? 'selected' : '' }}>Acción</option>
            <option value="Drama" {{ old('genero') == 'Drama' ? 'selected' : '' }}>Drama</option>
            <option value="Thriller" {{ old('genero') == 'Thriller' ? 'selected' : '' }}>Thriller</option>
            <option value="Animación" {{ old('genero') == 'Animación' ? 'selected' : '' }}>Animación</option>
        </select>
        @error('genero')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <!-- Duración -->
    <div class="mb-3">
        <label for="duracion" class="form-label fw-bold">
            Duración (minutos) <span class="text-danger">*</span>
        </label>
        <input type="number" class="form-control @error('duracion') is-invalid @enderror"
            id="duracion" name="duracion" value="{{ old('duracion') }}" placeholder="148" min="1">
        @error('duracion')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <!-- Sinopsis -->
    <div class="mb-3">
        <label for="sinopsis" class="form-label fw-bold">
            Sinopsis <span class="text-danger">*</span>
        </label>
        <textarea class="form-control @error('sinopsis') is-invalid @enderror" id="sinopsis" name="sinopsis" rows="4"
            placeholder="Escribe una sinopsis de la película">{{ old('sinopsis') }}</textarea>
        @error('sinopsis')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <!-- Reparto -->
    <div class="mb-3">
        <label for="reparto" class="form-label fw-bold">
            Reparto
        </label>
        <textarea class="form-control @error('reparto') is-invalid @enderror" id="reparto" name="reparto" rows="3"
            placeholder="Leonardo DiCaprio, Tom Hardy...">{{ old('reparto') }}</textarea>
        @error('reparto')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <!-- Botones -->
    <div class="d-flex justify-content-between">
        <button type="submit" class="btn btn-primary">
            <i class="bi bi-check-circle me-1"></i> Crear Película
        </button>
        <a href="{{ route('movies.index') }}" class="btn btn-secondary">
            <i class="bi bi-x-circle me-1"></i> Cancelar
        </a>
    </div>
</form>
