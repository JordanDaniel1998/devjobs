<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Editar Vacante') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-10 text-gray-900 dark:text-gray-100 flex flex-col gap-10">
                    <h1 class="text-3xl font-bold text-center">
                        Editar Vacante: {{ $vacante->titulo }}
                    </h1>
                    <div class="flex justify-center items-start">
                        <livewire:editar-vacante :vacante="$vacante" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
