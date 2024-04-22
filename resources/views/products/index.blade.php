@extends('adminlte::page')
@section('title', 'TGestiona - Lista de Productos')

@section('content_header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Lista de Productos</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="">Inicio</a></li>
                <li class="breadcrumb-item active">Productos</li>
            </ol>
        </div>
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Todos los Productos</h3>
            <div class="card-tools">
                <a href="{{ route('products.create') }}" class="btn btn-primary">Nuevo Producto</a>
                <a href="{{ route('products.create') }}" class="btn btn-secondary">Generar Reporte</a>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Código</th>
                        <th>Categoria</th>
                        <th>Stock</th>
                        <th>Imagen</th>
                        <th>Estado</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->code }}</td>
                            <td>{{ $product->category->name }}</td>
                            <td>{{ $product->stock_quantity }}</td>
                            <td>
                                <picture>
                                    <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}"
                                        width="50">

                                </picture>
                            </td>
                            <td>{{ $product->state }}</td>
                            <td>
                                <div class="btn-group g-1" role="group" aria-label="Actions">
                                    <a href="{{ route('products.edit', $product->id) }}"
                                        class="btn btn-success btn-sm">Editar</a>
                                    <a href="" class="btn btn-danger btn-sm">Eliminar</a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('css')

@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
