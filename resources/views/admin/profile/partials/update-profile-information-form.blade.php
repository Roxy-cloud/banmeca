<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Informacion del Perfil') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Actualice su información personal y su correo Electrónico.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')
        <div>
            <x-input-label for="name" :value="__('Nombre')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>


        <div>
            <x-input-label for="email" :value="__('Correo Electrónico')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-red-600">
                        {{ __('Tu correo electrónico aún no ha sido verificado.') }}
                    </p>
                    <button form="send-verification" class="underline text-sm text-blue-600 hover:text-blue-800">
                        {{ __('Reenviar correo de verificación') }}
                    </button>
                </div>
            @endif

        </div>
        <div>
            <x-input-label for="avatar" :value="__('Foto de Perfil')" />
            <input type="file" name="avatar" accept="image/*" class="mt-1 block w-full">
            <img src="{{ auth()->user()->avatar ? asset('storage/' . auth()->user()->avatar) : asset('assets/avatar.jpg') }}" alt="Avatar" width="150">
        </div>


        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Actualizar') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400"
                >{{ __('Actualización Exitosa.') }}</p>
            @endif
        </div>
    </form>
</section>
