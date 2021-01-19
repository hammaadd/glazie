<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Rules\Newmatchold;
use App\Models\RequestHiring;
Use App\Models\Order;
use Illuminate\Support\Facades\Hash;
class CustomerController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        
    }
    public function editprofile(){
        
        return view('customer/editprofile');
    }
    public function updateavatar(){
        
        return view('customer/updateavatar');
    }
    public function changeavatar(Request $request){
        
        $id = Auth::user()->id;
        $validatedData = $request->validate([
            'image' => 'required|mimes:jpg,png,jpeg,gif,svg|max:5048',
    
           ]);
        $file = $request->file('image');
        $filename = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();
        $imgname = uniqid() . $filename;
        $destinationPath = public_path('/customer-image/profile');
        $file->move($destinationPath, $imgname);
        $data = array(
           'avatar' =>$imgname
        );
        User::where('id',$id)
           ->update($data);
        return redirect('customer/profile/edit')->with('status', 'Image Has been uploaded');
    
    
    }
    public function changeprofile(){
        return view('customer/changeprofile');
    }
    public function profilechange(Request $request){
        $user = Auth::user();
        $id = $user->id;
        $validatedData = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'contact_no' => 'required',
            'address' => 'required'
           ]);
        $data = array(
            'first_name'=> $request->input('first_name'),
            'last_name'=> $request->input('last_name'),
            'contact_no'=> $request->input('contact_no'),
            'address'=> $request->input('address'),
            'name'=>$request->input('first_name').$request->input('last_name')
        );
        User::where('id',$id)->update($data);
        
        return redirect('customer/profile/edit')->with('info','The profile is updated');
    }
    public function changepass(){
        return view('customer/changepass');
    }
    public function passwrdchange(Request $request){
        $validatedData = $request->validate([
            'oldpwd' => ['required',new Newmatchold],
            'newpwd' => 'required',
            'conf_password' =>'required'
        ]);
    $user = Auth::user();
        $id = $user->id;
        $data = array(
            'password'=> Hash::make($request->input('newpwd'))
            );
        User::where('id',$id)
      ->update($data);
      

      
      return redirect('customer/profile/edit')->with('info', "THe password is changed successfull");
    
    }
    public function installerlist(){
        $installer = User::where('type','=','installer')->where('status','=','1')->get();
        return view('customer/installer/installerlist' ,['installers'=>$installer]);
    }
    public function installerdetails($id){
        $installer = User::find($id);
        return view('customer/installer/installerdetails',['installer'=>$installer]);
    }
    public function hireinstaller(Request $request){
        $validatedData = $request->validate([
            'estimated_time' => 'required',
            'amount' =>'required',
            'working_details'=>'required'
        ]);
        
       
        $requesthire = new RequestHiring;
        $requesthire->estimated_time = $request->input('estimated_time');
        $requesthire->amount = $request->input('amount');
        $requesthire->installer_id = $request->input('installer_id');
        $requesthire->working_details = $request->input('working_details');
        $requesthire->customer_id = Auth::user()->id;
        $requesthire->created_by = Auth::user()->id;
        $requesthire->save();
        return redirect('customer/installer')->with('info', "The request is created Soon You will recieve mail");
    }
    public function orders(){
        $id = Auth::id();
        $orders = Order::where('customer_id','=',$id)->orderBy('created_by', 'desc')->get();
        return view('customer/orderlist' ,['orders'=>$orders]);

    }    
    public function orderdetails($id)
    {   
        $order_details = Order::find($id);
        return view('customer/order_dtails',['order' =>$order_details]);
    }
    public function requests(){
        $customer_id = Auth::id();
        $requests = RequestHiring::where('customer_id','=',$customer_id)->get();
        return view('customer/requests',['requests'=>$requests]);
    }
    public function requestsdetails($id){
        $request = RequestHiring::find($id);
        return view('customer/requestdetails',['requesthire'=>$request]);
    }
}
