<?php

namespace App\Http\Controllers;
use App\Models\WeightSlot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class WeightController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index()
    {
        $weights = WeightSlot::all();
        return view('admin/weights/index',['weights'=>$weights]);
    }
    public function create()
    {
        return view('admin/weights/create');
    }
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'min_weight' => 'required',
            'max_weight' => 'required',
            'price' =>'required',
        ]);
        $newweight = new WeightSlot;
        $newweight->min_weight = $request->input('min_weight');
        $newweight->max_weight = $request->input('max_weight');
        $newweight->price = $request->input('price');
        $newweight->created_by = Auth::id();
        $newweight->save();
        return redirect('admin/weights')->with('info','Weight created successfully');
        
    }
    public function edit($id)
    {
        $weights = WeightSlot::find($id);
        return view('admin/weights/edit',['weights'=>$weights]);
    }
    public function update($id ,Request $request)
    {
      
        $validateData = $request->validate([
            'min_weight' => 'required',
            'max_weight' => 'required',
            'price' =>'required',
        ]);
        $update_weight = array(
        'min_weight' => $request->input('min_weight'),
        'max_weight' => $request->input('max_weight'),
        'price' => $request->input('price'),
        'updated_by' => Auth::id(),
        );
        $weights = WeightSlot::where('id',$id)->update($update_weight);

        return redirect('admin/weights')->with('info','Weight created successfully');
    }
    public function delete($id)
    {
       $weights = WeightSlot::where('id',$id)->delete();
        return redirect('admin/weights')->with('info','Weight created successfully');
    }

}
