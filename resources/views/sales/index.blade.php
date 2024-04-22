@extends('adminlte::page')
@section('title', 'TGestiona - Lista de Ventas')

@section('content_header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Listado de Ventas</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="">Inicio</a></li>
                <li class="breadcrumb-item active">Listado de ventas</li>
            </ol>
        </div>
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Todas las ventas</h3>
            <div class="card-tools">
                <a href="{{ route('sales.create') }}" class="btn bg-green">Nueva venta</a>
                <a href="" class="btn btn-primary">Generar Reporte</a>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Fecha</th>
                        <th>Cliente</th>
                        <th>Comprobante</th>
                        <th>Total</th>
                        <th>Estado</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sales as $sale)
                        <tr>
                            <td>{{ $sale->created_at }}</td>
                            <td>{{ $sale->client->name }}</td>
                            <td>{{ $sale->type_document }}: {{ $sale->serie_document }}-{{ $sale->number_document }}</td>
                            <td>{{ $sale->total }}</td>
                            <td>{{ $sale->status }}</td>
                            <td>
                                <div class="btn-group g-1" role="group" aria-label="Actions">
                                    <form action="{{ route('sales.destroy', $sale->id) }}" method="POST">
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
