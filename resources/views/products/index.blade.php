@extends('products.layout')
@section('content')
<div class="container">
    <div class="row" class="col-6" style="margin:20px;">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table class="row" class="col-12">
                        <h4 >Product Information</h4>
                        <form action="{{url('/search/')}}"  method="$GET" class="form-inline">
                            <div class="input-group form-group-lg has-feedback" class="">
                                <div class="form-outline">
                                    <input type="text" class="form-control mr-bg-2" name="query" placeholder="Search" aria-label="Search" id="search" aria-describedby="search-addon">
                                </div>
                            </div>
                        </form>  
                    </table>
                    <div>
                        <div class="table-responsive"> 
                            <table class="table">
                                <thead class="bg-primary text-light">
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Product Code</th>
                                        <th>UOM</th>
                                        <th>Description</th>
                                        <th>Unit Cost</th>
                                        <th>Sell Price</th>
                                        <th>Discount</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($products as $item)
                                    <tr class="products">
                                        <td>{{$item->id}}</td>
                                        <td>{{$item->name}}</td>
                                        <td>{{$item->product_code}}</td>
                                        <td>
                                        <td>{{$item->description}}</td>
                                        <td>{{$item->unit_cost}}</td>
                                        <td>{{$item->sell_price}}</td>
                                        <td>{{$item->discount}}</td>
                                        <td>
                                            <a href="{{url('/product/' . $item->id)}}" title="View Product"><button class="btn btn-primary btn-sm"><i class="fa-regular fa-eye" aria-hidden="true"></i></button></a>
                                            <a href="{{url('/product/' . $item->id . '/edit')}}" title="Edit Product"><button class="btn btn-success btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i></button></a>
                                        <form method="POST" action="{{url('/product' . '/' . $item->id)}}" accept-charset="UTF-8" style="display:inline">
                                            {{method_field('DELETE')}}
                                            {{csrf_field()}}
                                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Product" onclick="return confirm("Confirm Delete?")"><i class="fa fa-trash-can" aria-hidden="true"></i></button>
                                        </form>
                                        </td>
                                        
                                    </tr>                                
                                    @endforeach
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>  
    </div>
    <div class="row" class="col-6" style="margin:20px;">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4>UOM Information</h4>
                    <div class="table-responsive"> 
                        <table class="table">
                            <thead class="bg-primary text-light" class="col-12">
                                <tr>
                                    <th></th>
                                    <th>ID</th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th>Name</th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th>Actions</th>

                                </tr>
                            </thead>
                            <tbody>
                            @foreach($uoms as $uom)
                                <tr class="product">
                                    <td>{{$uom->id}}</td>
                                    <td></td>
                                    <td></td>
                                    <td>{{$uom->name}}</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>        
                                        <a href="{{url('/product/' . $item->id)}}" title="View Product"><button class="btn btn-primary btn-sm"><i class="fa-regular fa-eye" aria-hidden="true"></i></button></a>
                                        <a href="{{url('/product/' . $item->id . '/edit')}}" title="Edit Product"><button class="btn btn-success btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i></button></a>
                                        <form method="POST" action="{{url('/product' . '/' . $item->id)}}" accept-charset="UTF-8" style="display:inline">
                                            {{method_field('DELETE')}}
                                            {{csrf_field()}}
                                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Product" onclick="return confirm("Confirm Delete?")"><i class="fa fa-trash-can" aria-hidden="true"></i></button>
                                        </form>                       
                                    </td>                               
                                </tr>                      
                                @endforeach                                 
                            </tbody>
                        </table>
                            <span class="">{{$products->links()}}</span>
                    </div>          
                </div>
            </div>
        </div>
    </div>
</div>
@endsection