<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suscripciones_Usuarios extends Model
{
    public $timestamps=false;
    use HasFactory;
    
    protected $fillable = [
        'id_suscripcion_usuarios',
        'id_usuario',
        'id_suscripcion',
        'fecha_inicio',
        'fecha_fin',
        'estado'
    ];

}