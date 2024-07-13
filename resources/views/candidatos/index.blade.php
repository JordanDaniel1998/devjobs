<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Candidatos Vacante') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-10 text-gray-900 dark:text-gray-100 flex flex-col gap-10">
                    <h1 class="text-3xl font-bold text-center">
                        Candidatos Vacante: {{ $vacante->titulo }}
                    </h1>
                    <div class="flex justify-center items-start">
                        <ul class="divide-y divide-gray-200 w-full">
                            @if ($vacante->candidatos->count() > 0)
                                @foreach ($vacante->candidatos as $candidato)
                                    <li class="p-3 flex items-center">
                                        <div class="flex-1">
                                            <p class="text-xl font-medium text-gray-800">
                                                {{ $candidato->user->name }}
                                            </p>

                                            <p class="text-xl font-medium text-gray-800">
                                                {{ $candidato->user->email }}
                                            </p>

                                            <p class="text-xl font-medium text-gray-800">
                                                Día que se postuló: <span class="font-normal">
                                                    {{ $candidato->created_at->diffForHumans() }}
                                                </span>
                                            </p>
                                        </div>

                                        <div>
                                            <a href="{{ asset('storage/cv/' . $candidato->cv) }}" target="_blank" rel="noreferrer noopener" class="inline-flex items-center shadow-sm px-2.5 py-0.5 border border-gray-300 text-sm leading-5 font-medium rounded-full text-gray-700 bg-white hover:bg-gray-50">
                                                Ver CV
                                            </a>
                                        </div>
                                    </li>
                                @endforeach
                            @else
                                <p class="p-3 text-center text-sm text-gray-600">No hay candidatos aún.</p>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
