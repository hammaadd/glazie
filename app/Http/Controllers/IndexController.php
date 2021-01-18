<?php

namespace App\Http\Controllers;
use App\Models\Products;
use App\Models\Productgallery;
use App\Models\Brands;
use App\Models\ProductCategory;
use App\Models\ProductAttribute;
use App\Models\Attribute;
use App\Models\ProductTag;
use App\Models\Countries;
use App\Models\Address;
use App\Models\Term;
use App\Models\Cart;
use App\Models\User;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Cities;
use App\Models\States;
use App\Models\Categories;
use App\Models\RequestHiring;
use Illuminate\Support\Facades\Auth;
use DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Notifications\SendPassword;

class IndexController extends Controller
{
    public function index(){
        $products = Products::where('status','=','1')->get();
       
     
        return view('public/index',['products'=>$products]);
    }
    public function product_details($id){
        $product = Products::find($id);
        return view('public/product_details',['product'=>$product]);
    }
  
    public function addtocart(Request $request,$id){
        
        $product_id = $request->input('product_id');
        $product_name = $request->input('product_name');
        $price = $request->input('price');
        $quantity =  $request->input('quantity');
        $photo =  $request->input('photo');
        
        $cart = [
        
                "product_id" =>  $product_id,
                "product_name" =>  $product_name,
                "price" =>$price,
                "quantity" => $quantity,
                "photo" => $photo
        ];

        $request->session()->push('cart', $cart);
        $cartdata = Cart::where('session_id','=',session()->getId())->where('product_id','=',$product_id)->where('status','=','1')->get();
        echo count($cartdata);
        
        if (count($cartdata)>0) {
        //    echo 
            foreach ($cartdata as $key => $cart) {}
            $update_cart = array(
                "quantity"=>$quantity +$cart->quantity,
              
            );
            Cart::where('id',$cart->id)->update($update_cart);
        }
        else{
           
        
        $carts = $request->session()->get('cart');
        $cart = new Cart;
        $cart->session_id = session()->getId();
        $cart->product_id = $product_id;
        $cart->price = $price;
        $cart->quantity = $quantity;
        $cart->save();
        $cart->id;
        } 

        return redirect('/')->with('info','The Product is add to cart successfully');


    }
    public function countproduct(){
        $count = 0;
        $session_id = session()->getId();
        $carts = Cart::where('session_id','=',$session_id)->where('status','=','1')->get();
        foreach($carts as $cart){
            $count = $cart->quantity+$count; 
        }
        echo json_encode($count);
    }
    public function productcart(){
        $session_id = session()->getId();
        $carts = Cart::where('session_id','=',$session_id)->where('status','=','1')->get();
        return view('public/productcart',['carts'=>$carts]);
    }
    public function removecartproduct(Request $request)
    {
        $id = $request->input('id');
        
        $delete_cart_prd =  array(
        
            'status'=>'0'
        );
            Cart::where('id',$id)->update($delete_cart_prd);
        $session_id = session()->getId();
        $carts = Cart::where('session_id','=',$session_id)->where('status','=','1')->get();
        return view('public/updatecart',['carts'=>$carts]);
    }
    public function updatecartproduct(Request $request)
    {
        $session_id = session()->getId();
        $quantity = $price = 0;
        $no_of_qty =$request->input('no_of_qty');
        $cart_id = $request->input('cart_id');
        $update_prd_cart =  array(
        
            'quantity'=>$no_of_qty
        );

         Cart::where('id',$cart_id)->update($update_prd_cart);
        $carts = Cart::where('session_id','=',$session_id)->where('status','=','1')->get();
        foreach ($carts as $key => $cart) {
            $price  += $cart->price*$cart->quantity;
            $quantity += $cart->quantity;
        }
        $obj = (object) array($price,$quantity);
		echo json_encode($obj);
    }
    public function checkout(){
        $session_id = session()->getId();
        $carts = Cart::where('session_id','=',$session_id)->where('status','=','1')->get();
        $countries = Countries::all();
        return view('public/checkout',['carts'=>$carts,'countries'=>$countries]);
    }
    public function checkoutsubmit(Request $request)
    {   
        
        $user = Auth::user();
        $first_name = $request->input('first_name');
        $last_name = $request->input('last_name');
        $email = $request->input('email');
        $address = $request->input('address');
        $country = $request->input('country');
        $contact_no = $request->input('contact_no');
        $shipcountry = $request->input('shipcountry');
        $shipstate = $request->input('shipstate');
        $shipcity = $request->input('shipcity');
        $shipaddress = $request->input('shipaddress'); 
        $password = rand(10000000,99999999);

        $name = $first_name."".$last_name;
        $user_type = "customer";
        $statess =States::where('name','=',$request->input('state'))->where('country_id','=',$country)->first();
        $users = User::where('email','=',$email)->first();
        if (!empty($users)) {
            $user_id = $users->id;
    }    
        else{
        // Inserting user data
        $user = new User;
        $user->first_name = $first_name;
        $user->last_name = $last_name;
        $user->name = $name;
        $user->email=$email;
        $user->password = Hash::make($password);
        $user->contact_no = $contact_no;
        $user->address = $address;
        $user->type=$user_type;
        $user->status='1';
        $user->avatar="defaultimg.png";
        $user->save();
        $user_id = $user->id;
        
        //$user->notify(new SendPassword($password));


    }
        // state Data
        
       if (!empty($statess)) {
        if ( $statess->id) {
            $state_id =$statess->id;
        }
       }
        else{
            $state = new States;
            $state->name = $request->input('state');
            $state->country_id = $country;
            $state->save();
            $state_id = $state->id;
        }
      
        
       if (($request->input('checkshipadd')=='1') && !empty($request->input('shipstate'))) {
        $shipstatess =States::where('name','=',$request->input('state'))->where('country_id','=',$country)->first();
           if (!empty($shipstatess)) {
            if ($shipstatess->id) {
                $shipstate_id = $shipstatess->id;
            }
           }
           else{
            $shipstate = new States;
            $shipstate->name = $request->input('shipstate');
            $shipstate->country_id = $country;
            $shipstate->save();
            $shipstate_id = $shipstate->id;
           }
       }
       if (($request->input('checkshipadd')=='1') && !empty($request->input('shipcity'))) {
        $shipcities =Cities::where('name','=',$request->input('shipcity'))->where('state_id','=',$state_id)->first();
          if (!empty($shipcities)) {
                if ($shipcities->id) {
                    $shipcity_id = $shipcities->id;
                }
            }
            else{
            $shipcity = new Cities;
            $shipcity->name = $request->input('shipcity');
            $shipcity->state_id = $state_id;
            $shipcity->save();
            $shipcity_id = $shipcity->id;
           }
        

       }
       $cities =Cities::where('name','=',$request->input('city_name'))->where('state_id','=',$state_id)->first();
          if (!empty($cities)) {
                if ($cities->id) {
                    $city_id = $cities->id;
                }
            }
            else{
        $city = new Cities;
        $city->name = $request->input('city_name');
        $city->state_id = $state_id;
        $city->save();
        $city_id = $city->id;
        }
        $addresss = new Address;
        $addresss->customer_id =$user_id;
        $addresss->country_id= $request->input('country');
        $addresss->state_id= $state_id;
        $addresss->city_id = $city_id;
        $addresss->postcode = $request->input('post_code');
        $addresss->address = $request->input('address');
        $addresss->address_type = 'billing';
        $addresss->created_by = $user_id;
        $addresss->save();
        if ($request->input('checkshipadd')=='1') {
            $shipaddress = new Address;
            $shipaddress->customer_id =$user_id;
            $shipaddress->country_id= $request->input('shipcountry');
            $shipaddress->state_id= $shipstate_id;
            $shipaddress->city_id = $shipcity_id;
            $shipaddress->postcode = $request->input('shippost_code');
            $shipaddress->address = $request->input('shipaddress');
            $shipaddress->address_type = 'shipping';
            $shipaddress->created_by = $user_id;
            $shipaddress->save();   
        }
        else{
            $shipaddress = new Address;
            $shipaddress->customer_id =$user_id;
            $shipaddress->country_id= $request->input('country');
            $shipaddress->state_id= $state_id;
            $shipaddress->city_id = $city_id;
            $shipaddress->postcode =  $request->input('post_code');
            $shipaddress->address =  $request->input('address');
            $shipaddress->address_type = 'shipping';
            $shipaddress->created_by = $user_id;
            $shipaddress->save();  
        }
        $net_total=0;
        $discount = 0;
        $total_amount=0;
        $session_id = session()->getId();
        $carts = Cart::where('session_id','=',$session_id)->where('status','=','1')->get();
        foreach ($carts as $key => $cart) {
            $total_amount += $cart->quantity*$cart->product->sale_price;
        }
        $net_total = $total_amount-$discount;
        $order = new Order;
        $order->customer_id =$user_id;
        $order->total_amount =$total_amount;
        $order->discount =$discount;
        $order->net_total =$net_total;
        $order->status = 'pending';        
        $order->created_by = $user_id;
        $order->save();
        
    
    foreach ($carts as $key => $cart) {
       $orderdetails = new OrderDetails;
       $orderdetails->order_id = $order->id;
       $orderdetails->product_id = $cart->product_id;
       $orderdetails->quantity = $cart->quantity;
       $orderdetails->price = $cart->quantity*$cart->product->sale_price;
       $orderdetails->created_by = $user_id;
       $orderdetails->save();
       
    }
    $request->session()->regenerate();
    return redirect('/')->with('info','Order Is created successfull Soon You Recived Email  ');
    
    }
    public function installerlist(){
        $installers = User::where('status','=','1')->where('type','=','installer')->inRandomOrder()->limit(6)->get();
        return view('public/installerlist',['installers'=>$installers]);
    }
    public function installerdetails($id)
    {
        $installer = User::find($id);
        return view('public/installerdetails',['installer'=>$installer]);
    }
    public function hirerequest(Request $request)
    {
        $validatedData = $request->validate([
           'first_name'=>'required',
           'last_name'=>'required',
           'email'=>['required', 'unique:users', 'max:255'],
           'estimated_time'=>'required',
           'amount' =>'required',
           'contact_no'=>'required',
           'address'=>'required',
           
    
           ]);
        
   
        
        $user = new User;
        $user->first_name = $request->input('first_name');
        $user->last_name =  $request->input('last_name');
        $user->email = $request->input('email');
        $user->password = Hash::make('admin123');
        $user->address = $request->input('address');
        $user->contact_no = $request->input('contact_no');
        $user->name = $request->input('first_name')."".$request->input('last_name');
        $user->status = "1";
        $user->type="customer";
        $user->save();
    
        $requesthiring = new RequestHiring;
        $requesthiring->working_details = $request->input('working_details');
        $requesthiring->installer_id = $request->input('installer_id');
        $requesthiring->amount = $request->input('amount');
        $requesthiring->estimated_time = $request->input('estimated_time');
        $requesthiring->customer_id = $user->id;
        $requesthiring->save();
        
        
        return redirect('installerlist')->with('info','Your Request is created Soon you recieve mail Soon');
    }
    public function get_installer(Request $request)
    {
        $installer = $request->input('installer');
        $installers = User::where('status','=','1')->where('name','like', '%'.$installer.'%')->where('type','=','installer')->get();
        return view('public/get_installer',['installers'=>$installers]);
    }
    
}
