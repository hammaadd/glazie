@extends('public/layouts/layouts')
@section('title','Product Cart')
@section('content')
<link rel="stylesheet" href="{{asset('assets2/vendors/animate/animate.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets2/vendors/bootstrap/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets2/vendors/owlcarousel/css/owlcarousel.min.css')}}">
	<!-- <link rel="stylesheet" href="{{asset('assets2/vendors/fontawesome/css/all.min.css')}}-->
	<link rel="stylesheet" href="{{asset('assets2/vendors/boxicons/css/boxicons.min.css')}}">
	{{-- <link rel="preconnect" href="{{asset('https://fonts.gstatic.com')}}"> --}}
	<link rel="stylesheet" href="{{asset('assets2/css2.css')}}">
	<link rel="stylesheet" href="{{asset('assets2/css/style.css')}}">
	<script src="{{asset('assets2/font.js')}}" crossorigin="anonymous"></script>
    <style>
        li{
            list-style-type:none;
        }
    </style>
<div class="container" id="abc">
    <h3 class="cart-page-title">Shopping Cart</h3>
    @if ((Session::get('wish')))
    
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
        
                <div class="table-content table-responsive cart-table-content" id="tabledata">
                    <table class="table-bordered">
                        <thead>
                            <tr>
                                <th>Sr #</th>
                                <th>Image</th>
                                
                                <th>Product Name </th>
                                
                                <th>Price</th>
                    
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                   @php
                        $wishlist =    Session::get('wish');
                   @endphp
                        @foreach ($wishlist as $key => $wish)
                            <tr>
                                <td class="product-thumbnail cart-list">{{$loop->iteration}}</td>
                                <td class="product-thumbnail cart-list"><img src="{{asset('productimages/'.$wish['image'])}}" alt=""></td>
                                   
                                <td>{{$wish['prd_name']}}</td>
                                <td>£ {{$wish['price']}}</td>
                                <td>
                                    <a href="{{url('productdetails/'.$wish['id'])}}" class="btn btn-fill-out btn-xs px-4 py-2 rounded-0"> <i class="fa fa-eye "></i> Details</a>
                                    {{-- <button class="btn btn-fill-out rounded-0 px-4 py-2" onclick="removeprd({{$key}})"> Remove</button></td> --}}
                            </tr>
                           @endforeach
                           
                        </tbody>
                    </table>
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
             //console.log(cart_id);
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
                    console.log(result);
                 var jsonResult = JSON.parse(result.substring(result.indexOf('{'), result.indexOf('}')+1));
                        var variation_data = 0;
                        variation_data = $('#variation_price'+cart_id).val();
                        if(variation_data == null || variation_data=="")
                        {
                            variation_data=0; 
                        }
                        console.log(variation_data);
                         var item_result = parseInt($('#itemquantity'+cart_id).val())*parseInt(no_of_qty)+ parseInt(variation_data)*parseInt(no_of_qty);
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
                    console.log(paidamount);
                    $('#net_total').val(paidamount);
                    

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
                    $('#net_total').val(paidamount);
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
function removeprd(index)
{
    url = "{{url('removewishprd')}}";
    $.ajax({
           type:'POST',
           url:url,
           data:{
              index:index
           },
           success:function(result){ 
            
           }
    });
}
     </script>
  
@endsection
