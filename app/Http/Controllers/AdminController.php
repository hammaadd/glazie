<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');   
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   

        $wed = date('Y-m-d');
        $month = date('d');
        $ysd = date('Y')."-01-01";
        
        
        $abc = $month-1;
        $msd = date('Y-m-d', strtotime('-'.$abc.' days'));
        $ed = date('Y-m-d');
        //echo $ed;
        // Getting data of installers
        $installers = User::where('type','=','installer')->count(); 
        // Customers data
        $customers = User::where('type','=','customer')->count();
        //  Today  total Quantity sale 
        $today = Order::where(DB::raw('DATE_FORMAT(created_at,"%Y-%m-%d")'), "=", $ed)->where('status','=','completed')->get();
        //print_r($today);
        
        $today_sale = 0;
        foreach($today as $todays){
            foreach($todays->details as $orderdetails){
                $today_sale += $orderdetails->quantity;
            }
        }
        
        // Total Quantity of this year
        $month = Order::where(DB::raw('DATE_FORMAT(created_at,"%Y-%m-%d")'), ">=", $msd)->where(DB::raw('DATE_FORMAT(created_at,"%Y-%m-%d")'), "<=", $ed)->where('status','=','completed')->get();
        $monthly_sale = 0;
        foreach($month as $months){
            foreach($months->details as $orderdetails){
                $monthly_sale += $orderdetails->quantity;
            }
        }
        
        // Order of this year
        $yearly = Order::where(DB::raw('DATE_FORMAT(created_at,"%Y-%m-%d")'), ">=", $ysd)->where(DB::raw('DATE_FORMAT(created_at,"%Y-%m-%d")'), "<=", $ed)->get();        // Order Counting
        $yearly_sale = 0;
        foreach($yearly as $year){
            foreach($year->details as $yearorderdetails){
                $yearly_sale += $yearorderdetails->quantity;
            }
        }
       // echo $yearly_sale;
        $orders = Order::count();
      
        //  The latest Orders
        $latest_orders = Order::orderBy('id', 'desc')->limit(5)->get();
         // Latees  Products 
        $latest_products = Products::orderBy('id', 'desc')->limit(5)->get();

        $product_type =   OrderDetails::all();

        // Latest Products
        // $latest_products = Products::where('status','=','1')->orderBy('id', 'desc')->limit(5)->get();
        
        return view('admin/index',['installers'=>$installers,'customers'=>$customers,'orders'=>$orders ,'today_sale'=>$today_sale,'monthly_sale' =>$monthly_sale,'yearly_sale'=>$yearly_sale,'latest_orders' =>$latest_orders,'latest_products'=>$latest_products,'product_type'=>$product_type]);
    }
    public function admin_logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('admin/login');
    }
}
