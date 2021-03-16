<?php

namespace App\Http\Controllers;
use App\Models\ProductAttribute;
use App\Models\Products;
use App\Models\Attribute;
use Illuminate\Support\Facades\Auth;
use DB;
use Illuminate\Http\Request;

class ProductattributeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index(){
        $products = DB::table('product_attributes')
        ->join('products', 'products.id', '=', 'product_attributes.product_id')
        ->join('attributes', 'attributes.id', '=', 'product_attributes.attribute_id')
        ->select('product_attributes.*', 'products.product_name','attributes.attribute_name')->where('product_attributes.status', '=', '1')->get();
           return view('admin/productattribute/index',['products_attrbutes' =>$products]);
    }    
    public function add(){
        $products = Products::all();
        return view('admin/productattribute/create',['products'=>$products]);

    }
    public function create(Request $request){
        $validatedData = $request->validate([
           'product_id' =>'required',
           'attirbute_id' =>'required'
        ]);
        $user = Auth::user();
        $productattribute  = new ProductAttribute;
        $productattribute->product_id = $request->input('product_id');
        $productattribute->attribute_id = $request->input('attirbute_id');
        $productattribute->created_by = $user->id;
        $productattribute->save();
        
        return redirect('admin/productattribute')->with('info','The Product Attribute is created Successfully');
    }
    public function attribute(Request $request){
        $attrbute_name = array();
        $attrbute_id = array();
        $product_id =  $request->input('product_id');
        $product = Products::find($product_id);
        $product_type  = $product->product_type;
        $avail_attrs = Attribute::where('product_type','=',$product_type)->get();
        foreach ($avail_attrs as $key => $availattr) {
            array_push($attrbute_id,$availattr->id);
            array_push($attrbute_name,$availattr->attribute_name);
        }
        $obj = (object) array($attrbute_id,$attrbute_name);
		echo json_encode($obj);
        
        
    }
    public function edit($id){
        abort_if(!$prdattrbute = ProductAttribute::find($id), 403);
        $products = Products::where('status','=','1')->get();
        
        return view('admin/productattribute/edit',['products'=>$products,'prdattrbute'=>$prdattrbute]);

    }
    public function update($id, Request $request){
        $validatedData = $request->validate([
            'product_id' =>'required',
            'attirbute_id' =>'required'
         ]);
         $user = Auth::user();
         $productattribute  =array( 
         'product_id' => $request->input('product_id'),
         'attribute_id' => $request->input('attirbute_id'),
         'updated_by' => $user->id
         );
         ProductAttribute::where('id',$id)
         ->update($productattribute);
         return redirect('admin/productattribute')->with('info','The Product Attribute is Updateed Successfully');
     
    }
    public function delete($id){
      

        ProductAttribute::where('id',$id)
            ->delete();
        return redirect('admin/productattribute')->with('info','The Product Attribute is deleted  Successfully');
    }
}

