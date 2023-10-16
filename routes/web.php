<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Controller;
use App\Models\Product;

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
    return view('welcome');
});

Route::get('/', function () {
    $products = Product::all('products')->get();
    return view('product', ['product' => $product]);
});

Route::resource('/product', ProductController::class);

// Route::get('/search', 'ProductController@search');
Route::get('/search', [ProductController::class, 'search']);
Route::get('/product', [ProductController::class,'index']);




