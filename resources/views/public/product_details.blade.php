@extends('public/layouts/layouts')
@section('title',$product->product_name)
@section('content')
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
crossorigin="anonymous"></script>
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
                    <p><strike><b>{{$product->regular_price}}</b></strike></p>
                </div>
                <div class="col-md-4">
                    <p>{{$product->quantity}}</p>
                    <p>{{$product->sale_price}}</p>
                </div>
            </div>
            <div class="row mt-3 mb-4">
                <div class="col-md-12">
                    @if ($g>0)
                    <span class="text-success">{{$net_feedback/$g}} Rating</span>
                    <div class="jstars" data-value="{{$net_feedback/$g}}"></div>
                    @else 
                    <span class="text-danger">No Views Yet</span>
                    @endif
                </div>
            </div>
            <form action="{{url('addtocart/'.$product->id)}}" method="post">
                @csrf
            <div class="btn-group" role="group" aria-label="Basic example">
                <input type="hidden" name="product_id" value="{{$product->id}}">
                <input type="hidden" name="product_name" value="{{$product->product_name}}">
                <input type="hidden" name="price" value="{{$product->sale_price}}"> 
                <input type="hidden" name="regular_price" value="{{$product->regular_price}}">       
                <input type="hidden" name="photo" value="{{$image}}">
                <button type="button" class="btn btn-danger" id="minus" disabled>-</button><input type="text" name="quantity" class="text-center" id="quantity" size="1" value="1" onkeypress="return isNumberKey(event)" readonly>
                <button type="button" class="btn btn-success" id="plus" >+</button>
              </div>
              
              <br>
              <button class="btn btn-info text-light mt-3 rounded-0" id="button"> <i class="fas fa-shopping-cart"></i> Add to cart</button>
            </form>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-6">
            <h3>Product Reviews</h3>
            @if(count($errors)>0)
            @foreach($errors->all() as $error)
            <li class="text-danger">
                {{$error}}
            </li>
            @endforeach
        @endif
            <form action="{{url('feedback')}}" method="POST">
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
                    <span class="pr_flash">Sale</span>
                    <div class="product_img">
                        <a href="shop-product-detail.html">
                            <img src="{{asset('productimages/'.$image)}}" alt="Aluminium Front Door 1361 – Stainless Steel Applications in 9005 Matt with Stainless Steel hardware">
                        </a>
                        <div class="product_action_box">
                            <ul class="list_none pr_action_btn">
                                <li class="add-to-cart"><a href="#"><i class="bx bx-cart"></i> Add To Cart</a></li>
                                <li><a href="#" class="popup-ajax"><i class="bx bx-shuffle"></i></a></li>
                                <li><a href="#" class="popup-ajax"><i class="bx bx-zoom-in"></i></a></li>
                                <li><a href="#"><i class="bx bx-heart"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="product_info">
                        <h6 class="product_title text-center"><a href="{{url('productdetails/'.$related_product->id)}}">{{$related_product->product_name}}</a></h6>
                        <div class="product_price text-center">
                            <span class="price"><span class="currencySymbol">£</span>{{$related_product->sale_price}}</span>
                            <del><span class="currencySymbol">£</span>{{$related_product->regular_price}}</del>
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
   
<script>
     
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
        var quantity = parseInt($("#quantity").val());
        if (quantity>{{$product->quantity}}) {
            
        }
    })

</script>
@endsection
