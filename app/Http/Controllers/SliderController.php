<?php

namespace App\Http\Controllers;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SliderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index()
    {
        $sliders = Slider::all();
        return view('admin/slider/index',['sliders'=>$sliders]);
    }
    public function create()
    {
        return view('admin/slider/create');
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'heading' => 'required',
            'image' => 'required|mimes:jpg,png,jpeg,gif,svg|max:5048',
        ]);
        $slider =  new Slider;
        
            $slider->heading = $request->input('heading');
            $slider->description = $request->input('description');
            // Image code
            
            $slider->created_by = Auth::id();
                $file = $request->file('image');
                $filename = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $imgname = uniqid() . $filename;
                $destinationPath = public_path('/admin-assets/sliders');
                $file->move($destinationPath, $imgname);
                $slider->image= $imgname;
                
        $slider->save();
        
        return redirect('admin/sliders')->with('info','The Slider created Successfully');
   
    }
    public function edit($id)
    {
        $slider = Slider::find($id);
        return view('admin/slider/edit',['slider'=>$slider]);
    }
    public function update($id,Request $request)
    {
        $validatedData = $request->validate([
            'heading' => 'required',
            'image' => 'mimes:jpg,png,jpeg,gif,svg|max:5048',
        ]);
      
            $updateslider = array(
                'heading' => $request->input('heading'),
                'description' => $request->input('description'),
                'updated_by' =>Auth::id()
            );

            SLider::where('id',$id)->update($updateslider);

            // Image code
            
          
            if($file = $request->file('image'))
            {
                $file = $request->file('image');
                $filename = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $imgname = uniqid() . $filename;
                $destinationPath = public_path('/admin-assets/sliders');
                $file->move($destinationPath, $imgname);
                $sliderimage = array(
                 
                    'image'=>$imgname
                );
                SLider::where('id',$id)->update($sliderimage);
            }
                
                
                
  
        
        return redirect('admin/sliders')->with('info','The Slider created Successfully');  
    }

    public function delete($id,Request $request)
    {
        Slider::where('id',$id)->delete();
        return redirect('admin/sliders')->with('info','The Slider deleted Successfully');  

    }
    
    
    
}
