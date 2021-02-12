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
use Validator;
use App\Models\Coupen;
use App\Models\Term;
use App\Models\ProductReviews;
use App\Models\Cart;
use App\Models\User;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Cities;
use App\Models\States; 
use App\Models\Notification;
use App\Models\Categories;
use App\Models\RequestHiring;
use Illuminate\Support\Facades\Auth;
use App\Models\ContentManagementSystem;
use DB;
use Session;
use App\Models\ContactUs;
use App\Models\Subscribe;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Notifications\SendPassword;

class IndexController extends Controller
{
    public function index(){
        $brands = Brands::all();
        $categories = Categories::all();
       
     
        return view('public/index',['brands'=>$brands,'categories'=>$categories]);
    }
    public function availproducts(){
        $products = Products::all();
        
        return view('public/availproducts',['products'=>$products]);
    } 
    public function product_details($id){
        abort_if(! $product = Products::find($id),403);
        $product_type = $product->product_type;
        //echo $product_type;
        $products = Products::where('product_type','=',$product_type)->get();
            return view('public/product_details',['product'=>$product,'related_products'=>$products]);
        
    }
  
    public function addtocart(Request $request,$id){
        
        $product_id = $request->input('product_id');
        $product_name = $request->input('product_name');
        $price = $request->input('price');
        $quantity =  $request->input('quantity');
        $photo =  $request->input('photo');
        $regular_price = $request->input('regular_price');
        
        $cart = [
        
                "product_id" =>  $product_id,
                "product_name" =>  $product_name,
                "price" =>$price,
                'regular_price' => $regular_price,
                "quantity" => $quantity,
                "photo" => $photo
        ];

        $request->session()->push('cart', $cart);
        $cartdata = Cart::where('session_id','=',session()->getId())->where('product_id','=',$product_id)->get();
        echo count($cartdata);
        
        if (count($cartdata)>0) {
       
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
        $cart->regular_price = $regular_price;
        $cart->quantity = $quantity;
        $cart->save();
        $cart->id;
        } 

        return redirect('/')->with('info','The Product is add to cart successfully');


    }
    public function countproduct(){
        $count = 0;
        $session_id = session()->getId();
        $carts = Cart::where('session_id','=',$session_id)->get();
        foreach($carts as $cart){
            $count = $cart->quantity+$count; 
        }
        echo json_encode($count);
    }
    public function productcart(){
        $session_id = session()->getId();
        $carts = Cart::where('session_id','=',$session_id)->get();
        return view('public/productcart',['carts'=>$carts]);
    }
    public function removecartproduct(Request $request)
    {
        $id = $request->input('id');
        
        
            Cart::where('id',$id)->delete();
        $session_id = session()->getId();
        $carts = Cart::where('session_id','=',$session_id)->get();
        return view('public/updatecart',['carts'=>$carts]);
    }
    public function updatecartproduct(Request $request)
    {
        $session_id = session()->getId();
        $quantity = $price= $regular_price = 0;
        $no_of_qty =$request->input('no_of_qty');
        $cart_id = $request->input('cart_id');
        $update_prd_cart =  array(
            'quantity'=>$no_of_qty
        );
         Cart::where('id',$cart_id)->update($update_prd_cart);
        $carts = Cart::where('session_id','=',$session_id)->get();
        foreach ($carts as $key => $cart) {
            $price  += $cart->price*$cart->quantity;
            $regular_price  += $cart->regular_price*$cart->quantity;
            $quantity += $cart->quantity;
            
        }
        $obj = (object) array($price,$quantity,$regular_price);
		echo json_encode($obj);
    }
    public function checkout(){
        $session_id = session()->getId();
        $carts = Cart::where('session_id','=',$session_id)->get();
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
        $net_total1 = 0;
        $session_id = session()->getId();
        $carts = Cart::where('session_id','=',$session_id)->get();
        foreach ($carts as $key => $cart) {
            $total_amount += $cart->quantity*$cart->product->regular_price;
            $net_total += $cart->quantity*$cart->product->sale_price;
        }
        $coupenid =  Session::get('coupunid');
       
        $coupendata = Coupen::find($coupenid);
        
       if (isset($coupendata)) {
        
         if ($coupendata->discount_type=="amount") {
             $net_total =  $net_total-$coupendata->discount;
         }
         else{
             $net_total = $net_total-$net_total*$coupendata->discount/100;
         }
         $updatecoupen = array(
            'status'=>'used',
            'usedamount'=>$coupendata->discount
        );
        Coupen::where('id',$coupenid)->update($updatecoupen);
        
       }
      
       
        
        $discount = $total_amount - $net_total; 

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
       $products = Products::find($cart->product_id);
       $prdquantity = $products->quantity-$cart->quantity;
       
       $updateprdqty = array(
           'quantity'=>$prdquantity
       );
       Products::where('id',$cart->product_id)->update($updateprdqty);
       
    }
    
    $notify =new Notification;
    $notify->name = "New Order ";
    $notify->message ="New Order of Products is received";
    $notify->type = "Subscription";
    $notify->link = "admin/orderconfirm";
    $notify->save(); 

    $request->session()->regenerate();
    $request->session()->put('coupunid',null);
    return redirect('/')->with('info','Order Is created successfull Soon You Recived Email  ');
    
    }
    public function installerlist(){
        $installers = User::where('type','=','installer')->inRandomOrder()->limit(6)->get();
        return view('public/installerlist',['installers'=>$installers]);
    }
    public function installerdetails($id)
    {
        abort_if(!$installer = User::find($id),403);
       
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
        
        $user->type="customer";
        $user->save();
    
        $requesthiring = new RequestHiring;
        $requesthiring->working_details = $request->input('working_details');
        $requesthiring->installer_id = $request->input('installer_id');
        $requesthiring->amount = $request->input('amount');
        $requesthiring->estimated_time = $request->input('estimated_time');
        $requesthiring->customer_id = $user->id;
        $requesthiring->save();

        $notify =new Notification;
        $notify->name = "New Installer Request ";
        $notify->message ="Request of the installer for hiring is received ";
        $notify->type = "Subscription";
        $notify->link = "admin/requesthiring";
        $notify->save();
        
        return redirect('installerlist')->with('info','Your Request is created Soon you recieve mail Soon');
    }
    public function get_installer(Request $request)
    {
        $installer = $request->input('installer');
        $installers = User::where('name','like', '%'.$installer.'%')->where('type','=','installer')->get();
        return view('public/get_installer',['installers'=>$installers]);
    }
    public function subscribe(Request $request){
        $validatedData = $request->validate([
            'email'=>['unique:subscribes', 'max:255']    
            ]);
         
        $subscribe = new Subscribe;
        $subscribe->email = $request->input('email');
        $subscribe->save();
        $notify =new Notification;
        $notify->name = "New SubScription";
        $notify->message =$request->input('email')."subscribed successfully";
        $notify->type = "Subscription";
        $notify->link = "admin/subscription";
        $notify->save(); 
        return redirect('/')->with('info','Thank You for Your Subscription');
    }
    public function feedback(Request $request){
        //print_r($_POST);
        $validatedData = $request->validate([
            'rating'=>'required',
            'name'=>'required',
            'email'=>'required',
                
            ]);
        $product_review = new ProductReviews; 
        $product_review->rating =$request->input('rating'); 
        $product_review->products_id = $request->input('product_id');
        
        $product_review->name =$request->input('name'); 
        $product_review->email =$request->input('email'); 
        $product_review->reviews =$request->input('reviews');
        $product_review->save();

        $notify =new Notification;
        $notify->name = "Product Rating";
        $notify->message =$request->input('email')."rated the product";
        $notify->type = "Product Rating";
        $notify->link = "admin/products/view/".$request->input('product_id');
        $notify->save(); 
        return redirect('/')->with('info','Thank You for Your Feedback');
    }
    public function navlink(){
        $links = ContentManagementSystem::where('publish','=','1')->get();
        return view('public/navlinks',['links'=>$links]);
    }
    public function cmspage($id)
    {
        $cmss = ContentManagementSystem::where('slug','=',$id)->get();
        foreach($cmss as $cms)

        {}
        if (isset($cms)) {
            return view('public/cmspage',['cms'=>$cms]);     
        }
        else{
            abort(403);
        }
        
       
    }
    public function installerbyamount(Request $request)
    {
        $installer = $request->input('installer');
         $sortype = $request->input('sortype');
         $installers  = DB::table('users')
         ->join('install_infos', 'install_infos.installer_id', '=', 'users.id')
         ->select('users.*')
         ->where('users.name','like', '%'.$installer.'%')->where('type','=','installer')
         ->orderBy('install_infos.recharge', $sortype)->get();
       
        return view('public/get_installer',['installers'=>$installers]);
    }
    public function contactus()
    {
        return view('public/contact_us');
    }
    public function contactsubmit(Request $request){
        $validatedData = $request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'message'=>'required',
            ]);
        $contact_us = new ContactUs;
        $contact_us->name=$request->input('name');
        $contact_us->email=$request->input('email');
        $contact_us->message=$request->input('message');
        $contact_us->save();

        $notify =new Notification;
        $notify->name = "New User Message";
        $notify->message ="New User sent message ";
        $notify->type = "message";
        $notify->link = "admin/usermessage";
        $notify->save();

 return redirect('/')->with('info','Your Message is received Soon You will receive email');
    
    }
    public function checkcoupen(Request $request)
    {
        $coupen = $request->input('coupen');
        $coupen_amount = Coupen::where('coupen_code','=',$coupen)->where('status','=','unuse')->get();
        if(count($coupen_amount)>0){
            foreach($coupen_amount  as $coupens){

            }
            if($coupens->discount_type=="percentage"){
                $discount = $coupens->discount-$coupens->usedamount.",p";
                $request->session()->put('coupunid', $coupens->id);
                
                echo $coupens->discount-$coupens->usedamount.",p";
            }
            else{
                $discount = $coupens->discount;
                $request->session()->put('coupunid', $coupens->id);
                
                echo $coupens->discount;
                
            }
        }else{
            $request->session()->put('coupunid',null);
            echo 0;
            
        }
    }
}
