<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perfiles extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_perfil',
        'nombre',
        'id_usuario'
    ];
}
