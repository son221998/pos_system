<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ProductController;
use App\Models\Product;
use App\Models\Uom;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::paginate(6);
        $uoms = Uom::paginate(3);
        return view('products.index', ['product'=>$products, 'uom'=>$uoms]);
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'product_code' => 'required|unique:products',
            'uom' => 'required',
            'description' => 'required',
            'unit_cost' => 'required|numeric',
            'sell_price' => 'required|numeric',
            'discount' => 'nullable|numeric',
        ]);
        Product::create($validatedData);
        return redirect('product')->with('flash_message', 'Product Addess!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::find($id);
        if(!$product){
            abort(404);
        }
        return view('products.show')->with('products', $product);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::find($id);
        if(!$product){
            abort(404);
        }
        return view('products.edit')->with('products', $product);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $products = Product::find($id);
        $input = $request->all();
        $product->update($input);
        return redirect('product')->with('flash_message', 'Product Updated!'); 

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::find($id);
        if (!$product) {
            abort(404);
        }
        $product->delete();
        return redirect('product')->with('flash_message', 'Product Deleted!'); 
    }
    public function search(Request $request)
    {
        $search_text = $_GET['query'];
        $products = Product::where('name', 'LIKE', '%' . $search_text . '%')->get();
        return view('search_results', ['results' => $products]);
    }
}
