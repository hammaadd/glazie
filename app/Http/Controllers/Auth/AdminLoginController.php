<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class AdminLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:admin');
    }
    public function showloginForm(){
    	return view('admin.admin-login'); 
    }
    public function Login(Request $request){
        $this->validate($request,[
            "email"  => "required|email",
            "password" =>"required|min:6"
        ]);
        if (Auth::guard('admin')->attempt(['email'=>$request->email,'password' => $request->password],$request->remember)) {
            return redirect()->intended(route('admin.dashboard'));
            
        }
        return redirect("/admin/login")->with('error', "The crediential not match the records");
        
    }
}
