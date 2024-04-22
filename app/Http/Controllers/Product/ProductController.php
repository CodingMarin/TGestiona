<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'stock_quantity' => 'required|integer',
            'price' => 'required|numeric',
            'state' => 'required|string|max:255',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('images'), $imageName);
        } else {
            $imageName = null;
        }

        $product = new Product();
        $product->name = $request->name;
        $product->code = $request->code;
        $product->category_id = $request->category_id;
        $product->stock_quantity = $request->stock_quantity;
        $product->price = $request->price;
        $product->state = $request->state;
        $product->image = $imageName;
        $product->save();

        return redirect()->route('products.index')->with('success', '¡Producto creado exitosamente!');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();

        return view('products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, $id)
    {
        // Validar los datos del formulario
        $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'stock_quantity' => 'required|integer',
            'price' => 'required|numeric',
            'state' => 'required|string|max:255',
        ]);

        $product = Product::findOrFail($id);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('images'), $imageName);
            if ($product->image) {
                unlink(public_path('images' . $product->image));
            }
            $product->image = $imageName;
        }

        $product->name = $request->name;
        $product->code = $request->code;
        $product->category_id = $request->category_id;
        $product->stock_quantity = $request->stock_quantity;
        $product->price = $request->price;
        $product->state = $request->state;
        $product->save();

        return redirect()->route('products.index')->with('success', '¡Producto actualizado exitosamente!');
    }
}
