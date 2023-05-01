<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listas_Reproduccion extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'id_lista',
        'id_usuario',
        'nombre_lista',
        'id_contenido',
        'fecha_creacion'
    ];

}