@extends('adminlte::page')
@section('title', 'TGestiona - Registrar Categoria')

@section('content_header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Registrar categoria</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('categories.index') }}">Categorias</a></li>
                <li class="breadcrumb-item active">Registrar categoria</li>
            </ol>
        </div>
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('categories.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Nombre:</label>
                    <input type="text" name="name" id="name" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Guardar Categoria</button>
            </form>
        </div>
    </div>
@stop

@section('css')

@stop

@section('js')

@stop
