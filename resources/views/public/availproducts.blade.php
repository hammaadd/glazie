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
                                    <li class="add-to-cart"><a href="#"><i class="bx bx-cart"></i> Add To Cart</a></li>
                                    <li><a href="#" class="popup-ajax"><i class="bx bx-shuffle"></i></a></li>
                                    <li><a href="#" class="popup-ajax"><i class="bx bx-zoom-in"></i></a></li>
                                    <li><a href="#"><i class="bx bx-heart"></i></a></li>
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
</script>

