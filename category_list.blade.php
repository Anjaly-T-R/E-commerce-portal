




<!-- new -->
@extends('admin.layout')
     
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Category List </h2>
            </div>
            <div class="pull-right">

                <a class="btn btn-success" href="{{ route('cat.index') }}"> Create New Category</a>
                
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
            <th>Category Number</th>
            <th>Category Name</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($data as $value)
        <tr>
        <td>{{ $value->id }}</td>

        <td>{{ $value->category_name }}</td>
            <td>
                <form action="{{ route('cat.destroy',$value->id) }}" method="POST">
     
                    
      
                    <a class="btn btn-primary" href="{{ route('cat.edit',$value->id) }}">Edit</a>
     
                    @csrf
                    @method('DELETE')
        
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    
   
        
@endsection
