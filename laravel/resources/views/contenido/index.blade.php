@extends('layouts.box-app')
@section('content')
<!-- @section('box-title')
    {{ __('Places') }}
@endsection

@section('box-content')
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <td scope="col">ID</td>
                    <td scope="col">Name</td>
                    <td scope="col">Description</td>
                    <td scope="col">File</td>
                    <td scope="col">Lat</td>
                    <td scope="col">Lng</td>
                    <td scope="col">Created</td>
                    <td scope="col">Updated</td>
                    <td scope="col"></td>
                </tr>
            </thead>
            <tbody>
                @foreach ($places as $place)
                <tr>
                    <td>{{ $place->id }}</td>
                    <td>{{ $place->name }}</td>
                    <td>{{ substr($place->description,0,10) . "..." }}</td>
                    <td>{{ $place->file_id }}</td>
                    <td>{{ $place->latitude }}</td>
                    <td>{{ $place->longitude }}</td>
                    <td>{{ $place->created_at }}</td>
                    <td>{{ $place->updated_at }}</td>
                    <td>
                        <a title="{{ _('View') }}" href="{{ route('places.show', $place) }}">👁️</a>
                        <a title="{{ _('Edit') }}" href="{{ route('places.edit', $place) }}">📝</a>
                        <a title="{{ _('Delete') }}" href="{{ route('places.show', [$place, 'delete' => 1]) }}">🗑️</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <a class="btn btn-primary" href="{{ route('places.create') }}" role="button">➕ {{ _('Add new place') }}</a>
@endsection -->
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<div class="masterpost">
    <table>
    @foreach ($contenidos as $contenido)
        
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
    @endforeach
    </table>
</div>
@endsection
