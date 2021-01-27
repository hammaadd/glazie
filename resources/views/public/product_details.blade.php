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
            <img src="{{asset($image)}}"
            <?php $profile_image=""; ?> width="100%">
            <div class="row mt-3">
           @foreach ($product_gallery as $images)
           @if ($images->is_primary!=1)
           <div class="col-md-2 d-flex">
            <img src="{{asset($images->image)}}" alt="" width="100%">
         </div>
           @endif
           @endforeach
           @php
               $net_feedback = $g = 0;
           @endphp
            @foreach ($product->feedback as $feedback)
            @php
            if($feedback->status=="1"){
                $net_feedback +=$feedback->rating;
                $g++;
            }
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
              <button class="btn btn-success mt-3"> <i class="fas fa-shopping-cart"></i> Add to cart</button>
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
                        <textarea name="reviews"  class="form-control" rows="10"></textarea>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12">
                        <button class="btn btn-success"> <i class="fa fa-check"></i> Submit</button>
                    </div>
                </div> 
            </form>
        </div>
    </div>
  
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
