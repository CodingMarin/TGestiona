@extends('adminlte::page')
@section('title', 'TGestiona - Categorias')

@section('content_header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Listado de categorias</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('categories.index') }}">Inicio</a></li>
                <li class="breadcrumb-item active">Categorias</li>
            </ol>
        </div>
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Todas las categorias</h3>
            <div class="card-tools">
                <a href="{{ route('categories.create') }}" class="btn btn-primary">Nueva Categoria</a>
                <a href="{{ route('products.create') }}" class="btn btn-secondary">Generar Reporte</a>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Creado</th>
                        <th>Actualizado</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($category as $cat)
                        <tr>
                            <td>{{ $cat->id }}</td>
                            <td>{{ $cat->name }}</td>
                            <td>{{ $cat->created_at }}</td>
                            <td>{{ $cat->updated_at }}</td>
                            <td>
                                <div class="btn-group g-1" role="group" aria-label="Actions">
                                    <a href="{{ route('categories.edit', $cat->id) }}"
                                        class="btn btn-success btn-sm">Editar</a>
                                    <form action="{{ route('categories.destroy', $cat->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop
