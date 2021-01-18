<?php

namespace App\Http\Controllers;
use App\Models\ProductSize;
use App\Models\Products;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
class ProductSizeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');  
    }
    public function index(){
        $products = DB::table('product_sizes')
        ->join('products', 'products.id', '=', 'product_sizes.product_id')
        
        ->select('product_sizes.*', 'products.product_name')
          ->where('product_sizes.status', '=', '1')->get();
       
        return view('admin/productsize/index',['products'=>$products]);
        //productsize
    }
    public function add(){
        $products = Products::where('status','=','1')->get();
        return view('admin/productsize/create',['products'=>$products]);
    }
    public function create(Request $request){
        $user = Auth::user();
        $validatedData = $request->validate([
           'product_id'=>'required',
           'name'=>'required',
           'height'=>'required',
           'width'=>'required',
           'thikness'=>'required',
           'price'=>'required'
           ]);
        $productsize = new ProductSize;
        $productsize->product_id  = $request->input('product_id');
        $productsize->name  = $request->input('name');
        $productsize->height  = $request->input('height');
        $productsize->width  = $request->input('width');
        $productsize->thickness  = $request->input('thikness');
        $productsize->price  = $request->input('price');
        $productsize->created_by  = $user->id;
        $productsize->save();
        return redirect('admin/productsize')->with('info','The Product Size is created  is created Successfully');
        

    }
    public function edit($id){
        $products = Products::where('status','=','1')->get();
        $productsize = ProductSize::find($id);
        return view('admin/productsize/edit',['products'=>$products,'productsize'=>$productsize]);
    }
    public function update($id , Request $request){
        $user = Auth::user();
        $validatedData = $request->validate([
           'product_id'=>'required',
           'name'=>'required',
           'height'=>'required',
           'width'=>'required',
           'thikness'=>'required',
           'price'=>'required'
           ]);
        $productsize = array(
        'product_id'  => $request->input('product_id'),
        'name'  => $request->input('name'),
        'height'  => $request->input('height'),
        'width'  => $request->input('width'),
        'thickness'  => $request->input('thikness'),
        'price'  => $request->input('price'),
        'updated_by'  => $user->id
        
        );
       
        
        Productsize::where('id',$id)->update($productsize);
        return redirect('admin/productsize')->with('info','The Product Size is updated  Successfully');
        

    }
    public function delete($id){
        $deleteproductsize = array(
            'status'=> '0'
            );
           
            
            Productsize::where('id',$id)->update($deleteproductsize);
            return redirect('admin/productsize')->with('info','The Product Size is deleted  Successfully');
    }
}
