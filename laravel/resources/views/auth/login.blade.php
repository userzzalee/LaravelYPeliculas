<x-guest-layout>

    <div class="p-8 flex justify-center bg-gradient-to-br from-gray-900 to-gray-800">

        <div class="w-full max-w-md bg-gray-800 text-white p-8 rounded-2xl shadow-2xl">

            <!-- Título -->
            <div class="text-center mb-6">
                <h1 class="text-3xl font-bold text-red-500">🎬 MovieApp</h1>
                <p class="text-gray-400 text-sm mt-2">Inicia sesión para continuar</p>
            </div>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4 text-green-400" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}" class="space-y-5">
                @csrf

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium mb-1">
                        Correo Electrónico
                    </label>
                    <input id="email"
                           type="email"
                           name="email"
                           value="{{ old('email') }}"
                           required
                           autofocus
                           class="w-full rounded-lg bg-gray-700 border border-gray-600 text-white px-4 py-2 focus:ring-2 focus:ring-red-500 focus:outline-none">

                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-400" />
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block text-sm font-medium mb-1">
                        Contraseña
                    </label>
                    <input id="password"
                           type="password"
                           name="password"
                           required
                           class="w-full rounded-lg bg-gray-700 border border-gray-600 text-white px-4 py-2 focus:ring-2 focus:ring-red-500 focus:outline-none">

                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-400" />
                </div>

                <!-- Remember + Forgot -->
                <div class="flex items-center justify-between text-sm">
                    <label class="flex items-center">
                        <input type="checkbox"
                               name="remember"
                               class="rounded border-gray-600 bg-gray-700 text-red-600 focus:ring-red-500">
                        <span class="ml-2 text-gray-400">
                            Recordarme
                        </span>
                    </label>

                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}"
                           class="text-gray-400 hover:text-red-500 transition">
                            ¿Olvidaste tu contraseña?
                        </a>
                    @endif
                </div>

                <!-- Botón -->
                <button type="submit"
                        class="w-full bg-red-600 hover:bg-red-700 transition rounded-lg py-2 font-semibold shadow-lg">
                    🎥 Iniciar Sesión
                </button>

            </form>

        </div>

    </div>

</x-guest-layout>
