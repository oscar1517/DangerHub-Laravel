@extends('layouts.box-app')

@section('content')
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<div class="editpost">
    <table>
        
        <tr>
            <td scope="col"><strong>imagen<strong></td>
            <td><img src="{{ $contenido->url_imagen }}"></img></td>
        </tr>
        <tr>
            <td scope="col"><strong>titulo<strong></td>
            <td>{{ $contenido->titulo }}</td>
        </tr>
        <tr>
            <td scope="col"><strong>descripcion<strong></td>
            <td>{{ $contenido->descripcion }}></td>
        </tr>
        <tr>
            <td scope="col"><strong>duracion<strong></td>
            <td>{{ $contenido->duracion }}></td>
        </tr>
        <tr>
            <td scope="col"><strong>fecha_lanzamiento<strong></td>
            <td>{{ $contenido->fecha_lanzamiento }}></td>
        </tr>
        <tr>
            <td scope="col"><strong>tipo_categoria<strong></td>
            <td>{{ $contenido->categorias->tipo_categoria }}></td>
        </tr>
        <tr>
            <td scope="col"><strong>usuario<strong></td>
            <td>{{ $contenido->user->name }}></td>
        </tr>
    </table>

    <!-- Buttons -->
    <div class="container" style="margin-bottom:20px">
        <a class="btn" href="{{ route('places.index') }}" role="button">⬅️ {{ __('traduct.back') }}</a>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ __('traduct.sure') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>{{ _('You are gonna delete post ') . $place->id }}</p>
                    <p>{{ _('This action cannot be undone!') }}</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button id="confirm" type="button" class="btn btn-primary">{{ __('traduct.confirm') }}</button>
                </div>
            </div>
        </div>
    </div>
</div>
    @vite('resources/js/delete-modal.js')

@endsection
