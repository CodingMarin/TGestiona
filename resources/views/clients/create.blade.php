@extends('adminlte::page')
@section('title', 'TGestiona - Crear Clientes')


@section('content_header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Registrar Cliente</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('categories.index') }}">Categorias</a></li>
                <li class="breadcrumb-item active">Registrar cliente</li>
            </ol>
        </div>
    </div>
@stop
@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('clients.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-5 form-group">
                        <label for="name">Nombre:</label>
                        <input type="text" name="name" id="name" class="form-control" required>
                    </div>
                    <div class="col-md-7 form-group">
                        <label for="street">Dirección:</label>
                        <input type="text" name="street" id="street" class="form-control" required>
                    </div>
                    <div class="col-md-4 form-group">
                        <label for="type_document">Tipo documento:</label>
                        <select name="type_document" id="type_document" class="form-control" required>
                            <option value="">Seleccionar</option>
                            <option value="dni">DNI</option>
                            <option value="pasaporte">Pasaporte</option>
                        </select>
                    </div>
                    <div class="col-md-4 form-group">
                        <label for="document">Documento:</label>
                        <input type="text" name="document" id="document" class="form-control" required>
                    </div>
                    <div class="col-md-4 form-group">
                        <label for="email">Email:</label>
                        <input name="email" id="email" class="form-control"></input>
                    </div>
                    <div class="col-md-4 form-group">
                        <label for="phone">Teléfono:</label>
                        <input name="phone" id="phone" class="form-control"></input>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Guardar Cliente</button>
            </form>
        </div>
    </div>
@endsection
