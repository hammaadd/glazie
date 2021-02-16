@extends('admin-layout.layouts')
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
            <div class="header-sub-title float-right">
                <nav class="breadcrumb breadcrumb-dash">
                    <a href="{{url('admin/dashboard')}}" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Home</a>
                    <a class="breadcrumb-item" href="#">Order</a>
                    
                </nav>
            </div>
        </div>
        @if (session('info'))
        <script type="text/javascript">toastr.success("{{session('info')}}");</script>
        @endif  
        <ul class="nav nav-tabs nav-justified" id="myTabJustified" role="tablist">
            {{-- <li class="nav-item">
                <a class="nav-link active" id="pending-tab-justified" data-toggle="tab" href="#pending-justified" role="tab" aria-controls="pending-justified" aria-selected="true"><i class="fas fa-sign-in-alt text-info"></i> Pending</a>
            </li> --}}
            <li class="nav-item active">
                <a class="nav-link active" id="cancel-tab-justified" data-toggle="tab" href="#cancel-justified" role="tab" aria-controls="cancel-justified" aria-selected="true"> <i class="fa fa-ban text-danger"></i> Cancled</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="shipped-tab-justified" data-toggle="tab" href="#shipped-justified" role="tab" aria-controls="shipped-justified" aria-selected="false"> <i class="fas fa-sign-out-alt text-warning"></i> Shipped</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="completed-tab-justified" data-toggle="tab" href="#completed-justified" role="tab" aria-controls="completed-justified" aria-selected="false"><i class="fa fa-check text-success"></i> Completed</a>
            </li>
        </ul>
        <div class="tab-content m-t-15" id="myTabContentJustified">
            {{-- <div class="tab-pane fade show active" id="pending-justified" role="tabpanel" aria-labelledby="pending-tab-justified">
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-hover" id="pending"> 
                                <thead>
                                    <tr>
                                        <th>Sr #</th>
                                        <th>Customer Name</th>
                                        <th>Total Amount</th>
                                        <th>Date</th>
                                        <th>View</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                
                                    @php
                                        $i=1;
                                    @endphp
                                    @if(count($orders)>0)
                                    @foreach($orders as $order)
                                    @if ($order->status=="pending")
                                        
                                    
                                    <tr>
                                        <td><?= $i ?></td>
                                        <td>{{$order->customer->name}}</td>
                                        <td><?php echo $order->total_amount ?></td>
                                        <td>{{$order->created_at}}</td>
                                        <td>  <a href="{{url('admin/orderdetails/'.$order->id)}}" class="btn btn-warning btn-xs"><i class="anticon anticon-eye"></i></a></td>
                                        <td>
                                            <form action="{{url('admin/checkorder')}}" method="post">
                                                @csrf
                                                <input type="hidden" value="{{$order->id}}" name="order_id">
                                                <select name="status" id="" class="form-control" required>
                                                    <option value="">Select Order </option>
                                                    <option value="canceled">Cancel</option>
                                                    <option value="shipped">shipped</option>
                                                    <option value="completed">Completed</option>
                                                </select>
                                                <button class="btn btn-success btn-xs mt-2 pull-center"><i class="fa fa-check"></i> Submit</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @php
                                        $i++;
                                    @endphp
                                    @endif
                                    @endforeach
                                    @else
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td>No record Found</td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div> --}}
            <div class="tab-pane fade show active" id="cancel-justified" role="tabpanel" aria-labelledby="cancel-tab-justified">
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-hover" id="cancel"> 
                                <thead>
                                    <tr>
                                        <th>Sr #</th>
                                        <th>Customer Name</th>
                                        <th>Total Amount</th>
                                        <th>Date</th>
                                        <th>view</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                
                                    @php
                                        $j=1;
                                    @endphp
                                    @if(count($orders)>0)
                                    @foreach($orders as $order)
                                    @if ($order->status=="canceled")
                                        
                                    
                                    <tr>
                                        <td><?= $j ?></td>
                                        <td>{{$order->customer->name}}</td>
                                        <td><?php echo $order->total_amount ?></td>
                                        <td>{{$order->created_at}}</td>
                                        <td> <a href="{{url('admin/orderdetails/'.$order->id)}}" class="btn btn-warning btn-xs"><i class="anticon anticon-eye"></i></a></td>
                                        <td>
                                            <form action="{{url('admin/checkorder')}}" method="post">
                                                @csrf
                                                <input type="hidden" name="redirect" value="2">
                                                <input type="hidden" value="{{$order->id}}" name="order_id">
                                                <select name="status" id="" class="form-control" required>
                                                    <option value="">Select Order </option>
                                                    <option value="canceled">Cancel</option>
                                                    <option value="shipped">shipped</option>
                                                    <option value="completed">Completed</option>
                                                </select>
                                                <button class="btn btn-success btn-xs mt-2 pull-center"><i class="fa fa-check"></i> Submit</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @php
                                        $j++;
                                    @endphp
                                   
                                    @endif
                                    @endforeach
                                    @endif
                                    @if ($j==1)
                                    
                                    <tr>
                                        
                                        <td class="text-danger text-center" colspan="4">No record Found</td>
                                     
                                    </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="shipped-justified" role="tabpanel" aria-labelledby="shipped-tab-justified">
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-hover" id="cancel"> 
                                <thead>
                                    <tr>
                                        <th>Sr #</th>
                                        <th>Customer Name</th>
                                        <th>Total Amount</th>
                                        <th>Date</th>
                                        <th> View</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                
                                    @php
                                        $k=1;
                                    @endphp
                                    @if(count($orders)>0)
                                    @foreach($orders as $order)
                                    @if ($order->status=="shipped")
                                        
                                    
                                    <tr>
                                        <td><?= $k ?></td>
                                        <td>{{$order->customer->name}}</td>
                                        <td><?php echo $order->total_amount ?></td>
                                        <td>{{$order->created_at}}</td>
                                        <td>  <a href="{{url('admin/orderdetails/'.$order->id)}}" class="btn btn-warning btn-xs"><i class="anticon anticon-eye"></i></a></td>
                                        <td>
                                            <form action="{{url('admin/checkorder')}}" method="post">
                                                @csrf
                                                <input type="hidden" value="{{$order->id}}" name="order_id">
                                                <select name="status" id="" class="form-control" required>
                                                    <option value="">Select Order </option>
                                                    <option value="canceled">Cancel</option>
                                                    <option value="shipped">shipped</option>
                                                    <option value="completed">Completed</option>
                                                </select>
                                                <button class="btn btn-success btn-xs mt-2 pull-center"><i class="fa fa-check"></i> Submit</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @php
                                        $k++;
                                    @endphp
                                   
                                    @endif
                                    @endforeach
                                    @endif
                                    @if ($k==1)
                                    
                                    <tr>
                                        
                                        <td class="text-danger text-center" colspan="4">No record Found</td>
                                     
                                    </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="completed-justified" role="tabpanel" aria-labelledby="completed-tab-justified">
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-hover" id="completed"> 
                                <thead>
                                    <tr>
                                        <th>Sr #</th>
                                        <th>Customer Name</th>
                                        <th>Total Amount</th>
                                        <th>Date</th>
                                        <th>View </th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                
                                    @php
                                        $l=1;
                                    @endphp
                                    @if(count($orders)>0)
                                    @foreach($orders as $order)
                                    @if ($order->status=="completed")
                                        
                                   
                                    <tr>
                                        <td><?= $l ?></td>
                                        <td>{{$order->customer->name}}</td>
                                        <td><?php echo $order->total_amount ?></td>
                                        <td>{{$order->created_at}}</td>
                                        <td>  <a href="{{url('admin/orderdetails/'.$order->id)}}" class="btn btn-warning btn-xs"><i class="anticon anticon-eye"></i></a></td>
                                        <td>
                                            <form action="{{url('admin/checkorder')}}" method="post">
                                                @csrf
                                                <input type="hidden" value="{{$order->id}}" name="order_id">
                                                <select name="status" id="" class="form-control" required>
                                                    <option value="">Select Order </option>
                                                    <option value="canceled">Cancel</option>
                                                    <option value="shipped">shipped</option>
                                                    <option value="completed">Completed</option>
                                                </select>
                                                <button class="btn btn-success btn-xs mt-2 pull-center"><i class="fa fa-check"></i> Submit</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @php
                                        $l++;
                                    @endphp
                                   
                                    @endif
                                    @endforeach
                                    @endif
                                    @if ($l==1)
                                    
                                    <tr>
                                        
                                        <td class="text-danger text-center" colspan="4">No record Found</td>
                                     
                                    </tr>
                                    @endif
                                </tbody>
                            </table>
                    
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


