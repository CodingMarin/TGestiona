@extends('adminlte::page')
@section('title', 'TGestiona - Editar Cliente')


@section('content_header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Editar Cliente</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('clients.index') }}">Clientes</a></li>
                <li class="breadcrumb-item active">Editar cliente</li>
            </ol>
        </div>
    </div>
@stop
@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('clients.update', $client->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-5 form-group">
                        <label for="name">Nombre:</label>
                        <input type="text" value="{{ $client->name }}" name="name" id="name" class="form-control"
                            required>
                    </div>
                    <div class="col-md-7 form-group">
                        <label for="street">Dirección:</label>
                        <input type="text" value="{{ $client->street }}" name="street" id="street"
                            class="form-control" required>
                    </div>
                    <div class="col-md-4 form-group">
                        <label for="type_document">Tipo documento:</label>
                        <select value="{{ $client->type_document }}" name="type_document" id="type_document"
                            class="form-control" required>
                            <option value="">Seleccionar</option>
                            <option value="dni" @if ($client->type_document == 'dni') selected @endif>DNI</option>
                            <option value="pasaporte" @if ($client->type_document == 'pasaporte') selected @endif>Pasaporte</option>
                        </select>
                    </div>
                    <div class="col-md-4 form-group">
                        <label for="document">Documento:</label>
                        <input type="text" value="{{ $client->document }}" name="document" id="document"
                            class="form-control" required>
                    </div>
                    <div class="col-md-4 form-group">
                        <label for="email">Email:</label>
                        <input value="{{ $client->email }}" name="email" id="email" class="form-control"></input>
                    </div>
                    <div class="col-md-4 form-group">
                        <label for="phone">Teléfono:</label>
                        <input value="{{ $client->phone }}" name="phone" id="phone" class="form-control"></input>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Actualizar Cliente</button>
            </form>
        </div>
    </div>
@endsection
