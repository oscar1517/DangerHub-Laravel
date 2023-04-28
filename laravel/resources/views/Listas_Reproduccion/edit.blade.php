@extends('layouts.box-app')

@section('box-title')
    {{ __('Post') . " " . $post->id }}
@endsection

@section('content')
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<div class="editpost">
    <img class="img-fluid" src="{{ asset('storage/'.$file->filepath) }}" title="Image preview"/>
    <form method="POST" action="{{ route('posts.update', $post) }}" enctype="multipart/form-data">
        @csrf
        @method("PUT")
        <div class="form-group">
            <label for="body">{{ __('traduct.body') }}</label>
            <textarea id="body" name="body" class="form-control2">{{ $post->body }}</textarea>
        </div>
        <div class="form-group">
            <label for="upload">{{ __('traduct.file_id') }}</label>
            <input type="file" id="upload" name="upload" class="form-control2" />
        </div>
        <div class="form-group">            
                <label for="latitude">{{ __('traduct.latitude') }}</label>
                <input type="text" id="latitude" name="latitude" class="form-control2"
                    value="{{ $post->latitude }}"/>
        </div>
        <div class="form-group">            
                <label for="longitude">{{ __('traduct.longitude') }}</label>
                <input type="text" id="longitude" name="longitude" class="form-control2"
                    value="{{ $post->longitude }}"/>
        </div>
        <div class="form-group">
                
                    <div class="visiblitiy">
                        <div class="visibilityform">
                            <label class="form-check-label" for="visibility_id">{{ __('traduct.visibility_public') }}</label>
                            <input class="form-check" type="radio" name="visibility_id" value="1" checked>
                            
                        </div>
                        <div class="visibilityform">
                            <label class="form-check-label" for="visibility_id">{{ __('traduct.visibility_contacts') }}</label>
                            <input class="form-check" type="radio" name="visibility_id" value="2">  
                        </div>
                        <div class="visibilityform">
                            <label class="form-check-label" for="visibility_id">{{ __('traduct.visibility_private') }}</label>
                            <input class="form-check" type="radio" name="visibility_id" value="3">   
                        </div>
                    </div>
                    
                
            </div>
        <button type="submit" class="btn btn-primary">{{ __('traduct.update') }}</button>
        <button type="reset" class="btn btn-secondary">{{ __('traduct.reset') }}</button>
        <a class="btn" href="{{ route('posts.index') }}" role="button">⬅️ {{ __('traduct.back') }}</a>
    </form>
</div>
    
@endsection