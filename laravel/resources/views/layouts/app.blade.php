<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>🎬 LetterDox</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gray-400 text-white">

<!-- Contenedor principal -->
<div class="min-h-screen flex flex-col">

    <!-- Navbar / Header -->
    <header class="bg-black/80 shadow-md">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
            <a href="{{ route('dashboard') }}" class="text-2xl font-bold text-red-500 tracking-wide">
                🎬 LetterDox
            </a>
            <!-- Aquí puedes agregar enlaces o perfil de usuario -->
            <nav class="space-x-4">
                <a href="{{ route('dashboard') }}" class="text-gray-300 hover:text-red-500 transition">Inicio</a>
                <a href="{{ route('movies.index') }}" class="text-gray-300 hover:text-red-500 transition">Películas</a>
                <a class="nav-link" href="{{ route('profile.index') }}">Mi Perfil</a>
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit" class="text-gray-300 hover:text-red-500 transition">Cerrar sesión</button>
                </form>
            </nav>
        </div>
    </header>

    <!-- Contenido -->
    <main class="flex-grow flex justify-center items-start py-10 px-6">
        <div class="w-full max-w-7xl">
            @yield('content')
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 mt-10 py-4 text-center text-gray-400 text-sm">
        © 2026 MovieApp - Proyecto Laravel
    </footer>

</div>

</body>
</html>
