<?php

namespace App\Http\Controllers;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index()
    {
        $blogs = Blog::all();
        return view('admin/blogs/index',['blogs'=>$blogs]);
    } 
    public function create()
    {
        return view('admin/blogs/create');
    } 
    public function store(Request $request)
    {
        
            $validatedData = $request->validate([
                'title' => 'required',
                'publish'=>'required',
                'slug' => 'required',
                'image' => 'mimes:jpg,png,jpeg,gif,svg|max:5048'
            ]);
            $blog =  new Blog;
            $blog->title = $request->input('title');
            $blog->publish =$request->input('publish');
            $blog->description = $request->input('description');
            $blog->slug = $request->input('slug');
            // Image code
            $user = Auth::user();
            $blog->created_by = $user->id;
            if($request->file('image')){
                $file = $request->file('image');
                $filename = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                
                $destinationPath = public_path('admin-assets/blogs');
                $imgname = uniqid() . $filename;
                $file->move($destinationPath, $imgname);
                $blog->image = $imgname;
                }
            $blog->save();
            return redirect('admin/blogs')->with('info','Blog Post created successfully');
    } 
    public function view($id)
    {
        $blog = Blog::find($id);
        return view('admin/blogs/view',['blog'=>$blog]);
    } 
    public function edit($id)
    {
        $blog = Blog::find($id);
        return view('admin/blogs/edit',['blog'=>$blog]);
    } 
    public function update($id,Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'publish'=>'required',
            'slug' => 'required',
            'image' => 'mimes:jpg,png,jpeg,gif,svg|max:5048',
        ]);
        $update_blog = array(
        'title' => $request->input('title'),
        'publish' =>$request->input('publish'),
        'slug' =>$request->input('slug'),
        'description' => $request->input('description'),
        'updated_by' => Auth::id(),
        );
        Blog::where('id',$id)->update($update_blog);
        if($request->file('image')){
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            
            $destinationPath = public_path('admin-assets/blogs');
            $imgname = uniqid() . $filename;
            $file->move($destinationPath, $imgname);
            $blogpic = array(
                'image' => $imgname,
                );
                Blog::where('id',$id)->update($blogpic);
            }
      
        return redirect('admin/blogs')->with('info','Blog Post update successfully');
    } 
    public function delete($id)
    {
        Blog::where('id',$id)->delete();
        return redirect('admin/blogs')->with('info','Blog Post deleted successfully');
    } 
    public function removeimage(Request $request)
    {
        $id = $request->input('id');
        {
            $blogpic = array(
                'image' => null,
                );
                Blog::where('id',$id)->update($blogpic);
        }
        echo json_encode(1);
    }
    
}
