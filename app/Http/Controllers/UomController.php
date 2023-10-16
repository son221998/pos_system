<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Uom;

class UomController extends Controller
{
        /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $uoms = Uoms::paginate(2);
        return view('products.index', ['uom'=>$uoms]);
        
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
        Uom::create($validatedData);
        return redirect('product')->with('flash_message', 'Product Addess!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $uoms = Uom::find($id);
        if(!$product){
            abort(404);
        }
        return view('products.show')->with('products', $uoms);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $uoms = Uom::find($id);
        if(!$uoms){
            abort(404);
        }
        return view('uom.edit')->with('uoms', $uoms);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $uoms = Uom::find($id);
        $input = $request->all();
        return redirect('product')->with('flash_message', 'Product Updated!'); 

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $uoms = Uom::find($id);
        if (!$uoms) {
            abort(404);
        }
        $uoms->delete();
        return redirect('product')->with('flash_message', 'Product Deleted!'); 
    }
}
