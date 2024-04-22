@extends('adminlte::page')
@section('title', 'Editar Producto')

@section('content_header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Editar Producto</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('products.index') }}">Productos</a></li>
                <li class="breadcrumb-item active">Editar Producto</li>
            </ol>
        </div>
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Nombre:</label>
                            <input type="text" name="name" id="name" class="form-control"
                                value="{{ $product->name }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="category_id">Categoría:</label>
                            <select name="category_id" id="category_id" class="form-control">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" @if ($category->id == $product->category_id) selected @endif>
                                        {{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="code">Código:</label>
                            <input type="text" name="code" id="code" class="form-control"
                                value="{{ $product->code }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="stock_quantity">Cantidad en Stock:</label>
                            <input type="number" name="stock_quantity" id="stock_quantity" class="form-control"
                                value="{{ $product->stock_quantity }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="price">Precio:</label>
                            <input type="number" name="price" id="price" class="form-control"
                                value="{{ $product->price }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="state">Estado:</label>
                            <select name="state" id="state" class="form-control">
                                <option value="Activo" @if ($product->state == 'Activo') selected @endif>Activo</option>
                                <option value="Inactivo" @if ($product->state == 'Inactivo') selected @endif>Inactivo</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="image">Imagen:</label>
                            @if ($product->image)
                                <img src="{{ asset('images/' . $product->image) }}" alt="Imagen del producto"
                                    style="max-width: 200px;">
                            @else
                                <p>No hay imagen disponible.</p>
                            @endif
                            <input type="file" name="image" id="image" class="form-control-file">
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Actualizar Producto</button>
            </form>
        </div>
    </div>
@stop
