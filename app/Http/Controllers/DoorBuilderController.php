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
use App\Models\Cart;
use App\Models\CartDetails;
use App\Models\AddonSize;

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
        $door_glass = $request->input('door_glass');
        $doors_glass = ModelFrame::find($door_glass);
        $addoncolors = AddonColor::where('addon_id','=',$id)->where('side','=','external')->get();
        return view('public/customizer/addoncolors',['colors'=>$addoncolors,'doors_glass'=>$doors_glass]);
    }
    public function get_sizes(Request $request)
    {
        $id = $request->input('id');
        $addon = AddOn::find($id);
        $sizes = AddonSize::where('addon_id','=',$id)->where('add_by','=','admin')->where('quantity','>',0)->get();
     
        
        return view('public/customizer/size',['sizes'=>$sizes,'addon'=>$addon]);
    }
    public function customsize(Request $request)
    {
        $addon_size = new AddonSize;
        $addon_size->door_height = $request->input('door_height');
        $addon_size->door_width = $request->input('door_width');
        $addon_size->addon_id = $request->input('addon_id');
        $addon_size->price = $request->input('square_price')* $request->input('door_height')*$request->input('door_width');
        $addon_size->add_by = 'customer';
        $addon_size->save();
        echo $addon_size->id;

    }
    public function get_internalcolors(Request $request)
    {
    $id = $request->input('id');
    $addon = AddOn::find($id);
    $door_glass = $request->input('door_glass');
    $doors_glass = ModelFrame::find($door_glass);
    $addoncolors = AddonColor::where('addon_id','=',$id)->where('side','=','internal')->get();
    //print_r($addoncolors);
    return view('public/customizer/internalcolors',['colors'=>$addoncolors,'doors_glass'=>$doors_glass]);
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
        $frame = ModelFrame::find($frame_id);
        $externalcolors = FrameDetails::where('side','=','external')->where('frame_id','=',$frame_id)->get();
        return view("public/customizer/frameexcolor",['externalcolors'=>$externalcolors,'frame'=>$frame]);
    }
    public function frame_internal_colors(Request $request)
    {
        $frame_id = $request->input('frame_id');
        $frame = ModelFrame::find($frame_id);
        $internalcolors = FrameDetails::where('side','=','internal')->where('frame_id','=',$frame_id)->get();
        return view("public/customizer/frameinternalcolor",['internalcolors'=>$internalcolors,'frame'=>$frame]);
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
    public function customizeaddtocart(Request $request)
    {
        $amountarray = $request->input('amountarray');
        $idarray = $request->input('idarray');
        $typearray = $request->input('typearray');
        $addon = AddOn::find($idarray[0]);

        $product_id = $addon->product_id;
        if($addon->product->sale_price)
        {
            $price = $addon->product->sale_price;
        }
        else{
            $price = $addon->product->regular_price;
        }
    // print_r($addon->product);
        $quantity =  1;
        $cart  = new Cart;
        $cart->session_id = session()->getId();
        $cart->product_id = $product_id;
        $cart->price = $price;
        $cart->regular_price =$addon->product->regular_price;
        $cart->quantity = $quantity;
        $cart->save();
        echo $cart->id;
        for($i=0;$i<count($idarray);$i++)
        {
            if($idarray[$i]!=0)
            {         
            $cartdetails = new CartDetails;
            $cartdetails->cart_id= $cart->id;
            $cartdetails->addon_type = $typearray[$i];
            $cartdetails->type_id = $idarray[$i];
            $cartdetails->price = $amountarray[$i];
            $cartdetails->quantity = 1;
            $cartdetails->save();
            }
        }
        
    }
}