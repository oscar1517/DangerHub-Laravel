<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Perfiles;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

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
        $validator = Validator::make($request->all(), [
            'nombre' => 'required',
            'url_avatar' => 'required',
            'id_usuario' => [
                'required',
                function ($attribute, $value, $fail) {
                    $user = User::find($value);
                    if ($user->numero_perfiles >= 4) {
                        $fail('Este usuario ya tiene el número máximo de perfiles permitidos.');
                    }
                },
            ],
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        // Obtenir dades del formulari
        $nombre          = $request->get('nombre');
        $url_avatar        = $request->get('url_avatar');
        
        
        $perfiles = Perfiles::create([
            'nombre'      => $nombre,
            'url_avatar'   => $url_avatar,
            'id_usario' => auth()->user()->id,
        ]);
        $user = User::find($request->user()->id);
        $user->numero_perfiles++;
        $user->save();
        if ($perfiles) {
                // Patró PRG amb missatge d'èxit
            return redirect()->route('perfiles.show', $perfiles)
            ->with('success', __('Contenido successfully saved'));
        } else {
            // Patró PRG amb missatge d'error
            return redirect()->route("perfiles.create")
            ->with('error', __('ERROR Uploading contenido'));
        }    
    }

    public function show(Perfiles $perfiles)
    {
   
        return view("perfiles.show", [
            'perfiles'   => $perfiles,
            'nombre'   => $perfiles->nombre,
            'url_avatar' => $perfiles->url_avatar,
        ]);
    }
    public function edit(Perfiles $perfiles)
    {
        if(auth()->user()->id == $perfiles->id_usuario){
            return view("perrfiles.edit", [
                'perfiles'   => $perfiles,                
            ]);
        }
        else{
            return redirect()->route("perfiles.show", $perfiles)
            ->with('error',__('traduct.error-post-edit'));
        }
    }

    public function update(Request $request, Perfiles $perfiles)
    {
        // Validar dades del formulari
        $validatedData = $request->validate([
            'nombre'      => 'required',
            'url_avatar'      => 'required',
        ]);

        // Obtenir dades del formulari
        $nombre          = $request->get('nombre');
        $url_avatar        = $request->get('url_avatar');
    
        
        $perfiles->nombre      = $nombre;
        $perfiles->url_avatar  = $url_avatar;
       
        $perfiles->save();
        if ($perfiles) {
           
            return redirect()->route('perfiles.show', $perfiles)
                ->with('success', __('Post successfully saved'));
        } else {
            // Patró PRG amb missatge d'error
            return redirect()->route("perfiles.edit")
                ->with('error', __('ERROR Uploading file'));
        }
    }

    public function destroy(Perfiles $perfiles)
    {
        if(auth()->user()->id == $perfiles->id_usuario){
            // Eliminar post de BD
            $perfiles->delete();
            // Patró PRG amb missatge d'èxit
            return redirect()->route("perfiles.index")
                ->with('success', __('contenido successfully deleted'));
        }
        else{
            return redirect()->route("perfiles.show", $perfiles)
            ->with('error',__('traduct.error-post-delete'));
        }
        
    }


   
}
