<?php

namespace App\Http\Controllers;
use App\Models\Subscribe;
use App\Models\Notification;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function __construct(){
        $this->middleware('auth:admin');
    }
    public function  index(){
        $subcriptions = Subscribe::all();
        return view("admin/newsletter/index",['subscriptions'=>$subcriptions]);
    }
    public function delete($id)
    {
        
        Subscribe::where('id',$id)->delete();
        

        return redirect('admin/subscription')->with('info','Subscription Is deleted Successfully');
    }
}
