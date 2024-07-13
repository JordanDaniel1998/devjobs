<?php

namespace App\Livewire;

use App\Models\Categoria;
use App\Models\Salario;
use App\Models\Vacante;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditarVacante extends Component
{
    public $vacante_id;
    public $titulo;
    public $salario_id;
    public $categoria_id;
    public $empresa;
    public $ultimo_dia;
    public $descripcion;
    public $imagen;
    public $imagen_nueva;

    use WithFileUploads; // Permita el acceso de subida de archivos

    public function mount(Vacante $vacante)
    {
        $this->vacante_id = $vacante->id;
        $this->titulo = $vacante->titulo;
        $this->salario_id = $vacante->salario_id;
        $this->categoria_id = $vacante->categoria_id;
        $this->empresa = $vacante->empresa;
        $this->ultimo_dia = Carbon::parse($vacante->ultimo_dia)->format('Y-m-d');
        $this->descripcion = $vacante->descripcion;
        $this->imagen = $vacante->imagen;
    }

    protected $rules = [
        'titulo' => 'required|string',
        'salario_id' => 'required',
        'categoria_id' => 'required',
        'empresa' => 'required',
        'ultimo_dia' => 'required',
        'descripcion' => 'required',
        'imagen_nueva' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    ];

    public function editarVacante()
    {
        $data = $this->validate($this->rules);

        // Encontrar la vacante
        $vacante = Vacante::find($this->vacante_id);

        // Si hay nueva una nueva imagen
        if ($this->imagen_nueva) {
            // Eliminar la imagen antigua del storage
            $isImage = Storage::exists('public/vacantes/' . $vacante->imagen);
            if ($isImage) {
                Storage::delete('public/vacantes/' . $vacante->imagen);
            }
            $imagen = $this->imagen_nueva->store('public/vacantes');
            $data['imagen'] = str_replace('public/vacantes/', '', $imagen);
        }

        // Asignar los valores
        $vacante->titulo = $data['titulo'];
        $vacante->salario_id = $data['salario_id'];
        $vacante->categoria_id = $data['categoria_id'];
        $vacante->empresa = $data['empresa'];
        $vacante->ultimo_dia = $data['ultimo_dia'];
        $vacante->descripcion = $data['descripcion'];
        $vacante->user_id = auth()->user()->id;
        $vacante->imagen = $data['imagen'] ?? $vacante->imagen;

        // Actualizar la vacante
        $vacante->save();

        // Redireccionar al usuario
        return redirect()->route('vacantes.index')->with('mensaje', 'La vacante sse actualizó correctamente');
    }

    public function render()
    {
        $salarios = Salario::all();
        $categorias = Categoria::all();

        return view('livewire.editar-vacante', compact('salarios', 'categorias'));
    }
}