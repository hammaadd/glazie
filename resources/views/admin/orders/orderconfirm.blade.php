@extends('admin-layout.layouts')
@section('title','New Orders')
@section('content')
<link href="{{asset('admin-assets/vendors/datatables/dataTables.bootstrap.min.css')}}" rel="stylesheet">
<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
<!-- page js -->

<div class="page-container">
    <div class="main-content">
        <div class="page-header">
            {{-- <h2 class="header-title">Categories</h2> --}}
            <div class="header-sub-title">
                <nav class="breadcrumb breadcrumb-dash">
                    <a href="{{url('admin/dashboard')}}" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Home</a>
                    <a class="breadcrumb-item" href="#">New Orders</a>
                    
                </nav>
            </div>
        </div>
        @if (session('info'))
            <script type="text/javascript">toastr.success("{{session('info')}}");</script>
        @endif  
        <div class="card">
            <div class="card-body">

                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive" >
                        <table class="table table-hover" id="categories">
                            <thead>
                                <th>Sr.#</th>
                                <th>Customer Name </th>
                                <th>Products(Qty)</th>
                                <th>Amount</th>
                                <th>Order Date</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                @if (count($orders)>0)
                                    @foreach ($orders as $order)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$order->customer->name}}</td>
                                        <td>
                                            @foreach ($order->details as $orderdetails)
                                                <ul style="list-style-type: none;">
                                                    <li>{{$orderdetails->product->product_name}}({{$orderdetails->quantity}})</li>
                                                </ul>
                                            @endforeach

                                        </td>
                                        <td>
                                            <h5><b class="mr-2 m-2">Total Amount:</b>{{$order->total_amount}}</h5>
                                            <h5><b class="mr-2 m-2">Discount:</b>{{$order->discount}}</h5>
                                            <h5><b class="mr-2 m-2">Net Total:</b>{{$order->net_total}}</h5>
                                            
                                        </td>
                                        <td>@php
                                            echo date("d-M-Y", strtotime($order->created_at))
                                        @endphp
                                        </td>
                                        <td>
                                            <form action="{{url('admin/checkorder')}}" method="post">
                                                @csrf
                                                <input type="hidden" value="{{$order->id}}" name="order_id">
                                                <input type="hidden" name="status" value="shipped">
                                                
                                                <input type="hidden" name="redirect" value="1">
                                                <button class="btn btn-success btn-xs mt-2 pull-center btn-block" onclick="return confirm('Are you sure?')"><i class="fa fa-check"></i> Shipped</button>
                                            </form>
                                            <form action="{{url('admin/checkorder')}}" method="post">
                                                @csrf
                                                <input type="hidden" name="redirect" value="1">
                                                <input type="hidden" value="{{$order->id}}" name="order_id">
                                                <input type="hidden" name="status" value="canceled">
                                                
                                                <button class="btn btn-danger btn-xs mt-2 pull-center btn-block" onclick="return confirm('Are you sure ?')"><i class="fa fa-times"></i> Cancel</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach 
                                @else

                                @endif
                            </tbody>
                        </table>
                    </div>
                    </div>
                    </div>
                    
                </div>
            </div>
        </div>
        
    </div>
    <!-- Model Start Here-->
    
    

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
$("#categories").DataTable();

</script>
@endsection


