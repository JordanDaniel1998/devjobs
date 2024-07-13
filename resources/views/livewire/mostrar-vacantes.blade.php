<div>
    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        @if ($vacantes->count() > 0)
            @foreach ($vacantes as $vacante)
                <div
                    class="p-6 bg-white border-b border-gray-200 flex flex-col gap-5 md:flex-row md:justify-between md:items-center">
                    <div class="flex flex-col gap-3">
                        <a href="{{ route('vacantes.show', $vacante->id) }}" class="text-xl font-bold">
                            {{ $vacante->titulo }}
                        </a>
                        <p class="text-sm text-gray-600 font-bold">{{ $vacante->empresa }}</p>
                        <p class="text-sm text-gray-500">Último día: {{ $vacante->ultimo_dia->format('d/m/Y') }}</p>
                    </div>

                    <div class="flex justify-start md:justify-center items-center gap-2">
                        <a href="{{ route('candidatos.index', $vacante) }}"
                            class="bg-slate-800 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase">
                            {{ $vacante->candidatos->count() }}
                            Candidatos
                        </a>

                        <a href="{{ route('vacantes.edit', $vacante->id) }}"
                            class="bg-blue-800 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase">Editar</a>

                        <button wire:click="$dispatch('eliminar', {{ $vacante->id }})" type="button"
                            class="bg-red-800 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase">Eliminar</button>

                    </div>
                </div>
            @endforeach
        @else
            <p class="p-3 text-center text-sm text-gray-600">No hay vacantes que mostrar</p>
        @endif
    </div>

    <div class="my-5">
        {{ $vacantes->links() }}
    </div>
</div>

@push('scripts')
    <script src="{{ asset('js/sweetalert2011.min.js') }}"></script>
    <script>
        document.addEventListener('livewire:initialized', () => {
            @this.on('eliminar', (vacanteId) => {
                Swal.fire({
                    title: '¿Eliminar Vacante?',
                    text: "Una vacante que se elimina no podrá ser recuperada!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si, eliminar!',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        @this.call('eliminarVacante', vacanteId);

                        Swal.fire(
                            'Eliminado!',
                            'La vacante fue eliminada.',
                            'success'
                        )
                    }
                })
            });
        });
    </script>
@endpush
