<?php

namespace App\Http\Controllers;
use App\Models\Products;
use App\Models\AddOn;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\AddonColor;
use App\Models\Color;
use App\Models\AddonFurniture;
use App\Models\ModelFrame;
use App\Models\FrameGlass;
use App\Models\AddonHinge;
use App\Models\FrameDetails;
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
        $colors = Color::all();
        return view('admin/addon/create',['products'=>$prodcuts,'colors'=>$colors]);
    }
    public function store(Request $request){
        
        $validatedData = $request->validate([
            'product_id' =>'required',
            'svgimage' => 'required|mimes:svg|max:5048'
        ]);

        $product_id = $request->input('product_id');
        $model_name = $request->input('model_name');
        $name = $request->input('name');
        $extercolor_code = $request->input('extercolor_code');
        $exterprice = $request->input('exterprice');
        $exterquantity = $request->input('exterquantity');
        $intercolor_code = $request->input('intercolor_code');
        $interprice = $request->input('interprice');
        $interquantity = $request->input('interquantity');
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
        $addon->created_by = Auth::id();
        $addon->save();
        $addon_id = $addon->id;
         
            for($i=0;$i<count($extercolor_code); $i++){
                $addoncolor = new AddonColor;
                $addoncolor->addon_id = $addon_id;
                $addoncolor->name = Color::find($extercolor_code[$i])->name;
                $addoncolor->side = 'external';
                $addoncolor->color_code = Color::find($extercolor_code[$i])->color_code;
                $addoncolor->quantity = $exterquantity[$i];
                $addoncolor->price = $exterprice[$i];
                $addoncolor->created_by = Auth::id();
                $addoncolor->save();
            }
            for($i=0;$i<count($intercolor_code); $i++){
                $addoncolor = new AddonColor;
                $addoncolor->addon_id = $addon_id;
                $addoncolor->name = Color::find($intercolor_code[$i])->name;
                $addoncolor->side = 'internal';
                $addoncolor->color_code = Color::find($intercolor_code[$i])->color_code;
                $addoncolor->quantity = $interquantity[$i];
                $addoncolor->price = $interprice[$i];
                $addoncoloruse->created_by = Auth::id();
                $addoncolor->save();
                }  
        return redirect('admin/addon')->with('info','Add Oncreated Successfully');
            
    }
    public function view($id)
    {
        $addon = AddOn::find($id);
        return view('admin/addon/view',['addon'=>$addon]);
    }
    public function addcolor($id)
    {
        $colors = Color::all();
        return view('admin/addon/addcolor',['id'=>$id,'colors'=>$colors]);
    }
    public function createaddoncolor(Request $request)
    {
        $name = $request->input('name');
        $addon_id = $request->input('addon_id');
        $intercolor_code = $request->input('intercolor_code');
        $interprice = $request->input('interprice');
        $side  =$request->input('side');
        $interquantity = $request->input('interquantity');
        for($i=0;$i<count($intercolor_code); $i++){
            $addoncolor = new AddonColor;
            $addoncolor->addon_id = $addon_id;
            $addoncolor->name = Color::find($intercolor_code[$i])->name;
            $addoncolor->side = $side[$i];
            $addoncolor->color_code = Color::find($intercolor_code[$i])->color_code;
            $addoncolor->quantity = $interquantity[$i];
            $addoncolor->price = $interprice[$i];
            $addoncolor->created_by = Auth::id();
            $addoncolor->save();
            }  
       
        return redirect('admin/addon/view/'.$addon_id)->with('info','Color Added Successfully');   
    }
    public function deletecolor($id)
    {
        $color_id = AddonColor::find($id)->addon_id;
        AddonColor::where('id',$id)->delete();
        return redirect('admin/addon/view/'.$color_id)->with('info','Color deleted Successfully');   
    }
    public function editcolor($id)
    {
        $color = AddonColor::find($id);
        $colors = Color::all();
        return view('admin/addon/editcolor',['color'=>$color,'colors'=>$colors]);
    }
    public function updatecolor($id,Request $request)
    {   $addon_id = $request->input('addon_id');
        $updatecolor = array(
        'addon_id' => $addon_id,
        'name' => Color::find($request->input('color_code'))->name,
        'side' => $request->input('side'),
        'color_code' => Color::find($request->input('color_code'))->color_code,
        'quantity' => $request->input('quantity'),
        'price' =>  $request->input('price'),
        'updated_by'=> Auth::id()
        );
        AddonColor::where('id',$id)->update($updatecolor);
        return redirect('admin/addon/view/'.$addon_id)->with('info','Color updated Successfully');   
    }
    public function addframe($id)
    {
       $colors = Color::all();
       return view('admin/addon/addframe',['colors'=>$colors,'id'=>$id]);

    }
    public function createframe( Request $request)
    {
        $addon_id = $request->input('addon_id');
        $model_name = $request->input('model_name');
        $price = $request->input('price');
        $quantity = $request->input('quantity');

        $file = $request->file('image');
        $filename = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();
        $imgname = uniqid() . $filename;
        $destinationPath = public_path('/admin-assets/addon/frame');
        $file->move($destinationPath, $imgname);
        $frame = new ModelFrame;
        $frame->addon_id = $addon_id;
        $frame->name = $model_name;
        $frame->frame_price = $price;
        $frame->type="frame";
        $frame->quantity = $request->input('quantity');
        $frame->image = $imgname;
        $frame->created_by = Auth::id();
        $frame->save();
        $extercolor_code = $request->input('extercolor_code');
        $exterprice = $request->input('exterprice');
        $exterquantity = $request->input('exterquantity');
        $intercolor_code = $request->input('intercolor_code');
        $interprice = $request->input('interprice');
        $interquantity = $request->input('interquantity');
        if (count($extercolor_code)>0) {
            for($i=0;$i<count($extercolor_code); $i++){
                $framedetails = new FrameDetails;
                $framedetails->frame_id = $frame->id;
                $framedetails->side = 'external';
                $framedetails->value = Color::find($extercolor_code[$i])->color_code;
                $framedetails->quantity = $exterquantity[$i];
                $framedetails->price = $exterprice[$i];
                $framedetails->created_by = Auth::id();
                $framedetails->save();
            }
        }
        if(count($intercolor_code)>0)
        {
            for($i=0;$i<count($intercolor_code); $i++){
                $framedetails = new FrameDetails;
                $framedetails->frame_id = $frame->id;
                $framedetails->side = 'internal';
                $framedetails->value = Color::find($intercolor_code[$i])->color_code;
                $framedetails->quantity = $interquantity[$i];
                $framedetails->price = $interprice[$i];
                $framedetails->created_by = Auth::id();
                $framedetails->save();
                }  
        }
            return redirect('admin/addon/view/'.$addon_id)->with('info','Frame Are add Successfully');   
    }
    public function editframe($id)
    {
        $frame =  ModelFrame::find($id);
        return view('admin/addon/editframe',['frame'=>$frame]);
    }
    public function deleteframe($id)
    {
        $addon_id = ModelFrame::find($id)->addon_id;
        echo $addon_id;
        ModelFrame::where('id',$id)->delete();
        return redirect('admin/addon/view/'.$addon_id)->with('info','Frame deleted Successfully');
    }
    public function updateframe($id, Request $request)
    {
        $addon_id = $request->input('addon_id');
        $model_name = $request->input('model_name');
        $price = $request->input('price');
        $quantity = $request->input('quantity');
        
       
       
        
        $updateframe = array(
            'name' => $model_name,
            'frame_price' => $price,
            'quantity' => $request->input('quantity'),
           
            'updated_by' => Auth::id()
        );
        ModelFrame::where('id',$id)->update($updateframe);
        if ($request->file('image')) {
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $imgname = uniqid() . $filename;
            $destinationPath = public_path('/admin-assets/addon/frame');
            $file->move($destinationPath, $imgname);
            $updateframeimage= array(
               'image'=>$imgname
            );
            ModelFrame::where('id',$id)->update($updateframeimage);
        }
        
       
        
            return redirect('admin/addon/view/'.$addon_id)->with('info','Frame is updated Successfully');   
    }
    public function framecolors($id){
        $frame_colors = FrameDetails::where('frame_id','=',$id)->get();
        return view('admin/addon/framecolor',['framecolors'=>$frame_colors,'id'=>$id]);
    }
    public function createframecolor($id)
    {
        return view('admin/addon/createframecolor',['id'=>$id]);
    }
    public function addglass($id)
    {
        return view('admin/addon/addglass',['id'=>$id]);
    }
    public function createglass(Request $request)
    {
        $addon_id = $request->input('addon_id');
        $name = $request->input('name');
        $price = $request->input('price');
        $quantity = $request->input('quantity');
        $images = $request->file('images');
        for ($i=0; $i <count($name) ; $i++) { 
            $modelframe = new ModelFrame;
            $modelframe->name = $name[$i];
            $modelframe->quantity = $quantity[$i];
            $modelframe->frame_price = $price[$i];
            $modelframe->addon_id = $addon_id;
            $modelframe->type= "glass";
            $file = $images[$i];
            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $imgname = uniqid() . $filename;
            $destinationPath = public_path('/admin-assets/addon/glass');
            $file->move($destinationPath, $imgname);
            $modelframe->image = $imgname;
            $modelframe->save();

        }
        return redirect('admin/addon/view/'.$addon_id)->with('info','Glass add Successfully');   
    }
    public function editglass($id)
    {
        $glass = ModelFrame::find($id);
        return view('admin/addon/editglass',['glass'=>$glass]);
    }
    public function updateglass($id,Request $request)
    {
        
            $addon_id = $request->input('addon_id');
            $model_name = $request->input('model_name');
            $price = $request->input('price');
            $quantity = $request->input('quantity');
                $updateglass = array(
                'name' => $model_name,
                'frame_price' => $price,
                'quantity' => $request->input('quantity'),
               
                'updated_by' => Auth::id()
            );
            ModelFrame::where('id',$id)->update($updateglass);
            if ($request->file('image')) {
                $file = $request->file('image');
                $filename = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $imgname = uniqid() . $filename;
                $destinationPath = public_path('/admin-assets/addon/glass');
                $file->move($destinationPath, $imgname);
                $updateglassimage= array(
                   'image'=>$imgname
                );
                ModelFrame::where('id',$id)->update($updateglassimage);
            }
            
           
            
                return redirect('admin/addon/view/'.$addon_id)->with('info','Glass is updated Successfully');   
        
    }
    public function deleteglass($id)
    {
        $addon_id = ModelFrame::find($id)->addon_id;
      
        ModelFrame::where('id',$id)->delete();
        return redirect('admin/addon/view/'.$addon_id)->with('info','Glass deleted Successfully');
    }
    public function addframecolor($id)
    {
        $colors = Color::all();
        return view("admin/addon/createframecolor",['id'=>$id,'colors'=>$colors]);
    }
    public function addframcolor(Request $request)
    {
       
   
        $intercolor_code = $request->input('intercolor_code');
        $interprice = $request->input('interprice');
        $side  =$request->input('side');
        $interquantity = $request->input('interquantity');
        
       
        $frame_id =$request->input('frame_id');
       
        for($i=0;$i<count($intercolor_code); $i++){
            $frame = new FrameDetails;
            $frame->frame_id = $request->input('frame_id');
            $frame->side = $side[$i];
            $frame->value = Color::find($intercolor_code[$i])->color_code;
            $frame->quantity = $interquantity[$i];
            $frame->price = $interprice[$i];
            $frame->created_by = Auth::id();
            $frame->save();
            } 
            return redirect('admin/framecolors/'.$frame_id)->with('info','Frame Color are Added');
       
    }
    public function editframcolor($id)
    {
        $colors = Color::all();
        $framecolor = FrameDetails::find($id);
        return view('admin/addon/editframecolor',['colors'=>$colors,'framecolor'=>$framecolor]);
    }
    public function updateframcolor($id,Request $request)
    {
        
        $frame_id = $request->input('frame_id');
        $side = $request->input('side');
        $value = $request->input('value');
        $color = Color::find($value)->color_code;
        $quantity = $request->input('quantity');
        $price = $request->input('price');
        $updateframecolor = array(
          'side'=>$side,
          'quantity'=>$quantity,
          'price'=>$price,
          'value'=>$color
          
        );
        FrameDetails::where('id',$id)->update($updateframecolor);
        return redirect('admin/framecolors/'.$frame_id)->with('info','Frame Color are updated');
    }
    public function deleteframcolor($id)
    {
        $frame_id = FrameDetails::find($id)->frame_id;
        FrameDetails::where('id',$id)->delete();
        return redirect('admin/framecolors/'.$frame_id)->with('info','Frame Color is deleted');
    }
    public function frameglass($id)
    {
        $frameglass = FrameGlass::where('frame_id','=',$id)->get();
        $addon_id = ModelFrame::find($id)->addon_id;
        
        return view('admin/addon/frameglass' ,['id'=>$id,'frameglass'=>$frameglass,'addon_id'=>$addon_id]);
    }
    public function addframeglass($id)
    {
        $addon_id = ModelFrame::find($id)->addon_id;
        return view('admin/addon/addframeglass',['id'=>$id,'addon_id'=>$addon_id]);
    }
    public function createframeglass(Request $request)
    {
        $frame_id = $request->input('frame_id');
        
        $name = $request->input('name');
        $images = $request->file('images');
    
        $price = $request->input('price');
        $quantity = $request->input('quantity');
        
        for ($i=0; $i <count($name) ; $i++) { 
            $frame_glass = new FrameGlass;
            $frame_glass->frame_id = $frame_id;
            $frame_glass->glass_name = $name[$i];
            $frame_glass->price = $price[$i];
            $frame_glass->quantity =$quantity[$i];
            $file = $images[$i];
            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $imgname = uniqid() . $filename;
            $destinationPath = public_path('/admin-assets/addon/frameglass');
            $file->move($destinationPath, $imgname);
            $frame_glass->image = $imgname;
            $frame_glass->save();
        }
        return redirect('admin/frameglasses/'.$frame_id)->with('info','Frame Glass Is created ');
    }
    public function editframeglass($id)
    {
        $frame =FrameGlass::find($id);
        
        return view('admin/addon/editframeglass',['frame'=>$frame]);
    }
    public function updateframeglass($id, Request $request)
    {
        $frame_id = FrameGlass::find($id)->frame_id;
        $name =  $request->input('name');
        $price =  $request->input('price');
        $quantity =  $request->input('quantity');
        $file = $request->file('image');
        $updateframeglass = array(
            'glass_name'=>$name,
            'price'=>$price,
            'quantity'=>$quantity
        );
        FrameGlass::where('id',$id)->update($updateframeglass);
        if ($file) {
           
            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $imgname = uniqid() . $filename;
            $destinationPath = public_path('/admin-assets/addon/frameglass');
            $file->move($destinationPath, $imgname); 
            $frameglassimg = array(
               'image'=>$imgname 
            );
            FrameGlass::where('id',$id)->update($frameglassimg);
            
        }
        return redirect('admin/frameglasses/'.$frame_id)->with('info','Frame Glass is Updated');
    }
    public function deleteframeglass($id) {
        $frame_id = FrameGlass::find($id)->frame_id;
        FrameGlass::where('id',$id)->delete();
        return redirect('admin/frameglasses/'.$frame_id)->with('info','Frame Glass is deleted');
    }
    public function addfurniture($id)
    {
        return view('admin/addon/addfurniture',['id'=>$id]);
    }
    public function createfurniture(Request $request)
    {
       $addon_id = $request->input('addon_id');
       $name = $request->input('name');
       $type = $request->input('type');
       $price = $request->input('price');
       $quantity = $request->input('quantity');
       $files = $request->file('images');
       for ($i=0; $i <count($name) ; $i++) { 
           $addon = new AddonFurniture;
           $addon->addon_id = $addon_id;
           $addon->name = $name[$i];
           $addon->type = $type[$i];
           $addon->price = $price[$i];
           $addon->quantity = $quantity[$i];
           $file = $files[$i];
            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $imgname = uniqid() . $filename;
            $destinationPath = public_path('/admin-assets/addon/furniture');
            $file->move($destinationPath, $imgname);
            $addon->image = $imgname;
            $addon->save();
       }
       return redirect('admin/addon/view/'.$addon_id)->with('info','Furniture created successfully');
    }
    public function editfurniture($id)
    {
        $furniture = AddonFurniture::find($id);
        return view('admin/addon/editfurniture',['furniture'=>$furniture]);
    }
    public function updatefurniture($id,Request $request)
    {
        $addon_id = AddonFurniture::find($id)->addon_id;
        $name =  $request->input('name');
        $price =  $request->input('price');
        $quantity =  $request->input('quantity');
        $file = $request->file('image');
        $updatefurniture = array(
            'name'=>$name,
            'price'=>$price,
            'quantity'=>$quantity
        );
        AddonFurniture::where('id',$id)->update($updatefurniture);
        if ($file) {
           
            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $imgname = uniqid() . $filename;
            $destinationPath = public_path('/admin-assets/addon/furniture');
            $file->move($destinationPath, $imgname); 
            $updateimage = array(
               'image'=>$imgname 
            );
            AddonFurniture::where('id',$id)->update($updateimage);
           
        }
        return redirect('admin/addon/view/'.$addon_id)->with('info','Furniture Updated successfully');
    }
    public function deletefurniture($id)
    {
        $addon_id = AddonFurniture::find($id)->addon_id;
        AddonFurniture::where('id',$id)->delete();
        return redirect('admin/addon/view/'.$addon_id)->with('info','Furniture  successfully');
    }
    public function addhinge($id)
    {
        return view('admin/addon/addhinge',['id'=>$id]);
    }
    public function checkhinge(Request $request)
    {
        $addon_id = $request->input('addon_id');
        $hinge = $request->input('hinge');
        $data = AddonHinge::where('addon_id','=',$addon_id)->where('hingeside','=',$hinge)->get();
        echo count($data);

    }
    public function createhinge(Request $request)
    {
        $addon_id  = $request->input('addon_id');
        $hinge = $request->input('hinge');
        $newhinge = new AddonHinge;
        $newhinge->addon_id = $addon_id;
        $newhinge->hingeside = $hinge;
        $newhinge->created_by = Auth::id();
        $newhinge->save();
        return redirect('admin/addon/view/'.$addon_id)->with('info','Hinge created successfully');

    }
    public function removehinge($id)
    {
        $addon_id = AddonHinge::find($id)->addon_id;
        AddonHinge::where('id',$id)->delete();
        return redirect('admin/addon/view/'.$addon_id)->with('info','Hinge removed successfully');
    }
}
