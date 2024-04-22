<?php

namespace App\Http\Controllers\Sale;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sale;
use App\Models\Client;
use App\Models\Product;

class SaleController extends Controller
{
    public function index()
    {
        $sales = Sale::all();
        return view('sales.index', compact('sales'));
    }

    public function create()
    {
        $clients = Client::all();
        $products = Product::all();
        return view('sales.create', compact('clients', 'products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'type_document' => 'required|string',
            'serie_document' => 'required|string',
            'number_document' => 'required|string',
            'total' => 'required|numeric',
            'client_id' => 'required|exists:clients,id',
            'product_id' => 'required|exists:products,id',
        ]);

        $sale = new Sale();
        $sale->type_document = $request->type_document;
        $sale->serie_document = $request->serie_document;
        $sale->number_document = $request->number_document;
        $sale->total = $request->total;
        $sale->client_id = $request->client_id;
        $sale->product_id = $request->product_id;

        $sale->save();

        return redirect()->route('sales.index')->with('success', '¡Venta registrada exitosamente!');
    }

    public function destroy($id)
    {
        $sale = Sale::findOrFail($id);
        $sale->delete();

        return redirect()->route('sales.index')->with('success', '!Venta eliminada exitosamente!');
    }
}
