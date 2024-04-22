<!-- resources/views/clients.blade.php -->

@extends('adminlte::page')
@section('title', 'TGestiona - Clientes')

@section('content_header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Lista de usuarios</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Usuarios</a></li>
            </ol>
        </div>
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Todos los clientes</h3>
            <div class="card-tools">
                <a href="{{ route('clients.create') }}" class="btn btn-primary">Nuevo Usuario</a>
            </div>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($user as $users)
                        <tr>
                            <td>{{ $users->id }}</td>
                            <td>{{ $users->name }}</td>
                            <td>{{ $users->email }}</td>
                            <td>
                                <a href="" class="btn btn-info">Ver</a>
                                {{-- <a href="{{ route('clientes.show', $cliente->id) }}" class="btn btn-info">Ver</a> --}}
                                <a href="" class="btn btn-warning">Editar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop
