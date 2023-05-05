<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Perfiles;

class PerfilesController extends Controller
{
    public function index(Perfiles $perfiles)
    {
       
        return view("perfiles.index", [
            "perfiles" => Perfiles::all(),
        ]);
    }
    public function create()
    { 
        return view("perfiles.create");  
    }
    public function store(Request $request)
    {
        // Validar dades del formulari
        $validatedData = $request->validate([
            'nombre'      => 'required',
            'imagen'      => 'required',
        ]);
        
        // Obtenir dades del formulari
        $nombre          = $request->get('nombre');
        $imagen        = $request->get('imagen');
        
        
        $perfiles = Perfiles::create([
            'nombre'      => $nombre,
            'imagen'   => $imagen,
            'id_usario' => auth()->user()->id,
        ]);
        if ($perfiles) {
                // Patró PRG amb missatge d'èxit
            return redirect()->route('perfiles.index', $contenido)
            ->with('success', __('Contenido successfully saved'));
        } else {
            // Patró PRG amb missatge d'error
            return redirect()->route("contenido.create")
            ->with('error', __('ERROR Uploading contenido'));
        }    
    }


   
}
