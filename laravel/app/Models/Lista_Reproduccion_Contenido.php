<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lista_Reproduccion_Contenido extends Model
{
    public $timestamps=false;
    use HasFactory;
    
    protected $fillable = [
        'id_contenido',
        'id_usuario',
        'id_lista'
    ];

}