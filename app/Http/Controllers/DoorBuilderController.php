<?php

namespace App\Http\Controllers;
use App\Models\AddOn;
use Illuminate\Http\Request;
use App\Models\AddonColor;
use App\Models\ModelFrame;
use App\Models\AddonHinge;
use App\Models\FrameDetails;
use App\Models\FrameGlass;
use App\Models\AddonFurniture;

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
    public function get_hinge(Request $request)
    {
        $id = $request->input('id');
        $addon = AddOn::find($id);
        $hinges = AddonHinge::where('addon_id','=',$id)->orderBy('hingeside','asc')->get();
        //echo $hinges;
        return view('public/customizer/hinge',['hinges'=>$hinges]);
    }
    public function frame_external_color(Request $request)
    {
        $frame_id = $request->input('frame_id');
        $externalcolors = FrameDetails::where('side','=','external')->where('frame_id','=',$frame_id)->get();
        return view("public/customizer/frameexcolor",['externalcolors'=>$externalcolors]);
    }
    public function frame_internal_colors(Request $request)
    {
        $frame_id = $request->input('frame_id');
        $internalcolors = FrameDetails::where('side','=','internal')->where('frame_id','=',$frame_id)->get();
        return view("public/customizer/frameinternalcolor",['internalcolors'=>$internalcolors]);
    }
    public function frameglass(Request $request)
    {
        $frame_id = $request->input('frame_id');
        $frameglass = FrameGlass::where('frame_id','=',$frame_id)->get();
        return view("public/customizer/frameglass",['frameglass'=>$frameglass]);
    }
    public function get_handles(Request $request)
    {
        $id = $request->input('id');
     
        $handels = AddonFurniture::where('addon_id','=',$id)->where('type','=','handle')->get();
        

        return view('public/customizer/handles',['handles'=>$handels]);
    }
    public function get_knocker(Request $request)
    {
        $id = $request->input('id');
     
        $knockers = AddonFurniture::where('addon_id','=',$id)->where('type','=','knocker')->get();
        
        
        return view('public/customizer/knocker',['knockers'=>$knockers]);
    }
    public function get_letterbox(Request $request)
    {
        $id = $request->input('id');
     
        $letterboxs = AddonFurniture::where('addon_id','=',$id)->where('type','=','letterbox')->get();
        //echo $letterboxs;
        
        return view('public/customizer/letterbox',['letterboxs'=>$letterboxs]);
    }
}