<?php

namespace App\Http\Controllers;
use App\Models\Products;
use App\Models\Productgallery;
use App\Models\Brands;
use App\Models\ProductCategory;
use App\Models\ProductAttribute;
use App\Models\Attribute;
use App\Models\ProductTag;
use App\Models\Term;
use App\Models\Categories;
use App\Models\ProductReviews;
use Illuminate\Support\Facades\Auth;
use App\Models\PrdVariety;
use DB;

use Illuminate\Http\Request;



class ProductsController extends Controller
{
    public function __construct()
    {
      
        $this->middleware('auth:admin');
       
    }
    public function index(){
        $products = DB::table('products')
        ->join('brands', 'brands.id', '=', 'products.brand_id')
        ->select('products.*', 'brands.brand_name')
        ->where('products.deleted_at','=',null)->orderBy('products.id','desc')->get();
        
        return view('admin/products/index',['products'=>$products]);
    }
    public function add(){
        $brands = Brands::all();
        $attributes = Attribute::all();
        $categories = Categories::all();
        $varieties = PrdVariety::all();
        return view('admin/products/create',['brands' =>$brands,'attributes'=>$attributes,'categories'=>$categories,'varieties'=>$varieties]);
    }
    public function create(Request $request){
      
        $user = Auth::user();
        $no_of_attribute = $request->input('no_of_attribute');
        //print_r($terms);
    
        $user = Auth::user();
        $validatedData = $request->validate([
           'product_name'=>'required',
           'brand_name'=>'required',
           'regular_price'=>'required',
           'sale_price'=>'required',
           'weight'=>'required',
           'quantity'=>'required',
           'verity_id'=>'required',
           'publish' =>'required'
        ]);
           
         $products = new Products;
         $products->product_name = $request->input('product_name');
         $products->brand_id = $request->input('brand_name');
         $products->regular_price = $request->input('regular_price');
         $products->sale_price = $request->input('sale_price');
         $products->weight = $request->input('weight');
         $products->quantity = $request->input('quantity');
         $products->type = $request->input('type');
         $products->verity_id = $request->input('verity_id');
         $products->short_description =$request->input('short_description');
         $products->description =$request->input('description');
         $products->publish = $request->input('publish');
         $products->crated_by = $user->id;
         $products->save();
         $product_id = $products->id;
         
        //  Image Gallery Code 
         $files = $request->file('image_gallery');
        foreach($files as $file){
            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $imgname = uniqid() . $filename;
            $year = date('Y');
            $month = date("m");
            $destinationPath = public_path('productimages/');
            $imgname =uniqid() . $filename;
            $file->move($destinationPath, $imgname);
            // save image
            $prodgallery = new Productgallery;
            $prodgallery->products_id = $product_id;
            $prodgallery->image = $imgname;
            $prodgallery->image_title = $request->input('product_name');
            $prodgallery->is_primary = "0";
           
            $prodgallery->created_by = $user->id;
            $prodgallery->save();
        }
        for($attr=1;$attr<=$no_of_attribute;$attr++)
      {
        $attri_id =  $request->input('attribute'.$attr);
        $product_attribute = new ProductAttribute;
        $product_attribute->product_id = $product_id;
        $product_attribute->attribute_id = $attri_id;
        $product_attribute->created_by = $user->id;
        $product_attribute->save();
        $attribute_id = $product_attribute->id;
        $terms = $request->input('terms'.$attr);
        if (isset($terms)) {
            foreach ($terms as $key => $term) {
            
                if(!(int)$term){
                $add_term = new Term;
                $add_term->name = $term;
                $add_term->attribute_id =$attri_id;
                $add_term->created_by = $user->id;
                $add_term->save();
                
                }
            }
        }
      }
    
        $prodcut_categories = $request->input('category_id');
        foreach ($prodcut_categories as  $prodcut_category) {
           $add_prdcat = new ProductCategory;
           $add_prdcat->product_id = $product_id;
           $add_prdcat->category_id = $prodcut_category;
           $add_prdcat->created_by = $user->id;
           $add_prdcat->save();
        }
        if ($request->input('tags')) {
            $tags = $request->input('tags');
            foreach ($tags as $key => $tag) {
                $product_tag = new ProductTag;
                $product_tag->product_id = $product_id;
                $product_tag->tag_name = $tag;
                $product_tag->created_by = $user->id;
                $product_tag->save();
            }
        }
        return redirect('admin/products')->with('info','The Product  is created Successfully');
         
    }
    public function edit($id){
       abort_if(!$products = Products::find($id),403);
       $brands = Brands::all();
       $product_cats = ProductCategory::where('product_id','=',$id)->get();
       $attributes = Attribute::all();
       $product_id = $products->id;
      $product_attrs = ProductAttribute::where('product_id','=',$id)->get();
      foreach ($product_attrs as $key => $product_attr) {
         
          
      }
      $terms = Term::where('attribute_id','=',$product_attr->attribute_id)->get();
      
       $categories = Categories::all();
       $image_gallery = $products->gallery;
       
       return view('admin/products/edit',['brands'=>$brands, 'products' =>$products,'image_gallery' =>$image_gallery,'attributes'=>$attributes,'product_cats'=>$product_cats,'categories'=>$categories,'product_attr'=>$product_attr,'terms'=>$terms]);
    }
    public function update($id,Request $request){
        $user = Auth::user();
               
        $prodcut_categories = $request->input('category_id');
        $product_cats = ProductCategory::where('product_id','=',$id)->get();
        $table_prdcats= ProductCategory::where('product_id','=',$id)
        ->whereNotIn('category_id',$prodcut_categories)
        ->get();
        foreach ($table_prdcats as $key => $table_prdcat) {
           
            ProductCategory::where('id','=',$table_prdcat->id)->delete();
        }
        
        foreach ($prodcut_categories as $product_cat) {
            ProductCategory::updateOrCreate(
                ['product_id' => $id, 'category_id' => $product_cat],
                ['product_id' => $id, 'category_id' => $product_cat,'created_by'=>$user->id]
            );
           
           
        }
        
        
        $validatedData = $request->validate([
            'product_name'=>'required',
            'brand_name'=>'required',
            'regular_price'=>'required',
            'sale_price'=>'required',
            'weight'=>'required',
            'quantity'=>'required',
            'product_type'=>'required'
     
            ]);
            $update_products = array(
                'product_name' => $request->input('product_name'),
                'brand_id' => $request->input('brand_name'),
                'regular_price' => $request->input('regular_price'),
                'sale_price' => $request->input('sale_price'),
                'weight' => $request->input('weight'),
                'quantity' => $request->input('quantity'),
                'product_type' => $request->input('product_type'),
                'short_description' =>$request->input('short_description'),
                'description' =>$request->input('description'),
                'updated_by' => $user->id
            );

        Products::where('id',$id)
        ->update($update_products);
        if ($request->file('image_gallery')) {
            # code...
        
        $files = $request->file('image_gallery');
        foreach($files as $file){
            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $imgname = uniqid() . $filename;
            $year = date('Y');
            $month = date("m");
            $destinationPath = public_path('productimages/');
            $imgname =uniqid() . $filename;
            $file->move($destinationPath, $imgname);
            // save image
            $prodgallery = new Productgallery;
            $prodgallery->products_id = $id;
            $prodgallery->image = $imgname;
            $prodgallery->image_title = $request->input('product_name');
            $prodgallery->is_primary = "0";
            
            $prodgallery->created_by = $user->id;
            $prodgallery->save();
        }
    }
    $product_attribute = array(
        'product_id' => $id,
        'attribute_id' => $request->input('attribute'),
        'updated_by' => $user->id,
    );
    ProductAttribute::where('id',$request->input('product_attr_id'))
        ->update($product_attribute);


        $attribute_id = $request->input('attribute');
        if ($request->input('terms')) {
            $terms = $request->input('terms');
        //print_r($terms);
        
        foreach ($terms as $key => $term) {
            
            if(!(int)$term){
            $add_term = new Term;
            $add_term->name = $term;
            $add_term->attribute_id = $request->input('attribute');
            $add_term->created_by = $user->id;
            $add_term->save();
            
            }
        }
        }
               
        $prodcut_categories = $request->input('category_id');
        $product_cats = ProductCategory::where('product_id','=',$id)->get();
        $table_prdcats= ProductCategory::where('product_id','=',$id)
        ->whereNotIn('category_id',$prodcut_categories)
        ->get();
        foreach ($table_prdcats as $key => $table_prdcat) {
            
            ProductCategory::where('id','=',$table_prdcat->id)->delete();
        }
        
        foreach ($prodcut_categories as $product_cat) {
            ProductCategory::updateOrCreate(
                ['product_id' => $id, 'category_id' => $product_cat],
                ['product_id' => $id, 'category_id' => $product_cat,'created_by'=>$user->id]
            );
           
           
        }
        
         return redirect('admin/products')->with('info','The Product is updated  Successfully');
    }
    public function delete($id){

        Products::where('id',$id)->delete();
        return redirect('admin/products')->with('info','The Product is deleted  Successfully');
    }
    public function view($id){
        abort_if(!$products = Products::find($id), 403);
        return view('admin/products/view',['products'=>$products]);
    }
    public function makeprimary(Request $request){
        $id = $request->input('id');
        $products_id = $request->input('prodcut_id');
        $products = Productgallery::where('products_id' ,'=',$products_id)->where('status' ,'=',"1")->where('is_primary' ,'=',"1")->get();
        foreach($products as $product){
            $remove_primary = array(
                'is_primary' => "0"
            );
            Productgallery::where('id',$product->id)
         ->update($remove_primary);
        }
        
        $product_primary = array(
            "is_primary" =>"1"
        );
        $result = Productgallery::where('id',$id)
        ->update($product_primary);
        echo json_encode($result);
    }
    public function remove(Request $request){
        $id = $request->input('id');
        $product_primary = array(
            "status" =>"0"
        );
        $result = Productgallery::where('id',$id)
        ->update($product_primary);
        echo json_encode($result);
    }
    // public function addon(){
       
    //     return view('admin/products/addon');
    
    // }
    // public function orderlist(){
    //     return view('admin/products/list');
    // } 
    // public function installer(){
    //     return view('admin/products/installer');
    // } 
    // public function productslist()
    // {
    //     return view('admin/products/products_list');
    // }
    // public function productdetail()
    // {
    //     return view('admin/products/productdetail');
    // }
    // public function requesthiring()
    // {
    //     return view('admin/products/requesthiring');
    // }
  
    // public function orderdetails(){
    //     return view('admin/products/order_details');
    // }
    // public function orderconfirm(){
    //     return view('admin/products/orderconfirm');
    // }
    // public function hiredetails(){
    //     return view('admin/products/hiredetails');
    // }
    // public function editinstaller()
    // {
    //     return view('admin/products/editinstaller');
    // }
    // public function customer(){
    //     return view('admin/products/customer');
    // } 
    // public function addcustomer(){
    //     return view('admin/products/addcustomer');
    // }
    // public function editcustomer(){
    //     return view('admin/products/editcustomer');
    // }
    // public function editproduct(){
    //     return view('admin/products/editproduct');
    // }
    public function deletefeedback($feedback_id)
    {
        
        $product_primary = array(
            "status" =>"0"
        );
        $result = ProductReviews::where('id',$feedback_id)
        ->update($product_primary);
        $feedback = ProductReviews::find($feedback_id);
        
        $id = $feedback->products_id;
        
        
        return redirect('admin/products/view/'.$id)->with('info','The Feedback is deleted  Successfully');
        
    }
    public function get_attribute()
    {
        $attributes = Attribute::all();
        return view('admin/products/attribut',['attributes'=>$attributes]);
    }
    public function filter(Request $request)
    {
        $status = $request->input('status');
        if($status=='instock'){
            $products = Products::where('quantity','>','0')->get();
            
        }
        else if($status=='stockout'){
            $products = Products::where('quantity','=','0')->get();
           
        }
        else{
            $products = Products::all();
        }
        return view('admin/products/filterproduct',['products'=>$products]);
    }
}
