@extends('layouts.box-app')
@section('content')


<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<div class="masterpost">
    @foreach ($posts as $post)
        <div class="post">
            <img src="{{ asset('storage/'.$post->file->filepath) }}"></img>
            <div class="edit">
                <a href="{{ route('posts.edit', $post) }}"><i class="fa-solid fa-pencil"></i></a>
                <form id="form" method="POST" action="{{ route('posts.destroy', $post) }}" style="display: inline-block;">
                    @csrf
                    @method("DELETE")
                    <button id="destroy" type="submit" class="botoneliminar" data-bs-toggle="modal" data-bs-target="#confirmModal"><i class="fa-solid fa-trash"></i></button>
                </form>
                <a href="{{ route('posts.show', $post) }}"><i class="fa-solid fa-eye"></i></a>
                @if($post->authUserHasLike())
                <form method="post" action="{{ route('posts.unlike',$post) }}" enctype="multipart/form-data">
                    @csrf
                    @method('DELETE')
                    <button class="botonlike" type="submit"><i class="fa-solid fa-heart"></i></button>
                </form> 
                @else 
                    <form method="post" action="{{ route('posts.like',$post) }}" enctype="multipart/form-data">
                    @csrf
                        <button class="botonlike" type="submit"><i class="fa-regular fa-heart"></i></button>
                    </form> 
                @endif 
            </div>
            <div class="text-topics2">
                    <a href="#">{{ __('traduct.comments') }}</a>
            </div>
            
        </div>
    @endforeach
</div>
@endsection
