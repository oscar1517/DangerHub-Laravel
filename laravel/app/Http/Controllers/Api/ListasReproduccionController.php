<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contenido;
use App\Models\User;
use App\Models\Listas_Reproduccion;

class ListasReproduccionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $user = auth()->user();
        $perfil = $user->perfiles()->where('id_usuario', $user->id)->get();
        $id_perfil = $perfil->id; 
        $listas_reproduccion = Listas_Reproduccion::where('id_perfil', $id_perfil)->get();
        return response()->json([
            'success' => true,
            'data' => $listas_reproduccion,
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            // Validar datos
        $validatedData = $request->validate([
            'nombre_lista' => 'required',
            'id_perfil' => '',
        ]);
        
        $perfil = auth()->user()->perfiles->first();
        // $id_perfil = $perfil->id;
        // $id_perfil = $request->get('id_perfil');
        // Obtener datos del formulario
        $nombre_lista = $request->get('nombre_lista');

       
        $lista_reproduccion = Listas_Reproduccion::create([
            'id_perfil' => $id_perfil,
            'nombre_lista' => $nombre_lista,
        ]);

      

        return response()->json([
            'success' => true,
            'data' => $lista_reproduccion
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $listas_reproduccion = Listas_Reproduccion::find($id);
        if($listas_reproduccion == null)
        {
            return response()->json([
                'success'  => false,
                'message' => 'Error post not found'
            ], 404);
        } else {
            return response()->json([
                'success' => true,
                'data'    => $listas_reproduccion
            ], 200);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $listas_reproduccion = Listas_Reproduccion::find($id);

        if($listas_reproduccion)
        {
            // Validar fitxer
            $validatedData = $request->validate([
                'id_usuario' => $id_usuario,
                'nombre_lista' => $nombre_lista,
                'id_contenido' => $id_contenido,
            ]);

            // Obtenir dades del formulari
            $id_usuario          = $request->get('id_usuario');
            $nombre_lista          = $request->get('nombre_lista');
            $id_contenido          = $request->get('id_contenido');
        
            
            if ($validatedData) {
                $listas_reproduccion->id_usuario = $id_usuario;
                $listas_reproduccion->nombre_lista = $nombre_lista;
                $listas_reproduccion->id_contenido = $id_contenido;
                $listas_reproduccion->save();
            
                
                return response()->json([
                    'success' => true,
                    'data'    => $listas_reproduccion
                ], 201);
            } else {
                return response()->json([
                    'success'  => false,
                    'message' => 'Error uploading post'
                ], 500);
            }
        } else {
            return response()->json([
                'success'  => false,
                'message' => 'Error post not found'
            ], 404);
        }   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $listas_reproduccion = Listas_Reproduccion::find($id);
        
        if($listas_reproduccion == null)
        {
            return response()->json([
                'success'  => false,
                'message' => 'Error post not found'
            ], 404);
        }else{
            $listas_reproduccion->delete();
            return response()->json([
                'success' => true,
                'data'    => $listas_reproduccion
            ], 200);
        }
    }
}
