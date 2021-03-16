<?php

namespace App\Http\Controllers;
use App\Models\DeliveryTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class DeliverTimeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index()
    {
        $times = DeliveryTime::all();
        return view('admin/times/index',['times'=>$times]);
    }
    public function create()
    {
        return view('admin/times/create');
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'time' => 'required',
            'price'=>'required',
        ]);
        $delivery = new DeliveryTime;
        $delivery->name=$request->input('name');
        $delivery->time=$request->input('time');
        $delivery->price=$request->input('price');
        $delivery->created_by = Auth::id();
        $delivery->save();
        return redirect('admin/deliverytimes')->with('info','Time Created Successfully');
        
    }
    
    public function edit($id)
    {
        $time =  DeliveryTime::find($id);
        return view('admin/times/edit',['time'=>$time]);
    }
    public function update($id,Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'time' => 'required',
            'price'=>'required',
        ]);
        $updatetime = array(
        'name'=>$request->input('name'),
        'time'=>$request->input('time'),
        'price'=>$request->input('price'),
        'updated_by' => Auth::id(),
        );
        DeliveryTime::where('id',$id)->update($updatetime);
        return redirect('admin/deliverytimes')->with('info','Time Updated Successfully');
        
    }
    
    public function delete($id)
    {
        DeliveryTime::where('id',$id)->delete();
        return redirect('admin/deliverytimes')->with('info','Time Deleted Successfully');
    }
    

}
