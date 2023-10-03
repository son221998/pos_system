@extends('products.layout')
@section('content')

<div class="card" style="margin:20px;">
    <div class="card-header">Product Page</div>
    <div class="card-body">
        <div class="card-body">
            <h5 class="card-title">Name: {{$products->name}}</h5>
            <p class="card-text">Product Code: {{$products->product_code}}</p>
            <p class="card-text">UOM: {{$products->uoms}}</p>
            <p class="card-text">Description: {{$products->description}}</p>
            <p class="card-text">Unit Cost: {{$products->unit_cost}}</p>
            <p class="card-text">Sell Price: {{$products->sell_price}}</p>
            <p class="card-text">Discount: {{$products->discount}}</p>
        </div>
    </div>
</div>


@endsection()