<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Contenido;

class Guardados extends Model
{
    public $timestamps=false;
    use HasFactory;
    
    protected $fillable = [
        'id_perfil',
        'id_lista',
        'id_contenido'
    ];

    public function contenido()
    {
        return $this->belongsTo(Contenido::class, 'id_contenido');
    }

}