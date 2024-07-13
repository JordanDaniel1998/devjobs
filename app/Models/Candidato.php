<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidato extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'vacante_id', 'cv'];


    // Un candidato puede ser un solo usuario
    public function user(){
        return $this->belongsTo(User::class);
    }
}