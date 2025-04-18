<x-guest-layout>
<<<<<<< HEAD
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
=======
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-200">
        {{ __('Olvidó su contraseña? No hay problema..!!  Sólo coloque su correo electrónico y le enviaremos un link para que pueda crear una nueva y así acceder a nuestro sistema.') }}
>>>>>>> e2a8b4e (Primer commit)
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
<<<<<<< HEAD
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
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

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
<<<<<<< HEAD
                {{ __('Email Password Reset Link') }}
=======
                {{ __('Enviar Link de Recuperación') }}
>>>>>>> e2a8b4e (Primer commit)
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
