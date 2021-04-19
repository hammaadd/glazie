<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\ProductDeal;
use App\Models\DealDetail;
use Illuminate\Support\Facades\Auth;
class ProductDealController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index()
    {
        $deals = ProductDeal::orderBy('id','desc')->get();
        return view('admin/productdeal/index',['deals'=>$deals]);
    }
    public function create()
    {
        $products = Products::all();
        return view('admin/productdeal/create',['products'=>$products]);
    }
    public function store(Request $request)
    {
       
        $deal_name = $request->input('deal_name');
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');
        $price  = $request->input('price');
        $description = $request->input('description');
        $product_id = $request->input('product_id');
        $quantity = $request->input('quantity');
        $product_deal = new ProductDeal;
        $product_deal->deal_name = $request->input('deal_name');
        $product_deal->price = $request->input('price');
        
        $product_deal->started_date = $request->input('start_date');
        $product_deal->end_date = $request->input('end_date');
        if($request->file('image')){
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            
            $destinationPath = public_path('/admin-assets/productdeal');
            $imgname = uniqid() . $filename;
            $file->move($destinationPath, $imgname);
            $product_deal->image= $imgname;
        }
        $product_deal->created_by = Auth::id();
        $product_deal->save();
        for($i=0;$i<count($product_id);$i++) {
            $deal_details = new DealDetail;
            $deal_details->deal_id = $product_deal->id;
            $deal_details->product_id = $product_id[$i];
            $deal_details->quantity = $quantity[$i];
            $deal_details->created_by = Auth::id();
            $deal_details->save();

            
        }
        

        return redirect('admin/productdeals')->with('info','Product Deal created Successfully');
    }
    public function edit($id)
    {
        $deals = ProductDeal::find($id);
        $products = Products::all();
        return view('admin/productdeal/edit',['deals'=>$deals,'products'=>$products]);
    }
    public function update($id,Request $request)
    {
        $deal_name = $request->input('deal_name');
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');
        $price  = $request->input('price');
        $description = $request->input('description');
        $product_id = $request->input('product_id');
        $quantity = $request->input('quantity');
        
        $update_deal = array(
        'deal_name' => $request->input('deal_name'),
        'price' => $request->input('price'),
        'updated_by'=> Auth::id(),
        'started_date' => $request->input('start_date'),
        'end_date' => $request->input('end_date'),
        );
        ProductDeal::where('id',$id)->update($update_deal);
        if($request->file('image')){
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            
            $destinationPath = public_path('/admin-assets/productdeal');
            $imgname = uniqid() . $filename;
            $file->move($destinationPath, $imgname);
            $deal_image = array(
            'image'=> $imgname
            );
            ProductDeal::where('id',$id)->update($deal_image);
        }
       
       if($product_id)
       {
        for($i=0;$i<count($product_id);$i++) {
            $deal_details = new DealDetail;
            $deal_details->deal_id = $id;
            $deal_details->product_id = $product_id[$i];
            $deal_details->quantity = $quantity[$i];
            $deal_details->created_by = Auth::id();
            $deal_details->save();

            
        }
       }
        return redirect('admin/productdeals')->with('info','Product Deal Updated Successfully');
    }

    public function delete($id)
    {
        $deals = ProductDeal::where('id',$id)->delete();
        return redirect('admin/productdeals')->with('info','Product Deal Deleted Successfully');
        
    }
    public function removeprd(Request $request)
    {
        $id =  $request->input('id');
        DealDetail::where('id',$id)->delete();
        echo 1;
    }
    public function updateprdqty(Request $request)
    {
        $id =  $request->input('id');
        $updateqty = $request->input('prdouctqty');
        $updateqtty  = array(
            'quantity'=>$updateqty
        );
        DealDetail::where('id',$id)->update($updateqtty);
        echo 1;
    }
    public function removeimage(Request $request)
    {
        $id =  $request->input('id');
        
        $updateqtty  = array(
            'image'=>NULL
        );
        ProductDeal::where('id',$id)->update($updateqtty);
        echo 1;
    }
    
    

}
