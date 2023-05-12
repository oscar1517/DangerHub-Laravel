<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listas_Reproduccion extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'id',
        'id_perfil',
        'nombre_lista',
        'fecha_creacion',
    ];

}