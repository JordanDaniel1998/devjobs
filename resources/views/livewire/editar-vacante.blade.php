<div class="w-full" wire:submit.prevent="editarVacante">
    <form action="" method="POST" novalidate class="flex flex-col gap-5">
        @csrf

        <!-- Título de la vacante -->
        <div>
            <x-input-label for="titulo" :value="__('Título de la Vacante')" />
            <x-text-input id="titulo" class="block mt-1 w-full" type="text" name="titulo" :value="old('titulo')" required
                autofocus autocomplete="titulo" placeholder="Nombre de la vacante" wire:model="titulo" />
            {{-- <x-input-error :messages="$errors->get('titulo')" class="mt-2" /> --}}
            @error('titulo')
                <livewire:mostrar-alerta :message="$message" />
            @enderror
        </div>

        <!-- Salario mensual de la vacante -->
        <div>
            <x-input-label for="salario_id" :value="__('Salario Mensual')" class="pb-1" />
            <select name="salario_id" id="salario_id" wire:model="salario_id"
                class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-full">
                <option value="">-- Selecciona un salario --</option>
                @foreach ($salarios as $salario)
                    <option value="{{ $salario->id }}">{{ $salario->salario }}</option>
                @endforeach
            </select>
            @error('salario_id')
                <livewire:mostrar-alerta :message="$message" />
            @enderror
        </div>

        <!-- Categoría -->
        <div>
            <x-input-label for="categoria_id" :value="__('Categoría')" class="pb-1" />
            <select name="categoria_id" id="categoria_id" wire:model="categoria_id"
                class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-full">
                <option value="">-- Selecciona una categoría --</option>
                @foreach ($categorias as $categoria)
                    <option value="{{ $categoria->id }}">{{ $categoria->categoria }}</option>
                @endforeach
            </select>
            @error('categoria_id')
                <livewire:mostrar-alerta :message="$message" />
            @enderror
        </div>

        <!-- Empresa -->
        <div>
            <x-input-label for="empresa" :value="__('Empresa')" />
            <x-text-input id="empresa" class="block mt-1 w-full" type="text" name="empresa" :value="old('empresa')"
                required wire:model="empresa" autofocus autocomplete="empresa" placeholder="Nombre de la empresa" />
            @error('empresa')
                <livewire:mostrar-alerta :message="$message" />
            @enderror
        </div>

        <!-- Ultimo dia -->
        <div>
            <x-input-label for="ultimo_dia" :value="__('Último día para postularse')" />
            <x-text-input id="ultimo_dia" class="block mt-1 w-full" type="date" name="ultimo_dia" :value="old('ultimo_dia')"
                required wire:model="ultimo_dia" autofocus autocomplete="ultimo_dia" />
            @error('ultimo_dia')
                <livewire:mostrar-alerta :message="$message" />
            @enderror
        </div>

        <!-- Descripción -->
        <div>
            <x-input-label for="descripcion" :value="__('Descripción del puesto')" />
            <textarea name="descripcion" id="descripcion" cols="30" rows="10" required autofocus
                autocomplete="descripcion" class="block mt-1 w-full" placeholder="Descripción del puesto" wire:model="descripcion">{{ old('descripcion') }}</textarea>
            @error('descripcion')
                <livewire:mostrar-alerta :message="$message" />
            @enderror
        </div>

        <!-- Imagen -->
        <div>
            <x-input-label for="imagen_nueva" :value="__('Imagen')" />
            <x-text-input id="imagen_nueva" class="block mt-1 w-full" type="file" name="imagen_nueva" required
                autofocus wire:model="imagen_nueva" accept="image/*" />

            <div class="mt-5">
                <x-input-label :value="__('Imagen actual')" />
                <div class="w-96 mt-2">
                    <img src="{{ asset('storage/vacantes' . '/' . $imagen) }}" alt="{{ $titulo }}">
                </div>
            </div>

            @if ($imagen_nueva)
                <div class="w-96 mt-5">
                    <p>Imagen Nueva:</p>
                    <img src="{{ $imagen_nueva->temporaryUrl() }}" alt="imagen previa" class="mt-2">
                </div>
            @endif
        </div>

        <div class="pt-5">
            <x-primary-button class="w-full font-bold">
                {{ __('Guardar Cambios') }}
            </x-primary-button>
        </div>
    </form>
</div>
