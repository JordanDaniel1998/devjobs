<div class="bg-gray-100 p-5 mt-10 flex flex-col justify-center items-center">
    <h3 class="text-center text-2xl font-bold my-4">Postularme a esta vacante</h3>

    @if (session()->has('mensaje'))
        <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show"
            class="uppercase border border-green-600 bg-green-100 text-green-600 font-bold p-2 my-3 text-sm">
            {{ session('mensaje') }}
        </div>
    @else
        <form wire:submit.prevent="postularme" class="w-96 mt-5" novalidate>
            <div class="mb-4 text-center">
                <x-input-label for="cv" :value="__('Curriculum u Hoja de Vida')" />
                <x-text-input id="cv" class="block mt-1 w-full" type="file" name="cv" required autofocus
                    autocomplete="cv" accept=".pdf" wire:model="cv" />
                @error('cv')
                    <livewire:mostrar-alerta :message="$message" />
                @enderror
            </div>

            <div class="pt-5">
                <x-primary-button class="w-full">
                    {{ __('Postularme') }}
                </x-primary-button>
            </div>
        </form>
    @endif


</div>
