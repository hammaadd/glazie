<?php

namespace App\Http\Controllers;
use App\Models\ContactUs;
use Illuminate\Http\Request;

class UserMessageController extends Controller
{
    public function __construct(){
        $this->middleware('auth:admin');
    }
    public function index(){
        $usermessages = ContactUs::orderby('id','desc')->get();
        return view('admin/contactus/index',['messages'=>$usermessages]);
    }
    public function messagedetails($id){
        abort_if(!$messagedetail = ContactUs::find($id),403);
        
            return view('admin/contactus/details',['messagedetail'=>$messagedetail]);
     
       
    }
    public function messagedelete($id){
       
        ContactUs::where('id',$id)->delete();
        return redirect('admin/usermessage')->with('info','The Message is Deleted');
    }
}
