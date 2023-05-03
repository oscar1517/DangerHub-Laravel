<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contenido;
use App\Models\User;
use App\Models\Guardados;
use Illuminate\Support\Facades\Log;

class ContenidosController extends Controller
{
    public function index(Contenido $contenido)
    {
       
        return view("contenido.index", [
            "contenidos" => Contenido::all(),
        ]);
    }
    
    public function create()
    { 
        return view("contenido.create");  
    }
    public function store(Request $request)
    {
        // Validar dades del formulari
        $validatedData = $request->validate([
            'titulo'      => 'required',
            'descripcion'    => 'required',
            'url_imagen'  => 'required',
            'url_video' => 'required',
            'duracion' => 'required',
            'fecha_lanzamiento' => 'required',
            'id_categoria' => 'required'

        ]);
        
        // Obtenir dades del formulari
        $titulo          = $request->get('titulo');
        $descripcion        = $request->file('descripcion');
        $url_imagen      = $request->get('url_imagen');
        $url_video     = $request->get('url_video');
        $duracion    = $request->get('duracion');
        $fecha_lanzamiento          = $request->get('fecha_lanzamiento');
        $id_categoria          = $request->get('id_categoria');
        

       
            // Desar dades a BD
            Log::debug("Saving post at DB...");
            $contenido = Contenido::create([
                'titulo'      => $titulo,
                'descripcion'   => $descripcion,
                'url_imagen'  => $url_imagen,
                'url_video' => $url_video,
                'duracion' => $duracion,
                'fecha_lanzamiento' => $fecha_lanzamiento,
                'id_categoria' => $id_categoria
            ]);
            Log::debug("DB storage OK");
            if ($contenido) {
                 // Patró PRG amb missatge d'èxit
                return redirect()->route('contenido.show', $contenido)
                ->with('success', __('Contenido successfully saved'));
            } else {
                // Patró PRG amb missatge d'error
                return redirect()->route("contenido.create")
                ->with('error', __('ERROR Uploading contenido'));
            }    
    }
    public function show(Contenido $contenido)
    {
   
        return view("contenido.show", [
            'contenido'   => $contenido,
            'titulo'   => $contenido->titulo,
            'descripcion' => $contenido->descripcion,
            'url_imagen' => $contenido->url_imagen,
            'url_video' => $contenido->url_video,
            'duracion' => $contenido->duracion,
            'fecha_lanzamiento' => $contenido->fecha_lanzamiento,
            'id_categoria' => $contenido->id_categoria,
            'id_usuario' => $contenido->id_usuario,

        ]);
    }
    public function edit(Contenido $contenido)
    {
        if(auth()->user()->id == $contenido->id_usuario){
            return view("contenido.edit", [
                'contenido'   => $contenido,                
            ]);
        }
        else{
            return redirect()->route("contenido.show", $contenido)
            ->with('error',__('traduct.error-post-edit'));
        }
    }
    public function update(Request $request, Contenido $contenido)
    {
        // Validar dades del formulari
        $validatedData = $request->validate([
            'titulo'      => 'required',
            'descripcion'    => 'required',
            'url_imagen'  => 'required',
            'url_video' => 'required',
            'duracion' => 'required',
            'fecha_lanzamiento' => 'required',
            'id_categoria' => 'required'
        ]);

        // Obtenir dades del formulari
        $titulo          = $request->get('titulo');
        $descripcion        = $request->file('descripcion');
        $url_imagen      = $request->get('url_imagen');
        $url_video     = $request->get('url_video');
        $duracion    = $request->get('duracion');
        $fecha_lanzamiento          = $request->get('fecha_lanzamiento');
        $id_categoria          = $request->get('id_categoria');

        // Desar fitxer (opcional)
        
        // Actualitzar dades a BD
        Log::debug("Updating DB...");
        $contenido->titulo      = $titulo;
        $contenido->descripcion  = $descripcion;
        $contenido->url_imagen = $url_imagen;
        $contenido->url_video = $url_video;
        $contenido->duracion = $duracion;
        $contenido->fecha_lanzamiento = $fecha_lanzamiento;
        $contenido->id_categoria = $id_categoria;
        $contenido->save();
        if ($contenido) {
            Log::debug("DB storage OK");
            // Patró PRG amb missatge d'èxit
            return redirect()->route('contenido.show', $contenido)
                ->with('success', __('Post successfully saved'));
        } else {
            // Patró PRG amb missatge d'error
            return redirect()->route("contenido.edit")
                ->with('error', __('ERROR Uploading file'));
        }
    }
    public function destroy(Contenido $contenido)
    {
        if(auth()->user()->id == $contenido->id_usuario){
            // Eliminar post de BD
            $contenido->delete();
            // Patró PRG amb missatge d'èxit
            return redirect()->route("contenido.index")
                ->with('success', __('contenido successfully deleted'));
        }
        else{
            return redirect()->route("contenido.show", $contenido)
            ->with('error',__('traduct.error-post-delete'));
        }
        
    }

    public function guardar(Contenido $contenido)
    {

        $user=User::find(auth()->user()->id);
        $guardar = Guardados::create([
            'id_user' => $user->id,
            'id_contenido' => $contenido->id_contenido,
        ]);
        return redirect()->back();

        
    }
    
    public function quitarGuardados(Contenido $contenido)
    {
        Guardados::where('id_user',auth()->user()->id)
                 ->where('id_contenido', $contenido->id_contenido )->delete();
        return redirect()->back();
    }
}
