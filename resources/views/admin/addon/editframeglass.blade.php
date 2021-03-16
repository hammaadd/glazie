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
            <h1 class="header-title">Edit Frame Glass</h1>
            <div class="header-sub-title float-right">
                <nav class="breadcrumb breadcrumb-dash ">
                    <a href="{{url('admin/dashboard')}}" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Home</a>
                    <a href="{{url('admin/addon/view/'.$frame->modelframe->addon_id)}}" class="breadcrumb-item"> Product View</a>
                    <a class="breadcrumb-item" href="{{url('admin/frameglasses/'.$frame->frame_id)}}">Frame Glasses</a>
                    
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
                            <form action="{{url('admin/updateframeglass/'.$frame->id)}}" method="POST" enctype="multipart/form-data" id="addon">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="">Glass Frame Name</label>
                                        <input type="text" class="form-control rounded-0"n name="name" placeholder="Enter Glass Name" value="{{$frame->glass_name}}">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Glass Frame Image</label>
                                    <input type="file" class="form-control rounded-0" name="image" >
                                    </div>
                                </div>
                               
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Glass Frame Price</label>
                                            <input type="number" class="form-control rounded-0"n name="price" placeholder="Enter Glass Name" value="{{$frame->price}}">
                                        </div>
                                    
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Glass Frame Quantity</label>
                                        <input type="number" class="form-control rounded-0"n name="quantity" placeholder="Enter Glass Name" value="{{$frame->quantity}}" >
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
                                
                                    <div class="row mt-2">
                                        <div class="col-md-12">
                                            <button class="btn btn-success" type="submit"> <i class="fa fa-check"></i> Submit</button>
                                            <a class="btn btn-danger" href="{{url('admin/frameglasses/'.$frame->frame_id)}}"> <i class="fa fa-times"></i> Cancel</a>
                                        </div>
                                    </div>
                    
                              
                            </form>
                        </div>
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
        name:{
            required:true
        },
        price:{
            required:true
        },
        quantity:{
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


