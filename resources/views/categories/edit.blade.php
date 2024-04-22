@extends('adminlte::page')
@section('title', 'TGestion - Editar Categoria')

@section('content_header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Editar Categoria</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('categories.index') }}">Categorias</a></li>
                <li class="breadcrumb-item active">Editar Categoria</li>
            </ol>
        </div>
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Nombre:</label>
                            <input type="text" name="name" id="name" class="form-control"
                                value="{{ $category->name }}">
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Actualizar Categoria</button>
            </form>
        </div>
    </div>
@stop
