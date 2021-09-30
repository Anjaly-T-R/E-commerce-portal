


<!-- new -->
@extends('admin.layout')
     
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Product List </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('product.index') }}"> Create New Product</a>
                <a class="btn btn-primary" href="{{url('/separateusers')}}"> Back</a>
            </div>
        </div>
    </div>
    
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
     
    <table class="table table-bordered">
        <tr>
            <th>Product Name</th>
            <th>Category Name</th>
            <th>Status</th>
            <th>Quantity</th>
            <th>Price</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($product_array as $product)
        <tr>
        <td>{{ $product->product_name }}</td>
        <td>{{ $product->category_name }}</td>
        <td>@if($product->status== 1) Active @elseif($product->status== 0) Inactive @endif </td>
        <td>{{ $product->product_quan }}</td>
        <td>{{ $product->product_price }}</td>
            <td>
                <form action="{{ route('product.destroy',$product->id) }}" method="POST">
     
                    
      
                    <a class="btn btn-primary" href="{{ route('product.edit',$product->id) }}">Edit</a>
     
                    @csrf
                    @method('DELETE')
        
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    
   
        
@endsection
