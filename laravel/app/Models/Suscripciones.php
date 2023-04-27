<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suscripciones extends Model
{
    public $timestamps=false;
    use HasFactory;
    
    protected $fillable = [
        'id_suscripcion',
        'tipo_suscripcion',
        'precio',
    ];

}