<?php

namespace App\Http\Controllers;
use App\Models\Attribute;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\Term;

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
}
