<?php

namespace App\Http\Controllers;
use App\Models\AddOn;
use Illuminate\Http\Request;
use App\Models\AddonColor;
use App\Models\ModelFrame;

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
        return view('public/customizer/addoncolors',['colors'=>$addoncolors,'addon'=>$addon]);
    }
    public function get_internalcolors(Request $request)
    {
    $id = $request->input('id');
    $addon = AddOn::find($id);
    $addoncolors = AddonColor::where('addon_id','=',$id)->where('side','=','internal')->get();
    //print_r($addoncolors);
    return view('public/customizer/internalcolors',['colors'=>$addoncolors,'addon'=>$addon]);
    }
    public function get_glasses(Request $request)
    {
        $id = $request->input('id');
        $addon = AddOn::find($id);
        $glasses = ModelFrame::where('addon_id','=',$id)->where('type','=','glass')->get();
        
        return view('public/customizer/glasses',['glasses'=>$glasses]);
    }
    public function get_frames(Request $request)
    {
        $id = $request->input('id');
        $addon = AddOn::find($id);
        $frames = ModelFrame::where('addon_id','=',$id)->where('type','=','frame')->get();
        return view('public/customizer/frames',['frames'=>$frames]);
    }
}