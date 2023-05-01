@extends('layouts.box-app')

@section('box-title')
    {{ __('Place') . " " . $place->id }}
@endsection

@section('content')
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<div class="editpost">
    <img class="img-fluid" src="{{ asset('storage/'.$file->filepath) }}" title="Image preview"/>
    <form method="POST" action="{{ route('contenido.update', $contenido) }}" enctype="multipart/form-data">
        @csrf
        @method("PUT")
        <div class="form-group">
            <label for="name">titulo</label>
            <input type="text" id="titulo" name="titulo" class="form-control" value="{{ $contenido->titulo }}" />
        </div>
        <div class="form-group">
            <label for="description">descripcion</label>
            <textarea id="descripcion" name="descripcion" class="form-control">{{ $contenido->descripcion }}</textarea>
        </div>
        <div class="form-group">
            <label for="name">url_imagen</label>
            <input type="text" id="url_imagen" name="url_imagen" class="form-control" value="{{ $contenido->url_imagen }}" />
        </div>
        <div class="form-group">
            <label for="name">url_video</label>
            <input type="text" id="url_video" name="url_video" class="form-control" value="{{ $contenido->url_video }}" />
        </div>
        <div class="form-group">
            <label for="name">duracion</label>
            <input type="text" id="duracion" name="duracion" class="form-control" value="{{ $contenido->duracion }}" />
        </div>
        <div class="form-group">
            <label for="name">fecha_lanzamiento</label>
            <input type="text" id="fecha_lanzamiento" name="fecha_lanzamiento" class="form-control" value="{{ $contenido->fecha_lanzamiento }}" />
        </div>
        <div class="form-group">
            <label for="name">id_categoria</label>
            <input type="text" id="id_categoria" name="id_categoria" class="form-control" value="{{ $contenido->categorias->tipo_categoria }}" />
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <button type="reset" class="btn btn-secondary">Reset</button>
        <a class="btn" href="{{ route('contenido.index') }}" role="button">⬅️ Back</a>
    </form>
</div>
@endsection