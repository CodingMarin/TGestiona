<!-- resources/views/clients.blade.php -->

@extends('adminlte::page')
@section('title', 'TGestiona - Clientes')

@section('content_header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Lista de clientes</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('clients.index') }}">Clientes</a></li>
                <li class="breadcrumb-item active">Registrar cliente</li>
            </ol>
        </div>
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Todos los clientes</h3>
            <div class="card-tools">
                <a href="{{ route('clients.create') }}" class="btn btn-primary">Nuevo Cliente</a>
                <a href="{{ route('products.create') }}" class="btn btn-secondary">Generar Reporte</a>
            </div>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Dirección</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($clients as $cliente)
                        <tr>
                            <td>{{ $cliente->id }}</td>
                            <td>{{ $cliente->name }}</td>
                            <td>{{ $cliente->email }}</td>
                            <td>{{ $cliente->street }}</td>
                            <td>
                                <a href="" class="btn btn-info">Ver</a>
                                {{-- <a href="{{ route('clientes.show', $cliente->id) }}" class="btn btn-info">Ver</a> --}}
                                <a href="{{ route('clients.edit', $cliente->id) }}" class="btn btn-warning">Editar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop
