@extends('admin-layout.layouts')
@section('title','Add new installer')
@section('content')

<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<div class="page-container">
    <div class="main-content">
        <div class="page-header">
            <h2 class="header-title">Add new Installer</h2>
            <div class="header-sub-title float-right">
                <nav class="breadcrumb breadcrumb-dash">
                    <a href="{{url('admin/dashboard')}}" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Home</a>
                    <a href="{{url('admin/installer')}}" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Installer</a>
                    <span class="breadcrumb-item" href="#">Add New Installer </span>
                    
                </nav>
            </div>
        </div>
        <div class="row">
            
            <div class="col-md-12">
                <div class="card">
                    <form action="{{ url('admin/createinstaller')}}"  method="post" id="user" enctype="multipart/form-data">
                    <div class="card-header">
                        <h4 class="card-title">Add New Installer</h4>
                    </div>
                    <div class="card-body">
                        @if(count($errors)>0)
                            @foreach($errors->all() as $error)
                            <div class="col-md-6 alert alert-danger" style="background-color: #e2584c">
                                <li class="text-light" style="list-style-type: none"><b>{{$error}}</b></li>
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
                                <input type="hidden" name="type" >
                            </div>   
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="" >Contact No</label>
                                <input type="number" class="form-control" name="contact_no" placeholder="Contact No ">
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
                                <label for=""> Work Experience </label>
                                <input class="form-control" type="text" placeholder="Work Experience If Any " name="experience">  
                            </div>
                            <div class="col-md-6">
                               <label for="">Recharge</label>
                               <input type="number" class="form-control" name="recharge" placeholder="Recharge ">
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-12">
                                <label for="">Installer Type </label>
                                <select name="installation_type[]" id="installer_type" class="form-control" multiple required>
                                    <option value="" disabled>Select Types</option>
                                    <option value="window">Window</option>
                                    <option value="door">Doors</option>
                                    <option value="lentern">Lentern</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-12">
                                <label for="">Skills</label>
                            <textarea name="skills" id="summernote"class="form-control" cols="30" rows="5"></textarea>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6">                                
                                <input  type="checkbox" name="company_info" id="company_info" value="1">
                                <label  title="Check if Any Company "> Any Reference Company</label>
                            </div>
                        </div>
                        <div id="company_data" style="display:none">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="">Company Name </label>
                                    <input type="text" class="form-control" name="company_name" placeholder="Company Name">
                                </div>
                                <div class="col-md-6">
                                    <label for="">EmailAddress</label>
                                    <input type="email" class="form-control" name="company_email" placeholder="Company Email Address">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="">Company Logo</label>
                                    <input type="file" class="form-control" name="logo">
                                </div>
                                <div class="col-md-6">
                                    <label for="">Company Cover </label>
                                    <input type="file" class="form-control" name="cover">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="">Country Name</label>
                                    <select name="country_id" id="country_id" class="form-control">
                                        <option value="">Select Country</option>
                                        @foreach ($countries as $country)
                                            <option value="{{$country->id}}">{{$country->name}}</option>
                                        @endforeach 
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="">State Name</label>
                                    <input type="text" class="form-control" name="state_id" placeholder="Enter State Name ">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="">City Name</label>
                                    <input type="text" name="city_id" id="" class="form-control" placeholder="City Name ">
                                </div>
                                <div class="col-md-6">
                                    <label for="">Post Code</label>
                                    <input type="text" class="form-control" name="postcode" placeholder="Post Code ">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="">Company Contact No  </label>
                                    <input type="text" class="form-control" name="company_contactno" placeholder="Company Contact No">
                                </div>
                                <div class="col-md-6">
                                    <label for=""> Address</label>
                                    <input type="text" class="form-control" name="address" placehodler>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 mt-2">
                                    <label for="">About Company </label>
                                <textarea name="companydesc" id="company_description"  class="form-control" rows="10"></textarea>
                                </div>
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                            <button type="submit" class="btn btn-success mt-3"><i class="anticon anticon-plus-circle"></i> Add Installer</button>
                            <a href="{{url('admin/installer')}}" class="btn btn-danger mt-3 ml-3"><i class="anticon anticon-close"></i> Cancel</a>
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
        $('#summernote,#company_description').summernote({
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
