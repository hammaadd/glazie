@extends('public/layouts/layouts')
@section('title',$product->product_name)
@section('content')
<div class="container mt-3">
    <div class="row">
        <div class="col-md-6">
            
            
            <?php $product_gallery = $product->gallery;
            
                foreach ($product_gallery as $key => $prd_img) {
                    if ($prd_img->is_primary=='1') {
                        $profile_image = $prd_img->image;
                        $prdimg = $prd_img->image;
                    }
                    else{
                        $image = $prd_img->image;
                    }
                } 
                if (!$profile_image) {
                    $profile_image=$image;
                    $prdimg = $image;
                }
            ?>
            <img src="{{asset($profile_image)}}"
            <?php $profile_image=""; ?> width="100%">
            <div class="row mt-3">
           @foreach ($product_gallery as $images)
           @if ($images->is_primary!=1)
           <div class="col-md-2 d-flex">
            <img src="{{asset($images->image)}}" alt="" width="100%">
         </div>
           @endif
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
            <form action="{{url('addtocart/'.$product->id)}}" method="post">
                @csrf
            <div class="btn-group" role="group" aria-label="Basic example">
                <input type="hidden" name="product_id" value="{{$product->id}}">
                <input type="hidden" name="product_name" value="{{$product->product_name}}">
                <input type="hidden" name="price" value="{{$product->sale_price}}">        
                <input type="hidden" name="photo" value="{{$prdimg}}">
                <button type="button" class="btn btn-danger" id="minus" disabled>-</button><input type="text" name="quantity" class="text-center" id="quantity" size="1" value="1" onkeypress="return isNumberKey(event)" readonly>
                <button type="button" class="btn btn-success" id="plus" >+</button>
              </div>
              
              <br>
              <button class="btn btn-success mt-3"> <i class="fas fa-shopping-cart"></i> Add to cart</button>
            </form>
        </div>
    </div>
    
</div>
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
