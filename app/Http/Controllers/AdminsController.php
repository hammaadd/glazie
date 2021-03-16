<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Rules\Newmatchold;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class AdminsController extends Controller
{
 
    public function __construct(){
    
        $this->middleware('auth:admin');
        $user =Auth::user();
        
    }

    public function edit_profile(){
        $user = Auth::user();
        
        
        return view('admin/edit_profile',['user'=>$user]);
    }
    public function changepass(){
        return view('admin/change_password');
    }
   
    public function passwordchange(Request $request){
        $validatedData = $request->validate([
            'oldpwd' => ['required',new Newmatchold],
            'newpwd' => 'required',
            'conf_password' =>'required'
        ]);
    $user = Auth::user();
        $id = $user->id;
        $data = array(
            'password'=> Hash::make($request->input('newpwd'))
            );
        Admin::where('id',$id)
      ->update($data);
      

      
      return redirect('/admin/profile/edit')->with('info', "THe password is changed successfull");
    }
    public function avatarupdate(){
        $user = Auth::user();
        return view('admin/avatar_update',['user'=>$user]);
    }
    public function updateavatar(Request $request){
        $user = Auth::user();
        $id = $user->id;
        $validatedData = $request->validate([
            'image' => 'required|mimes:jpg,png,jpeg,gif,svg|max:5048',
    
           ]);
        $file = $request->file('image');
        $filename = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();
        $imgname = uniqid() . $filename;
        $destinationPath = public_path('/admin-assets/admin-images');
        $file->move($destinationPath, $imgname);
        $data = array(
           'profile' =>$imgname
        );
        Admin::where('id',$id)
           ->update($data);
        return redirect('admin/profile/edit')->with('info', 'Image Has been uploaded');
    
    
    }
    public function changeprofile(){
        $user = Auth::user();
        return view('admin/change_profile',['user'=>$user]);
    }
    public function profilechange(Request $request){
        $user = Auth::user();
        $id = $user->id;
        $validatedData = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'contact_no' => 'required',
            'address' => 'required'
           ]);
        $data = array(
            'first_name'=> $request->input('first_name'),
            'last_name'=> $request->input('last_name'),
            'contact_no'=> $request->input('contact_no'),
            'address'=> $request->input('address'),
            'name'=>$request->input('first_name').' '.$request->input('last_name')
        );
        Admin::where('id',$id)
        ->update($data);
        
        return redirect('admin/profile/edit')->with('info','The profile is updated');
        
    }
    
}
