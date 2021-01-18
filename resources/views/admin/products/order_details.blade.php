@extends('admin-layout.layouts')
@section('title','Order Details')
@section('content')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<div class="page-container">
    <div class="main-content">
        <div class="page-header">
            <h2 class="header-title">Order Details</h2>
            <div class="header-sub-title">
                <nav class="breadcrumb breadcrumb-dash">
                    <a href="#" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Home</a>
                    <a class="breadcrumb-item" href="#">Order Details </a>
                    
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="background-color: #e3e3e3">
                        <h2 style="padding: 10px">Order #4598IRE</h2>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <h5 style="float: right">Sale Consultent:</h5>
                            </div>
                            <div class="col-md-9">
                                <h5>Faton Jusfi</h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <h5 style="float: right">Date:</h5>
                            </div>
                            <div class="col-md-9">
                                <h5><?php echo date('d-M-Y') ?></h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <h5 style="float: right">Invoice:</h5>
                            </div>
                            <div class="col-md-9">
                                <h5 class="text-info">15648621</h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <h5 style="float: right">Warrenty Certificate:</h5>
                            </div>
                            <div class="col-md-9">
                                <h5 class="text-info">84579398</h5>
                            </div>
                        </div>
                    
                
                    <div class="row" style="background-color: #e3e3e3">
                        <div class="col-md-12">
                            <h2 style="padding: 10px">Buyer Information</h2>
                        </div>
                    </div>
                    
                        <div class="row">
                            <div class="col-md-3">
                                <h5 style="float: right">Name:</h5>
                            </div>
                            <div class="col-md-9">
                                <h5>John Smith</h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <h5 style="float: right">Email:</h5>
                            </div>
                            <div class="col-md-9">
                                <h5 class="text-info">johnsmith@gmail.com</h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <h5 style="float: right">Phone No:</h5>
                            </div>
                            <div class="col-md-9">
                                <h5 >068-85-58-78-963</h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <h5 style="float: right">Shipping Address:</h5>
                            </div>
                            <div class="col-md-9">
                                <h5> Address Line 1</h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <h5 style="float: right">Billing Address:</h5>
                            </div>
                            <div class="col-md-9">
                                <h5> Address Line 1</h5>
                            </div>
                        </div>
                        <div class="row" style="background-color: #e3e3e3">
                            <div class="col-md-12">
                                <h2 style="padding: 10px">Products</h2>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover w-100">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Product Name</th>
                                                <th>Unit Price </th>
                                                <th>Quantity</th>
                                                <th>SubTotal</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>This is product name </td>
                                                <td>$ 40</td>
                                                <td>3</td>
                                                <td>$ 120</td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>This is product name </td>
                                                <td>$ 50</td>
                                                <td>6</td>
                                                <td>$ 300</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row">
                                    <div class="col-md-8"></div>
                                    <div class="col-md-2">
                                        <h6>Sub Total</h6>
                                        <h6>Taxes</h6>
                                        <h6>Coupen</h6>
                                        <hr>
                                    </div>
                                    <div class="col-md-2">
                                        <h6>$ 420</h6>
                                        <h6> $ 0.00</h6>
                                        <h6> $20</h6>
                                        <hr>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8"></div>
                                    <div class="col-md-2">
                                        <h5><b>Total Amount</b></h5>
                                    </div>
                                    <div class="col-md-2">
                                        <h5>$400</h5>
                                        <hr>
                                    </div>
                                </div>
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
