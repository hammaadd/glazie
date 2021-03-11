<?php

namespace App\Http\Controllers;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class SocialController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index()
    {
        $socials = SiteSetting::orderBy('id','desc')->get();
        return view('admin/social/index',['socials'=>$socials]);
    }
    public function create()
    {
        return view('admin/social/create');
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'key'=>'required',
            'value'=>'required'
            ]);
            $site = new SiteSetting;
            $site->key = $request->input('key');
            $site->value = $request->input('value');
            $site->deleteable = '0';
            $site->save();
            return redirect('admin/social')->with('info','New Social is created');
    }
    public function edit($id)
    {
        $social = SiteSetting::find($id);
        return view('admin/social/edit',['social'=>$social]);
    }
    public function update($id,Request $request){
        $social = SiteSetting::find($id);
        $validatedData = $request->validate([
            'key'=>'required',
            'value'=>'required'
            ]);
            if($site->deleteable == '0'){
                $update_site = array(
                    'key' => $request->input('key'),
                    'value' => $request->input('value'),
                    
                    );
            }
            else{
                $update_site = array(
                    
                    'value' => $request->input('value'),
                    
                    );
            }
            SiteSetting::where('id',$id)->update($update_site); 
            return redirect('admin/social')->with('info','Social is updated');
    }
    public function delete($id)
    {

        $site= SiteSetting::find($id);
        if($site->deleteable=='1')
        {
            return redirect('admin/social')->with('info','Can Not Deleted');
        } 
        else{
            SiteSetting::where('id',$id)->delete();
        }
        
    }
    
    
    
}
