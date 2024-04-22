<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\Sale\SaleController;
use App\Http\Controllers\Client\ClientController;
use App\Http\Controllers\Category\CategoryController;
use App\Http\Controllers\User\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware(['auth'])->group(function () {
    /** Products endpoints */
    Route::resource('products', ProductController::class)->only([
        'index', 'create', 'edit', 'store', 'update'
    ]);
    /** Sales endpoints */
    Route::resource('sales', SaleController::class)->only([
        'index', 'create', 'store', 'destroy'
    ]);
    /** Client endpoints */
    Route::resource('clients', ClientController::class)->only([
        'index', 'create', 'store', 'edit', 'update'
    ]);
    /** Categories endpoints */
    Route::resource('categories', CategoryController::class)->only([
        'index', 'create', 'edit', 'store', 'destroy', 'update',
    ]);
    /** User endpoints */
    Route::resource('users', UserController::class)->only([
        'index'
    ]);
});
