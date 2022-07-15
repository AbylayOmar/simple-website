@extends('layouts.app')

@section('content')
<div class="container">
@if (session('success_category'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  {{ session('success_category') }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
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
@endsection
