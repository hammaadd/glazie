@extends('admin-layout.layouts')
@section('title','Add New Slider')
@section('content')
<div class="page-container">
    <div class="main-content">
        <div class="page-header">
            <h2 class="header-title">Add New Slider Image</h2>
            <div class="header-sub-title float-right">
                <nav class="breadcrumb breadcrumb-dash">
                    <a href="{{url('admin/dashboard')}}" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Home</a>
                    <a href="{{url('admin/sliders')}}" class="breadcrumb-item"></i>Sliders</a>
                    <a class="breadcrumb-item" href="#">Add New Slider Image</a>
                    
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="card">
                    <form action="{{ url('/admin/sliders/store')}}"  method="post" enctype="multipart/form-data" id="create_brand">
                    <div class="card-header">
                        <h4 class="card-title">Add New Slider Image</h4>
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
                            <label for="">Heading</label>
                            <input type="text" class="form-control" name="heading" placeholder="Brand Name" autofocus value="{{old('heading')}}">
                            
                        </div>
                        <div class="row">
                            
                            <label for="">Slider Image </label>
                            <input type="file" class="form-control" name="image" placeholder="Brand Image" value="{{old('image')}}">
                            
                        </div>
                        <div class="row">
                            
                            <label for="">Descrition </label>
                            <textarea name="description" class="form-control" cols="30" rows="10">{{old('description')}}</textarea>
                        </div>
                        
                        <div class="row">
                            <button type="submit" class="btn btn-success mt-3"><i class="fa fa-plus"></i>Add Slider Image</button>
                            <a href="{{url('admin/sliders')}}" class="btn btn-danger mt-3 ml-3"><i class="fa fa-times"></i> Cancel</a>
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
        heading:{
            required:true
        },
        image:{
            required:true
        }
        }
});

    </script>
@endsection
