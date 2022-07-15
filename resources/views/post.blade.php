@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="card mb-3">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="{{ $post->image }}" class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <p class="card-text">{{ $post->description }}</p>
                        <p class="card-text"><small class="text-muted">Просмотров: {{ $post->views }}</small></p>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@php 
    $post->views += 1;
    $post->save();
@endphp
@endsection
