@extends('admin-layout.layouts')
@section('title','Order Confirmation ')
@section('content')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<div class="page-container">
    <div class="main-content">
        <div class="page-header">
            <h2 class="header-title">Order Confirm</h2>
            <div class="header-sub-title">
                <nav class="breadcrumb breadcrumb-dash">
                    <a href="#" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Home</a>
                    <a class="breadcrumb-item" href="#">Order Confirmation</a>
                    
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2>Order Approval</h2>
                    </div>
                    <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr style="text-align: center">
                                <th>Item Information </th>
                                <th>Details </th>
                                <th>Price</th>
                                <th>payment Method</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="padding:10px">
                                    <h4><b>Customer Name </b></h4>
                                    <h5>Vendor: <span style="margin-left:20px">Md MFjdsdj</span></h5>
                                    <h5>Type: <span style="margin-left: 39px">Door</span></h5>
                                    <h5>Catelog: <span style="margin-left: 10px">AFHJF8457</span></h5>    
                                </td>
                                <td >
                                    <h5>Order Date: <span style="margin-left:15px">25-Oct-2020</span></h5>
                                    <h5>Ship Addres:<span style="margin-left: 10px">This is address One</span></h5>
                                    <h5>Quantity: <span style="margin-left: 35px">6</span></h5>
                                </td>
                                <td>
                                    <h5>Total Amount: <span style="margin-left:15px">420</span></h5>
                                    <h5>Coupen:<span style="margin-left: 65px">-20</span></h5>
                                    <h5>Net Total: <span style="margin-left: 50px" class="text-success">400</span></h5>
                                </td>
                                <td>
                                    <span class="text-danger"> Cash On delivery</span>
                                </td>
                                <td>
                                    <button class="btn btn-tone btn-success text-center"><i class="fa fa-download"></i> Approve</button><br>
                                    <button class="btn btn-tone btn-danger mt-2 text-center"><i class="fa fa-times"></i> Cancel</button>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding:10px">
                                    <h4><b>Customer Name </b></h4>
                                    <h5>Vendor: <span style="margin-left:20px">Md MFjdsdj</span></h5>
                                    <h5>Type: <span style="margin-left: 39px">Door</span></h5>
                                    <h5>Catelog: <span style="margin-left: 10px">AFHJF8457</span></h5>    
                                </td>
                                <td >
                                    <h5>Order Date: <span style="margin-left:15px">25-Oct-2020</span></h5>
                                    <h5>Ship Addres:<span style="margin-left: 10px">This is address One</span></h5>
                                    <h5>Quantity: <span style="margin-left: 35px">6</span></h5>
                                </td>
                                <td>
                                    <h5>Total Amount: <span style="margin-left:15px">420</span></h5>
                                    <h5>Coupen:<span style="margin-left: 65px">-20</span></h5>
                                    <h5>Net Total: <span style="margin-left: 50px" class="text-success">400</span></h5>
                                </td>
                                <td>
                                    <span class="text-danger"> Cash On delivery</span>
                                </td>
                                <td>
                                    <button class="btn btn-tone btn-success text-center"><i class="fa fa-download"></i> Approve</button><br>
                                    <button class="btn btn-tone btn-danger mt-2 text-center"><i class="fa fa-times"></i> Cancel</button>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding:10px">
                                    <h4><b>Customer Name </b></h4>
                                    <h5>Vendor: <span style="margin-left:20px">Md MFjdsdj</span></h5>
                                    <h5>Type: <span style="margin-left: 39px">Door</span></h5>
                                    <h5>Catelog: <span style="margin-left: 10px">AFHJF8457</span></h5>    
                                </td>
                                <td >
                                    <h5>Order Date: <span style="margin-left:15px">25-Oct-2020</span></h5>
                                    <h5>Ship Addres:<span style="margin-left: 10px">This is address One</span></h5>
                                    <h5>Quantity: <span style="margin-left: 35px">6</span></h5>
                                </td>
                                <td>
                                    <h5>Total Amount: <span style="margin-left:15px">420</span></h5>
                                    <h5>Coupen:<span style="margin-left: 65px">-20</span></h5>
                                    <h5>Net Total: <span style="margin-left: 50px" class="text-success">400</span></h5>
                                </td>
                                <td>
                                    <span class="text-success"> Amazon<span>
                                </td>
                                <td>
                                    <button class="btn btn-tone btn-success text-center"><i class="fa fa-download"></i> Approve</button><br>
                                    <button class="btn btn-tone btn-danger mt-2 text-center"><i class="fa fa-times"></i> Cancel</button>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding:10px">
                                    <h4><b>Customer Name </b></h4>
                                    <h5>Vendor: <span style="margin-left:20px">Md MFjdsdj</span></h5>
                                    <h5>Type: <span style="margin-left: 39px">Door</span></h5>
                                    <h5>Catelog: <span style="margin-left: 10px">AFHJF8457</span></h5>    
                                </td>
                                <td >
                                    <h5>Order Date: <span style="margin-left:15px">25-Oct-2020</span></h5>
                                    <h5>Ship Addres:<span style="margin-left: 10px">This is address One</span></h5>
                                    <h5>Quantity: <span style="margin-left: 35px">6</span></h5>
                                </td>
                                <td>
                                    <h5>Total Amount: <span style="margin-left:15px">420</span></h5>
                                    <h5>Coupen:<span style="margin-left: 65px">-20</span></h5>
                                    <h5>Net Total: <span style="margin-left: 50px" class="text-success">400</span></h5>
                                </td>
                                <td>
                                    <span class="text-success"> paypal</span>
                                </td>
                                <td>
                                    <button class="btn btn-tone btn-success text-center"><i class="fa fa-download"></i> Approve</button><br>
                                    <button class="btn btn-tone btn-danger mt-2 text-center"><i class="fa fa-times"></i> Cancel</button>
                                </td>
                            </tr>
                            
                        </tbody>
                    </table>
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
