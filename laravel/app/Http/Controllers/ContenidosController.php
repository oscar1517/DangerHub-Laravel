<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contenido;
use App\Models\User;


class ContenidosController extends Controller
{
    public function index(Contenido $contenido)
    {
       
        return view("contenido.index", [
            "contenidos" => Contenido::all(),
            'author' => $contenido->user,
        ]);
    }
}
