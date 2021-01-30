<?php

namespace App\Http\Controllers;
use App\Models\ContentManagementSystem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class CMSController extends Controller
{
    public function __construct(){
        $this->middleware('auth:admin');
    }
    public function index(){
        $contents = ContentManagementSystem::where('status','=','1')->get();
        return view('admin/cms/index',['contents' =>$contents ]);
    }
    public function add(){
        return view('admin/cms/add');
    }
    public function create(Request $request){
        $user_id = Auth::id();
        $validatedData = $request->validate([
            'title' => 'required',
            'image' => 'mimes:jpg,png,jpeg,gif,svg|max:5048',
            'meta_description'=>'required',
            'meta_title' =>'required',
            'publish'=>'required',
            
        ]);
        $cms = new ContentManagementSystem;
        $cms->title = $request->input('title');
        $cms->publish = $request->input('publish');
        $cms->met_description = $request->input('meta_description');
        $cms->description = $request->input('description');
        $cms->meta_title = $request->input('meta_title');
        $cms->created_by = $user_id;
        if ($request->file('image')) {
            // Image code
        $file = $request->file('image');
        $filename = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();
        $imgname = uniqid() . $filename;
        $destinationPath = public_path('/admin-assets/cms');
        $file->move($destinationPath, $imgname);
        $cms->image= $imgname;
        }
        $cms->save();
        return redirect('admin/cms')->with('info','The Page  is created Successfully');
    }
    public function edit($id)
    {
        $cms = ContentManagementSystem::find($id);
        return view('admin/cms/edit',['cms'=>$cms]);
    }
    public function update($id,Request $request){
        $user_id = Auth::id();
        $validatedData = $request->validate([
            'title' => 'required',
            'image' => 'mimes:jpg,png,jpeg,gif,svg|max:5048',
            'meta_description'=>'required',
            'meta_title' =>'required',
            'publish'=>'required',
            
        ]);
        $updatecms = array(
        'title' => $request->input('title'),
        'publish' => $request->input('publish'),
        'met_description' => $request->input('meta_description'),
        'description' => $request->input('description'),
        'meta_title' => $request->input('meta_title'),
        'updated_by' => $user_id
        );
        ContentManagementSystem::where('id',$id)->update($updatecms);
        if ($request->file('image')) {
            // Image code
        $file = $request->file('image');
        $filename = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();
        $imgname = uniqid() . $filename;
        $destinationPath = public_path('/admin-assets/cms');
        $file->move($destinationPath, $imgname);
        $image = array(
            'image'=>$imgname
        );
        ContentManagementSystem::where('id',$id)->update($image);
        }
    
        return redirect('admin/cms')->with('info','The Page is Updated Successfully');
    }
    public function view($id)
    {
        $cms = ContentManagementSystem::find($id);
        return view('admin/cms/view',['cms'=>$cms]);
    }
}
 