<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
<<<<<<< HEAD

=======
<div>
>>>>>>> e2a8b4e (Primer commit)
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
<<<<<<< HEAD
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
=======
            <x-text-input id="email" class="block mt-1 w-full"
              type="email"
              name="email"
              :value="old('email')"
              style="background-color: #f0f8ff;" 
              required autofocus autocomplete="username" />
>>>>>>> e2a8b4e (Primer commit)
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
<<<<<<< HEAD
                            type="password"
                            name="password"
                            required autocomplete="current-password" />
=======
              type="password"
              name="password"
              style="background-color:rgb(250, 250, 250);" 
              required autocomplete="current-password" />
>>>>>>> e2a8b4e (Primer commit)

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
<<<<<<< HEAD
                <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
=======
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 dark:border-gray-800 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
>>>>>>> e2a8b4e (Primer commit)
                <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Recordar mis datos') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                    {{ __('Olvidó su contraseña?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Entrar') }}
            </x-primary-button>
        </div>
    </form>
<<<<<<< HEAD
=======
    </div>
>>>>>>> e2a8b4e (Primer commit)
</x-guest-layout>
