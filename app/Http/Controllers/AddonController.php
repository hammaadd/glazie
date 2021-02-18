<?php

namespace App\Http\Controllers;
use App\Models\Products;
use App\Models\AddOn;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\AddonColor;
use Illuminate\Support\Facades\Redirect;

class AddonController extends Controller
{
    public function __construct(){
        $this->middleware('auth:admin');
    }
    public function index()
    {
        $addons = AddOn::all();
        return view('admin/addon/index',['addons'=>$addons]);
    } 
    public function create(){
        $prodcuts = Products::where('type','=','customize')->get();
      
        return view('admin/addon/create',['products'=>$prodcuts]);
    }
    public function store(Request $request){
        $validatedData = $request->validate([
            'product_id' =>'required',
            'svgimage' => 'required|mimes:svg|max:5048'
        ]);

        $product_id = $request->input('product_id');
        $model_name = $request->input('model_name');
        $name = $request->input('name');
        $color_code = $request->input('color_code');
        $price = $request->input('price');
        $quantity = $request->input('quantity');
        $addon = new AddOn;
        $addon->product_id = $product_id;
        $addon->model_name = $model_name;
        $file = $request->file('svgimage');
        $filename = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();
        $imgname = uniqid() . $filename;
        $destinationPath = public_path('/admin-assets/addon');
        $file->move($destinationPath, $imgname);
        $addon->svgimage= $imgname;
        $addon->save();
        $addon_id = $addon->id;
         
            for($i=0;$i<count($color_code); $i++){
            $addoncolor = new AddonColor;
            $addoncolor->addon_id = $addon_id;
            $addoncolor->name = $name[$i];
            $addoncolor->color_code = $color_code[$i];
            $addoncolor->quantity = $quantity[$i];
            $addoncolor->price = $price[$i];
            $addoncolor->save();
            } 
        return redirect('admin/addon')->with('info','Add Oncreated Successfully');
            
    }
    public function view($id)
    {
        $addon = AddOn::find($id);
        return view('admin/addon/view',['addon'=>$addon]);
    }
}
