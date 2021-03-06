@extends('admin-layout.layouts')
@section('title','Product Add On')
@section('content')
<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>



<!-- page js -->

<div class="page-container">
    <div class="main-content">
        <div class="page-header">
            <h1 class="header-title">Product Add On</h1>
            <div class="header-sub-title float-right">
                <nav class="breadcrumb breadcrumb-dash ">
                    <a href="{{url('admin/dashboard')}}" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Home</a>
                    <a class="breadcrumb-item" href="#">Product Add On</a>
                    
                </nav>
            </div>
        </div>
        @if (session('info'))
        <script type="text/javascript">toastr.success("{{session('info')}}");</script>
        @endif  
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    
                    <div class="card-body">
                        @if(count($errors)>0)
                        @foreach($errors->all() as $error)
                        <div class="alert alert-danger bg-danger text-light">
                            
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
                            </button>                            
                            {{$error}}
                        </div>
                        @endforeach
                        @endif
                        <form action="{{url('admin/updateframe/'.$frame->id)}}" method="post" enctype="multipart/form-data" id="addon">
                            @csrf
                            <div class="row">
                               
                                <div class="col-md-6">
                                    <label for="">Frame  Name </label>
                                    <input type="text" class="form-control rounded-0" name="model_name" placeholder="Enter Model Name" value="{{$frame->name}}">
                                </div>
                          
                                <div class="col-md-6">
                                    <label for="">Image</label>
                                    <input type="file" class="form-control rounded-0" name="image">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-6">
                                    <label for="">Price</label>
                                    <input type="number" class="form-control rounded-0" name="price" placeholder="Price of the Frame" value="{{$frame->frame_price}}" min="1">
                                </div>
                                <div class="col-md-6">
                                    <label>Quantity</label>
                                    <input type="hidden" name="addon_id" value="{{$frame->addon_id}}">
                                    <input type="number" class="form-control rounded-0" placeholder="Quantity" name="quantity" value="{{$frame->quantity}}" min="1">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="">Weight <small class="text-danger">(KG)</small></label>
                                    <input type="number" class="form-control rounded-0" name="weight" value="{{$frame->wieght}}" min="1">
                                </div>
                                <div class="col-md-6">
                                    <label for="">Height <small class="text-danger">(cm)</small></label>
                                    <input type="number" class="form-control rounded-0" name="height" value="{{$frame->height}}" min="1">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="">Width <small class="text-danger">(cm)</small></label>
                                    <input type="number" class="form-control rounded-0" name="width" value="{{$frame->width}}" min="1">
                                </div>
                                <div class="col-md-6">
                                    <label for="">Length <small class="text-danger">(cm)</small></label>
                                    <input type="number" class="form-control rounded-0" name="length" value="{{$frame->length}}" min="1">
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-success" ><i class="fa fa-check"> Submit</i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
      
    </div>
    <!-- Model Start Here-->
    

@endsection
@section('script')

<!-- page js -->
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="{{ url('admin-assets/vendors/jquery-validation/jquery.validate.min.js')}}"></script>
  
<script>

    $("#addon").validate({
    ignore: ':hidden:not(:checkbox)',
    errorElement: 'label',
    errorClass: 'is-invalid',
    validClass: 'is-valid',
    rules: {
        product_id:{
            required:true
        },
        svgimage:{
            required:true
        },
        color_code:{
            required:true
        },
        weight:{
            required:true
        },
        height:{
            required:true
        },
        length:{
            required:true
        },
        width:{
            required:true
        },
        
        }
});




</script>
@endsection


