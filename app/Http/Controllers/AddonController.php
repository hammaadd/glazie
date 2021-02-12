<?php

namespace App\Http\Controllers;
use App\Models\Products;
use App\Models\Addon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AddonController extends Controller
{
    public function __construct(){
        $this->middleware('auth:admin');
    }
    public function create(){
        $prodcuts = Products::where('type','=','customize')->get();
        return view('admin/addon/create',['products'=>$prodcuts]);
    }
    public function store(Request $request){
        $validatedData = $request->validate([
            'addon_type' => 'required',
            'product_name'=> 'required',
            'addon_value' =>'required',
            'quantity' => 'required',
            'price' => 'required',
            'sale_price' =>'required',
            'image' => 'required|mimes:svg|max:5048'
        ]);

            $user = Auth::user();
            
       
        // Set the vaulues to array 

        $addon = new Addon;
        $addon->add_on_type = $request->input('addon_type');
        $addon->addon_value = $request->input('addon_value');
        $addon->product_id =  $request->input('product_name');
        $addon->quantity =  $request->input('quantity');
        $addon->price =  $request->input('price');
        $addon->sale_price = $request->input('sale_price');
        $addon->created_by = $user->id;
        // File Code
        if ($request->file('image')) {
            // Image code
        $file = $request->file('image');
        $filename = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();
        $imgname = uniqid() . $filename;
        $destinationPath = public_path('/admin-assets/addon');
        $file->move($destinationPath, $imgname);
        $addon->image= $imgname;
        }
        $addon->save();
        return redirect('admin/addon')->with('info','Add Oncreated Successfully');
    }
}
