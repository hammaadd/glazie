<?php

namespace App\Http\Controllers;

use App\Models\Brands;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Categories;

class BrandsController extends Controller
{
    public function __construct(){
        $this->middleware('auth:admin');
    }
    public function index(){
        $brands = Brands::all();
       
        return view('admin/brands/index',['brands'=>$brands]);
    }
    public function add(){
        return view('admin/brands/create');
    }
    public function create(Request $request){
        $user = Auth::user();
        
        $validatedData = $request->validate([
            'brand_name' => 'required|alpha',
            'image' => 'mimes:jpg,png,jpeg,gif,svg|max:5048',
        ]);
        $new_brand =  new Brands;
        
            $new_brand->brand_name = $request->input('brand_name');
            $new_brand->description = $request->input('description');
            // Image code
            
            $new_brand->created_by = $user->id;
            if($request->file('image')){
                $file = $request->file('image');
                $filename = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $imgname = uniqid() . $filename;
                $destinationPath = public_path('/admin-assets/brands');
                $file->move($destinationPath, $imgname);
                $new_brand->image= $imgname;
                }
        $new_brand->save();
        
        return redirect('admin/brands')->with('info','The Brand is created Successfully');
    }
    public function edit($id){
        abort_if(! $brands= Brands::find($id),403);
       
            return view('admin/brands/edit',['brands'=>$brands]);
       
    }
    public function update($id,Request $request){
       
        $validatedData = $request->validate([
            'brand_name' => 'required|alpha',
            'image' => 'mimes:jpg,png,jpeg,gif,svg|max:5048',
        ]);
        $update_brand =  array(
            'brand_name' => $request->input('brand_name'),
            'description' => $request->input('description'),
            
            'description' => $request->input('description'),
            'updated_at' =>date("Y-m-d H:i:s"),

        );
        if ( $request->file('image')) {
            $file = $request->file('image');
                $filename = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $imgname = uniqid() . $filename;
                $destinationPath = public_path('/admin-assets/brands');
                $file->move($destinationPath, $imgname);
                $update_brand =  array(
                    'brand_name' => $request->input('brand_name'),
                    'description' => $request->input('description'),            
                    'updated_at' =>date("Y-m-d H:i:s"),
                    'image' =>$imgname
        
                );
        }
            
            
            Brands::where('id',$id)
            ->update($update_brand);
        
        return redirect('admin/brands')->with('info','The Brand is Updated Successfully');
    }
    public function delete($id){
       
            
            Brands::where('id',$id)
            ->delete();
        
        return redirect('admin/brands')->with('info','The Brand is deleted Successfully');
    }
    public function removeimage(Request $request){
        $id = $request->input('id');
        $type = $request->input('type');
        if ($type=="brand") {
            # code...
        
            $update_brand =  array(
                'image' =>null,
            );
            
            Brands::where('id',$id)
            ->update($update_brand);
            echo json_encode(1);
        }
        if ($type=="categories") {
            $update_catgories =  array(
                'image' =>null,
            );
            
            Categories::where('id',$id)
            ->update($update_catgories);
            echo json_encode(1);
        }
    }
}
