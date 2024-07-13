<?php

namespace App\Livewire;

use App\Models\Categoria;
use App\Models\Salario;
use App\Models\Vacante;
use Livewire\Component;
use Livewire\WithFileUploads;

class CrearVacante extends Component
{
    public $titulo;
    public $salario_id;
    public $categoria_id;
    public $empresa;
    public $ultimo_dia;
    public $descripcion;
    public $imagen;

    use WithFileUploads; // Permita el acceso de subida de archivos

    protected $rules = [
        'titulo' => 'required|string',
        'salario_id' => 'required',
        'categoria_id' => 'required',
        'empresa' => 'required',
        'ultimo_dia' => 'required',
        'descripcion' => 'required',
        'imagen' => 'required|image|mimes:jpeg,png,jpg|max:2048',
    ];

    public function crearVacante()
    {
        $data = $this->validate($this->rules);

        // store(ruta)-> almacena en la carpeta storage/app/public/vacantes
        $imagen = $this->imagen->store('public/vacantes'); // Almacenar la imagen
        $nombre_imagen = str_replace('public/vacantes/', '', $imagen);

        // Crear la vacante
        Vacante::create([
            'titulo' => $data['titulo'],
            'salario_id' => $data['salario_id'],
            'categoria_id' => $data['categoria_id'],
            'empresa' => $data['empresa'],
            'ultimo_dia' => $data['ultimo_dia'],
            'descripcion' => $data['descripcion'],
            'imagen' => $nombre_imagen,
            'user_id' => auth()->user()->id,
        ]);

        // Redireccionar al usuario
        return redirect()->route('vacantes.index')->with('mensaje', 'La vacante se publicó correctamente');
    }

    public function render()
    {
        $salarios = Salario::all();
        $categorias = Categoria::all();

        return view('livewire.crear-vacante', compact('salarios', 'categorias'));
    }
}
