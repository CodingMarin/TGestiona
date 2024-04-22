@extends('adminlte::page')
@section('title', 'TGestiona')

@section('css')

@stop

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <x-dg-small-box title="Usuarios registrados" icon="fas fa-user" text="{{ $totalUsers }}"
                            bg="warning" url="{{ route('users.index') }}" urlText="Ver mas" id="userbox" />
                        <script>
                            $(() => {
                                $('#userbox-link').attr('href', new.link);
                            });
                        </script>
                    </div>
                    <div class="col-md-4">
                        <x-dg-small-box title="Ventas realizadas" icon="fas fa-shopping-cart" text="{{ $totalSales }}"
                            bg="info" url="{{ route('sales.index') }}" urlText="Ver mas" id="salesbox" />
                        <script>
                            $(() => {
                                $('#userbox-link').attr('href', new.link);
                            });
                        </script>
                    </div>
                    <div class="col-md-4">
                        <x-dg-small-box title="Productos" icon="fas fa-box-open" text="{{ $totalProducts }}" bg="success"
                            url="{{ route('products.index') }}" urlText="Ver mas" id="salesbox" />
                        <script>
                            $(() => {
                                $('#userbox-link').attr('href', new.link);
                            });
                        </script>
                    </div>
                    <div class="col-md-4">
                        <x-dg-small-box title="Categorias" icon="fas fa-box-open" text="{{ $totalCategories }}"
                            bg="primary" url="{{ route('categories.index') }}" urlText="Ver mas" id="salesbox" />
                        <script>
                            $(() => {
                                $('#userbox-link').attr('href', new.link);
                            });
                        </script>
                    </div>
                    <div class="col-md-4">
                        <x-dg-small-box title="Clientes" icon="fas fa-box-open" text="{{ $totalClients }}" bg="secondary"
                            url="{{ route('clients.index') }}" urlText="Ver mas" id="salesbox" />
                        <script>
                            $(() => {
                                $('#userbox-link').attr('href', new.link);
                            });
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
