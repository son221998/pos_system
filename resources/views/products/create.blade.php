@extends('products.layout')
@section('content')
    <div class="card" style="margin:20px;">
        <div class="card-header">Create New Products</div>
        <div class="card-body">
            <form action="{{url('product')}}" method="post">
                {!! csrf_field()!!}
                <label>Name</label></br>
                <input type="text" name="name" id="name" class="form-control"></br>
                <label>Product Code</label></br>
                <input type="text" name="product_code" id="product_code" class="form-control"></br>
                <label>UOM</label></br>
                <input type="text" name="uom" id="uom" class="form-control"></br>
                <label>Description</label></br>
                <input type="text" name="description" id="description" class="form-control"></br>
                <label>Unit Cost</label></br>
                <input type="text" name="unit_cost" id="unit_cost" class="form-control"></br>
                <label>Sell Price</label></br>
                <input type="text" name="sell_price" id="sell_price" class="form-control"></br>
                <label>Discount</label></br>
                <input type="text" name="discount" id="discount" class="form-control">
                <input type="submit" value="Save" class="btn btn-success"></br>

        </div>
    </div>
@stop