<?php

namespace App\Http\Controllers;
use App\Models\AddOnType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddOnTypController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index()
    {
        $addontypes = AddOnType::all();
        return view('admin/addontype/index',['addontypes'=>$addontypes]);
    }
    public function create()
    {
        return view('admin/addontype/create');
    }
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name'=>'required|unique:add_on_types'
        ]);
        $createvariety = new AddOntype;
        $createvariety->name = $request->input('name');
        $createvariety->created_by = Auth::id();
        $createvariety->save();
        return redirect('admin/addontype')->with('info','AddOn Type Created Successfully');
    }
    public function edit($id)
    {
        $addontype = AddOnType::find($id);
        return view('admin/addontype/edit',['addontype'=>$addontype]);
    }
    public function update($id,Request $request)
    {
        $validateData = $request->validate([
            'name'=>'required'
        ]);
        $udpateaddontype = array(
        'name' => $request->input('name'),
        'updated_by' => Auth::id()
        );
        AddOnType::where('id',$id)->update($udpateaddontype);
        return redirect('admin/addontype')->with('info','AddOn Type Updated Successfully');
    }
    public function delete($id)
    {
        AddOnType::where('id',$id)->delete();
        return redirect('admin/addontype')->with('info','AddOn Type Deleted Successfully');
    }
}
