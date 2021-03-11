@extends('public/layouts/layouts')
@section('title','Product Cart')
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
<div class="container" id="abc">
    <h3 class="cart-page-title">Shopping Cart</h3>
    @if (count($carts))
    
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
        
                <div class="table-content table-responsive cart-table-content" id="tabledata">
                    <table class="table-bordered">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Product Name</th>
                                <th>Unit Price</th>
                                <th>Qty</th>
                                <th>Subtotal</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                    $quantity =$price = $net_discount = $net_regular_price= 0;
                @endphp
                @foreach ($carts as $cart)
                @php
                        $products = $cart->product;
                        $i=0;
                        $prdimgs = $products->gallery;
                        foreach ($prdimgs as $key => $prdimg) {
                            if ($prdimg->is_primary=='1') {
                                $image = $prdimg->image;
                                $i=1;
                            }
                            
                        } 
                        if ($i!=1) {
                            $image = $prdimg->image;
                        }
                        $quantity+= $cart->quantity;
                        $price += $cart->price*$cart->quantity;
                        $net_regular_price += $cart->regular_price*$cart->quantity;
                    @endphp
                            <tr>
                                <td class="product-thumbnail cart-list">
                                    <input type="hidden" id="regular_price{{$cart->id}}" value="{{$products->regular_price}}">
                            <input type="hidden" id="itemquantity{{$cart->id}}" value="{{$cart->price}}">
                                    <a href="#"><img src="{{asset('productimages/'.$image)}}" alt=""></a>
                                </td>
                                <td class="product-name text-center"><a href="#">{{$products->product_name}}</a></td>
                                <td class="product-price-cart"><span class="amount">&#163;{{$cart->price}}</span></td>
                                <td class="product-quantity">
                                    <div class="cart-plus-minus">
                                        <div class="dec qtybutton" onclick="removeqty({{$cart->id}})">-</div>
                                        <input class="cart-plus-minus-box" type="text" name="qtybutton" value="{{$cart->quantity}}"  oninput="update_qty({{$cart->id}})" id="no_of_qty{{$cart->id}}" onkeypress="return (event.charCode >= 48 && event.charCode <= 57)">
                                        <div class="inc qtybutton" onclick="addqty({{$cart->id}})">+</div>
                                    </div>
                                </td>
                                <td class="product-subtotal" id="item_total_price{{$cart->id}}" >&#163; {{$cart->price*$cart->quantity}}</td>
                                <td class="product-remove">
                                    {{-- <a href="#"><i class="fa fa-pencil"></i></a> --}}
                                    <a style="cursor: pointer;" onclick="remove({{$cart->id}})"><i class="fa fa-times"></i></a>
                               </td>
                            </tr>
                           @endforeach
                           
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="cart-shiping-update-wrapper">
                            <div class="cart-shiping-update">
                                <a class="btn btn-fill-out theme_bgcolor2 text-white px-4 rounded-0" href="{{url('availproducts')}}">{{}} Continue Shopping</a>
                            </div>
                            <div class="cart-clear">
                                {{-- <button class="btn btn-fill-out theme_bgcolor2 text-white px-4 rounded-0 mx-3">Update Shopping Cart</button> --}}
                                <a class="btn btn-fill-out theme_bgcolor2 text-white px-4 rounded-0" href="{{url('clearcart')}}" >Clear Shopping Cart</a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="discount-code-wrapper">
                        <div class="title-wrap">
                           <h4 class="cart-bottom-title section-bg-gray">Use Coupon Code</h4> 
                        </div>
                        <div class="discount-code">
                            <p>Enter your coupon code if you have one.</p>
                            
                                <input type="text" required="" name="name" id="coupen" class="form-control">
                                
                                <span class="text-success text-center mb-2" style="display: none" id="discountmessage"></span>
                                <span class="text-danger text-center mb-2" style="display: none" id="coupenmessage"></span> <br>
                                <button class="btn btn-fill-out theme_bgcolor2 text-white px-4 rounded-0 float-end" onclick="checkcoupen()" type="button">Apply Coupon</button>
                            
                        </div>
                    </div>
                    <input type="hidden" id="net_total" value="{{$price}}">
                </div>
                {{-- <div class="col-lg-4 col-md-6">
                    <div class="cart-tax">
                        <div class="title-wrap">
                            <h4 class="cart-bottom-title section-bg-gray">Estimate Shipping And Tax</h4>
                        </div>
                        
                        <div class="tax-wrapper">
                            <p>Enter your destination to get a shipping estimate.</p>
                            <div class="tax-select-wrapper">
                                <div class="tax-select">
                                    <label>
                                        * Region / State
                                    </label>
                                    <input type="text">
                                </div>
                                <div class="tax-select">
                                    <label>
                                        * Zip/Postal Code
                                    </label>
                                    <input type="text">
                                </div>
                                <button class="btn btn-fill-out theme_bgcolor2 text-white px-4 rounded-0 float-end" type="submit">Get A Quote</button>
                            </div>
                        </div>
                    </div>
                </div> --}}
                
                <div class="col-lg-6 col-md-12">
                    <div class="grand-totall">
                        <div class="title-wrap">
                            <h4 class="cart-bottom-title section-bg-gary-cart">Cart Total</h4>
                        </div>
                        <h5>Total products <span id="total_price">&#163;{{$price}}</span></h5>
                        <h5 style="display: none" id="disrow" >Discount <span  id="discount"></span></h5>
                        <div class="total-shipping">
                            <h5>Total shipping</h5>
                            <ul>
                                @foreach ($times as $time)
                                <li><input type="radio" name="delivery_id" @if ($time->price==0)
                                    checked
                                @endif onclick="checkprice({{$time->id}},{{$time->price}})"> {{$time->name}} <span>&#163;{{$time->price}}</span></li>
                                @if($time->price==0)
                                <input type="hidden" id="checkprice" value="{{$time->id}}">
                                <input type="hidden" id="pricevalue" value="{{$time->price}}">
                                @endif
                                @endforeach
                                <input type="hidden" id="discountt" value="0">
                            </ul>
                        </div>
                        <h4 class="grand-totall-title" >Grand Total  <span id="grand_total">&#163;{{$price}}</span></h4>
                        <a class="btn btn-fill-out theme_bgcolor2 text-white px-4 rounded-0 float-end w-100" href="{{url('checkout')}}">Proceed to Checkout</a>
                    </div>
                </div>
                <input type="hidden" id="paidamount" value="{{$price}}">
            </div>
        </div>
    </div>
    @else 
    <h3 class="mb-3">Your Cart is empty <a class="btn btn-fill-out theme_bgcolor2 text-white px-4 rounded-0 " href="{{url('availproducts')}}"><i class="fa fa-backward"></i> Go Back </a></h3>
    @endif
</div>
@endsection
@section('script')
<script src="{{asset('assets2/js/jquery.min.js')}}"></script>
	<script src="{{asset('assets2/vendors/bootstrap/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('assets2/vendors/owlcarousel/js/owlcarousel.min.js')}}"></script>
	<script src="{{asset('assets2/vendors/videopopup/js/videopopup.js')}}"></script>
	<script src="{{asset('assets2/js/script.js')}}"></script>
    <script>
        let paidamount;
        function removeqty(id)
        {
            var qty = $('#no_of_qty'+id).val();
            if(qty==1){

            }
            else{
                qty = parseInt(qty)-1;
                $('#no_of_qty'+id).val(qty);
                update_qty(id);
            }
        }
        function addqty(id)
        {
            var qty = $('#no_of_qty'+id).val();
            
                qty = parseInt(qty)+1;
                $('#no_of_qty'+id).val(qty);
                update_qty(id);
            
        }
        function remove(id)
         {
             if (confirm('Are you sure ?')==true) {
                 $.ajaxSetup({
                     headers:{'X-CSRF-Token':'{{csrf_token()}}'}
                 });
                 url = "{{url('removecartproduct')}}";
                 $.ajax({
                type:'POST',
                data:{
                    id:id
                },
                url:url,
                success:function(result){
                     $("#abc").html(result);
                     var removedqty = $('#no_of_qty'+id).val();
                     if (parseInt($('#quantity').val())!=0) {
                             $('#cart_items').show();
                             $('#cart_items').html($('#quantity').val());
                         }
                         else{
                             $('#cart_items').hide();
                         }
                     }
                            
                        
                 });
             }
         }
         function update_qty(cart_id){
             var no_of_qty = $('#no_of_qty'+cart_id).val();
             console.log(cart_id);
             $.ajaxSetup({
                     headers:{'X-CSRF-Token':'{{csrf_token()}}'}
                 });
                 url = "{{url('updatecartproduct')}}";
                 $.ajax({
                type:'POST',
                data:{
                 no_of_qty:no_of_qty,
                 cart_id:cart_id
                 
                },
                url:url,
                success:function(result){
                 var jsonResult = JSON.parse(result.substring(result.indexOf('{'), result.indexOf('}')+1));
                         var item_result = parseInt($('#itemquantity'+cart_id).val())*parseInt(no_of_qty);
                         $('#item_total_price'+cart_id).html("&#163;"+item_result);
                         
                         $('#total_qty').html(jsonResult[1]);
                         $('#total_price').html("&#163;"+jsonResult[0]);
                         $('#grand_total').html("&#163;"+jsonResult[0]);
                         $('#paidamount').val(jsonResult[0]);
                         $('#cart_items').html(jsonResult[1]);
                         $("#net_total").val(jsonResult[0]);
                         $('#net_regular_price').html(jsonResult[2]);
                         var regular_price = parseInt($('#regular_price'+cart_id).val())*parseInt(no_of_qty);
                         $('#regular_prices'+cart_id).html(regular_price);
                         discount = regular_price -item_result; 
                         $('#discounts'+cart_id).html(discount);
                         var net_discount = parseInt(jsonResult[2])-parseInt(jsonResult[0])
                         $('#net_discounts').html(net_discount);
                     }
                        
                 });
             
         }
     
         function checkcoupen()
{

    var coupen = $('#coupen').val();
    if(coupen){
        url = "{{url('checkcoupen')}}";
            $.ajax({
           type:'POST',
           url:url,
           data:{
               coupen:coupen
           },
           success:function(result){ 

               console.log(result);
            if(result=='invalid Copun'){
                $('#coupenmessage').html("Invalid Coupen");
                $('#grand_total').html("&#163;"+$("#net_total").val());
                $('#coupenmessage').show();
                $('#discountmessage').hide();
                $('#paidrow').hide();
                $('#disrow').hide();
                $('#discountt').val(0)
            }
            else if(result=="limit Cros"){
                $('#coupenmessage').html('The Token is expired');
                $('#coupenmessage').show();
                $('#discountmessage').hide();
                $('#paidrow').hide();
                $('#disrow').hide();
            }
            else if(result=="date expire"){
                $('#coupenmessage').html('The Token is expired');
                $('#coupenmessage').show();
                $('#discountmessage').hide();
                $('#paidrow').hide();
                $('#disrow').hide();
            }
            else{
                var res = result.split(",");
                if(res[1]=='a'){
                    $('#coupenmessage').hide();
                    $('#discountmessage').show();
                    $('#discountmessage').html("You got the discount of "+res[0]);
                    net_total = parseInt($('#net_total').val());
                    console.log(net_total);
                    paidamount = net_total-res[0];
                    $('#paidrow').show();
                    $('#discount').html("&#163;"+res[0]);
                    $('#discountt').val(res[0]);
                    $('#disrow').show();
                    $('#grand_total').html("&#163;"+paidamount);
                    $('#paidamount').val(paidamount);
                    
                    

                }
                else{
                    $('#coupenmessage').hide();
                    $('#discountmessage').show();
                    $('#discountmessage').html("You got the discount of "+res[0]+"%");
                    var net_total = $('#net_total').val();
                    net_total = parseInt(net_total);
                    paidamount = net_total-net_total*res[0]/100;
                    discount = net_total*res[0]/100;
                    
                    $('#disrow').show();
                    $('#discount').html("&#163;"+discount);
                    $('#discountt').val(discount);
                    $('#paidrow').show();
                    $('#grand_total').html("&#163;"+paidamount);

                }
            }
            //$('#dropdownlink').html(result);
       
            }	
            });
    }
}
function checkprice(i,j)
{
    
    url = "{{url('checkservice')}}";
    $.ajax({
           type:'POST',
           url:url,
           data:{
               i:i
           },
           success:function(result){ 
             var grand =  parseInt($('#paidamount').val())+ parseInt(j)-$('#discountt').val(); 
             console.log($('#paidamount').val());
             $('#grand_total').html("&#163;"+grand);
           }
    });
}
$(document).ready(function(){
    var i = $('#checkprice').val();
    var j = $('#pricevalue').val();
    url = "{{url('checkservice')}}";
    $.ajax({
           type:'POST',
           url:url,
           data:{
               i:i
           },
           success:function(result){ 
             var grand =  parseInt($('#paidamount').val()) +  parseInt(j); 
                 
             
             $('#grand_total').html("&#163;"+grand);
           }
    });
})
     </script>
  
@endsection
