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
use App\models\Variation;
use Validator;
use App\Models\Coupen;
use App\Models\Term;
use App\Models\ProductReviews;
use App\Models\Cart;
use App\Models\CartDetails;
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
use App\Models\ProductTerm;
use App\Models\Slider;
use App\Models\DeliveryTime;
use Session;
use App\Models\Blog;
use App\Models\SiteSetting;
use App\Models\ContactUs;
use App\Models\Subscribe;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\InstallQuote;
use App\Mail\InstallerQuote;
use Mail;
use App\Models\WeightSlot;
use App\Notifications\SendPassword;
use App\Mail\HiringRequests;
use App\Mail\OrderMail;
use App\Models\AddOn;

class IndexController extends Controller
{
    public function index(){
        $brands = Brands::all();
        $categories = Categories::all();
        $sliders = Slider::all();
     
        return view('public/index',['brands'=>$brands,'categories'=>$categories,'sliders'=>$sliders]);
    }
    public function availproducts(){
        $products = Products::where('publish','=','public')->get();
        return view('public/availproducts',['products'=>$products]);
    } 
    public function searchproduct(Request $request)
    {
        $search = $request->input('search');
        $products =Products::where('product_name','like', '%'.$search.'%')->where('publish','=','public')->get();
        return view('public/searchproducts',['products'=>$products]);
    }
    public function sortproduct(Request $request)
    {
        $search = $request->input('search');
        $sort_type = $request->input('sort_type');
        $products =Products::where('product_name','like', '%'.$search.'%')->where('publish','=','public')->orderBy('sale_price',$sort_type)->get();
        return view('public/searchproducts',['products'=>$products]); 
    }

    public function product_details($id){
        abort_if(! $product = Products::find($id),403);
        $product_type = $product->verity_id;
        $dataarray =array();
        $attrbute_array = array();
        $prodcutattribute = ProductAttribute::where('product_id','=',$id)->get();
        foreach ($prodcutattribute as $key => $prdattr) {
            $attribute_id = $prdattr->attribute;
            //print_r($prdattr->attribute->id);

           array_push($attrbute_array,$attribute_id->attribute_name);
            $result = ProductTerm::where('product_id','=',$id)->where('attribute_id','=',$attribute_id->id)->get();
           

            array_push($dataarray,$result);
            }
           
        $products = Products::where('verity_id','=',$product_type)->get();
            return view('public/product_details',['product'=>$product,'related_products'=>$products,'dataarray'=>$dataarray,'id'=>$id,'attrbute_array'=>$attrbute_array]);
        
    }
  
    public function addtocart(Request $request,$id){
        $variant_id = $request->input('variant_id');
        $product_id = $request->input('product_id');
        $product_name = $request->input('product_name');
        $price = $request->input('price');
        $quantity =  $request->input('quantity');
        $photo =  $request->input('photo');
        $regular_price = $request->input('regular_price');
        $product_data = Products::find($product_id);
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
        if(count($cartdata)>0)
        {
            foreach($cartdata as $cart){}
            
            if($product_data->type=='variable')
            {
                if($cart->cartdetails)
                {
                   $cartdetails =  $cart->cartdetails;
                   if($cartdetails->type_id==$variant_id)
                   {
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
                    $cartdetails = new CartDetails;
                    $cartdetails->cart_id = $cart->id;
                    $cartdetails->type_id =$variant_id;
                    $variant_data = Variation::find($variant_id);
                    $cartdetails->price = $variant_data->price;
                    $cartdetails->save(); 
                   }
                }
            }
            else{
                $update_cart = array(
                    "quantity"=>$quantity +$cart->quantity,
                  
                );
                Cart::where('id',$cart->id)->update($update_cart);
            }
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
           
            if($product_data->type=='variable'){
                $cartdetails = new CartDetails;
                $cartdetails->cart_id = $cart->id;
                $cartdetails->type_id =$variant_id;
                $variant_data = Variation::find($variant_id);
                $cartdetails->price = $variant_data->price;
                $cartdetails->save();
                }
            }
       
            return redirect('/availproducts')->with('info','The Product is add to cart successfully');
    }
    public function prdaddtocart(Request $request)
    {
        
        
        $product_id = $request->input('id');
        $products  = Products::find($product_id);
        $product_name = $products->product_name;
        $price = $products->sale_price;
        $quantity = 1;
        $photo =  "";
        $regular_price = $products->regular_price;
        
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
        //echo count($cartdata);
        
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
        
        } 
        $count = 0;
        $session_id = session()->getId();
        $carts = Cart::where('session_id','=',$session_id)->get();
        foreach($carts as $cart){
            $count = $cart->quantity+$count; 
        }
        echo json_encode($count);


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
        $times = DeliveryTime::all();
        return view('public/productcart',['carts'=>$carts,'times'=>$times]);
    }
    public function removecartproduct(Request $request)
    {
        $id = $request->input('id');
        
        
            Cart::where('id',$id)->delete();
        $session_id = session()->getId();
        $carts = Cart::where('session_id','=',$session_id)->get();
        $times = DeliveryTime::all();
        return view('public/updatecart',['carts'=>$carts,'times'=>$times]);
    }
    public function checkservice(Request $request)
    {
        $i = $request->input('i');
        $request->session()->put('service',$i);
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
        foreach($carts as $key => $cart)
        {
            if($cart->product->type=='variable')
            {
                $price += $cart->cartdetails->price*$cart->quantity;
            }
        }
        $obj = (object) array($price,$quantity,$regular_price);
		echo json_encode($obj);
    }
    public function clearcart(Request $request)
    {
        $request->session()->regenerate();
        return redirect('/availproducts')->with('info','Your Cart is empty');
    }
    public function checkout(Request $request){
        $session_id = session()->getId();
        $carts = Cart::where('session_id','=',$session_id)->get();
        $countries = Countries::all();
        $shipprice = 0;
        $service = Session::get('service');
        
        
      
        $servicedata = DeliveryTime::find($service);
       // print_r($servicedata);
        
        $coupenid =  Session::get('coupunid');
       
       
       foreach($carts as $cart)
       {
        $weight = $cart->product->weight;
        $prices = WeightSlot::where('min_weight','<=',$weight)->where('max_weight','>=',$weight)->get();
        foreach($prices as $price)
        {
           $weight_price =  $price->price; 
        }
        $totalprice = $weight_price*$cart->quantity;
        $shipprice+=$totalprice;
        $totalprice=0;
       }
       $request->session()->put('shipprice',$shipprice);
       $request->session()->put('servicedata',$servicedata);
       
        $coupendata = Coupen::find($coupenid);
        return view('public/checkout',['carts'=>$carts,'countries'=>$countries,'coupendata'=>$coupendata,'service'=>$servicedata,'shipprice'=>$shipprice]);
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
            
            $total_amount += $cart->quantity*$cart->product->sale_price;
        }
        $coupenid =  Session::get('coupunid');
        
      Session::get('servicedata');
        Session::get('shipprice');
       
        
       if (isset($coupenid)) {
        $coupendata = Coupen::find($coupenid);
         if ($coupendata->discount_type=="amount") {
             $discount =  $coupendata->discount;
         }
         else{
             $discount = $total_amount*$coupendata->discount/100;
         }
         if ($coupendata->limiteduser=='yes') {
             $updatecoupen = array(
                 'no_of_user'=>$coupendata->no_of_user-1
             );
             Coupen::where('id',$coupenid)->update($updatecoupen);
         }
        
        
       }
      
       
        
        
        
        $order = new Order;
        $order->delivery_id = 1;
        $order->customer_id =$user_id;
        $order->total_amount =$total_amount;
        $order->shipp_cost = Session::get('shipprice')+Session::get('servicedata')->price;
        $order->discount =$discount;
        $order->net_total =$total_amount+Session::get('shipprice')+Session::get('servicedata')->price-$discount;
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
    $request->session()->put('shipprice',null);
    $request->session()->put('servicedata',null);
    $username = User::find($user_id)->name;
    $details = array(
        'name' =>$username,
        'email'=>User::find($user_id)->email,       
        'address'=>$request->input('address'),
        'message'=>'New Order Of the products is recieved from this email address'.$request->input('email')
    );
    $data = SiteSetting::where('key','=','ordermail')->get();
        foreach($data as $datas)
        {

        }
        $mail =  $datas->value;
       

       // Mail::to($mail)->send(new OrderMail($details));
    
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
           'email'=>'required', 
           'estimated_time'=>'required',
           'amount' =>'required',
           'contact_no'=>'required',
           'address'=>'required',
           
    
           ]);
        
   
        
        $requesthiring = new RequestHiring;
        
        $requesthiring->email = $request->input('email');
        $requesthiring->postcode = $request->input('postcode');
        $requesthiring->address = $request->input('address');
        $requesthiring->contact_no = $request->input('contact_no');
        $requesthiring->name = $request->input('first_name')." ".$request->input('last_name');
        $requesthiring->working_details = $request->input('working_details');
        $requesthiring->installer_id = $request->input('installer_id');
        $requesthiring->amount = $request->input('amount');
        $requesthiring->estimated_time = $request->input('estimated_time');
       
        $requesthiring->save();

        $notify =new Notification;
        $notify->name = "New Installer Request ";
        $notify->message ="Request of the installer for hiring is received ";
        $notify->type = "Subscription";
        $notify->link = "admin/requesthiring";
        $notify->save();
        $installer_mail = User::find($requesthiring->installer_id)->email;
      
       
        $details = array(
            'name' =>$requesthiring->name,
            'email'=>$request->input('email'),
            'amount'=>$request->input('amount'),
            'estimated_time'=>$request->input('estimated_time'),
            'address'=>$request->input('address'),
            'workingdetails'=>$request->input('working_details')
        );
       // Mail::to($installer_mail)->send(new HiringRequests($details));
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
           if($cms->publish=="1")
           {
             return view('public/cmspage',['cms'=>$cms]);  
           }   
           else{
            abort(404);
           }
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
        $details = array(
            'name' =>$request->input('name'),
            'email'=>$request->input('email'),
            'message'=>$request->input('message')
        );
        $data = SiteSetting::where('key','=','inquirymail')->get();
        foreach($data as $datas)
        {

        }
        $mail =  $datas->value;
       

        //Mail::to($mail)->send(new InstallerQuote($details));

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
        $date = date('Y-m-d');
        $coupen = $request->input('coupen');
        $coupen_amount = Coupen::where('coupen_code','=',$coupen)->where('status','=','unuse')->get();
        if(count($coupen_amount)>0){
            foreach($coupen_amount  as $coupens){

            }
            if($coupens->limiteduser=="yes" && $coupens->no_of_user==0) {
                echo 'limit Cros';
            }
             else if($coupens->limited_time=="yes" && $coupens->last_date<=$date) {
                echo 'date expire';
            }
            else{
                if($coupens->discount_type=="percentage"){
                    $coupens->discount.",p";
                    $request->session()->put('coupunid', $coupens->id);
                    
                    echo $coupens->discount.",p";
                }
                else{
                    $discount = $coupens->discount;
                    $request->session()->put('coupunid', $coupens->id);
                    
                    echo $coupens->discount.",a";
                    
                }
            }
        }
        else{
            echo 'invalid Copun';
        }
    }
    public function quoteforinstaller(Request $request){
        $validatedData = $request->validate([
            'name'=>'required',
            'email'=>'required',
            'message'=>'required',
            ]);
        $quote = new InstallQuote;
        $quote->installer_id = $request->input('installer_id');
        $quote->name = $request->input('name');
        $quote->email = $request->input('email');
        $quote->message = $request->input('message');
        $quote->save();
        $installer_data = User::find($request->input('installer_id'));
        $installeremail = $installer_data->email;
        
        $details = array(
            'name' =>$request->input('name'),
            'email'=>$request->input('email'),
            'message'=>$request->input('message')
        );
        //Mail::to($installeremail)->send(new InstallerQuote($details));
        $notify =new Notification;
        $notify->name = "Message for installer";
        $notify->message ="User's Message for Installer ";
        $notify->type = "Question";
        $notify->link = ".";
        $notify->save();
        
        return redirect('installerlist')->with('info','Your Request is created Soon you recieve mail Soon');
  
    }
    public function getmail(){
       
        $datas = SiteSetting::where('key','=','admin_email')->orWhere('key','admin_phone')->get();
        
        return $datas;
    }
    public function blogpost(){
        $blogs = Blog::where('publish','public')->get();
        return view('public/blogpost',['blogs'=>$blogs]);
    }
    public function blogdetails($id)
    {
        $blogs = Blog::where('slug','=',$id)->get();
        foreach ($blogs as  $blog) {
         
        }
        return view('public/blogdetails',['blog'=>$blog]);
    }
    
    public function chceckvariation(Request $request)
    {
        $id=0;
        $exist = array();
        $newarray = array();
        $result = array();
        $abc = array();
       $variation = $request->input('variation');  
       $product_id = $request->input('product_id');
       $attribute_length  =$request->input('attribute_length');
       $term_id_array = $request->input('term_id_array');
       $variations = Variation::where('product_id','=',$product_id)->get();
       // echo count($variations);
       if(count($variations)>0)
       {
           foreach($variations as $variation)
           {
            $newarray = array();
              foreach($variation->variationdetails as $variationdetails){
                array_push($newarray,$variationdetails->prd_term_id);
              }     
              $result=array_diff($term_id_array,$newarray); 
              if(!$result){
                $id=1;
                $price =  $variation->price;
                $variant_id =  $variation->id;
                $data = array();
                array_push($data,$variant_id);
                array_push($data,$price);
              }    
              
                
           }
           if($id==1)
           {
              echo json_encode($data);
           }
           else{
               echo "notexist";
           }    
       }
       else{
        echo "notexist";
       }
    }
    public function composite(Request $request)
    {
          $brands = Brands::all();
        $categories = Categories::all();
        $sliders = Slider::all();
        $prdcatgories = Categories::where('cat_name','like', '%composite%')->get();
        //return view('public/index',['brands'=>$brands,'categories'=>$categories,'sliders'=>$sliders]);
    return view('public/composite_door',['brands'=>$brands,'categories'=>$categories,'sliders'=>$sliders,'prdcatgories'=>$prdcatgories]);
    }
    public function alumenium(Request $request)
    {
          $brands = Brands::all();
        $categories = Categories::all();
        $sliders = Slider::all();
        $prdcatgories = Categories::where('cat_name','like', '%alumenium%')->get();
       
    return view('public/alumenium_door',['brands'=>$brands,'categories'=>$categories,'sliders'=>$sliders,'prdcatgories'=>$prdcatgories]);
    }
}
