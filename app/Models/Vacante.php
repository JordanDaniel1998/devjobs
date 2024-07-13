<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacante extends Model
{
    use HasFactory;

    protected $casts = [ 'ultimo_dia'=>'date'];

    protected $fillable = ['titulo', 'categoria_id', 'empresa', 'ultimo_dia', 'descripcion', 'imagen', 'user_id', 'salario_id'];

    // Una vacante solo le pertenece a una categoria
    public function categoria(){
        return $this->belongsTo(Categoria::class);
    }

    // Una vacante solo le pertenece a un salario
    public function salario(){
        return $this->belongsTo(Salario::class);
    }

    // Una vacante puede tener muchos candidatos
    public function candidatos(){
        return $this->hasMany(Candidato::class)->orderBy('created_at', 'desc');
    }

    // Una vacante solo le pertence a un usuario
    public function reclutador(){
        return $this->belongsTo(User::class, 'user_id');
    }

}
