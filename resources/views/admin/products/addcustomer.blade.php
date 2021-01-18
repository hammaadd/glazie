@extends('admin-layout.layouts')
@section('title','Add new Customer')
@section('content')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<div class="page-container">
    <div class="main-content">
        <div class="page-header">
            <h2 class="header-title">Add new Customer</h2>
            <div class="header-sub-title">
                <nav class="breadcrumb breadcrumb-dash">
                    <a href="{{url('admin/dashboard')}}" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Home</a>
                    <a href="{{url('admin/customer')}}" class="breadcrumb-item">Customer</a>
                    <a class="breadcrumb-item">Add New Customer </a>
                    
                </nav>
            </div>
        </div>
        <div class="row">
            
            <div class="col-md-12">
                <div class="card">
                    <form action="{{ url('/admin/user/create')}}"  method="post" id="user" enctype="multipart/form-data">
                    <div class="card-header">
                        <h4 class="card-title">Add New Customer</h4>
                    </div>
                    <div class="card-body">
                        @if($errors)
                        @foreach($errors as $error)
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-6">
                                <div class="alert alert-danger">
                                    @$error
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @endif
                        <div class="row">
                        @csrf
                            <div class="col-md-6">
                                <label for="" >First Name</label>
                                <input type="text" class="form-control" name="first_name" placeholder="First Name">
                            </div>
                            <div class="col-md-6">
                                <label for="" >Last Name</label>
                                <input type="text" class="form-control" name="last_name" placeholder="Last Name ">
                            </div>   
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="" >Contact No</label>
                                <input type="text" class="form-control" name="contact_no" placeholder="Contact No ">
                            </div>
                            <div class="col-md-6">
                                <label for="" >Email Address</label>
                                <input type="email" class="form-control" name="email" placeholder="Email address">
                            </div>   
                        </div>
                        <div class="row">
                        <div class="col-md-6">
                                <label for="" >Password</label>
                                <input type="password" class="form-control" name="password" id="password" placeholder="Password"> 
                            </div>
                            <div class="col-md-6">
                                <label for="" >Confirm Password</label>
                                <input type="password" class="form-control" name="confpass" id="conf_pass" placeholder="Confirm Password">
                            </div> 
                            
                        </div>
                        <div class="row">
                        <div class="col-md-6">
                                <label for="" >Profile Image</label>
                                <input type="file" class="form-control" name="image" >
                            </div>
                            <div class="col-md-6">
                                <label for="" >Address</label>
                                <input type="text" class="form-control" name="address" placeholder="Address">
                            </div> 
                            
                        </div>  
                        <div class="row">
                            <div class="col-md-12">
                                <label for="">About Yourself</label>
                            <textarea name="description" id="summernote"class="form-control" cols="30" rows="5"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                            <button type="submit" class="btn btn-success mt-3"><i class="anticon anticon-plus-circle"></i> Add Customer</button>
                            <a href="{{url('admin/customer')}}" class="btn btn-danger mt-3 ml-3"><i class="anticon anticon-close"></i> Cancel</a>
                            </div>
                       
                        </div>
                    </div>
                    </form>
                </div>
            </div>
            
        </div>
        
    </div>

@endsection
@section('script')
<script src="{{ url('admin-assets/vendors/jquery-validation/jquery.validate.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<!-- page js -->
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script>
        $(document).ready(function() {
        $('#summernote').summernote({
        height: 200,
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          
          ['view', ['fullscreen', 'codeview', 'help']]
        ]
        });
        
    });
    
    $(document).ready(function() {
    $('#refrence').change(function(){
        var refrence = $('#refrence').val();
        if (refrence=="yes") {
            $('#company_data').show();
        }
        else{
            $('#company_data').hide();
        }
    });
});
    $(document).ready(function() {
    $('#companies').select2(
        {
            tags:true,
            tokenSeparators: [",", " "]
        }
    );
});
    
    $("#users").validate({
    ignore: ':hidden:not(:checkbox)',
    errorElement: 'label',
    errorClass: 'is-invalid',
    validClass: 'is-valid',
    rules: {
        first_name: {
            required: true
        },
        
        last_name: {
            required: true
        },
        
        email: {
            required: true,
            email: true
        },
        contact_no:{
            required: true
        },
        password:{
            required:true,
            minlength: 8
        },
        confpass:{
            required: true,
            equalTo: '#password'
        },
        address:{
            required:true,
           
        }

    }
});

    </script>
@endsection
