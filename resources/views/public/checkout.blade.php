@extends('public/layouts/layouts')
@section('title','Check Out')
@section('content')
<link rel="stylesheet" href="{{asset('assets2/vendors/animate/animate.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets2/vendors/bootstrap/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets2/vendors/owlcarousel/css/owlcarousel.min.css')}}">
	<!-- <link rel="stylesheet" href="{{asset('assets2/vendors/fontawesome/css/all.min.css')}}-->
	<link rel="stylesheet" href="{{asset('assets2/vendors/boxicons/css/boxicons.min.css')}}">
	<link rel="preconnect" href="{{asset('https://fonts.gstatic.com')}}">
	<link rel="stylesheet" href="{{asset('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Roboto:wght@300;400;500;700&display=swap')}}">
	<link rel="stylesheet" href="{{asset('assets2/css/style.css')}}">
	<script src="https://kit.fontawesome.com/94dd3c1954.js" crossorigin="anonymous"></script>
    <div class="main_content">
        <div class="checkout-area py-5">
            <div class="container">
                <form action="{{url('checkoutsubmit')}}" method="post" id="chekcoutform">
                    @csrf
                    <div class="row">
                        @php
                        
                            $price=$quantity=$regular_price =$discount=$price1 = 0;
                            foreach ($carts as $key => $cart) {
                                $quantity+=$cart->quantity;
                                $regular_price +=$cart->quantity*$cart->regular_price;
                                $price +=$cart->quantity*$cart->price; 
                                $price1 +=$cart->quantity*$cart->price; 
                                
                            }
                        
                            if($coupendata){
                            if($coupendata->discount_type=="amount")
                            {
                                $price1 = $price-$coupendata->discount;
                                $discount = $coupendata->discount;
                            }
                            else{
                                $price1 = $price-$price*$coupendata->discount/100;
                                $discount = $price*$coupendata->discount/100;
                            }
                            
                        }
                            
                        @endphp
                        
                        <div class="col-lg-7">
                            <div class="billing-info-wrap">
                                <h3>Billing Details</h3>
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="billing-info mb-20">
                                            <label for="">First Name</label>
                                            <input type="text" class="form-control rounded-0" name="first_name" placeholder="First Name">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="billing-info mb-20">
                                            <label for="">Last Name</label>
                                            <input type="text" class="form-control" name="last_name" placeholder="Last Name">
                                        </div>
                                    </div>
                                   
                                    <div class="col-lg-12">
                                        <div class="billing-select mb-20">
                                            <label for="">Country Name</label>
                                            <select name="country"  class="form-control">
                                                <option value="" disabled selected>select Country</option>
                                                @foreach ($countries as $country)
                                                    <option value="{{$country->id}}">{{$country->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="billing-info mb-20">
                                            <label>Street Address</label>
                                            <input type="text" class="form-control" name="address" placeholder="House No Street No ">
                                            
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="billing-info mb-20">
                                            <label for="">City</label>
                                            <input type="text" class="form-control" name="city_name" >
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="billing-info mb-20">
                                            <label for="">State </label>
                                            <input type="text" class="form-control" id="tags" name="state">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="billing-info mb-20">
                                            <label for="">Post Code</label>
                                            <input type="text" class="form-control" name="post_code" placeholder="Post Code">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="billing-info mb-20">
                                            <label for="">Phone</label>
                                            <input type="text" class="form-control" name="contact_no" placeholder="Phone ">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="billing-info mb-20">
                                            <label for="">Email </label>
                                            <input type="email" class="form-control" name="email" placeholder="Email Address">
                                        </div>
                                    </div>
                                </div>
                                
                                     <input type="checkbox" id="diff_address_check" name="checkshipadd" value="1">  SHIP TO A DIFFERENT ADDRESS?
                               
                                <div id="diff_address" style="display: none" >
               
                                    <div class="row mb-20">  
                                        <div class="col-md-12">
                                            <label for="">Country Name</label><br>
                                            <select name="shipcountry"  class="form-control w-100">
                                                <option value="" disabled selected>select Country</option>
                                                @foreach ($countries as $country)
                                                    <option value="{{$country->id}}">{{$country->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-20">
                                        <div class="col-md-6">
                                            <label for="">State </label>
                                            <input type="text" class="form-control"  name="shipstate" placeholder="Ship State ">
                        
                                        </div>
                                          
                                    
                                        <div class="col-md-6">
                                            <label for="">City</label>
                                            <input type="text" class="form-control" name="shipcity" placeholder="City Name">
                                        </div>
                                    </div>
                                    <div class="row mb-20">
                                    
                                        
                                        <div class="col-md-6 ">
                                            <label for="">Post Code</label>
                                            <input type="text" class="form-control" name="shippost_code" placeholder="Post Code">
                        
                                        </div>
                                   
                                        <div class="col-md-6">
                                            <label for="">Address </label>
                                            <input type="text" class="form-control" name="shipaddress" placeholder="House No Street No " >
                                            <input type="hidden" id="paidamount">
                                            
                                        </div>
                                        
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="your-order-area">
                                <h3>Your order</h3>
                                <div class="your-order-wrap gray-bg-4">
                                    <div class="your-order-product-info">
                                        <div class="your-order-top">
                                            <ul>
                                                <li>Product</li>
                                                <li>Total</li>
                                            </ul>
                                        </div>
                                        <div class="your-order-middle">
                                            <ul>
                                                @foreach ($carts as $cart)
                                                    
                                               
                                                <li><span class="order-middle-left">{{$cart->product->product_name}}  X  {{$cart->quantity}}</span> <span class="order-price">&#163;{{$cart->price*$cart->quantity}} </span></li>
                                                @endforeach 
                                            </ul>
                                        </div>
                                        <div class="your-order-bottom">
                                            <ul>
                                                <li class="your-order-shipping">Shipping Cost</li>
                                                <li>&#163;{{$shipprice+$service->price}}</li>
                                            </ul>
                                        </div>
                                        <div class="your-order-bottom mt-3">
                                            <ul>    
                                                <li class="your-order-shipping">Discount</li>
                                                <li>&#163;{{$discount}}</li>
                                            </ul>
                                        </div>
                                        <div class="your-order-total">
                                            <ul>
                                                <li class="order-total">Total</li>
                                                <li>&#163;{{$price1 + $shipprice+$service->price}}</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="payment-method">
                                        <div class="payment-accordion element-mrg">
                                            <div class="panel-group" id="accordion">
                                                <div class="panel payment-accordion">
                                                    <div class="panel-heading" id="method-one">
                                                        <h4 class="panel-title">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="radioPayment" id="radioCOD" checked>
                                                                <label class="form-check-label" for="radioCOD">
                                                                  Cash On Delivery
                                                                </label>
                                                              </div>
                                                              {{-- <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="radioPayment" id="radioCard" >
                                                                <label class="form-check-label" for="radioCard">
                                                                 Pay using Credit Card
                                                                </label>
                                                              </div>                                           --}}
                                                        </h4>
                                                    </div>
                                                    <div id="method1" class="panel-collapse collapse show">
                                                        <div class="panel-body">
                                                            <p>Please send a check to Store Name, Store Street, Store Town, Store State / County, Store Postcode.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="Place-order mt-25">
                                    <button class="btn btn-fill-out theme_bgcolor2 text-white px-4 rounded-0 mt-3 float-end" href="#">Place Order</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        
    </div>
    @endsection
@section('script')
@section('script')

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

<script src="{{ url('admin-assets/vendors/jquery-validation/jquery.validate.min.js')}}"></script>
    <script>
  
  

    $(document).ready(function(){
        $('#countries').select2();
        });
        $(document).ready(function(){
        $('#shipcountries').select2();
        });
        
        $(document).ready(function(){
            $("#diff_address_check").click(function(){
                if($('#diff_address_check').prop("checked") == true){
                    $('#diff_address').show();
                    $("#chekcoutform").validate({
                    ignore: ':hidden:not(:checkbox)',
                    errorElement: 'label',
                    errorClass: 'is-invalid',
                    validClass: 'is-valid',
                    rules: {
                        first_name: {
                            required: true
                        },
                        last_name: {
                            required: true
                            
                        },
                        email: {
                            required:true
                        },
                        contact_no:{
                            required:true
                        },
                        country:{
                            required:true
                        }
                        ,
                        state:{
                            required:true
                        },
                        city_name:{
                            required:true
                        },
                        address:{
                            required:true
                        },
                        post_code: {
                            required:true
                        },
                        

                    }
                });

                }
                else{
                    $('#diff_address').hide();
                }
                    
                
            });
        });
        $("#chekcoutform").validate({
    ignore: ':hidden:not(:checkbox)',
    errorElement: 'label',
    errorClass: 'is-invalid',
    validClass: 'is-valid',
    rules: {
        first_name: {
            required: true
        },
        last_name: {
            required: true
            
        },
        email: {
            required:true
        },
        contact_no:{
            required:true
        },
        country:{
            required:true
        }
        ,
        state:{
            required:true
        },
        city_name:{
            required:true
        },
        address:{
            required:true
        },
        post_code: {
            required:true
        },
        shipcountry:{
            required:true
        },
        shipstate:{
            required:true
        },
        shipcity:{
            required:true
        },
        shipaddress:{
            required:true
        },
        shippost_code: {
            required:true
        },
        radioPayment:{
            required:true
        }
      


    }
});

  

</script>
@endsection

@endsection