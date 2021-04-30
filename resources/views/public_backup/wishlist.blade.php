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
    <script src="{{asset('assets/toaster/jquery-1.9.1.min.js')}}"></script>
    <link href="{{asset('assets/toaster/toastr.css')}}" rel="stylesheet"/>
    <script src="{{asset('assets/toaster/toastr.js')}}"></script>

    <style>
        li{
            list-style-type:none;
        }
    </style>
<div class="container" id="abc">
    <h1 class="cart-page-title text-center">Wishlist</h1>
    @if (session('s_msg'))
        <script type="text/javascript">toastr.success("{{session('s_msg')}}");</script>
        @endif  
    @if (count($data) > 0)
    
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
                        @foreach ($data as $wish)
                            <?php
                            $id = $wish->id;
                            $product_id = $wish->product_id;
                            $image = $wish->image;
                            $price = $wish->price;
                            $name = $wish->prd_name;
                            ?>
                                <td class="product-thumbnail cart-list">{{$loop->iteration}}</td>
                                <td class="product-thumbnail cart-list"><img src="{{asset('productimages/'.$image)}}" alt=""></td>
                                   
                                <td>{{$name}}</td>
                                <td>£ {{$price}}</td>
                                <td>
                                    <a href="{{url('productdetails/'.$product_id)}}" class="btn btn-fill-out btn-xs px-4 py-2 rounded-0"> <i class="fa fa-eye "></i> Details</a>
                                    <form style="display:inline;" action="{{ route('removewishprd') }}" method="POST" >
                                        @CSRF
                                        <input type="hidden" value="<?php echo $id; ?>" name="wish_id">
                                        <button type="submit" class="btn btn-fill-out rounded-0 px-4 py-2">Remove</button>
                                    </form></td>
                            </tr>
                        @endforeach
                           
                        </tbody>
                    </table>
                </div>
               
        </div>
    </div>
    @else 
    <p class="mb-3 text-center" style="margin-top: 5%;">Wishlist is empty. </p>
    <div class="text-center">
        <a style="margin-top: 5%;margin-bottom: 3px;" class="btn btn-fill-out theme_bgcolor2 text-white px-4 rounded-0 text" href="{{url('products')}}"><i class="fa fa-backward"></i> Go Back </a>
    </div>
    

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
@endsection
