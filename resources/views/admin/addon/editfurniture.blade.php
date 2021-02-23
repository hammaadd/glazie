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
            <h1 class="header-title">Add Furniture </h1>
            <div class="header-sub-title float-right">
                <nav class="breadcrumb breadcrumb-dash ">
                    <a href="{{url('admin/dashboard')}}" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Home</a>
                    <a class="breadcrumb-item" href="{{url('admin/addon/view/'.$furniture->addon_id)}}">Product</a>
                    <a class="breadcrumb-item" href="#">Product Add On</a>
                    
                </nav>
            </div>
        </div>
        @if (session('info'))
        <script type="text/javascript">toastr.success("{{session('info')}}");</script>
        @endif  
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
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
                        <form action="{{url('admin/updatefurniture/'.$furniture->id)}}" method="post" enctype="multipart/form-data" id="addon">
                            @csrf

                         
                            <input type="hidden" name="addon_id" value="{{$furniture->addon_id}}">
                           <div class="row">
                               <div class="col-md-12">
                                   <div class="form-group">
                                       <label for="">Name</label>
                                       <input type="text" class="form-control" name="name" placeholder="Enter name" value="{{$furniture->name}}">
                                   </div>
                                   <div class="form-group">
                                        <label for="">Image</label>
                                        <input type="file" class="form-control" name="image" placeholder="" ">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Price </label>
                                        <input type="number" class="form-control" name="price" placeholder="Enter price" value="{{$furniture->price}}">
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="">Quantity </label>
                                        <input type="number" class="form-control" name="quantity" placeholder="Enter Quantity" value="{{$furniture->quantity}}">
                                    </div>
                               </div>
                           </div>
                            
                            <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-success" ><i class="fa fa-check" > Submit</i></button>
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
  
@endsection


