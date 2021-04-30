@extends('public/layouts/layouts')
@section('title','Welcome')
@section('content')

<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
<section class="section" id="section">
    <div class="container">
        <!--Sec Title-->
        <div class="sec-title text-center pb-4">
            <div class="title-inner">
                <h2><span class="theme_color">Proudct </span> in Seconds!</h2>
                
            </div>
        </div>
        <div class="row mb-5 " id="">
            
            <div class="col-md-6 offset-md-3">
                <form action="{{url('searchproduct')}}" method="GET">
                <div class="input-group mb-3">
                  
                    <input type="text" class="form-control" aria-describedby="inputGroup-sizing-sm" placeholder="Write Something....." name="search" value="{{$search}}">
                    <div class="input-group-append" >
                      <span class="input-group-text"><button class="btn btn-default btn-xs" ><i class="fa fa-search"></i></button></span>
                    </div>
                
                  </div>
                </form>
            </div>
            <div class="col-md-2">
                <form class="d-inline-block mx-2" action="{{url('sortproduct')}}" method="GET">
                    <input type="hidden" name="sort_type" value="asc">
                    <input type="hidden" name="search" value="{{$search}}">
                    <button class="btn btn-outline-info" style="height:40px;" title="Price Low to high "> <i class="fas fa-sort-amount-down-alt"></i></button>
                </form>
               
                <form action="{{url('sortproduct')}}" class="d-inline-block mx-2">
                    <input type="hidden" name="sort_type" value="desc">
                    <input type="hidden" name="search" value="{{$search}}">
                    
                    <button class="btn btn-outline-info btn-block" style="height:40px;" title="Price High to Low"> <i class="fas fa-sort-amount-down"></i></button>
                </form>
            </div>
        </div>
        <div id="section">
        <div class="row mb-5" id="">
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
                        @if($product->sale_price)
                        <span class="pr_flash">Sale</span>
                        @endif
                        <div class="product_img">
                            <a href="{{url('productdetails/'.$product->id)}}">
                                <img src="{{asset('productimages/'.$image)}}"
                            <?php $profile_image=""; ?>
                               > 
                            </a>
                            <div class="product_action_box">
                                <ul class="list_none pr_action_btn">
                                    {{-- @if ($product->type=='simple')
                                    {{-- <li class="add-to-cart"><a style="cursor: pointer" onclick="addtocart({{$product->id}})"><i class="bx bx-cart"></i> Add To Cart</a></li> --}}
                                    {{-- @endif <li><a href="#" class="popup-ajax"><i class="bx bx-shuffle"></i></a></li> --}}
                                    {{-- <li><a href="#" class="popup-ajax"><i class="bx bx-zoom-in"></i></a></li>--}}
                                    <li><a  title="Add to wish list" onclick="addtowishlist({{$product->id}},'{{$image}}')"><i class="bx bx-heart" ></i></a></li> 
                                </ul>
                            </div>
                        </div>
                        <div class="product_info">
                            <h6 class="product_title text-center"><a href="{{url('productdetails/'.$product->id)}}">{{$product->product_name}}</a></h6>
                            <div class="product_price text-center">
                               @if($product->sale_price)
                               <span class="price "><span class="currencySymbol">£</span>{{$product->sale_price}}</span>
                               <del><span class="currencySymbol">£</span>{{$product->regular_price}}</del>
                               @else
                               <span class="price "><span class="currencySymbol">£</span>{{$product->regular_price}}</span>
                               
                               @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            
        </div>
        <div class="row">
            <div class="col-md-12">
                {{ $products->links('vendor/pagination/bootstrap-4') }}
            </div>
        </div>
    </div>
    </div>
    @if (session('info'))
    <script type="text/javascript">toastr.success("{{session('info')}}");</script>
    @endif   
</section>
    
    


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
function addtowishlist(id,image)
{
   
    url = "{{url('addtowishlist')}}";
        $.ajax({
       type:'POST',
       url:url,
       data:{
           id:id,
           image:image,
           "_token": "{{ csrf_token()}}",

       },
       success:function(result){ 
        console.log(result);
       var result = JSON.parse(result);
       toastr.success(result[1]);
       if(result[0]>0)
       {
        $('#wishitem').html(result[0]);
        $('#wishitem').show();
        
       }
       else{
        $('#wishitem').hide();
       }
        
        }	
        });


}
</script>
