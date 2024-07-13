<?php

namespace App\Livewire;

use App\Models\Vacante;
use App\Notifications\NuevoCandidato;
use Livewire\Component;
use Livewire\WithFileUploads;

class PostularVacante extends Component
{
    public $cv;
    public $vacante;

    use WithFileUploads; // Permita el acceso de subida de archivos

    protected $rules = [
        'cv' => 'required|mimes:pdf',
    ];

    public function mount(Vacante $vacante){
        $this->vacante = $vacante;
    }

    public function postularme()
    {
        $data = $this->validate($this->rules);

        // Almacenar CV en el disco duro
        $cv = $this->cv->store('public/cv');
        $data['cv'] = str_replace('public/cv/', '', $cv);
        // Crear la vacante
        $this->vacante->candidatos()->create([
            'user_id' => auth()->user()->id,
            'vacante_id' => $this->vacante->id,
            'cv' => $data['cv']
        ]);

        // Crear notificacion y enviar el email
        // AL reclutador es al que notifica
        $this->vacante->reclutador->notify(new NuevoCandidato($this->vacante->id, $this->vacante->titulo, auth()->user()->id));

        // Redireccionar al usuario
        return redirect()->back()->with('mensaje', 'Se envío correctamente tu información, mucha suerte');

    }

    public function render()
    {
        return view('livewire.postular-vacante');
    }
}
