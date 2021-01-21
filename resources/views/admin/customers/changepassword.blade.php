@extends('admin-layout.layouts')
@section('title','Change Customer Password')
@section('content')
<div class="page-container">
    <div class="main-content">
        <div class="page-header">
            <h2 class="header-title">Change Customer Password</h2>
            <div class="header-sub-title">
                <nav class="breadcrumb breadcrumb-dash">
                    <a href="{{url('admin/dashboard')}}" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Home</a>
                    <a href="{{url('admin/installer')}}" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Installer</a>
                    <span class="breadcrumb-item" href="#">Change Customer Password </span>
                    
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3>Change Password</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{url('admin/chngeCustomerpwd/'.$id)}}" id="changepass" method="post">
                        @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="">Old Password</label>
                                    <input type="password" class="form-control" name="oldpassword" placeholder="Old Password">
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="">Password</label>
                                    <input type="password" class="form-control" name="password" placeholder="password" id="password">
                                </div>
                            </div>
                            
                            
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="">Confirm Password</label>
                                    <input type="password" class="form-control" name="conf_pass" placeholder="Confirm Password">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <button class="btn btn-success mt-3"><i class="anticon anticon-check"></i> Submit</button>
                                </div>
                            </div>
                            
                        </form>
                    </div>
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
    
    $("#changepass").validate({
    ignore: ':hidden:not(:checkbox)',
    errorElement: 'label',
    errorClass: 'is-invalid',
    validClass: 'is-valid',
    rules: {
        oldpassword: {
            required: true,
            
        },
   
        password:{
            required:true,
            minlength: 8
        },
        conf_pass:{
            required: true,
            equalTo: '#password'
        }
    }
});

    </script>
@endsection
