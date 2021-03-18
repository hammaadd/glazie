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
use App\Models\ProductTerm;
use App\Models\Categories;
use App\Models\ProductReviews;
use Illuminate\Support\Facades\Auth;
use App\Models\PrdVariety;
use DB;
use App\Models\Variation;
use App\Models\VariationDetails;

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
        $brands = Brands::all();
        return view('admin/products/index',['products'=>$products,'brands'=>$brands]);
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
           'publish' =>'required',
           'height'=>'required',
           'width'=>'required',
           'length'=>'required'
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
         $products->length =$request->input('length');
         $products->height =$request->input('height');
         $products->width = $request->input('width');
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

                  $prd_terms = new ProductTerm;
                  $prd_terms->product_id = $product_id;
                  $prd_terms->attribute_id = $attri_id;
                  $prd_terms->term_id = $add_term->id;
                  
                  $prd_terms->save();
                  }
                 else{
                    $prd_terms = new ProductTerm;
                    $prd_terms->product_id = $product_id;
                    $prd_terms->attribute_id = $attri_id;
                    $prd_terms->term_id = $term;
                    
                    $prd_terms->save();

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
       $varieties = PrdVariety::all();
      $product_cats = ProductCategory::where('product_id','=',$id)->get();
    //    $attributes = Attribute::all();
    //    $product_id = $products->id;
    //   $product_attrs = ProductAttribute::where('product_id','=',$id)->get();
      $product_tag  = ProductTag::where('product_id','=',$id)->get();
       $categories = Categories::all();
    //    
    //    if (count($product_attrs)>0) {
        
    //     foreach ($product_attrs as $product_attr) {}
    //     $terms = Term::where('attribute_id','=',$product_attr->attribute_id)->get();
    //     return view('admin/products/edit',['brands'=>$brands, 'products' =>$products,'image_gallery' =>$image_gallery,'attributes'=>$attributes,'product_cats'=>$product_cats,'categories'=>$categories,'product_attr'=>$product_attr,'terms'=>$terms ,'varieties'=>$varieties]);
    //    }
       return view('admin/products/edit',['brands'=>$brands, 'products' =>$products,'categories'=>$categories,'varieties'=>$varieties,'product_cats'=>$product_cats,'product_tag'=>$product_tag]);
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
          
            'height'=>'required',
           'width'=>'required',
           'length'=>'required'
     
            ]);
            $update_products = array(
                'product_name' => $request->input('product_name'),
                'brand_id' => $request->input('brand_name'),
                'regular_price' => $request->input('regular_price'),
                'sale_price' => $request->input('sale_price'),
                'weight' => $request->input('weight'),
                'quantity' => $request->input('quantity'),
    
                'short_description' =>$request->input('short_description'),
                'description' =>$request->input('description'),
                'length' =>$request->input('length'),
                'height' =>$request->input('height'),
                'width' => $request->input('width'),
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
 
    // ProductAttribute::where('id',$request->input('product_attr_id'))
    //     ->update($product_attribute);


    //     $attribute_id = $request->input('attribute');
    //     if ($request->input('terms')) {
    //         $terms = $request->input('terms');
    //     //print_r($terms);
        
    //     foreach ($terms as $key => $term) {
            
    //         if(!(int)$term){
    //         $add_term = new Term;
    //         $add_term->name = $term;
    //         $add_term->attribute_id = $request->input('attribute');
    //         $add_term->created_by = $user->id;
    //         $add_term->save();
            
    //         }
    //     }
    //     }
               
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
        
        
        $prdtags = $request->input('prdtags');
        $product_tags = ProductTag::where('product_id','=',$id)->get();
        $tableprdtags= ProductTag::where('product_id','=',$id)
        ->whereNotIn('id',$prdtags)
        ->get();
        foreach ($tableprdtags as $key => $prdtag) {
            
            ProductTag::where('id','=',$prdtag->id)->delete();
        }
        foreach ($prdtags as $prodtag) {
            if(!(int)$prodtag){
                $add_term = new ProductTag;
                $add_term->product_id = $id;
                $add_term->tag_name = $prodtag;
                $add_term->created_by = $user->id;
                $add_term->save();
                
                }
        }

        
           
           
        
        
         return redirect('admin/products')->with('info','The Product is updated  Successfully');
    }
    public function delete($id){

        Products::where('id',$id)->delete();
        return redirect('admin/products')->with('info','The Product is deleted  Successfully');
    }
    public function view($id){
        abort_if(!$products = Products::find($id), 403);
        $countattribute  =count(Attribute::all());
      
        return view('admin/products/view',['products'=>$products,'number'=>$countattribute]);
    }
    public function makeprimary(Request $request){
        $id = $request->input('id');
        $products_id = $request->input('prodcut_id');
        $products = Productgallery::where('products_id' ,'=',$products_id)->where('is_primary' ,'=',"1")->get();
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
        $product_id = $request->input('product_id');
      
      
        $images = Productgallery::where('products_id','=',$product_id)->count();

       
        if ($images>1) {
            $result = Productgallery::where('id',$id)
            ->delete();
            echo '1';
        }
        echo '0';
        
        
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
        $brand = $request->input('brand');
        if($brand){
            if($status=='instock'){
                $products = Products::where('quantity','>','0')->where('brand_id',$brand)->get();
                
            }
            else if($status=='stockout'){
                $products = Products::where('quantity','=','0')->where('brand_id',$brand)->get();
               
            }
            else{
                $products = Products::where('brand_id',$brand)->get();
            }
        }
        else{
            if($status=='instock'){
                $products = Products::where('quantity','>','0')->get();
                
            }
            else if($status=='stockout'){
                $products = Products::where('quantity','=','0')->get();
               
            }
            else{
                $products = Products::all();
            }
        }
        
        return view('admin/products/filterproduct',['products'=>$products]);
    }
  
    public function addprdvariation($id)
    {
       
        $dataarray =array();
        $attrbute_array = array();
        $prodcutattribute = ProductAttribute::where('product_id','=',$id)->get();
        foreach ($prodcutattribute as $key => $prdattr) {
            $attribute_id = $prdattr->attribute;
            //print_r($prdattr->attribute->id);

           array_push($attrbute_array,$attribute_id->attribute_name);
            $result = ProductTerm::where('product_id','=',$id)->where('attribute_id','=',$attribute_id->id)->get();
           

            array_push($dataarray,$result);
            }
         $count = count($prodcutattribute);
           
           return view('admin/productsize/addprdvariat',['dataarray'=>$dataarray,'id'=>$id,'count'=>$count,'attrbute_array'=>$attrbute_array,'id'=>$id]);

     }
     public function createvariation($id,Request $request)
     {
        $validatedData = $request->validate([
            'price'=>'required',
            'terms'=>'required',
            
         ]);
         $terms = $request->input('terms');
         $price =$request->input('price');
        $variation  = new Variation;
        $variation->product_id = $id;
        $variation->price = $price;
        $variation->created_by = Auth::id();
        $variation->save();
        $variation_id =$variation->id;

        foreach ($terms as $key => $term) {
           $vairation_details = new VariationDetails; 
           $vairation_details->variation_id = $variation_id;
           $vairation_details->prd_term_id = $term;
           $vairation_details->created_by = Auth::id();
           $vairation_details->save();

        }
        return redirect('admin/products/view/'.$id)->with('info','Variantion Created Successfully');
     }
     public function deletevariation($id)
     {
         $product_id = Variation::find($id)->product_id;
        Variation::where('id',$id)->delete();
         
        return redirect('admin/products/view/'.$product_id)->with('info','Variation Deleted Successfully');
     }
     public function checkvariation(Request $request)
     {
            $id=0;
            $exist = array();
            $newarray = array();
            $result = array();
            $abc = array();
           $variation = $request->input('variation');  
           $product_id = $request->input('product_id');
           $attribute_length  =$request->input('attribute_length');
           $term_id_array = $request->input('term_id_array');
           $variations = Variation::where('product_id','=',$product_id)->get();
           // echo count($variations);
           if(count($variations)>0)
           {
               foreach($variations as $variation)
               {
                $newarray = array();
                  foreach($variation->variationdetails as $variationdetails){
                    array_push($newarray,$variationdetails->prd_term_id);
                  }     
                  $result=array_diff($term_id_array,$newarray); 
                  if(!$result){
                    $id=1;
                  }    
                  
                    
               }
               if($id==1)
               {
                  echo 0;
               }
               else{
                   echo 1;
               }
               
           }
           else{
            echo 1;
           }
        }
}
