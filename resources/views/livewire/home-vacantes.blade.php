<div>

    <livewire:filtrar-vacantes />

    <div class="py-12">
        <div class="max-w-7xl mx-auto">
            <h3 class="font-extrabold text-4xl text-gray-700 mb-12">
                Nuestras Vacanates Disponibles
            </h3>
            <div class="bg-white shadow-sm rounded-lg p-6 divide-y divide-gray-200">
                @if ($vacantes->count() > 0)
                    @foreach ($vacantes as $vacante)
                        <div class="md:flex md:justify-between md:items-center py-5">
                            <div class="md:flex-1">
                                <a href="{{ route('vacantes.show', $vacante->id) }}" class="text-3xl font-extrabold text-gray-600">
                                    {{ $vacante->titulo }}
                                </a>
                                <p class="text-base text-gray-600 mb-1">
                                    {{ $vacante->empresa }}
                                </p>

                                <p class="text-xs font-bold text-gray-600 mb-1">
                                    {{ $vacante->categoria->categoria }}
                                </p>

                                <p class="text-base text-gray-600 mb-1">
                                    {{ $vacante->salario->salario }}
                                </p>

                                <p class="font-bold text-xs uppercase text-gray-600">Último día para postularse:
                                    <span class="normal-case font-normal">{{ $vacante->ultimo_dia->format('m/d/Y') }}</span>
                                </p>
                            </div>

                            <div class="flex justify-start md:justify-center items-center pt-5 md:pt-0">
                                <a href="{{ route('vacantes.show', $vacante->id) }}" class="bg-teal-500 p-3 text-sm uppercase font-bold text-white rounded-lg text-center">
                                    Ver Vacante
                                </a>
                            </div>
                        </div>
                    @endforeach
                @else
                    <p class="p-3 text-center text-sm text-gray-600">No hay vacantes aún</p>
                @endif
            </div>
        </div>
    </div>
</div>
