@extends('adminlte::page')
@section('title', 'TGestiona - Nueva Venta')

@section('content_header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Nueva venta</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('sales.index') }}">Ventas</a></li>
                <li class="breadcrumb-item active">Nueva venta</li>
            </ol>
        </div>
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <!--Client and document sale-->
            <div class="col">
                <form action="{{ route('sales.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="client_id">Cliente:</label>
                        <select name="client_id" id="client_id" class="form-control">
                            @foreach ($clients as $client)
                                <option value="{{ $client->id }}">{{ $client->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="type_document">Tipo de Comprobante:</label>
                            <select name="type_document" id="type_document" class="form-control">
                                <option value="Factura">Factura</option>
                                <option value="Boleta">Boleta</option>
                                <option value="Ticket">Ticket</option>
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="serie_document">Serie Comprobante:</label>
                            <input type="text" name="serie_document" id="serie_document" class="form-control">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="number_document">Número Comprobante:</label>
                            <input type="text" name="number_document" id="number_document" class="form-control">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="tax">Impuesto:</label>
                            <div class="form-check">
                                <input type="checkbox" name="tax" id="tax" class="form-check-input">
                                <label for="tax" class="form-check-label">18% Impuesto</label>
                            </div>
                        </div>
                    </div>
                    <!-- All respect product details-->
                    <div class="container border rounded-lg border-primary py-4 px-3">
                        <div class="col">
                            <div class="row">
                                <input type="hidden" name="products" id="products">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="product_id">Producto:</label>
                                        <select class="form-control" id="product_id" name="product_id">
                                            <option value="">Seleccionar Producto</option>
                                            @foreach ($products as $product)
                                                <option value="{{ $product->id }}" data-price="{{ $product->price }}"
                                                    data-stock="{{ $product->stock_quantity }}">{{ $product->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="quantity">Cantidad:</label>
                                        <input type="number" class="form-control" id="quantity" name="quantity"
                                            min="1" value="1">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="stock">Stock:</label>
                                        <input type="text" class="form-control" id="stock" name="stock" readonly>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="price">Precio:</label>
                                        <input type="text" class="form-control" id="price" name="price" readonly>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="discount">Descuento:</label>
                                        <input type="text" class="form-control" value="0" id="discount"
                                            name="discount">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="total">Total a pagar: S/.</label>
                                <input type="text" class="form-control" id="total" name="total" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <button type="submit" id="add_sale" class="btn btn-primary">Registrar Venta</button>
                    </div>
                </form>
            </div>
            <!-- Modal error -->
            <div class="modal fade" id="modal_error" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title text-danger" id="exampleModalLabel"><i
                                    class="fas fa-exclamation-circle"></i> Mensaje
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body"></div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                document.getElementById('product_id').addEventListener('change', function() {

                    var selectedOption = this.options[this.selectedIndex];
                    var price = parseFloat(selectedOption.getAttribute('data-price'));
                    var stock = parseInt(selectedOption.getAttribute('data-stock'));

                    document.getElementById('price').value = price.toFixed(2);
                    document.getElementById('stock').value = stock;

                    calculateTotal()
                });

                document.getElementById('quantity').addEventListener('input', function() {
                    calculateTotal();
                });

                document.getElementById('tax').addEventListener('change', function() {
                    calculateTotal();
                });

                function validateData() {
                    var product_id = $('#product_id').val()
                    var quantity = parseInt($('#quantity').val(), 10)
                    var stock = parseInt($('#stock').val(), 10)

                    if (!product_id) {
                        $('#modal_error .modal-body').html('<h5>Seleccione un producto por favor</h5>')
                        $('#modal_error').modal('show')
                        $('#product_id').focus()
                        return;

                    } else if (quantity > stock) {
                        $('#modal_error .modal-body').html('<h5>La cantidad no puede superar al stock</h5>')
                        $('#modal_error').modal('show')
                        return;
                    }
                }

                function calculateTotal() {
                    var price = parseFloat(document.getElementById('price').value);
                    var quantity = parseInt(document.getElementById('quantity').value);
                    var total = price * quantity;

                    if (document.getElementById('tax').checked) {
                        total *= 1.18
                    }
                    document.getElementById('total').value = total.toFixed(2);
                }
            </script>
        </div>
    </div>
@stop
