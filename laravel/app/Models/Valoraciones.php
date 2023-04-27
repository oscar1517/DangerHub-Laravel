<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Valoraciones extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'id_valoracion',
        'id_usuario',
        'id_contenido',
        'puntuacion',
        'fecha_valoracion'
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class, 'author_id');
    }
}