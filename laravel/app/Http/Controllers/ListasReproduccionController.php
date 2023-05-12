<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Listas_Reproduccion;
use App\Models\Contenido;

class ListasReproduccionController extends Controller
{
    public function index(Listas_Reproduccion $Listas_Reproduccion)
    {
       
        return view("Listas_Reproduccion.index", [
            "contenidos" => Contenido::all()
        ]);
    }

    public function create()
    { 
        return view("Listas_Reproduccion.create", [
            "Listas_Reproduccion" => Listas_Reproduccion::all()
        ]);  
    }

    public function store(Request $request)
    {
        // Validar dades del formulari
        $validatedData = $request->validate([
            'nombre_lista'      => 'required',
        ]);
        
        $perfil = auth()->user()->perfiles->first();
        $id_perfil = $perfil->id;
        // Obtenir dades del formulari
        $nombre_lista          = $request->get('nombre_lista');
    

        if ($request) {
            // Desar dades a BD
            Log::debug("Saving post at DB...");
            $Listas_Reproduccion = Listas_Reproduccion::create([
                'id_perfil' => $id_perfil,
                'nombre_lista'  => $nombre_lista,
            ]);
            Log::debug("DB storage OK");
            // Patró PRG amb missatge d'èxit
            return redirect()->route('Listas_Reproduccion.show', $Listas_Reproduccion)
                ->with('success', __('Post successfully saved'));
        } else {
            // Patró PRG amb missatge d'error
            return redirect()->route("Listas_Reproduccion.create")
                ->with('error', __('ERROR Uploading file'));
        }
    }

    public function show(Listas_Reproduccion $Listas_Reproduccion)
    {
        return view("Listas_Reproduccion.show", [
            'Listas_Reproduccion'   => $Listas_Reproduccion
        ]);
    }

    public function edit(Listas_Reproduccion $Listas_Reproduccion)
    {
        if(auth()->user()->id_usuario == $Listas_Reproduccion->id_usuario){
            return view("Listas_Reproduccion.edit", [
                'Listas_Reproduccion'   => $Listas_Reproduccion
            ]);
        }
        else{
            return redirect()->route("Listas_Reproduccion.show", $post)
            ->with('error',__('traduct.error-post-edit'));
        }
    }
    public function update(Request $request, Listas_Reproduccion $Listas_Reproduccion)
    {
        // Validar dades del formulari
        $validatedData = $request->validate([
            'nombre_lista'      => 'required',
            'id_contenido'  => 'required'
        ]);

        // Obtenir dades del formulari
        // Obtenir dades del formulari
        $nombre_lista          = $request->get('nombre_lista');
        $id_contenido          = $request->get('id_contenido');

        // Desar fitxer (opcional)
       
            // Actualitzar dades a BD
            Log::debug("Updating DB...");
            $Listas_Reproduccion->nombre_lista      = $nombre_lista;
            $Listas_Reproduccion->id_contenido  = $id_contenido;
            $Listas_Reproduccion->save();
            Log::debug("DB storage OK");
            if ($Listas_Reproduccion) {
                // Patró PRG amb missatge d'èxit
                return redirect()->route('Listas_Reproduccion.show', $Listas_Reproduccion)
                ->with('success', __('Post successfully saved'));
            } else {
            // Patró PRG amb missatge d'error
            return redirect()->route("Listas_Reproduccion.edit")
                ->with('error', __('ERROR Uploading file'));
            }
    }
    public function destroy(Listas_Reproduccion $Listas_Reproduccion)
    {
        if(auth()->user()->id == $Listas_Reproduccion->id_usuario){
            // Eliminar post de BD
            $Listas_Reproduccion->delete();
            // Patró PRG amb missatge d'èxit
            return redirect()->route("Listas_Reproduccion.index")
                ->with('success', __('Post successfully deleted'));
        }
        else{
            return redirect()->route("Listas_Reproduccion.show", $Listas_Reproduccion)
            ->with('error',__('traduct.error-post-delete'));
        }
        
    }
}
