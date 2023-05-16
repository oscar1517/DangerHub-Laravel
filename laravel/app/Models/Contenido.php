<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contenido extends Model
{
    public $timestamps=false;
    use HasFactory;
    
    protected $fillable = [
        'id',
        'titulo',
        'descripcion',
        'descripcionLarga',
        'url_imagen',
        'url_video',
        'duracion',
        'fecha_lanzamiento',
        'id_categoria',
        'id_usuario',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id');
    }
    public function categorias()
    {
       return $this->hasMany(Categoria::class, 'id_categoria');
    }   
}