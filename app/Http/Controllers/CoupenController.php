<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Coupen;
class CoupenController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index(){
        $coupens = Coupen::all();
        return view('admin/coupen/index',['coupens'=>$coupens]);
    }
    public function add()
    {
        return view('admin/coupen/create');
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'coupen_name'=>'required',
            'coupen_code'=>'required|unique:coupens',
            'discount_type'=>'required',
            'discount_amount'=>'required',       
        ]);
        
        $coupen = new Coupen;
        $coupen->coupen_name = $request->input('coupen_name');
        $coupen->coupen_code = $request->input('coupen_code');
        $coupen->discount_type = $request->input('discount_type');
        $coupen->discount = $request->input('discount_amount');
        
        $coupen->created_by = Auth::id();
        $coupen->save();
        return redirect('admin/coupen')->with('info','The coupen is created');
    }
    public function edit($id)
    {
        $coupen = Coupen::find($id);
        return view('admin/coupen/edit',['coupen'=>$coupen]);

    }
    public function update($id, Request $request)
    {   
        $validatedData = $request->validate([
        'coupen_name'=>'required',
        'coupen_code'=>'required',
        'discount_type'=>'required',
        'discount_amount'=>'required',       
    ]);
        $update_coupen = array(
        'coupen_name' => $request->input('coupen_name'),
        'coupen_code' => $request->input('coupen_code'),
        'discount_type' => $request->input('discount_type'),
        'discount' => $request->input('discount_amount'),
        'limiteduser' => $request->input('limited_user'),
        'limited_time' => $request->input('limited_time'),
        'no_of_user' => $request->input('no_of_user'),
        'last_date' => $request->input('timelimit'),
        'updated_by' => Auth::id(),
        );
       
        Coupen::where('id',$id)->update($update_coupen);
        return redirect('admin/coupen')->with('info','The coupen is updated');
    }
    public function delete($id)
    {
        Coupen::where('id',$id)->delete();
        return redirect('admin/coupen')->with('info','The coupen is deleted');

    }
}
