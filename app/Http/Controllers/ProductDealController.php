<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
class ProductDealController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index()
    {
        $deals = ProductDeal::where('id','desc')->get();
        return view('admin/productdeal/index',['deals'=>$deals]);
    }
    public function create()
    {
        $products = Products::all();
        return view('admin/productdeal/create',['products'=>$products]);
    }
    public function store(Request $request)
    {
        return redirect('admin/productdeal/index')->with('info','Product Deal created Successfully');
    }
    public function edit($id)
    {
        $deals = ProductDeal::find($id);
        return view('admin/productdeal/edit',['deals'=>$deals]);
    }
    public function update($id,Request $request)
    {
        return redirect('admin/productdeal/index')->with('info','Product Deal Updated Successfully');
    }

    public function delete($id)
    {
        $deals = ProductDeal::where('id',$id)->delete();
        return redirect('admin/productdeal/index')->with('info','Product Deal Deleted Successfully');
        
    }
    
    

}
