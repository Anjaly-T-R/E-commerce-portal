
<!-- new -->
@extends('admin.layout')
     
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Product List </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{url('/add_form')}}"> Create New User</a>
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
            <th>Name</th>
            <th>Role</th>
            <th>Gmail</th>
            <th width="280px">Action</th>
        </tr>
        
        @foreach($user_details as $value)
        <tr>
            <td>{{ $value->name }}</td>
            <td>@if($value->role== 1) Admin @elseif($value->role== 0) User @endif</td>
            <td>{{ $value->email }}</td>

            <td><a href="{{'delete/'.$value->id}}">Delete</a> | <a href="{{'edit/'.$value->id}}">Edit</a></td>

        </tr>
        @endforeach
    </table>
    
   
        
@endsection

