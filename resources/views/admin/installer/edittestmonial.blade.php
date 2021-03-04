@extends('admin-layout.layouts')
@section('title','Edit  Testmonial ')
@section('content')
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
crossorigin="anonymous"></script>
<script src="{{asset('admin-assets/js/rating.js')}}"></script>
<div class="page-container">
    <div class="main-content">
        <div class="page-header">
            <h2 class="header-title">Edit  Testmonial</h2>
            <div class="header-sub-title">
                <nav class="breadcrumb breadcrumb-dash">
                    <a href="{{url('admin/dashboard')}}" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Home</a>
                    <a href="{{url('admin/brands')}}" class="breadcrumb-item"></i>Testmonial</a>
                    <a class="breadcrumb-item" href="#">Edit  Testmonial </a>
                    
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="card">
                    <form action="{{ url('/admin/updatetestmonial/'.$testmonial->id)}}"  method="post" enctype="multipart/form-data" id="create_brand">
                    <div class="card-header">
                        <h4 class="card-title">Add New Testmonial</h4>
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
                            <div class="form-group">
                                <label for="">Rating</label>
                            
                            <div id="halfstarsReview"></div>
                            <input type="hidden" readonly id="halfstarsInput" class="form-control form-control-sm" name="rating" value="{{$testmonial->rating}}">
                            <input type="hidden" name="installer_id" value="{{$testmonial->installer_id}}">
                                <span class="text-success text-center" id="message">Last Rating {{$testmonial->rating}}</span>
                            </div>
                        </div>
                        <div class="row">
                            
                            <label for=""> Image </label>
                            <input type="file" class="form-control" name="image" placeholder="Brand Image" value="{{old('image')}}">
                            
                        </div>
                        <div class="row">
                            
                            <label for="">Descrition </label>
                            <textarea name="description" class="form-control" cols="30" rows="10">{{old('description')}}</textarea>
                        </div>
                        
                        <div class="row">
                            <button type="submit" class="btn btn-success mt-3"><i class="fa fa-plus"></i> Create brand</button>
                            <a href="{{url('admin/installerdetails/'.$testmonial->installer_id)}}" class="btn btn-danger mt-3 ml-3"><i class="fa fa-times"></i> Cancel</a>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
            
        </div>
        
    </div>
<script>
    $("#halfstarsReview").rating({
        "half": true,
       
        "click": function (e) {
            console.log(e);
            $("#halfstarsInput").val(e.stars);
            $('#message').html('Rating Now '+e.stars);
        }
    });
</script>
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
        brand_name:{
            required:true
        }
        }
});

    </script>
@endsection
