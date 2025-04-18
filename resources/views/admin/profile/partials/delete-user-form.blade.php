<x-danger-button x-data="{ confirmDelete: false }" x-on:click="confirmDelete = true">
    {{ __('Eliminar Cuenta') }}
</x-danger-button>

<div x-show="confirmDelete" class="bg-red-100 p-4 rounded-lg">
    <p class="text-sm text-red-600">
        {{ __('¿Estás seguro? Esta acción no se puede revertir.') }}
    </p>
    <form method="post" action="{{ route('profile.destroy') }}" class="mt-4">
        @csrf
        @method('delete')
        <x-primary-button>{{ __('Eliminar') }}</x-primary-button>
        <x-secondary-button x-on:click="confirmDelete = false">{{ __('Cancelar') }}</x-secondary-button>
    </form>
</div>
