<x-guest-layout>

    <div class="p-20 flex justify-center bg-gradient-to-br from-gray-900 to-gray-800">

        <div class="w-full max-w-4xl bg-gray-800 text-white p-8 rounded-2xl shadow-2xl">

            <!-- Título -->
            <div class="text-center mb-6">
                <h1 class="text-3xl font-bold text-red-500">🎬 MovieApp</h1>
                <p class="text-gray-400 text-sm mt-2">Crea tu cuenta</p>
            </div>

            <form method="POST" action="{{ route('register') }}" class="space-y-5">
                @csrf

                <!-- Name -->
                <div>
                    <label for="name" class="block text-sm font-medium mb-1">
                        Nombre
                    </label>
                    <input id="name"
                           type="text"
                           name="name"
                           value="{{ old('name') }}"
                           required
                           autofocus
                           autocomplete="name"
                           class="w-full rounded-lg bg-gray-700 border border-gray-600 text-white px-4 py-2 focus:ring-2 focus:ring-red-500 focus:outline-none">

                    <x-input-error :messages="$errors->get('name')" class="mt-2 text-red-400" />
                </div>

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
                           autocomplete="username"
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
                           autocomplete="new-password"
                           class="w-full rounded-lg bg-gray-700 border border-gray-600 text-white px-4 py-2 focus:ring-2 focus:ring-red-500 focus:outline-none">

                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-400" />
                </div>

                <!-- Confirm Password -->
                <div>
                    <label for="password_confirmation" class="block text-sm font-medium mb-1">
                        Confirmar Contraseña
                    </label>
                    <input id="password_confirmation"
                           type="password"
                           name="password_confirmation"
                           required
                           autocomplete="new-password"
                           class="w-full rounded-lg bg-gray-700 border border-gray-600 text-white px-4 py-2 focus:ring-2 focus:ring-red-500 focus:outline-none">

                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-red-400" />
                </div>

                <!-- Link + Botón -->
                <div class="flex items-center justify-between text-sm">
                    <a href="{{ route('login') }}"
                       class="text-gray-400 hover:text-red-500 transition">
                        ¿Ya tienes cuenta?
                    </a>

                    <button type="submit"
                            class="bg-red-600 hover:bg-red-700 transition rounded-lg px-6 py-2 font-semibold shadow-lg">
                        🎥 Registrarse
                    </button>
                </div>

            </form>

        </div>

    </div>

</x-guest-layout>
