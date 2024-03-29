<?php
namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Products;
use App\Models\PrdVariety;
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
        
        $month = date('m');
        $year = date('Y');
        $msd = date('Y').'-'.date('m').'-1';
        $ed = date('Y-m-d');
        //echo $msd;
        //echo $ed;
        // Getting data of installers
        $installers = User::where('type','=','installer')->count(); 
        // Customers data
        $customers = User::where('type','=','customer')->count();
        //  Today  total Quantity sale 
        $today = Order::whereDate('created_at',$ed)->get();
        //print_r($today);
        
        $today_sale = 0;
        foreach($today as $todays){
            foreach($todays->details as $orderdetails){
                $today_sale += $orderdetails->quantity;
            }
        }
        
        // Total Quantity of this year
        $month = Order::whereMonth('created_at', $month)->get();
        $monthly_sale = 0;
        foreach($month as $months){
            foreach($months->details as $orderdetails){
                $monthly_sale += $orderdetails->quantity;
            }
        }
        
        // Order of this year
        $yearly = Order::whereYear('created_at', $year)->get();        // Order Counting
        $yearly_sale = 0;
        foreach($yearly as $year){
            foreach($year->details as $yearorderdetails){
                $yearly_sale += $yearorderdetails->quantity;
            }
        }
       // echo $yearly_sale;
        $orders = Order::count();
        $varities = PrdVariety::all();
        //  The latest Orders
        $latest_orders = Order::orderBy('id', 'desc')->limit(5)->get();
         // Latees  Products 
        $latest_products = Products::orderBy('id', 'desc')->limit(5)->get();
        $product_type =   OrderDetails::whereMonth('created_at',  $month)->get();
        $prdvarieties = PrdVariety::all();
        $quantity = 0;
//$quantity_array = array();
//$variety_name = array();
        $data_array = array();
        $sales_array = array();
        foreach ($prdvarieties as $variety) {
            foreach($variety->products as $products){

                foreach($products->orderdetails as $order)
                {
                if($order->created_at>=$msd){

                    $quantity = $quantity +$order->quantity;
                }
            }
        }
        $data_array = array('name' => $variety->prd_name, 'data' => [$quantity]);
        array_push($sales_array, $data_array);
        //array_push($quantity_array,$quantity);
        //array_push($variety_name,$variety->prd_name);
        $quantity =0;

        }

        $sales_array = json_encode($sales_array);
        return view('admin/index',['installers'=>$installers,'customers'=>$customers,'orders'=>$orders ,'today_sale'=>$today_sale,'monthly_sale' =>$monthly_sale,'yearly_sale'=>$yearly_sale,'latest_orders' =>$latest_orders,'latest_products'=>$latest_products,'product_type'=>$product_type, 'sales'=>$sales_array]);
    }
    public function admin_logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('admin/login');
    }
}
