@extends('admin-layout.layouts')
@section('title','Add new installer')
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
                    <a href="{{url('admin/customers')}}" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Customers</a>
                    <span class="breadcrumb-item" href="#">Add New Customer </span>
                    
                </nav>
            </div>
        </div>
        <div class="row">
            
            <div class="col-md-12">
                <div class="card">
                    <form action="{{ url('admin/customers/create')}}"  method="post" id="user" enctype="multipart/form-data">
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
                                <label for="">Password</label>
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
                            <div class="col-md-6">
                                <label for="">Status</label>
                                <select name="login_status"  class="form-control">
                                    <option value="">Select Status</option>
                                    <option value="activate">Activate</option>
                                    <option value="deactivate">De Activate</option>
                                    <option value="suspend">Suspend</option>
                                </select>
                            </div>
                            
                        </div>
                       
                       
                        
                        <div class="row">
                            <div class="col-md-12">
                            <button type="submit" class="btn btn-success mt-3"><i class="anticon anticon-plus-circle"></i> Add Installer</button>
                            <a href="{{url('admin/orders/installer')}}" class="btn btn-danger mt-3 ml-3"><i class="anticon anticon-close"></i> Cancel</a>
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
<script>
    
    $(document).ready(function() {
    $('#company_info').click(function(){
        if($(this).prop("checked") == true){
                $("#company_data").show();
            }
            else if($(this).prop("checked") == false){
                $("#company_data").hide();
            }
    });
});
    $(document).ready(function() {
    $('#companies,#installer_type').select2(
        {
            tags:true,
            tokenSeparators: [","]
        }
    );
});
    
    $("#user").validate({
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
        },
        recharge:{
            required:true,
           
        },
        experience:{
            required:true,
           
        },
        installation_type:{
            required:true,
        },
        company_name:{
            required:true
        },
        company_email:{
            required:true
        },
        country_id:{
            required:true
        },
        city_id:{
            required:true
        },
        state_id:{
            required:true
        },
        postcode:{
            required:true
        },
        company_contactno:{
            required:true
        },
        company_address:{
            required:true
        }
    }
});

    </script>
@endsection
