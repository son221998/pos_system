<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Controller;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('product');
});

Route::get('/', function () {
    $products = Product::all('products')->get();
    return view('product', [
        'products' => $products
    ]);
});

Route::resource('/products', ProductController::class);
Route::get('/search', [App\Http\Controllers\ProductController::class, 'search'])->name('search');
Route::get('/product', [ProductController::class,'index']);




