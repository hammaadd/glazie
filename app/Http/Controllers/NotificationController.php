<?php

namespace App\Http\Controllers;
use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function count(){
        $notifications = Notification::where('status','=','unread')->count();
        echo json_encode($notifications);
    }
    public function get()
    {
        $notifications = Notification:: where('status','=','unread')->get();
        return view("admin/notification/all",['notifications'=>$notifications]);
    }
    public function details($id){
        $read = array(
            'status'=>'read'
        );
        Notification::where('id',$id)->update($read);
        $notification = Notification::find($id);
        return redirect($notification->link);
    }
    public function index()
    {
        $notifications = Notification::orderBy('id','desc')->get();
        return view('admin/notification/index',['notifications'=>$notifications]);
    }
    public function delete($id)
    {
       
        Notification::where('id',$id)->delete();
        return redirect('admin/notifications')->with('info','Notification is deleted Successfully');

    }
    
}
