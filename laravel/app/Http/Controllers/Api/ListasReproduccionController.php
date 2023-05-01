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
    public function index()
    {
        $listas_reproduccion = Listas_Reproduccion::all();
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
        // Validar fitxer
        $validatedData = $request->validate([
            'nombre_lista'      => 'required',
            'id_contenido'  => 'required',
        ]);

        // Obtenir dades del formulari
        $nombre_lista          = $request->get('nombre_lista');
        $id_contenido          = $request->get('id_contenido');
 
       
      
        if ($validatedData) {
            $listas_reproduccion = Listas_Reproduccion::create([
                'id_usuario' => auth()->user()->id_usuario,
                'nombre_lista' => $nombre_lista,
                'id_contenido' => $id_contenido,
            ]);
        
            
            return response()->json([
                'success' => true,
                'data'    => $listas_reproduccion
            ], 201);
        } else {
            \Log::debug("Local storage FAILS");
            return response()->json([
                'success'  => false,
                'message' => 'Error uploading file'
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_lista)
    {
        $listas_reproduccion = Listas_Reproduccion::find($id_lista);
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
    public function update(Request $request, $id_lista)
    {
        $listas_reproduccion = Listas_Reproduccion::find($id_lista);

        if($listas_reproduccion)
        {
            // Validar fitxer
            $validatedData = $request->validate([
                'nombre_lista'      => 'required',
                'id_contenido'  => 'required',
            ]);

            // Obtenir dades del formulari
            $nombre_lista          = $request->get('nombre_lista');
            $id_contenido          = $request->get('id_contenido');
    
            
            if ($validatedData) {
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
    public function destroy($id_usuario)
    {
        $listas_reproduccion = Listas_Reproduccion::find($id_usuario);
        
        if($listas_reproduccion == null)
        {
            return response()->json([
                'success'  => false,
                'message' => 'Error post not found'
            ], 404);
        }else{
            $post->delete();
            return response()->json([
                'success' => true,
                'data'    => $listas_reproduccion
            ], 200);
        }
    }
}
