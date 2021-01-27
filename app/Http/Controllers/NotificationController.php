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
        $notifications = Notification:: where('status','=','unread')->where('delete_status','=','1')->count();
        echo json_encode($notifications);
    }
    public function get()
    {
        $notifications = Notification:: where('status','=','unread')->where('delete_status','=','1')->get();
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
        $notifications = Notification::where('delete_status','=','1')->orderBy('id','desc')->get();
        return view('admin/notification/index',['notifications'=>$notifications]);
    }
    public function delete($id)
    {
        $delete_notiifcation = array(
            'delete_status' =>'0'
        );
        Notification::where('id',$id)->update($delete_notiifcation);
        return redirect('admin/notifications')->with('info','Notification is deleted Successfully');

    }
    
}
