<?php

namespace App\Http\Controllers;
use App\Models\Attribute;
use Illuminate\Http\Request;
use App\Models\ProductAttribute;
use Illuminate\Support\Facades\Auth;
use App\Models\Term;
use App\Models\ProductTerm;
use DB;
class AttributeController extends Controller
{
    public function __construct()
    {
      
        $this->middleware('auth:admin');
       
    }
    public function index(){
        $attributes = Attribute::all();
     
        return view('admin/attribute/index',['attributes' =>$attributes]);
    }
    public function add(){
        return view('admin/attribute/create');
    }
    public function create(Request $request){
        $validatedData = $request->validate([
            'attribute_name' => 'required',
            
            'image' => 'mimes:jpg,png,jpeg,gif,svg|max:5048',
        ]);
        $attribute =  new Attribute;
        
            $attribute->attribute_name = $request->input('attribute_name');
            $attribute->description = $request->input('description');
            // Image code
            $user = Auth::user();
            $attribute->crated_by = $user->id;
            if($request->file('image')){
                $file = $request->file('image');
                $filename = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                
                $destinationPath = public_path('/attributes');
                $imgname = "attributes/".uniqid() . $filename;
                $file->move($destinationPath, $imgname);
                $attribute->image= $imgname;
                }
        $attribute->save();
        
        return redirect('admin/attributes')->with('info','The Attribute is created Successfully');
    }
    public function edit($id){
        abort_if(!$attribute =Attribute::find($id),403);
        
            return view('admin/attribute/edit',['attribute' =>$attribute]);
        
    }
    public function update($id,Request $request){
        $user = Auth::user();
        
        $validatedData = $request->validate([
            'attribute_name' => 'required',
            
            'image' => 'mimes:jpg,png,jpeg,gif,svg|max:5048',
        ]);
        $update_attribute = array(
            'attribute_name' => $request->input('attribute_name'),
           
            'description' => $request->input('description'),
            'updated_by' => $user->id
        );
        if($request->file('image')){
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            
            $destinationPath = public_path('/attributes');
            $imgname = "attributes/".uniqid() . $filename;
            $file->move($destinationPath, $imgname);
            $update_attribute = array(
                'attribute_name' => $request->input('attribute_name'),
                
                'description' => $request->input('description'),
                'updated_by' => $user->id,
                'image' =>$imgname
            );
            
        }
        Attribute::where('id',$id)
            ->update($update_attribute);
        
        return redirect('admin/attributes')->with('info','The Attribute is Updated Successfully');

    }
    public function delete($id){
      

        Attribute::where('id',$id)
            ->delete();
        return redirect('admin/attributes')->with('info','The Attributes is deleted  Successfully');
    }
    public function createattr(Request $request){
        $attrbute_id = array();
        $attrbute_name = array();
        $attribute =  new Attribute;
        $user = Auth::user();
        $attribute->attribute_name = $request->input('new_attr');
        $attribute->crated_by = $user->id;
        $attribute->save();
       
        // Image code
        
            
        
        $attributes = Attribute::where('status','=','1')->get();
        foreach ($attributes as $key => $availattr) {
            array_push($attrbute_id,$availattr->id);
            array_push($attrbute_name,$availattr->attribute_name);
        }
        $obj = (object) array($attrbute_id,$attrbute_name);
		echo json_encode($obj);
    }
    public function get_terms(Request $request){
        $term_name = array();
        $term_id = array();
        $attribute_id = $request->input('attr');
    
    $terms = Term::where('attribute_id','=',$attribute_id)->get();
  
    foreach ($terms as $key => $term) {
        array_push($term_id,$term->id);
        array_push($term_name,$term->name);
    }
    $obj = (object) array($term_id,$term_name);
    echo json_encode($obj);
    
    }
    public function removeproductattribute($id)
    {
        $products= ProductAttribute::find($id);
        $product_id = $products->product_id;
        $attribute_id = $products->attribute_id;
        $product_terms = ProductTerm::where('product_id','=',$product_id)->where('attribute_id','=',$attribute_id)->get();
        foreach($product_terms as $product_term){
            ProductTerm::where('id',$product_term->id)->delete();
        }
        
        ProductAttribute::where('id',$id)->delete();
        return redirect('admin/products/view/'.$product_id)->with('info','Attribute delete Successfully');
    }
    public function addattr($id)
    {
       
        $product_cats = Attribute::all();
       

        return view('admin/products/addattrbute',['attributes'=>$product_cats,'id'=>$id]);

    }
    public function createprdattr($id,Request $request)
    {
        $validatedData = $request->validate([
            'attribute_id' => 'required',
            'terms' =>'required',
            
        ]);
        $attrbute_id = $request->input('attribute_id');
        $terms = $request->input('terms');
        
            
            $product_attribute = new ProductAttribute;
            $product_attribute->product_id = $id;
            $product_attribute->attribute_id = $attrbute_id;
            $product_attribute->created_by = Auth::id();
            $product_attribute->save();
            $attribute_id = $product_attribute->id;
            $terms = $request->input('terms');
            
            if (isset($terms)) {
                foreach ($terms as $key => $term) {
                
                    if(!(int)$term){
                    $add_term = new Term;
                    $add_term->name = $term;
                    $add_term->attribute_id =$attrbute_id;
                    $add_term->created_by = Auth::id();
                    $add_term->save();
  
                    $prd_terms = new ProductTerm;
                    $prd_terms->product_id = $id;
                    $prd_terms->attribute_id = $attrbute_id;
                    $prd_terms->term_id = $add_term->id;
                    
                    $prd_terms->save();
                    }
                   else{
                      $prd_terms = new ProductTerm;
                      $prd_terms->product_id = $id;
                      $prd_terms->attribute_id = $attrbute_id;
                      $prd_terms->term_id = $term;
                      
                      $prd_terms->save();
  
                   }
                    
                }
            }
        return redirect('admin/products/view/'.$id)->with('info','Attribute created Successfully');
    }
    public function checkattr(Request $request)
    {
        $id = $request->input('id');
        $attr = $request->input('attr');
    

        $data = ProductAttribute::where('attribute_id','=',$attr)->where('product_id','=',$id)->get();
      echo count($data);
    }
    public function editattr($id){
        $prd_attr = ProductAttribute::find($id);
     
        $product = $prd_attr->product_id;
        
        $attr_id = $prd_attr->attribute_id;
        $avalilterms = Term::where('attribute_id','=',$attr_id)->get();
        $terms = ProductTerm::where('product_id','=',$product)->where('attribute_id','=',$attr_id)->get();
        return view('admin/products/editterm',['terms'=>$terms,'attr_id'=>$attr_id,'id'=>$id,'avalilterms'=>$avalilterms,'product_id'=>$product]);
    }
    public function updateattr(Request $request)
    {
        //Attribute id
        $attr_id =  $request->input('attr_id');

        //
        $product_attribute =  $request->input('product_attribute');
        $terms = $request->input('terms');
        
        $productattrs = ProductAttribute::find($product_attribute);
        $product_id  = $productattrs->product_id;
        $table_prdcats= ProductTerm::where('product_id','=',$product_id)->where('attribute_id','=',$attr_id)
        ->whereNotIn('term_id',[$terms])->get();
        echo "<pre>";
       foreach($table_prdcats as $tableterm)
       {
        ProductTerm::where('id',$tableterm->id)->delete();
       }
       foreach($terms as $term)
       {
        if((int)$term){
            ProductTerm::updateOrCreate(
                ['product_id' => $product_id, 'attribute_id' => $attr_id, 'term_id' => $term],
                ['product_id' => $product_id, 'attribute_id' => $attr_id, 'term_id' => $term,'created_by'=>Auth::id()],
            );
        }
        else{
            $add_term = new Term;
            $add_term->name = $term;
            $add_term->attribute_id =$attr_id;
            $add_term->created_by = Auth::id();
            $add_term->save();

            $prd_terms = new ProductTerm;
            $prd_terms->product_id = $product_id;
            $prd_terms->attribute_id = $attr_id;
            $prd_terms->term_id = $add_term->id;
            
            $prd_terms->save();
            }
        }
        return redirect('admin/products/view/'.$product_id)->with('info','Product Terms updated Successfully');
       }
       public function get_prd_terms(Request $request)
       {
          
           $term_name = array();
           $term_id = array();
           $attrbute_id = $request->input('attr');
           $product_id = $request->input('product_id');
           $terms = DB::table('terms')
           ->join('product_terms', 'terms.id', '=', 'product_terms.term_id')
           ->select('terms.*', 'product_terms.term_id')
           ->where('product_terms.attribute_id','=',$attrbute_id)
        ->where('product_terms.product_id','=',$product_id)
        ->where('product_terms.deleted_at','=',null)->get();
           
            
            foreach ($terms as $key => $term) {
                array_push($term_id,$term->id);
                array_push($term_name,$term->name);
            }
            $obj = (object) array($term_id,$term_name);
            echo json_encode($obj);
       
       }
} 

