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
        $subcriptions = Subscribe::where('delete_status','=','1')->get();
        return view("admin/newsletter/index",['subscriptions'=>$subcriptions]);
    }
    public function delete($id)
    {
        $deletesub = array(
            'delete_status' => '0'
        );
        Subscribe::where('id',$id)->update($deletesub);
        

        return redirect('admin/subscription')->with('info','Subscription Is deleted Successfully');
    }
}
