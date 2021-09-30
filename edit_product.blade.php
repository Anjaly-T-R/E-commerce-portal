

<!-- new -->
@extends('admin.layout')
     
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Product</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('product.create') }}"> Back</a>
            </div>
        </div>
    </div>
     
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <form action="{{ route('product.update',$data->id) }}" method="POST" enctype="multipart/form-data"> 
        @csrf
        @method('PUT')
     
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Product Name:</strong>
                    <input type="text" name="product_name" class="form-control" placeholder="Product Name" value="{{ $data->product_name }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                <strong>Category:</strong>
                  <select name="category_id" id="category_id" class="form-control">
                      <option>---Category Name--</option>
                        @foreach($product_array as $category)
                        <option value="{{ $category->id }}" @if($category->id==$data['category_id']) selected='selected' @endif >{{ $category->category_name}}</option>
                        @endforeach
                    </select>
                    
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Image:</strong>
                    <select name="status" class="form-control" >
                      <option>--Status--</option>
                      <option value="1" @if($data['status'] == 1) selected='selected' @endif>Active</option>
                      <option value="0" @if($data['status'] == 0) selected='selected' @endif>InActive</option>
                      
                    </select>
                    
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Product Quantity:</strong>
                    <input type="text" name="product_quan" class="form-control" placeholder="Product Name" value="{{ $data['product_quan'] }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Product Price:</strong>
                    <input type="text" name="product_price" class="form-control" placeholder="Product Price" value="{{ $data['product_price'] }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
     
    </form>
@endsection
