<x-app-layout>
    <h1>Update User</h1>
<form action="/edit" method="post">
@csrf
<input type="hidden" name="id" value="{{$data['id']}}">
  <label for="name">First name:</label><br>
  <input type="text" id="name" name="name" value="{{$data['name']}}"><br>
  <label for="role">Choose a role:</label>
<select id="role" name="role" >
  <option value="0">User</option>
  <option value="1">Admin</option>
  <option value="2">Disable User</option>
</select><br><br><br>
  <label for="email">Email:</label><br>
  <input type="email" id="email" name="email" value="{{$data['email']}}"><br><br>
  
 
  <input type="submit" value="Submit">
</form>
</x-app-layout>
