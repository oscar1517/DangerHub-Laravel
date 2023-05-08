<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Perfiles;
use App\Models\User;

class PerfilesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $perfiles = Perfiles::all();
        return response()->json([
            'success' => true,
            'data' => $perfiles,
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
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 400);
        }
        $nombre          = $request->get('nombre');
        $url_avatar        = $request->get('url_avatar');
        
        if ($validator) {
            $perfiles = Perfiles::create([
                'nombre'      => $nombre,
                'url_avatar'   => $url_avatar,
            ]);
            
            return response()->json([
                'success' => true,
                'data'    => $perfiles
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_perfil)
    {
        $perfiles = Perfiles::find($id_perfil);
        if($perfiles == null)
        {
            return response()->json([
                'success'  => false,
                'message' => 'Error post not found'
            ], 404);
        } else {
            return response()->json([
                'success' => true,
                'data'    => $perfiles
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
    public function update(Request $request, $id_perfil)
    {
        $perfiles = Perfiles::find($id_perfil);

        if($perfiles)
        {
            // Validar fitxer
            $validatedData = $request->validate([
                'nombre'      => '',
                'url_avatar'    => '',
               
            ]);

            // Obtenir dades del fitxer
            $nombre          = $request->get('nombre');
            $url_avatar        = $request->get('url_avatar');
         
    
        
           if ($validatedData) {
                $perfiles->nombre      = $nombre;
                $perfiles->url_avatar  = $url_avatar;
               
                $perfiles->save();
               
                return response()->json([
                    'success' => true,
                    'data'    => $perfiles
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
    public function destroy($id_perfil)
    {
        $perfiles = Perfiles::find($id_perfil);
        
        if($perfiles == null)
        {
            return response()->json([
                'success'  => false,
                'message' => 'Error post not found'
            ], 404);
        }else{
            $perfiles->delete();
            return response()->json([
                'success' => true,
                'data'    => $perfiles
            ], 200);
        }
    }
}
