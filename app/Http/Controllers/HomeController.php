<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $customerId = Auth::User()->id;
        $orders = Order::where('customer_id', $customerId)->count();
        $installers = User::where('type','=','installer')->where('login_status','activate')->count();
        return view('customer/home', ['installers'=>$installers, 'orders'=>$orders]);
    }
}
