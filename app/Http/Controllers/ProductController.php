<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ProductController;
use App\Models\Product;
use App\Models\Uom;
use App\Models\ProductUom;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::paginate(6);
        $uoms = Uom::paginate(3);
        $product_uoms = ProductUom::where('unit_cost', 'sell_price', 'discount');
        return view('products.index', ['products' => $products,'uoms' => $uoms, 'product_uoms' => $product_uoms]);
        
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
        $products = Product::find($id);
        if(!$products){
            abort(404);
        }
        return view('products.show')->with('products', $products);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $products = Product::find($id);
        if(!$products){
            abort(404);
        }
        return view('products.edit')->with('products', $products);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $products = Product::find($id);
        $input = $request->all();
        $products->update($input);
        return redirect('product')->with('flash_message', 'Product Updated!'); 

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $products = Product::find($id);
        if (!$products) {
            abort(404);
        }
        $products->delete();
        return redirect('product')->with('flash_message', 'Product Deleted!'); 
    }
    public function search(Request $request)
    {
        
        
        $search_text = $_GET['query'];
        $products = Product::where('name', 'product_code', '%' . $search_text . '%')->with('products')->get();
        return view('products.search', ['products'=>$products]);
        
    }
}
