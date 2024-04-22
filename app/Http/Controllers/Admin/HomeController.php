<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Client;
use App\Models\Sale;
use App\Models\User;
use App\Models\Product;

class HomeController extends Controller
{
    public function dashboard()
    {
        $sale = Sale::all();
        $user = User::all();
        $product = Product::all();
        $category = Category::all();
        $client = Client::all();

        $totalClients = $client->count();
        $totalCategories = $category->count();
        $totalProducts = $product->count();
        $totalUsers = $user->count();
        $totalSales = $sale->count();

        return view('admin.dashboard', compact('totalSales', 'totalUsers', 'totalProducts', 'totalCategories', 'totalClients'));
    }
}
