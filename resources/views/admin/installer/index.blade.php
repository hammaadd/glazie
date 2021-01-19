@extends('admin-layout.layouts')
@section('title','Installer List')
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
                    <a class="breadcrumb-item" href="#">Installer List</a>
                    
                </nav>
            </div>
        </div>
        @if (session('info'))
            <script type="text/javascript">toastr.success("{{session('info')}}");</script>
        @endif  
        <div class="card">
            <div class="card-body">
                <div class="row m-b-30">
                    <div class="col-lg-8">
                        <div class="d-md-flex">
                            <div class="m-b-10">
                                {{-- <select class="custom-select" style="min-width: 180px;" >
                                    <option selected>Status</option>
                                    <option value="all">All</option>
                                    <option value="approved">Approved</option>
                                    <option value="pending">Pending</option>
                                    <option value="rejected">Rejected</option>
                                </select> --}}
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 text-right">
                        <a href="{{url('admin/addinstaller')}}" class="btn btn-primary">
                            <i class="anticon anticon-plus-circle"></i>
                            <span> Add New Installer</span>
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive" ></div>
                        <table class="table table-hover" id="categories">
                            <thead>
                                <th>Sr.#</th>
                                <th>Installer Name </th>
                                <th>Email</th>
                                <th>Contact No</th>
                               
                               <th>Joining Date</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                @foreach ($installers as $installer)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$installer->name}}</td>
                                        <td>{{$installer->email}}</td>
                                        <td>{{$installer->contact_no}}</td>
                                       
                                        <td>{{$installer->created_at}}</td>
                                        <td>
                                            <a href="{{url('admin/installerdetails/'.$installer->id)}}" class="badge badge-warning" title="Details "> <i class="fa fa-eye"></i> Details</a>
                                            <a href="{{url('admin/editinstaller/'.$installer->id)}}" class="badge badge-info" title=""><i class="anticon anticon-edit"> </i> Edit</a>
                                            <a href="{{url('admin/delteinstaller/'.$installer->id)}}" class="badge badge-danger badge-xs" onclick="return confirm('Are you sue to delete installer??')"> <i class="fa fa-trash"></i> Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
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


