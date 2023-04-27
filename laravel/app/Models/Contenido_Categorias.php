<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contenido_Categorias extends Model
{
    public $timestamps=false;
    use HasFactory;
    
    protected $fillable = [
        'id_contenido',
        'id_categoria'
    ];

}