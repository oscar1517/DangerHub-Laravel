<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contenido extends Model
{
    public $timestamps=false;
    use HasFactory;
    
    protected $fillable = [
        'id_contenido',
        'titulo',
        'descripcion',
        'url_imagen',
        'url_video',
        'duracion',
        'fecha_lanzamiento',
        'id_categoria',
        'id_usuario'
    ];

}