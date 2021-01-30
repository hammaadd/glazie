<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Categories;

class CategoriesController extends Controller
{
    public function __construct()
    {
      
        $this->middleware('auth:admin');
        $user = Auth::user();
    }
    public function index(){
        $categories = Categories::where('status','=','1')->get();

        return view('admin/catgories/index',['categories'=>$categories]);
    }
    public function add(){
        $categories = Categories::where('parent_id','=',null)->where('status','=','1')->get();
        return view('admin/catgories/create',['categories'=>$categories]);
    }
    public function create(Request $request){
        $user = Auth::user();
        $validatedData = $request->validate([
            'category_name' => 'required',
            'image' => 'mimes:jpg,png,jpeg,gif,svg|max:5048',
        ]);
        $new_cat =  new Categories;
        
            $new_cat->parent_id = $request->input('parent_id');
            $new_cat->cat_name = $request->input('category_name');
            $new_cat->description = $request->input('description');
            $new_cat->created_by = $user->id;
            if ($request->file('image')) {
                // Image code
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $imgname = uniqid() . $filename;
            $destinationPath = public_path('/admin-assets/categories');
            $file->move($destinationPath, $imgname);
            $new_cat->image= $imgname;
            }
            
            $new_cat->save();
        
        return redirect('admin/categories')->with('info','The Category is created Successfully');
    }
    public function edit($id){
        $categories= Categories::find($id);
        $select_cat = Categories::where('parent_id','=',null)->where('status','=','1')->get();
  		return view('admin/catgories/edit',['categories'=>$categories,'select_cat'=>$select_cat]);    
    }
    public function update($id,Request $request){
        $user = Auth::user();
        $validatedData = $request->validate([
            'category_name' => 'required',
            'image' => 'mimes:jpg,png,jpeg,gif,svg|max:5048',
        ]);
        $update_cat =  array(
        
            'parent_id' => $request->input('parent_id'),
            'cat_name' => $request->input('category_name'),
            'description' => $request->input('description'),
            'updated_by' => $user->id
        );
        Categories::where('id',$id)->update($update_cat);
        
        if($request->file('image')){
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $imgname = uniqid() . $filename;
            $destinationPath = public_path('/admin-assets/categories');
            $file->move($destinationPath, $imgname);
            $update_image =  array(
              
                'image' => $imgname
                
            );
            Categories::where('id',$id)->update($update_image);
        }
            
           
        
        
        return redirect('admin/categories')->with('info','The Category is Updated Successfully');
    }
    public function delete($id){
        $delete_cat =  array(
        
            'status'=>'0'
        );
            Categories::where('id',$id)->update($delete_cat);
        
        
        return redirect('admin/categories')->with('info','The Category is Deleted Successfully');
    }
    public function details($id){
        $sub_cat = Categories::where('parent_id','=',$id)->where('status','=','1')->get();
        $parent = Categories::where('id','=',$id)->where('status','=','1')->get();
        
        return view('admin/catgories/details',['categories'=>$sub_cat,'parent'=>$parent]);
    }
}