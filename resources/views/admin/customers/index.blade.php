@extends('admin-layout.layouts')
@section('title','Customers List')
@section('content')
<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>

<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
<link href="{{asset('admin-assets/vendors/datatables/dataTables.bootstrap.min.css')}}" rel="stylesheet">
<div class="page-container">
    <div class="main-content">
        <div class="page-header">
            <h2 class="header-title">Customers</h2>
            <div class="header-sub-title float-right">
                <nav class="breadcrumb breadcrumb-dash">
                    <a href="#" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Home</a>
                    <a class="breadcrumb-item" href="#">Customer</a>
                    
                </nav>
            </div>
        </div>
        @if (session('info'))
        <script type="text/javascript">toastr.success("{{session('info')}}");</script>
    @endif
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                <div class="row m-b-30">
                    <div class="col-lg-8">
                        <div class="d-md-flex">
                            
                            <div class="m-b-10">
                                <select class="custom-select" style="min-width: 180px;" id="status" onchange="filtertable()">
                                    <option value="">All</option>
                                    <option value="Active">Activate</option>
                                    <option value="de activate">Deactivate</option>
                                    <option value="suspend">Suspend</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 text-right">
                        <a class="btn btn-primary" href="{{url('admin/customers/add')}}">
                            <i class="anticon anticon-plus-circle m-r-5"></i>
                            <span>Add Customer</span>
                        </a>
                    </div>
                </div>
                <div class="table-responsive" >
                <table class="table table-hover" id="products">
                    <thead>
                        <th>Sr.#</th>
                        <th>Customer Name  </th>
                        <th>Email</th>
                        <th>Contact No </th>
                        <th>Activate /Deactivate</th>
                        <th>Action</th>
                    </thead>
                    <tbody>                    
                        @if(count($customers)>0)
                        @foreach($customers as $customer)

                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$customer->first_name}} {{$customer->last_name}}</td>
                            <td>{{$customer->email}}</td>
                            
                            <td>{{$customer->contact_no}}</td>
                            <td>
                                @if ($customer->login_status=='activate')
                                <span class="badge badge-pill  badge-green">Active</span>
                                @endif
                                @if ($customer->login_status=='deactivate')
                                <span class="badge badge-pill  badge-red">De Activate</span>   
                                @endif
                                @if ($customer->login_status=='suspend')
                                <span class="badge badge-pill  badge-orange">Suspend</span>
                                @endif
                                
                            </td>
                            <td>
                                <a href="{{url('admin/customers/details/'.$customer->id)}}" title="Details" class="badge badge-warning"> <i class="fa fa-eye"></i> </a>
                                <a href="{{url('admin/customers/edit/'.$customer->id)}}" title="Edit" class="badge badge-primary"> <i class="fa fa-edit"></i> </a>
                                <a href="{{url('admin/customers/delete/'.$customer->id)}}" title="Delete" class="badge badge-danger" onclick="return confirm('Are You Sure to delete?')"><i class="fa fa-trash"></i></a> 
                                <a href="{{url('admin/customers/deactivate/'.$customer->id)}}" title="De Activate Account" class="badge badge-danger" onclick="return confirm('Are You Sure to to de activate?')"><i class="fa fa-times"></i></a> 
                            </td>
                        </tr>
                       
                        @endforeach
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
    
    
    <link href="{{asset('admin-assets/vendors/datatables/dataTables.bootstrap.min.css')}}" rel="stylesheet">

@endsection
@section('script')

<!-- page js -->
<script src="{{asset('admin-assets/vendors/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('admin-assets/vendors/datatables/dataTables.bootstrap.min.js')}}"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
$("#products").DataTable();
function filtertable() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("status");
  filter = input.value.toUpperCase();
  table = document.getElementById("products");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[4];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}



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
@endsection


