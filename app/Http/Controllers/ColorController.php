<?php

namespace App\Http\Controllers;
use App\Models\Color;
use Illuminate\Http\Request;
use App\Models\Products;
use Illuminate\Support\Facades\Auth;
class ColorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    } 
    public function index()
    {
        $colors = Color::orderBy('id','desc')->get();
        return view('admin/colors/index',['colors'=>$colors]);
    }
    public function create()
    {
        $products = Products::where('type','=','customize')->get();
        return view('admin/colors/create',['products'=>$products]);
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            
            'name'=>'required|regex:/^[\pL\s\-]+$/u',
            'color_code'=>'required'       
        ]);
        $colors = new Color;
        
        $colors->name = $request->input('name');
        $colors->color_code = $request->input('color_code');
        $colors->created_by = Auth::id();
        $colors->save();      
        return redirect('admin/colors')->with('info','The Color is created Successfully');     
    }
    public function edit($id)
    {
        $colors = Color::find($id);
        $products = Products::where('type','=','customize')->get();
        return view('admin/colors/edit',['colors'=>$colors,'products'=>$products]);
    }
    public function update($id,Request $request)
    {
        $validatedData = $request->validate([
            'name'=>'required|regex:/^[\pL\s\-]+$/u',
            'color_code'=>'required'       
        ]);
      $updatecolor = array(
        'name' => $request->input('name'),
        'color_code' => $request->input('color_code'),
        'updated_by' => Auth::id()
      );
      Color::where('id',$id)->update($updatecolor);
        return redirect('admin/colors')->with('info','The Color is created Successfully');     
    }
    public function delete($id)
    {
        Color::where('id',$id)->delete();
        return redirect('admin/colors')->with('info','The Color is created Successfully');     
    }
}
