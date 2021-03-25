@extends('public/layouts/layouts')
@section('title','Welcome')
@section('content')
<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
<section class="section">
    <div class="container">
        <!--Sec Title-->
        <div class="sec-title text-center pb-4">
            <div class="title-inner">
                <h2><span class="theme_color">Proudct </span> in Seconds!</h2>
                
            </div>
        </div>
        <div class="row mb-5">
            
            <div class="col-md-6 offset-md-3">
                <div class="input-group mb-3">
                    
                    <input type="text" class="form-control" aria-describedby="inputGroup-sizing-sm" placeholder="Write Something....." id="search">
                    <div class="input-group-append" >
                      <span class="input-group-text"><button class="btn btn-default btn-xs" onclick="searchresult()"><i class="fa fa-search"></i></button></span>
                    </div>
                  </div>
            </div>
            <div class="col-md-2">
                <button class="btn btn-outline-info" style="height:40px;" onclick="sort('asc')"> <i class="fas fa-sort-amount-down-alt"></i></button>
                <button class="btn btn-outline-info ml-4 float-right" style="height:40px;" onclick="sort('desc')"> <i class="fas fa-sort-amount-up"></i></button>
            </div>
        </div>
        <div class="row mb-5" id="srachresult">
            @foreach ($products as $product)
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
            
            
                <div class="col-lg-3 col-md-4 col-6">
                    <div class="product">
                        <span class="pr_flash">Sale</span>
                        <div class="product_img">
                            <a href="{{url('productdetails/'.$product->id)}}">
                                <img src="{{asset('productimages/'.$image)}}"
                            <?php $profile_image=""; ?>
                               > 
                            </a>
                            <div class="product_action_box">
                                <ul class="list_none pr_action_btn">
                                    @if ($product->type=='simple')
                                    <li class="add-to-cart"><a style="cursor: pointer" onclick="addtocart({{$product->id}})"><i class="bx bx-cart"></i> Add To Cart</a></li>
                                    @endif {{-- <li><a href="#" class="popup-ajax"><i class="bx bx-shuffle"></i></a></li>
                                    <li><a href="#" class="popup-ajax"><i class="bx bx-zoom-in"></i></a></li>
                                    <li><a href="#"><i class="bx bx-heart"></i></a></li> --}}
                                </ul>
                            </div>
                        </div>
                        <div class="product_info">
                            <h6 class="product_title text-center"><a href="{{url('productdetails/'.$product->id)}}">{{$product->product_name}}</a></h6>
                            <div class="product_price text-center">
                                <span class="price "><span class="currencySymbol">£</span>{{$product->sale_price}}</span>
                                <del><span class="currencySymbol">£</span>{{$product->regular_price}}</del>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
    @if (session('info'))
    <script type="text/javascript">toastr.success("{{session('info')}}");</script>
    @endif   
    

</div>
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
function sort(sort_type)
{
    var search = $('#search').val();
    {
    url = "{{url('sortproduct')}}";
        $.ajax({
       type:'POST',
       url:url,
       data:{
           search:search,
           sort_type:sort_type
       },
       success:function(result){ 
        $('#srachresult').html(result);
        }	
        });

}  
}
function searchresult()
{
    var search = $('#search').val();
    {
    url = "{{url('searchproduct')}}";
        $.ajax({
       type:'POST',
       url:url,
       data:{
           search:search
       },
       success:function(result){ 
        $('#srachresult').html(result);
        }	
        });

}
    
}
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
</script>

