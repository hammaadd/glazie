@extends('customer.layouts.layouts')
@section('title','All Orders ')
@section('content')
<link href="{{asset('admin-assets/vendors/datatables/dataTables.bootstrap.min.css')}}" rel="stylesheet">
<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>



<!-- page js -->

<div class="page-container">
    <div class="main-content">
        <div class="page-header">
            <h2 class="header-title ">Orders</h2>
            <div class="header-sub-title">
                <nav class="breadcrumb breadcrumb-dash">
                    <a href="{{url('admin/dashboard')}}" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Home</a>
                    <a class="breadcrumb-item" href="#">Order</a>
                    
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="background-color: #e3e3e3">
                        <h2 style="padding: 10px">Order #{{$order->id}}</h2>
                    </div>
                    <div class="card-body">
                      
                     
                        <div class="row">
                            <div class="col-md-3">
                                <h5 style="float: right">Invoice:</h5>
                            </div>
                            <div class="col-md-9">
                                <h5 class="text-info">{{$order->id}}</h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <h5 style="float: right">Order Date</h5>
                            </div>
                            <div class="col-md-9">
                                <h5>{{date('d-m-Y', strtotime($order->created_at))}}</h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <h5 style="float: right">Status</h5>
                            </div>
                            <div class="col-md-9">
                                    @if ($order->status=="pending")
                                    <div class="d-flex align-items-center">
                                        <div class="badge badge-primary badge-dot m-r-10"></div>
                                        <div>Pending</div>
                                    </div>
                                    @endif
                                    @if ($order->status=="canceled")
                                    <div class="d-flex align-items-center">
                                        <div class="badge badge-danger badge-dot m-r-10"></div>
                                        <div>Canceled </div>
                                    </div>
                                    @endif
                                    @if ($order->status=="shipped")
                                    <div class="d-flex align-items-center">
                                        <div class="badge badge-info badge-dot m-r-10"></div>
                                        <div>Shipped </div>
                                    </div>
                                    @endif
                                    @if ($order->status=="completed")
                                    <div class="d-flex align-items-center">
                                        <div class="badge badge-success badge-dot m-r-10"></div>
                                        <div>Completed </div>
                                    </div>
                                    @endif
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
                                <h5>{{$order->customer->name}}</h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <h5 style="float: right">Email:</h5>
                            </div>
                            <div class="col-md-9">
                                <h5 class="text-info">{{$order->customer->email}}</h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <h5 style="float: right">Phone No:</h5>
                            </div>
                            <div class="col-md-9">
                                <h5 >{{$order->customer->contact_no}}</h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <h5 style="float: right">Shipping Address:</h5>
                            </div>
                            <div class="col-md-9">
                                <h5> {{$order->customer->address}}</h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <h5 style="float: right">Billing Address:</h5>
                            </div>
                            <div class="col-md-9">
                                <h5> {{$order->customer->address}}</h5>
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
                                            @php
                                            $total_price=0;
                                            @endphp
                                            @foreach ($order->details as $orders)
                                                <tr>
                                                    <td>{{$loop->iteration}}</td>
                                                    <td>
                                                        {{$orders->product->product_name}}
                                                    </td>
                                                    <td>{{$orders->price/$orders->quantity}}</td>
                                                    <td>{{$orders->quantity}}</td>
                                                    <td>{{$orders->price}}</td>
                                                    @php
                                                        $total_price +=$orders->price;
                                                    @endphp
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <span class="align-center"> Thanks for visting Us</span>
                                    </div>
                                    <div class="col-md-2">
                                        <h6>Sub Total</h6>
                                        <h6>Taxes</h6>
                                        <h6>Coupen</h6>
                                        <hr>
                                    </div>
                                    <div class="col-md-2">
                                        <h6><span>&#163;</span> {{$total_price}}</h6>
                                        <h6><span>&#163;</span> 0</h6>
                                        <h6> <span>&#163;</span> {{$total_price}}</h6>
                                        <hr>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8"></div>
                                    <div class="col-md-2">
                                        <h5><b>Total Amount</b></h5>
                                    </div>
                                    <div class="col-md-2">
                                        <h5><span>&#163;</span> {{$total_price}}</h5>
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
    <!-- Model Start Here-->
    
    
    <link href="{{asset('admin-assets/vendors/datatables/dataTables.bootstrap.min.css')}}" rel="stylesheet">

@endsection
@section('script')

<!-- page js -->
<script src="{{asset('admin-assets/vendors/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('admin-assets/vendors/datatables/dataTables.bootstrap.min.js')}}"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
    toastr.options = {
    "closeButton": true,
    "debug": false,
    "newestOnTop": false,
    "progressBar": true,
    "positionClass": "toast-top-right",
    "preventDuplicates": true,
    "onclick": null,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "5000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
}

$("#pending,#cancel,#shipped,#completed").DataTable();


</script>
@endsection


