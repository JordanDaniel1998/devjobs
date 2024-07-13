<div class="p-10">
    <div class="mb-5">
        <h3 class="font-bold text-3xl text-gray-800 my-3">
            {{ $vacante->titulo }}
        </h3>

        <div class="grid grid-cols-1 md:grid-cols-2 bg-gray-50 p-4 my-5 gap-5">
            <p class="font-bold text-sm uppercase text-gray-800">Empresa:
                <span class="normal-case font-normal">{{ $vacante->empresa }}</span>
            </p>

            <p class="font-bold text-sm uppercase text-gray-800">Último día para postularse:
                <span class="normal-case font-normal">{{ $vacante->ultimo_dia->format('m/d/Y') }}</span>
            </p>

            <p class="font-bold text-sm uppercase text-gray-800">Categoría:
                <span class="normal-case font-normal">{{ $vacante->categoria->categoria }}</span>
            </p>

            <p class="font-bold text-sm uppercase text-gray-800">Salario:
                <span class="normal-case font-normal">{{ $vacante->salario->salario }}</span>
            </p>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-6 gap-5">
        <div class="col-span-3">
            <img src="{{ asset('storage/vacantes/' . $vacante->imagen) }}" alt="{{ $vacante->titulo }}">
        </div>

        <div class="col-span-3">
            <h2 class="text-2xl font-bold mb-5">Descripción del Puesto</h2>
            <p>{{ $vacante->descripcion }}</p>
        </div>
    </div>

    @guest
        <div class="mt-5 bg-gray-50 border border-dashed p-5 text-center">
            <p>¿Deses aplicar a esta vacante?
                <a href="{{ route('register') }}" class="font-bold text-indigo-600">Obten una cuenta y aplic a esta y ottras
                    vacantes</a>
            </p>
        </div>
    @endguest

    @cannot('create', App\Models\Vacante::class)
        <livewire:postular-vacante :vacante="$vacante" />
    @endcannot

</div>
