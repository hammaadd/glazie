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
        $order_status="";
        $order_id = $request->input('order_id');
        $status = $request->input('status');
        $order=Order::find($order_id);
        $user_data = $order->customer;
        
        $check_order = array(
            
            'status' =>$status
        );
        
        Order::where('id',$order_id)->update($check_order);
            if ($status=="canceled") {
                $order_status = "Canceled Due to some Reason";
               // $user_data->notify(new OrderNotification($order_status));
            }
            if ($status=="shipped") {
                $order_status = "On the way will reached in two days";
               // $user_data->notify(new OrderNotification($order_status));
            }
        return redirect('admin/orders')->with('info','The order is updated');
    }
    public function orderdetaails($id)
    {
        $order = Order::find($id);
        return view('admin/orders/orderdetails',['order'=>$order]);
    }
}