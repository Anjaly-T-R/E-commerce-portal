<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category_array = Category::all();
        return view('admin.product_add',compact('category_array'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product_array = DB::table('products')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->select('products.*', 'categories.category_name')
            ->orderBy('products.id', 'ASC')
            ->get();
  
        return view('admin.product_list',compact('product_array'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        

        $data = Product::create([
            'product_name' => $request->product_name,
            'category_id' => $request->category_id,
            'status' => $request->status,
            'product_quan' => $request->product_quan,
            'product_price' => $request->product_price,

        ]);
        
        return redirect()->route('product.create')->with('success','Product created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
       
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Product::find($id);
        $product_array = Category::all();
       return view('admin.edit_product',compact('data','product_array'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Product::find($id);
      
        $data->product_name=$request->product_name;
        $data->category_id=$request->category_id;
        $data->status=$request->status;
        $data->product_quan=$request->product_quan;
        $data->product_price=$request->product_price;
      /*  $data->item_name="jjjj";
        $data->category_id="1";
        $data->item_quan="7";
        $data->item_price="8";*/
       

        $data->save();
        return redirect()->route('product.create');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Product::find($id);
        $data->delete();
        return redirect()->route('product.create');
    }
}
