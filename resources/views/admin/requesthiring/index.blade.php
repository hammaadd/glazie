@extends('admin-layout.layouts')
@section('title','Request Hiring')
@section('content')
<link href="{{asset('admin-assets/vendors/datatables/dataTables.bootstrap.min.css')}}" rel="stylesheet">
<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
<!-- page js -->

<div class="page-container">
    <div class="main-content">
        <div class="page-header">
          <h2 class="header-title">Request Hiring</h2> 
            <div class="header-sub-title float-right">
                <nav class="breadcrumb breadcrumb-dash">
                    <a href="{{url('admin/dashboard')}}" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Home</a>
                    <a class="breadcrumb-item" href="#">Request Hiring</a>
                    
                </nav>
            </div>
        </div>
        @if (session('info'))
            <script type="text/javascript">toastr.success("{{session('info')}}");</script>
        @endif  
        <div class="row">
            <div class="col-md-3">
                <h3>Request Hiring</h3>
            </div>
            <div class="col-md-12">
                <div class="table-responsive" ></div>
                <table class="table table-hover" id="categories">
                    <thead>
                        <th>Sr.#</th>
                        <th>Customer Name </th>
                        <th>Price</th>
                       <th>Estimated Time </th>
                       <th>Request For Installer</th>
                       <th>Status</th>
                       <th>Change Status</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @foreach ($requesthires as $request)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$request->customer->name}}</td>
                                <td>{{$request->amount}}</td>
                                <td>{{$request->estimated_time}}</td>
                                <td> {{$request->installer->name}} </td>
                                <td>
                                    @if ($request->hiring_status =="cancel")
                                    <div class="badge badge-danger badge-dot m-r-10"></div> <span class="text-danger">{{$request->hiring_status}}</span>
                                    @endif
                                    @if ($request->hiring_status =="pending")
                                    <div class="badge badge-primary badge-dot m-r-10"></div> <span class="text-primary">{{$request->hiring_status}}</span>
                                    @endif
                                    @if ($request->hiring_status =="inprogress")
                                    <div class="badge badge-info badge-dot m-r-10"></div> <span class="text-info">{{$request->hiring_status}}</span>
                                    @endif
                                    @if ($request->hiring_status =="complete")
                                    <div class="badge badge-success badge-dot m-r-10"></div> <span class="text-success">{{$request->hiring_status}}</span>
                                    @endif

                                </td>
                                <td>
                                    <form action="{{url('admin/hirestatus')}}" method="post">
                                        @csrf
                                        <input type="hidden" name="id" value="{{$request->id}}">
                                        <input type="hidden" name="customer_id" value="{{$request->customer_id}}">
                                        <input type="hidden" name="installer_id" value="{{$request->installer_id}}">
                                    <select name="status" id="" class="form-control" required>
                                       <option value="">Select Status </option>
                                       <option value="pending">Pending</option>
                                       <option value="cancel">Cancelled</option>
                                       <option value="inprogress">In Progress</option>
                                       <option value="complete"> Completed</option>
                                    </select>
                                
                                    <button class="btn btn-success btn-xs mt-2" type="submit">  <i class="anticon anticon-check-circle"></i> </button>
                                </form>
                                </td>
                                <td>
                                    <a href="{{url('admin/hiringdetails/'.$request->id)}}" class="btn btn-tone btn-info btn-xs"> <i class="anticon anticon-eye"></i> </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
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


