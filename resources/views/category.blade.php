@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            @foreach($posts as $post)
            <div class="card mb-3">
                <h3 class="card-title text-center">
                    <a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a>
                </h3>
                <img src="{{ $post->image }}" class="card-img-top img-fluid" alt="..." style="height: 15vh">
                <div class="card-body">
                    <p class="card-text text-center">{{ $post->description }}</p>
                    <p class="card-text"><small class="text-muted">Просмотров: {{ $post->views }}</small></p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
