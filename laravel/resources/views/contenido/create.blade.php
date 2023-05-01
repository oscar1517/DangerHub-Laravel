@extends('layouts.box-app')



@section('content')


<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
    <div class="formcreate">
        <form method="post" action="{{ route('contenido.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="camposform">
                <div class="confirmemailpass">
                    <input type="text" id="titulo" name="titulo" class="form-control" placeholder="{{ __('traduct.name') }}"/>
                </div>
            </div>
            <div class="camposform">
                <div class="confirmemailpass">
                    <textarea id="descripcion" name="descripcion" class="form-control" placeholder="{{ __('traduct.description') }}"></textarea>
                </div>
            </div>
            <div class="camposform">
                <div class="confirmemailpass">
                    <input type="text" id="url_imagen" name="url_imagen"/>
                </div>
            </div>
            <div class="camposform">
                <div class="confirmemailpass">
                    <input type="text" id="url_video" name="url_video"/>
                </div>
            </div>
            <div class="camposform">
                <div class="confirmemailpass">
                    <input type="text" id="duracion" name="duracion"/>
                </div>
            </div>
            <div class="camposform">
                <div class="confirmemailpass">
                    <input type="text" id="fecha_lanzamiento" name="fecha_lanzamiento"/>
                </div>
            </div>
            <div class="camposform">
                <div class="confirmemailpass">
                    <input type="text" id="id_categoria" name="id_categoria"/>
                </div>
            </div>
            <div class="camposform">
                <div class="confirmemailpass">
                    <input type="text" id="id_usuario" name="id_usuario"/>
                </div>
            </div>
            <div class="botonescreate">
                <button type="submit" class="botoncreate">Crear</button>
                <button type="reset" class="resetcreate">Reset</button>
                <a href="/home"><input type="button" class="cancelarcreate" value="Cancelar"></a>
            </div>
        </form>
    </div>
@endsection