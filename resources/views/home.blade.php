@extends('layouts.app')

@section('content')
<div class="container">
@if (session('success_category') || session('success_post'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success_category') }}
    {{ session('success_post') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
    <div class="row mb-3">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">Разделы</div>

                <div class="card-body">
                    <form class="row gx-3 gy-2 align-items-center" action="{{ route('categories.store') }}" method="POST">
                        @csrf
                        <div class="col-sm-3">
                            <label class="visually-hidden" for="specificSizeInputName">Name</label>
                            <input name="name" type="text" class="form-control" id="specificSizeInputName" placeholder="Имя раздела">
                        </div>
                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary">Добавить новый раздел</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">Статьи</div>

                <div class="card-body">
                    <form class="row gx-3 gy-2 align-items-center" action="{{ route('posts.store') }}" method="POST">
                        @csrf
                        <div class="col-sm-3">
                            <label class="visually-hidden" for="post_name">Name</label>
                            <input name="title" type="text" class="form-control" id="post_name" placeholder="заголовок">
                        </div>
                        <div class="col-sm-3">
                            <label class="visually-hidden" for="post_description">Name</label>
                            <input name="description" type="text" class="form-control" id="post_description" placeholder="описание">
                        </div>
                        <div class="col-sm-3">
                            <label class="visually-hidden" for="post_image">Name</label>
                            <input name="image" type="text" class="form-control" id="post_image" placeholder="ссылка на обложку">
                        </div>
                        @php 
                            $categories = \App\Models\Category::all();
                        @endphp
                        <div class="col-sm-3">
                            <label class="visually-hidden" for="post_category">Preference</label>
                            <select class="form-select" id="post_category" name="category_id">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary">Добавить статью</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
