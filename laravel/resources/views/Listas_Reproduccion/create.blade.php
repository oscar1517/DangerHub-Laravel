@extends('layouts.box-app')



@section('content')
@env(['local','development'])
   @vite('resources/js/files/create.js')
@endenv

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
    <div class="formcreate">
        <form method="post" action="{{ route('Listas_Reproduccion.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="camposform">
                <div class="confirmemailpass">
                    <input type="text" id="nombre_lista" name="nombre_lista" class="form-control" placeholder="{nombre_lista"></textarea>
                </div>
            </div>
            <div class="camposform">
                <div class="confirmemailpass">
                    <input type="text" id="id_contenido" name="id_contenido" class="form-control" placeholder="id_contenido"></textarea>
                </div>
            </div>
            <table>
            @foreach ($contenidos as $contenido)
                <tr>
                    <td>$contenido->id_contenido</td>
                    <td>$contenido->titulo</td>
                    <td>$contenido->descripcion</td>
                    <td><img src="{{ $contenido->url_imagen }}"></img></td>
                </tr>
            @endforeach
            </table>
            <div class="camposform">
                <div class="confirmemailpass">
                    <input type="text" id="body" name="body" class="form-control" placeholder="{{ __('traduct.body') }}"></textarea>
                </div>
            </div>
            <div class="camposform">
                <div class="confirmemailpass">
                    <input type="text" id="body" name="body" class="form-control" placeholder="{{ __('traduct.body') }}"></textarea>
                </div>
            </div>
            
            <div class="botonescreate">
                <button type="submit" class="botoncreate">Crear</button>
                <button type="reset" class="resetcreate">Reset</button>
                <a href="/home"><input type="button" class="cancelarcreate" value="Submit"></a>
            </div>
            
        </form>
    </div>
    
@endsection