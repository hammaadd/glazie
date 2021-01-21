@extends('public/layouts/layouts')
@section('title','Welcome')
@section('content')
<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
<div class="container mt-3">
    <div class="row">
        <div class="col-md-6">
            <h2>Welcome to Glazie LTd</h2>
        </div>
    </div>
    @if (session('info'))
    <script type="text/javascript">toastr.success("{{session('info')}}");</script>
    @endif   
    <div class="row">
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
        
        <div class="col-md-4 d-flex">
            <a href="{{ url('productdetails/'.$product->id)}}">
                <div class="card">
                    
                        <div class="card-body "> <img src="{{asset($image)}}"
                            <?php $profile_image=""; ?>
                             width="100%"> </div>
                        <div class="card-body">
                            <h5>{{$product->proudct_name}}</h5>
                        </div>
                      
                </div>
            </a>
            </div>
        @endforeach
    </div>
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

