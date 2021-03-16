<?php

namespace App\Http\Controllers;
use App\Models\AddOn;
use Illuminate\Http\Request;
use App\Models\AddonColor;

class DoorBuilderController extends Controller
{
    public function index()
    {
        $addons = AddOn::all();
        return view('public/doorbuild',['addons'=>$addons]);
    }
    public function get_colors(Request $request)
    {
        $id = $request->input('id');
        $addon = AddOn::find($id);
        $addoncolors = AddonColor::where('addon_id','=',$id)->where('side','=','external')->get();
        return view('public/addoncolors',['colors'=>$addoncolors,'addon'=>$addon]);
    }
   
    
}
