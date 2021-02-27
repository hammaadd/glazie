@extends('admin-layout.layouts')
@section('title','Edit Time')
@section('content')
<div class="page-container">
    <div class="main-content">
        <div class="page-header">
            <h2 class="header-title">Add New Delivery Time </h2>
            <div class="header-sub-title float-right">
                <nav class="breadcrumb breadcrumb-dash">
                    <a href="{{url('admin/dashboard')}}" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Home</a>
                    <a href="{{url('admin/delivertimes')}}" class="breadcrumb-item"></i>Delivery Times</a>
                    <a class="breadcrumb-item" href="#">Add Delivery time </a>
                    
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="card">
                    <form action="{{ url('/admin/deliverytimes/update/'.$time->id)}}"  method="post" enctype="multipart/form-data" id="create_brand">
                    <div class="card-header">
                        <h4 class="card-title">Edit Delivery TIme </h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                        @if(count($errors)>0)
                                @foreach($errors->all() as $error)
                                <div class="col-md-12">
                                    <div class="alert alert-danger text-light" style="background-color: #e2584c">
                                        {{$error}}
                                    </div>
                                </div>
                                @endforeach
                            @endif
                        </div>
                        <div class="row">
                            @csrf
                            <label for="">Name</label>
                            <input type="text" class="form-control" name="name" placeholder="Name" value="{{$time->name}}">
                            
                        </div>
                        <div class="row">
                            
                            <label for="">Charges </label>
                            <input type="number" class="form-control" name="price" placeholder="Enter Price "  value="{{$time->price}}">
                            
                            
                        </div>
                        <div class="row">
                            
                            <label for="">Duration <small>In Days</small></label>
                            <input type="number" class="form-control" name="time" placeholder="Duration in Days" min="1"  value="{{$time->time}}">
                        </div>
                        
                        <div class="row">
                            <button type="submit" class="btn btn-success mt-3"><i class="fa fa-edit"></i> UpdateTime </button>
                            <a href="{{url('admin/deliverytimes')}}" class="btn btn-danger mt-3 ml-3"><i class="fa fa-times"></i> Cancel</a>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
            
        </div>
        
    </div>

@endsection
@section('script')
<script src="{{url('admin-assets/js/pages/form-elements.js')}}"></script>


    <script src="{{url('admin-assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
    <script src="{{ url('admin-assets/vendors/jquery-validation/jquery.validate.min.js')}}"></script>
    <script>
    $("#create_brand").validate({
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
        time:{
            required:true
        }
        }
});

    </script>
@endsection
