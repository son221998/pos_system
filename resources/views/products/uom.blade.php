@extends('products.layout')
@section('content')

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
                        @foreach($uom as $item)
                            <tr class="product">
                                <td>{{$loop->iteration}}</td>
                                <td></td>
                                <td></td>
                                <td>{{$item->name}}</td>
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
                        <span class="">{{$product->links()}}</span>
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection