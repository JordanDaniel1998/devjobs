<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Notificaciones') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-10 text-gray-900 dark:text-gray-100 flex flex-col">
                    <h1 class="text-3xl font-bold text-center py-10">
                        Mis Notificaciones
                    </h1>

                    @if ($notificaciones->count() > 0)
                        @foreach ($notificaciones as $notificacion)
                            <div class="divide-y divide-gray-200">
                                <div
                                    class="p-5 flex flex-col md:flex-row justify-between items-start md:items-center gap-5">
                                    <div>
                                        <p>Tienes un nuevo candidato en:
                                            <span class="font-bold">{{ $notificacion->data['nombre_vacante'] }}</span>
                                        </p>

                                        <p class="font-bold">
                                            {{ $notificacion->created_at->diffForHumans() }}
                                        </p>
                                    </div>
                                    <div class="flex justify-center items-center">
                                        <a href="{{ route('candidatos.index', $notificacion->data['id_vacante']) }}"
                                            class="bg-teal-500 p-3 text-sm uppercase font-bold text-white rounded-lg text-center">Ver
                                            candidato</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <p class="text-center text-gray-600">No hay notificaciones nuevas</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
