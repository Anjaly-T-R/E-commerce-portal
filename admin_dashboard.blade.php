<x-app-layout>
<div style="text-align:center">
<strong>Click The below links to access pages</strong><br><br>
<div>
  
  <a href="{{url('/add_form')}}" style="color:red">Add User</a><br><br>
  <a href="{{url('/display_user')}}" style="color:red">List User</a><br><br>
  <a href="{{ route('cat.index') }}" style="color:red">Add Category</a><br><br>
  <a href="{{ route('cat.create') }}" style="color:red">List Category</a><br><br>
  <a href="{{ route('product.index') }}" style="color:red">Add Product</a><br><br>
  <a href="{{ route('product.create') }}" style="color:red">List Product</a><br><br>


</x-app-layout>

