@extends('public/layouts/layouts')
@section('title',$product->product_name)
@section('content')

<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>

<script src="{{asset('admin-assets/js/rating.js')}}"></script>
<link href='http://fonts.googleapis.com/css?family=Roboto+Condensed' rel='stylesheet' type='text/css'>

<script src="{{asset('admin-assets/js/jstars.js')}}"></script>

<div class="container mt-3">
    <div class="row">
        <div class="col-md-6">
            
            
            <?php $product_gallery = $product->gallery;
                 $i=0;
        foreach ($product->gallery as $key => $value) {
           if ($value->is_primary=="1") {
               $image = $value->image;
               $i=1;
           }

       }
       if ($i==0) {
           $image = $value->image;
       }
            ?>
            <img src="{{asset('productimages/'.$image)}}"
            <?php $profile_image=""; ?> width="100%">
            <div class="row mt-3">
           @foreach ($product_gallery as $images)
           @if ($images->is_primary!=1)
           <div class="col-md-2 d-flex">
            <img src="{{asset('productimages/'.$images->image)}}" alt="" width="100%">
         </div>
           @endif
           @endforeach
           @php
               $net_feedback = $g = 0;
           @endphp
            @foreach ($product->feedback as $feedback)
            @php
          
                $net_feedback +=$feedback->rating;
                $g++;
            
            //echo $net_feedback;
        @endphp
            @endforeach
              
           
        </div>
        </div>
        <div class="col-md-6">
            <h2>{{$product->product_name}}</h2>
            <p>{{$product->short_description}}</p>
            <div class="row">
                <div class="col-md-2">
                    <p><b>Quantity:</b></p>
                   @if ($product->sale_price)
                   <p><strike><b>{{$product->regular_price}}</b></strike></p>
                    @else
                    <p><b>{{$product->regular_price}}</b></p>
                    <input type="hidden" id="sale_price" value="{{$product->sale_price}}">
                   @endif
                </div>
                <div class="col-md-4">
                    <p>{{$product->quantity}}</p>
                    @if ($product->sale_price)
                    <p>{{$product->sale_price}}</p>
                    @endif
                </div>
            </div>
            @php
                $j=0;
            @endphp
            <div class="row mt-3 mb-4">
                <div class="col-md-12">
                    @if ($g>0)
                    <span class="text-success">{{$net_feedback/$g}} Rating</span>
                    <div class="jstars" data-value="{{$net_feedback/$g}}"></div>
                    @else 
                    <div class="jstars" data-value="0.1"></div>
                    @endif
                </div>
                @if($product->sale_price)
                @php
                    $price = $product->sale_price;
                @endphp
                @else
                @php
                    $price = $product->regular_price;
                @endphp
                @endif
            </div>
           @if($product->quantity>0)
            <form action="{{url('addtocart/'.$product->id)}}" method="post">
                @csrf
                <div class="btn-group" role="group" aria-label="Basic example">
                    <input type="hidden" name="product_id" value="{{$product->id}}">
                    <input type="hidden" name="product_name" value="{{$product->product_name}}">
                    <input type="hidden" name="price" value="{{$price}}"> 
                    <input type="hidden" name="regular_price" value="{{$product->regular_price}}">       
                    <input type="hidden" name="photo" value="{{$image}}">    
                </div>
            @php
              
          @endphp
          @if ($product->type=="variable")
              @if (count($attrbute_array)>0)
               
                @for($i=0;$i<count($attrbute_array);$i++)
                <div class="row mt-3">
                    <div class="col-md-6">
                        <label for="">{{$attrbute_array[$i]}}</label>
                        @php
                            $j=$i+1;
                        @endphp
                        <select name="terms[]" required id="variation{{$j}}" class="form-control" onchange="checkvariation({{$j}})">
                            <option value="">Select {{$attrbute_array[$i]}}</option>
                            @foreach ($dataarray[$i] as $terms)
                                <option value="{{$terms->id}}">{{$terms->term->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>   
               
            @endfor
            @endif 
              @endif   
                <div class="row mt-3">
                    <div class="col-md-2">
                            <input type="number" name="quantity" class="text-center form-control-lg rounded-0" id="quantity" min="1" max="{{$product->quantity}}" value="1" onkeypress="return isNumberKey(event)" >
                    </div>
                </div>
                @if ($product->type=="variable")
               @if (count($attrbute_array)>0)
               <div class="row">
                <div class="col-md-6">
                    <label for="">Price</label>
                    <input type="hidden" id="variant_id" name="variant_id">
                    <input type="text" class="form-control rounded-0" id="variationprice" readonly>
                </div>
            </div>
               @endif
                <div class="row mt-3">
                    <div class="col-md-12">
                        <span class="text-danger font-weight-bold" id="message"></span>
                    </div>
                </div>
                @endif
                <div class="row">
                    <div class="col-md-6">
                    <button class="btn btn-info text-light mt-3 rounded-0 btn-block" id="submitcartbutton"> <i class="fas fa-shopping-cart"></i> Add to cart</button>
                    </div>
                </div>
            </form>
            @else
            <span class="text-danger font-weight-bold" >Out Of Stock</span>
            @endif
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-6">
           
            @if(count($errors)>0)
            @foreach($errors->all() as $error)
            <li class="text-danger">
                {{$error}}
            </li>
            @endforeach
        @endif
        @php
            $id = Auth::user();
           $i=1; 
        @endphp
        @if($id)
            @foreach ($id->orders as $order)
                @foreach ($order->details as $orderdetails)
                @if($product->id == $orderdetails->product_id)
                @php
                    $i=2;
                @endphp
                @endif
                @endforeach
            @endforeach
            @if($i==2)
            <form action="{{url('feedback')}}" method="POST">
                <h3>Product Reviews</h3>
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <label for="">Rating</label>
                        <div id="halfstarsReview"></div>
                        <input type="hidden" readonly id="halfstarsInput" class="form-control form-control-sm" name="rating" value="">
                        <input type="hidden" name="product_id" value="{{$product->id}}">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label for="">Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Enter Name">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label for="">Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Enter Email Address">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label for="">Reviews</label>
                        <textarea name="reviews"  class="form-control" rows="10" placeholder="Enter Your Reivews"></textarea>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-info rounded-0 mb-3 text-light" id="button" name="submit" value="Submit"><i class="fa fa-check"></i> Submit</button>
                    </div>
                </div> 
            </form>
            @endif
            @endif
        </div>
    </div>
    <section class="section product-section">
        <div class="title-box">
            <div class="container">
                <!--Sec Title-->
                <div class="sec-title text-center">
                    <div class="title-inner">
                        <h2>Related <span class="theme_color">Products</span></h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="lower-section">
            <div class="lower-inner-section">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="brand-carousel owl-carousel">
                                @foreach ($related_products as $related_product)
                                <?php $product_gallery = $related_product->gallery;
                                $i=0;
                                foreach ($related_product->gallery as $key => $value) {
                                if ($value->is_primary=="1") {
                                    $image = $value->image;
                                    $i=1;
                                }
                            
                            }
                            if ($i==0) {
                                $image = $value->image;
                            }
                                ?>
            
                                    <div class="item">
                                        <div class="product">
                                            @if($related_product->sale_price)
                                            <span class="pr_flash">Sale</span>
                                            @endif
                                            <div class="product_img">
                                                <a href="shop-product-detail.html">
                                                    <img src="{{asset('productimages/'.$image)}}" alt="Aluminium Front Door 1361 – Stainless Steel Applications in 9005 Matt with Stainless Steel hardware">
                                                </a>
                                                <div class="product_action_box">
                                                    <ul class="list_none pr_action_btn">
                                                        {{-- <li class="add-to-cart"><a style="cursor: pointer;" onclick="addtocart({{$related_product->id}})" title="Add to cart the prodcut"><i class="bx bx-cart"></i> Add To Cart</a></li> --}}
                                                        {{-- <li><a href="#" class="popup-ajax"><i class="bx bx-shuffle"></i></a></li>
                                                        <li><a href="#" class="popup-ajax"><i class="bx bx-zoom-in"></i></a></li>--}}
                                                        @if(!empty(Auth::id()))
                                                            <li><a  title="Add to wish list" onclick="addtowishlist({{$product->id}},'{{$image}}')"><i class="bx bx-heart" ></i></a></li> 
                                                        @endif
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product_info">
                                                <h6 class="product_title text-center"><a href="{{url('productdetails/'.$related_product->id)}}">{{$related_product->product_name}}</a></h6>
                                                <div class="product_price text-center">
                                                    
                                                  @if($related_product->sale_price)
                                                    <span class="price "><span class="currencySymbol">£</span>{{$related_product->sale_price}}</span>
                                                    <del><span class="currencySymbol">£</span>{{$related_product->regular_price}}</del>
                                                    @else
                                                    <span class="currencySymbol">£ {{$related_product->regular_price}} </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                </div>
                                    
            
            
                                
                            @endforeach
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
  
</div>
<script>
    $("#halfstarsReview").rating({
        "half": true,
        
        "click": function (e) {
            console.log(e);
            $("#halfstarsInput").val(e.stars);
        }
    });
</script>
@endsection
@section('script')
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
    toastr.options = {
    "closeButton": true,
    "debug": false,
    "newestOnTop": false,
    "progressBar": true,
    "positionClass": "toast-top-right",
    "preventDuplicates": true,
    "onclick": null,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "5000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
}

     
    function isNumberKey(evt)
       {
          var charCode = (evt.which) ? evt.which : evt.keyCode;
          if (charCode != 46 && charCode > 31 
            && (charCode < 48 || charCode > 57))
             return false;

          return true;
       }
    $(document).ready(function(){
        $('#plus').click(function(){
            var quantity = $('#quantity').val();
            
            check = parseInt(quantity)+1;
            $('#minus').prop('disabled', false);
            if(check=={{$product->quantity}}){
                $('#plus').prop('disabled', true);
            }
            else{
                $('#plus').prop('disabled', false);
            }
            $('#quantity').val(check);
        });
        $('#minus').click(function(){
            var quantity = $('#quantity').val();
            $('#plus').prop('disabled', false);
            check = parseInt(quantity)-1;
            if(check=='1'){
                $('#minus').prop('disabled', true);
            }
            else{
                $('#minus').prop('disabled', false);
            }
            $('#quantity').val(check);
        });
    });
    $("#quantity").on('input',function(){
       var quantity = $('#quantity').val();
       if(quantity==null || quantity=='')
       {
        $('#quantity').val(1);
       }
    })

    function addtocart(id)
{
    url = "{{url('prdaddtocart')}}";
        $.ajax({
       type:'POST',
       url:url,
       data:{
           id:id
       },
       success:function(result){ 

        toastr.success("Prodcut Add to cart Successfully");
       
       if(result>0)
       {
        $('#cart_items').html(result);
        $('#cart_items').show();
        
       }
       else{
        $('#cart_items').hide();
       }
        
        }	
        });
    
}
let idarray = Array();
let term_id_array = Array();
function checkvariation(i)
    {
        let k=-1; 
        var variation = $('#variation'+i).val();
        var product_id = {{$product->id}};
        var attribute_length = {{$j}};
        for (let j = 0; j < idarray.length; j++) {
            if(i==idarray[j])
            {
                k=j;
            }

            
        }
        if(k==-1){
           idarray.push(i);
           term_id_array.push(variation); 
        }
        else{
            term_id_array[k] = variation;
            idarray[k]= i;
        }

        //console.log(term_id_array);
        if(term_id_array.length==attribute_length){
        $.ajaxSetup({
				headers:{'X-CSRF-Token':'{{csrf_token()}}'}
            });
            url = "{{url('checkvariation')}}";
            //console.log(url);
            $.ajax({
           type:'POST',
           url:url,
            data:{
                 
                product_id:product_id,
                attribute_length:attribute_length,
                term_id_array:term_id_array

           },
           success:function(result){
               console.log(result);
            if(result=="notexist"){
                $('#variationprice').val("");
                $('#submitcartbutton').prop('disabled',true);
                $('#message').html("<i class='fa fa-times-circle'></i><b> The Combination You selected is not available</b>");
            }
            else{
                var result = JSON.parse(result);
                $('#variant_id').val(result[0]);
                var sale_price = $('#sale_price').val();
                if(sale_price==null || sale_price==''){
                  var sale_price ={{$product->regular_price}};
                }
                console.log(parseInt(result[1]));
                var net_sale_price = parseInt(sale_price) + parseInt(result[1]);
                console.log(sale_price);
                $('#variationprice').val(net_sale_price);
                $('#submitcartbutton').prop('disabled',false);
                $('#message').html("");
            }
           }
            });
        }
    }
</script>
@endsection
