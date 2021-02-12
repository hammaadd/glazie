<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Order;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class AdmincustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index(){
        $customers = User::where('type','=','customer')->get();
        return view('admin/customers/index',['customers'=>$customers]);
    }
    public function add(){
        return view('admin/customers/create');
    }
    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'contact_no' => 'required',
            'login_status' =>'required',
           
            'image' => 'mimes:jpg,png,jpeg,gif,svg|max:5048',
        ]);
        $customer = new User;
        
        $customer->first_name = $request->input('first_name');
        $customer->last_name = $request->input('last_name');
        $customer->email = $request->input('email');
        $customer->password = Hash::make($request->input('password'));
        $customer->contact_no = $request->input('contact_no');
        $customer->address = $request->input('address');
        $customer->type = 'customer';
        $customer->name = $request->input('first_name').''.$request->input('last_name');
        $customer->login_status = $request->input('login_status');
        if($request->file('image')){
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            
            $destinationPath = public_path('/customersprofile');
            $imgname = uniqid() . $filename;
            $file->move($destinationPath, $imgname);
            $customer->avatar= $imgname;
        }
        $customer->save();
        return redirect('admin/customers')->with('info','The customer is created');
    }
    public function edit($id)
    {
        abort_if(!$customer  =  User::find($id),403);
      
        return view('admin/customers/edit',['customer'=>$customer]);
      
    }
    public function update($id,Request $request)
    {
        $validatedData = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'contact_no' => 'required',
            'login_status' =>'required',
           
            'image' => 'mimes:jpg,png,jpeg,gif,svg|max:5048',
        ]);
        
        $update_customer = array(
        'first_name' => $request->input('first_name'),
        'last_name' => $request->input('last_name'),
        'email' => $request->input('email'),
        'password' => Hash::make($request->input('password')),
        'contact_no' => $request->input('contact_no'),
        'address' => $request->input('address'),
        'type' => 'customer',
        'name' => $request->input('first_name').''.$request->input('last_name'),
        'login_status' => $request->input('login_status')
        );
        User::where('id',$id)->update($update_customer);
        if($request->file('image')){
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            
            $destinationPath = public_path('/customersprofile');
            $imgname = uniqid() . $filename;
            $file->move($destinationPath, $imgname);
            $avatar = array(
                'avatar' =>$imgname 
            );                
                User::where('id',$id)->update($avatar);
        
                
        }
        return redirect('admin/customers')->with('info','The customer is updated');
       
    }
    public function delete($id){
                        
            User::where('id',$id)->delete();
            return redirect('admin/customers')->with('info','The customer is deleted');
    }
    
    public function deactivate($id){
        $status = array(
            'login_status' =>"deactivate" 
        );                
            User::where('id',$id)->update($status);
            return redirect('admin/customers')->with('info','The customer is De Activated');
    }
    public function details($id)
    {
        abort_if(!$customer  =  User::find($id),403);
       
        return view('admin/customers/details',['user'=>$customer]);
     
    }
    public function changepassword($id){
        return view('admin/customers/changepassword',['id'=>$id]);
    }
    public function orderdetails($id){
        abort_if(! $order = Order::find($id),403);    
        return view('admin/customers/orderdetails',['order'=>$order]);
    }
}
