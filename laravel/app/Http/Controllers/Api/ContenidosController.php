<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contenido;
use App\Models\User;
use App\Models\Categorias;
use App\Models\Guardados;

class ContenidosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contenidos = Contenido::all();
        return response()->json([
            'success' => true,
            'data' => $contenidos,
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
            'titulo'      => 'required',
            'descripcion'    => 'required',
            'url_imagen'  => 'required',
            'url_video' => 'required',
            'duracion' => 'required',
            'fecha_lanzamiento' => 'required',
            'id_categoria' => 'required',
            
        ]);

        // Obtenir dades del fitxer
        $titulo          = $request->get('titulo');
        $descripcion        = $request->get('descripcion');
        $url_imagen      = $request->get('url_imagen');
        $url_video     = $request->get('url_video');
        $duracion    = $request->get('duracion');
        $fecha_lanzamiento          = $request->get('fecha_lanzamiento');
        $id_categoria          = $request->get('id_categoria');
        $id_usuario         = auth()->user()->id;
        $id_lista         = $request->get('id_lista');
    
      
        if ($validatedData) {
            $contenido = Contenido::create([
                'titulo'      => $titulo,
                'descripcion'   => $descripcion,
                'url_imagen'  => $url_imagen,
                'url_video' => $url_video,
                'duracion' => $duracion,
                'fecha_lanzamiento' => $fecha_lanzamiento,
                'id_categoria' => $id_categoria,
                'id_usuario' => $id_usuario,
                'id_lista' => $id_lista,
            ]);
            
            return response()->json([
                'success' => true,
                'data'    => $contenido
            ], 201);
       } else {
            return response()->json([
                'success'  => false,
                'message' => 'Error uploading file'
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id_contenido
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contenido = Contenido::find($id);
        if($contenido == null)
        {
            return response()->json([
                'success'  => false,
                'message' => 'Error post not found'
            ], 404);
        } else {
            return response()->json([
                'success' => true,
                'data'    => $contenido
            ], 200);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id_contenido
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_contenido)
    {
        $contenido = Contenido::find($id_contenido);

        if($contenido)
        {
            // Validar fitxer
            $validatedData = $request->validate([
                'titulo'      => '',
                'descripcion'    => '',
                'url_imagen'  => '',
                'url_video' => '',
                'duracion' => '',
                'fecha_lanzamiento' => '',
                'id_categoria' => '',
               
            ]);

            // Obtenir dades del fitxer
            $titulo          = $request->get('titulo');
            $descripcion        = $request->get('descripcion');
            $url_imagen      = $request->get('url_imagen');
            $url_video     = $request->get('url_video');
            $duracion    = $request->get('duracion');
            $fecha_lanzamiento          = $request->get('fecha_lanzamiento');
            $id_categoria          = $request->get('id_categoria');
         
    
        
           if ($validatedData) {
                $contenido->titulo      = $titulo;
                $contenido->descripcion  = $descripcion;
                $contenido->url_imagen = $url_imagen;
                $contenido->url_video = $url_video;
                $contenido->duracion = $duracion;
                $contenido->fecha_lanzamiento = $fecha_lanzamiento;
                $contenido->id_categoria = $id_categoria;
                $contenido->save();
               
                return response()->json([
                    'success' => true,
                    'data'    => $contenido
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
        $contenido = Contenido::find($id);
        
        if($contenido == null)
        {
            return response()->json([
                'success'  => false,
                'message' => 'Error post not found'
            ], 404);
        }else{
            $contenido->delete();
            return response()->json([
                'success' => true,
                'data'    => $contenido
            ], 200);
        }
    }

    public function guardar($id, $id_lista)
    {
        $contenido=Contenido::find($id);
        
        if (Guardados::where([
                ['id_usuario', "=" , auth()->user()->id],
                ['id_contenido', "=" ,$id],
                ['id_lista', "=" ,$id_lista],
            ])->exists()) {
            return response()->json([
                'success'  => false,
                'message' => 'The post is already like'
            ], 500);
        }else{
            $guardados = Guardados::create([
                'id_usuario' => auth()->user()->id,
                'id_contenido' => $id,
                'id_lista' => $id_lista,
            ]);
            if (!is_null($id_lista)) {
                $contenido->id_lista = $id_lista;
                $contenido->save();
            }
            return response()->json([
                'success' => true,
                'data'    => $guardados
            ], 200);
        }     
    }

    public function quitarGuardados($id, $id_lista)
    {
        $contenido=Contenido::find($id);
        if (Guardados::where([['id_usuario', "=" ,auth()->user()->id],['id_contenido', "=" ,$id],['id_lista', "=" ,$id_lista]])->exists()) {
            
            $guardado = Guardados::where([
                ['id_usuario', "=" ,auth()->user()->id],
                ['id_contenido', "=" ,$id],
                ['id_lista', "=" ,$id_lista],
            ]);
            $guardado->first();
    
            $guardado->delete();
            
            if (!is_null($id_lista)) {
                $contenido->id_lista = NULL;
                $contenido->save();
            }
            return response()->json([
                'success' => true,
                'data'    => $contenido
            ], 200);
        }else{
            return response()->json([
                'success'  => false,
                'message' => 'The post is not like'
            ], 500);
            
        }  
        
    }
    public function peliculas()
    {
        
        $contenidos = Contenido::where('id_categoria', 1)->get();
        return response()->json([
            'success' => true,
            'data' => $contenidos,
        ], 200);
    }
    public function peliculasId($id)
    {
        $contenido = Contenido::find($id);
        $id_usuario = User::find($contenido->id_usuario);
        $user = $id_usuario->name;
        return response()->json([
            'success' => true,
            'data' => [
                'contenido' => $contenido,
                'user' => $user,
            ],
        ], 200);
    }
    public function series()
    {
        $contenidos = Contenido::where('id_categoria', 2)->get();
        return response()->json([
            'success' => true,
            'data' => $contenidos,
        ], 200);
    }
    public function documentales()
    {
        $contenidos = Contenido::where('id_categoria', 3)->get();
        return response()->json([
            'success' => true,
            'data' => $contenidos,
        ], 200);
    }
}
