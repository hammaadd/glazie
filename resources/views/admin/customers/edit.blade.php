@extends('admin-layout.layouts')
@section('title','Edit Customer')
@section('content')
<div class="page-container">
    <div class="main-content">
        <div class="page-header">
            <h2 class="header-title">Edit  Customer</h2>
            <div class="header-sub-title float-right">
                <nav class="breadcrumb breadcrumb-dash">
                    <a href="{{url('admin/dashboard')}}" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Home</a>
                    <a href="{{url('admin/customers')}}" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Customer</a>
                    <span class="breadcrumb-item" href="#">Edit Customer </span>
                    
                </nav>
            </div>
        </div>
        <div class="row">
            
            <div class="col-md-12">
                <div class="card">
                    <form action="{{ url('admin/customers/update/'.$customer->id)}}"  method="post" id="user" enctype="multipart/form-data">
                    <div class="card-header">
                        <h4 class="card-title">Edit Customer</h4>
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
                                <input type="text" class="form-control" name="first_name" placeholder="First Name" value="{{$customer->first_name}}">
                            </div>
                            <div class="col-md-6">
                                <label for="" >Last Name</label>
                                <input type="text" class="form-control" name="last_name" placeholder="Last Name " value="{{$customer->last_name}}">
                                
                            </div>   
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="" >Contact No</label>
                                <input type="number" class="form-control" name="contact_no" placeholder="Contact No " value="{{$customer->contact_no}}">
                            </div>
                            <div class="col-md-6">
                                <label for="" >Email Address</label>
                                <input type="email" class="form-control" name="email" placeholder="Email address" value="{{$customer->email}}">
                            </div>   
                        </div>
                       
                        <div class="row">
                        <div class="col-md-6">
                                <label for="" >Profile Image</label>
                                <input type="file" class="form-control" name="image" >
                            </div>
                            <div class="col-md-6">
                                <label for="" >Address</label>
                                <input type="text" class="form-control" name="address" placeholder="Address" value="{{$customer->address}}">
                            </div> 
                            
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">Status</label>
                                <select name="login_status"  class="form-control">
                                    <option value="">Select Status</option>
                                    <option value="activate" 
                                    @if ($customer->login_status=="activate")
                                        selected
                                    @endif
                                    >Activate</option>
                                    <option value="deactivate"
                                    @if ($customer->login_status=="deactivate")
                                        selected
                                    @endif>De Activate</option>
                                    <option value="suspend"
                                     @if ($customer->login_status=="suspend")
                                        selected
                                    @endif>Suspend</option>
                                </select>
                            </div>
                            
                        </div>
                       
                       
                        
                        <div class="row">
                            <div class="col-md-12">
                            <button type="submit" class="btn btn-success mt-3"><i class="anticon anticon-edit"></i> Update Customer</button>
                            <a href="{{url('admin/customers')}}" class="btn btn-danger mt-3 ml-3"><i class="anticon anticon-close"></i> Cancel</a>
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
        address:{
            required:true
        },
      login_status:{
        required: true,
      }
    }
});

    </script>
@endsection
