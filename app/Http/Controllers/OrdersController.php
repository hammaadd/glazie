<?php

namespace App\Http\Controllers;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Notifications\OrderNotification;

class OrdersController extends Controller
{
    public function __construct(){
        $this->middleware('auth:admin');
    }
    public function index(){
        $orders = Order::orderby('id','desc')->get();
      return view('admin/orders/index',['orders'=>$orders]);

    }
    public function checkorder(Request $request)
    {   
      
        $order_id = $request->input('order_id');
        $status = $request->input('status');
        $redirect = $request->input('redirect');
        $order=Order::find($order_id);
        $order_status = $request->input('message');
        
        
        $user_data = $order->customer;
        
        $check_order = array(
            
            'status' =>$status
        );
        
        Order::where('id',$order_id)->update($check_order);
            
                
             if (!empty($order_status)) {
                //$user_data->notify(new OrderNotification($order_status));
             }
            
           
        if ($redirect==1) {
            return redirect('admin/orderconfirm')->with('info','The order is updated');
        }
        else{
            return redirect('admin/orders')->with('info','The order is updated');
        }
    }
    public function orderdetaails($id)
    {
        abort_if(!$order = Order::find($id), 403);
        return view('admin/orders/orderdetails',['order'=>$order]);
    }
    public function orderconfrim(){
        $orders = Order::where('status','=','pending')->orderby('id','desc')->get();
        return view('admin/orders/orderconfirm',['orders'=>$orders]);
    }
}