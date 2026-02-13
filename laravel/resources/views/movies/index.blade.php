@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Películas</h1>

            {{-- Enlace para crear una nueva pelicula (solo autenticados) --}}
            @auth
                <button>
                    <a href="{{ route('movies.create') }}" class="btn btn-primary mt-2">
                        Agregar la primera película
                    </a>
                </button>
            @endauth
        </div>

        {{-- Aqui es donde creamos la tabla  --}}
        {{-- Entonces mientras que en peliculas haya mas de 1 empezara mostrara la tabla--}}
        @if($movies->count() > 0)
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead class="table-dark">
                    <tr>
                        <th>Imagen</th>
                        <th>Titulo</th>
                        <th>Director</th>
                        <th>Año</th>
                        <th>Genero</th>
                        <th>Rating</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>

                    {{--Aqui recorremos cada pelicula individualmente para colorcarlo en cada fila--}}
                    @foreach ($movies as $movie)
                        <tr>
                            <td>
                                <img
                                    src="{{ $movie->image_url }}"
                                    alt="{{ $movie->titulo }}"
                                    style="width: 80px; height: 120px; object-fit: cover;"
                                    class="rounded"
                                >
                            </td>
                            <td class="align-middle">
                                <strong>{{ $movie->titulo }}</strong>
                            </td>

                            {{-- Aqui vamos indiacando lo que va a tener cada fila --}}
                            <td class="align-middle">{{ $movie->director }}</td>
                            <td class="align-middle">{{ $movie->año }}</td>
                            <td class="align-middle">{{ $movie->genero }}</td>
                            <td class="align-middle">
                                @if($movie->average_rating)
                                    <span class="badge bg-warning text-dark">
                                            {{ $movie->average_rating }}
                                        </span>
                                @else
                                    <span class="badge bg-secondary">Sin valorar</span>
                                @endif
                            </td>
                            <td class="align-middle">
                                {{-- Boton de ver mas --}}
                                <a href="{{ route('movies.show', $movie) }}" class="btn btn-primary btn-sm">
                                    Ver mas
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

                {{-- Links es metodo que nos permite agregar el boton de next y previous--}}
            <div class="d-flex justify-content-center mt-4">
                {{ $movies->links() }}
            </div>

        @else
            {{-- Mensaje si no hay contenido --}}
            <div class="alert alert-info text-center" role="alert">
                <h4>No hay películas disponibles</h4>
                <p>Aún no se han agregado películas a la base de datos.</p>
                @auth
                    <button>
                        <a href="{{ route('movies.create') }}" class="btn btn-primary mt-2">
                            Agregar la primera película
                        </a>
                    </button>
                @endauth
            </div>
        @endif
    </div>
@endsection
