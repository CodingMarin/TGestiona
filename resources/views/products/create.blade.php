@extends('adminlte::page')
@section('title', 'TGestiona - Crear Producto')

@section('content_header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Registrar Producto</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('products.index') }}">Productos</a></li>
                <li class="breadcrumb-item active">Registrar Productos</li>
            </ol>
        </div>
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('products.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Nombre:</label>
                    <input type="text" name="name" id="name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="code">Código:</label>
                    <input type="text" name="code" id="code" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="category_id">Categoría:</label>
                    <select name="category_id" id="category_id" class="form-control" required>
                        <option value="">Seleccionar Categoría</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="stock_quantity">Cantidad en Stock:</label>
                    <input type="number" name="stock_quantity" id="stock_quantity" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="image">Imagen:</label>
                    <input type="file" name="image" id="image" class="form-control-file">
                </div>
                <div class="form-group">
                    <label for="description">Descripción:</label>
                    <textarea name="description" id="description" class="form-control" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <label for="price">Precio:</label>
                    <input type="text" name="price" id="price" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="state">Estado:</label>
                    <select name="state" id="state" class="form-control" required>
                        <option value="Activo">Activo</option>
                        <option value="Inactivo">Inactivo</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Guardar Producto</button>
            </form>
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
