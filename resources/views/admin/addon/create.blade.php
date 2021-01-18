@extends('admin-layout.layouts')
@section('title','Product Add On ')
@section('content')
<link href="{{asset('admin-assets/vendors/datatables/dataTables.bootstrap.min.css')}}" rel="stylesheet">
<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>



<!-- page js -->

<div class="page-container">
    <div class="main-content">
        <div class="page-header">
            <h2 class="header-title ">Orders</h2>
            <div class="header-sub-title">
                <nav class="breadcrumb breadcrumb-dash">
                    <a href="{{url('admin/dashboard')}}" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Home</a>
                    <a class="breadcrumb-item" href="#">Order</a>
                    
                </nav>
            </div>
        </div>
        @if (session('info'))
        <script type="text/javascript">toastr.success("{{session('info')}}");</script>
        @endif  
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2>Product  Addon </h2>
                    </div>
                    <div class="card-body">
                        @if(count($errors)>0)
                        @foreach($errors->all() as $error)
                        <div class="alert alert-danger bg-danger">
                            
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
                            </button>                            
                            {{$error}}
                        </div>
                        @endforeach
                        @endif
                        <form action="{{url('admin/create_addon')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="">Select Addon Type</label>
                                    <select name="addon_type" id="addontype" class="form-control">
                                            <option value="">Select Category Type</option>
                                            <option value="color">Color</option>
                                            <option value="glass">Glasses</option>
                                            <option value="frame">Frame</option>
                                            <option value="frame_color">Frame Colour</option>
                                            <option value="handle">Handle</option>
                                            <option value="frame_glass">Frame Glass</option>
                                            <option value="hingle">Hingle</option>
                                    </select>
                                </div>
                                <div class="col-md-6" id="addon_value">
                                    
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="">Products</label>
                                    <select name="product_name" id="" class="form-control">
                                        <option value="">---Select Product---</option>
                                        @foreach ($products as $product)
                                            <option value="{{$product->id}}" 
                                                @if (old('prodcut_name')==$product->id)
                                                    selected
                                                @endif
                                                >{{$product->product_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="">Quantity</label>
                                    <input type="number" class="form-control" name="quantity" min="1" placeholder="Quantity" value="{{ old('quantity') }}">
                                    
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="">Price</label>
                                    <input type="number" class="form-control" name="price" min="1" placeholder="Price" value="{{ old('price') }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="">Sale Price </label>
                                    <input type="number" class="form-control" min="1" name="sale_price" value="{{ old('sale_price') }}" placeholder="Sale Price">
                                </div>
                            </div>
                            <div class="row">
                            
                                <div class="col-md-6">
                                    <label for="">Image</label>
                                    <input type="file" class="form-control" name="image">
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-success mt-3"><i class="anticon anticon-check"></i> Submit</button>
                                    <a href="" class="btn btn-danger mt-3 ml-3"> <i class="anticon anticone-close"></i> Cancel</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
      
    </div>
    <!-- Model Start Here-->
    
    
    <link href="{{asset('admin-assets/vendors/datatables/dataTables.bootstrap.min.css')}}" rel="stylesheet">

@endsection
@section('script')

<!-- page js -->
<script src="{{asset('admin-assets/vendors/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('admin-assets/vendors/datatables/dataTables.bootstrap.min.js')}}"></script>
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
$(document).ready(function(){
    $("#addontype").change(function(){
        var addontype = $("#addontype").val();
        
        if (addontype=="color") {
            var addonvalue = '<label for="">Color</label>';
            addonvalue+='<input type="color" class="form-control" name="addon_value">';
            $('#addon_value').html(addonvalue);
        }
        if(addontype=="frame_color"){
            var addonvalue = '<label for="">Frame Color</label>';
            addonvalue+='<input type="color" class="form-control" name="addon_value" >';
            $('#addon_value').html(addonvalue);
        }
        if(addontype=="glass")
        {
            var addonvalue ='<label for="">Glass</label>';
            addonvalue+='<input type="text" class="form-control" name="addon_value" placeholder="Glass">';
            $('#addon_value').html(addonvalue);
        }
        if(addontype=="frame")
        {
            var addonvalue ='<label for="">Frame</label>';
            addonvalue+='<input type="text" class="form-control" name="addon_value" placeholder="Frame " >';
            $('#addon_value').html(addonvalue);
        }
        if(addontype=="hingle")
        {
            var addonvalue ='<label for="">hingle Side</label>';
            addonvalue+='<select name="addon_value" id="" class="form-control">';
            addonvalue +='<option value="">--Select Higle Side</option>';
            addonvalue +='<option value="right">Right</option>';
            addonvalue +='<option value="left">Left</option>';
            addonvalue +='</select>';
            $('#addon_value').html(addonvalue);
            
        }
        if (addontype=="handle") {
            var addonvalue ='<label for="">Handle</label>';
            addonvalue+='<input type="text" class="form-control" name="addon_value" placeholder="Handle">';
            $('#addon_value').html(addonvalue);
        }
        if (addontype=="frame_glass") {
            var addonvalue ='<label for="">Frame Glass</label>';
            addonvalue+='<input type="text" class="form-control" name="addon_value" placeholder="Frame Glasses">';
            $('#addon_value').html(addonvalue);
        }
        
        if (addontype=="" || addontype==null) {
            $('#addon_value').html("");
        }

    });
});



</script>
@endsection


