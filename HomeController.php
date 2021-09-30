<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use DB;

class HomeController extends Controller
{
    public function index()
    {
        $role = Auth::user()->role;
        if($role=='1'){
            return view('admin/admin_dashboard');
        }
        else if($role=='0'){
            return view('users/display_product_user');
        }
        else{
            alert("id invalid");
        }
    }

    public function addUser(Request $request)
    {
        $user = new user;
        $user->name = $request->name;
        $user->role = $request->role;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();
        return redirect("/display_user");

    }
    function show()
    {
        $user_details = DB::table('users')->get();
  
        return view('admin.user_details',compact('user_details'));
    }
    function destroy($id)
    {
        $data = User::find($id);
        $data->delete();
        return redirect('display_user');
    }
    function showData($id)
    {
        $data = User::find($id);
        return view('admin/edit_user',compact('data'));
    }
  

   
    function update(Request $request)
    {
        $data = User::find($request->id);
      
        $data->name=$request->name;
        $data->role=$request->role;
        $data->email=$request->email;
        $data->save();
        return redirect('/display_user');
    }
        
}
