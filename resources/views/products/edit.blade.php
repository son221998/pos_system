@extends('products.layout')
@section('content')

<div class="card" style="margin:20px;">
    <div class="card-header">Edit Product</div>
    <div class="card-body">
        <form action="{{ url('product/' . $products->id) }}" method="post">
            {!! csrf_field() !!}
            @method("PATCH")
            <input type="hidden" name="id" id="id" value="{{$products->id}}" id="id" />
            <label>Name</label></br>
            <input type="text" name="name" id="name" value="{{$products->name}}" class="form-control"></br>
            <label>Product Code</label></br>
            <input type="text" name="product_code" id="product_code" value="{{$products->product_code}}" class="form-control"></br>
            <label>UOM</label></br>
            <input type="text" name="uom" id="uom" value="{{$products->uom}}" class="form-control"></br>
            <label>Description</label></br>
            <input type="text" name="description" id="description" value="{{$products->description}}" class="form-control"></br>
            <label>Unit Cost</label></br>
            <input type="text" name="unit_cost" id="unit_cost" value="{{$products->unit_cost}}" class="form-control"></br>
            <label>Sell Price</label></br>
            <input type="text" name="sell_price" id="sell_price" value="{{$products->sell_price}}" class="form-control"></br>
            <label>Discount</label></br>
            <input type="text" name="discount" id="discount" value="{{$products->discount}}" class="form-control"></br>
            <input type="submit" value="Update" class="btn btn-success"></br>
        </form>
    </div>
    
</div>

@stop