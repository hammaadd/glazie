<?php

namespace App\Http\Controllers;
use App\Models\PrdVariety;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class PrdVarietyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index()
    {
        $varieties =PrdVariety::all();
        return view('admin/prdvariety/index',['varieties'=>$varieties]);
    }
    public function create()
    {
        return view('admin/prdvariety/create');
    }
    public function store(Request $request){
        $validateData = $request->validate([
            'prd_name'=>'required|unique:prd_varieties'
        ]);
        $createvariety = new PrdVariety;
        $createvariety->prd_name = $request->input('prd_name');
        $createvariety->created_by = Auth::id();
        $createvariety->save();
        return redirect('admin/prdvariety')->with('info','Variety Created Successfully');
    }
    public function edit($id)
    {
        $varity = PrdVariety::find($id);
        return view('admin/prdvariety/edit',['variety'=>$varity]);
    }
    public function update($id,Request $request)
    {
        $validateData = $request->validate([
            'prd_name'=>'required'
        ]);
        $updatevariety = array(
        'prd_name' => $request->input('prd_name'),
        'updated_by' => Auth::id()
        );
        PrdVariety::where('id',$id)->update($updatevariety);
        return redirect('admin/prdvariety')->with('info','Variety updated Successfully');
    }
    public function delete($id)
    {
        PrdVariety::where('id',$id)->delete();
        return redirect('admin/prdvariety')->with('info','Variety deleted Successfully');  
    }
    
}
