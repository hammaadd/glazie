@extends('admin-layout.layouts')
@section('title','Hiring Details')
@section('content')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<div class="page-container">
    <div class="main-content">
        <div class="page-header">
            <h2 class="header-title">Hiring  Details</h2>
            <div class="header-sub-title">
                <nav class="breadcrumb breadcrumb-dash">
                    <a href="#" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Home</a>
                    <a href="{{url('admin/requesthiring')}}" class="breadcrumb-item"> Request Hiring </a>
                    <a class="breadcrumb-item" href="#">Hiring Details </a>
                    
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="background-color: #e3e3e3">
                        <h2>Customer Name </h2>                        
                    </div>
                    <div class="card-body">
                        <div class="row ">
                            <div class="col-md-3">
                                <h5 class=""><b>Address:</b></h5> 
                            </div>
                            <div class="col-md-3">
                                <h5>This is Address No 1 </h5>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-md-3">
                                <h5 class=""><b>Contact No: </b></h5> 
                            </div>
                            <div class="col-md-3">
                                <h5>068-98-56-45-98-654</h5>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-md-3">
                                <h5 class=""><b>Email: </b></h5> 
                            </div>
                            <div class="col-md-3">
                                <h5 class="text-primary">Johnsmith@gmail.com</h5>
                            </div>
                        </div>
                        <div class="row" style="background-color: #e3e3e3;border-radius:5px">
                            <h2 style="margin-left: 20px"> Work Details</h2>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-3">
                                <h5 class=""><b>Working Time</b></h5>
                            </div>
                            <div class="col-md-3">
                                <h5 class=" text-success">5 Hours</h5>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-3">
                                <h5 class=""><b>Amount</b></h5>
                            </div>
                            <div class="col-md-3">
                                <h5 class=" text-success">$450</h5>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-3">
                                <h5 class=""><b>Description</b></h5>
                            </div>
                            <div class="col-md-9">
                                <p style="text-align: justify">  Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.

                                    The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.
                                    
                                    Where can I get some?
                                    There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.
                                    
                                    </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-6">
                                <label for=""><b>Assign Task to installer</b></label>
                                <select name="" id="installer" class="form-control" multiple>
                                    <option value="" disabled>Select Installer </option>
                                    <option value="1">Installer1</option>
                                    <option value="2">Installer2</option>
                                    <option value="3">Installer3</option>
                                    <option value="4">Installer4</option>
                                    <option value="5">Installer5</option>
                                    <option value="6">Installer6</option>
                                    <option value="7">Installer7</option>
                                    <option value="8">Installer8</option>
                                    <option value="9">Installer9</option>
                                    <option value="10">Installer10</option>
                                </select>
                            </div>
                            <div class="col-md-3" style="margin-top: 27px">
                                <button class="btn btn-tone btn-success"> <i class="fa fa-check"></i>  Assign</button>
                                <button class="btn btn-tone btn-danger"> <i class="fa fa-times"></i>  Cancel</button>
                            </div>
                        </div>
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
    $('#installer').select2(
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
