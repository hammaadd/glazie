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
        $socials = SiteSetting::all();
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
           
            $site->save();
            return redirect('admin/social')->with('info','New Social is created');
    }
    public function edit($id)
    {
        $social = SiteSetting::find($id);
        return view('admin/social/edit',['social'=>$social]);
    }
    public function update($id){
        $validatedData = $request->validate([
            'key'=>'required',
            'value'=>'required'
            ]);
            $update_site = array(
            'key' => $request->input('key'),
            'value' => $request->input('value'),
            
            );
            return redirect('admin/social')->with('info','Social is updated');
    }
    public function delete($id)
    {
        SiteSetting::where('id',$id)->delete(); 
        return redirect('admin/social')->with('info','Social is delete');
    }
    
    
    
}