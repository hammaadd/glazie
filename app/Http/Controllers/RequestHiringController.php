<?php

namespace App\Http\Controllers;
use App\Models\RequestHiring;
use App\Models\User;
use Illuminate\Http\Request;
use App\Notifications\CustomerRequest;
use App\Notifications\InstallerHire;
class RequestHiringController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index(){
        $requesthire = RequestHiring::all();
        return view('admin/requesthiring/index',['requesthires' =>$requesthire]);
    }
    public function change_hirestatus(Request $request)
    {
        $id = $request->input('id');
        $installer_id = $request->input('installer_id');
        $customer_id = $request->input('customer_id');
        $status = $request->input('status');
        $update_status = array(
            'installer_id'=>$installer_id,
            'hiring_status'=>$status
        );
        if ($status=="cancel") {
            $order_status = "Canceled Due to some Reason";
            $customer = User::find($customer_id);
            $customer->notify(new CustomerRequest($order_status));
        }
        if ($status=="inprogress") {
            $order_status = "in progree Soonyou recieved an Installer";
            $customer = User::find($customer_id);
           // $customer->notify(new CustomerRequest($order_status));
            $installer = User::find($installer_id);
            $installer_hire = " Perform that job now";
            //$installer->notify(new InstallerHire($installer_hire));
        }
      
        RequestHiring::where('id',$id)
        ->update($update_status);
     return redirect('admin/requesthiring')->with('info', 'Status is Changed');
    }
    public function hiringdetails($id){
        abort_if(!$requesthire = RequestHiring::find($id), 403);
        $users = User::where('type','=','installer')->get();
        return view('admin/requesthiring/details',['requesthire' =>$requesthire,'users'=>$users]);
    }
}
