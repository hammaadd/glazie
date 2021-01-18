@extends('customer.layouts.layouts')
@section('title','Installer List')
@section('content')
<link href="{{asset('admin-assets/vendors/datatables/dataTables.bootstrap.min.css')}}" rel="stylesheet">
<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
<div class="page-container">
    <div class="main-content">
        <div class="page-header">
            <h2 class="header-title">Installer List</h2>
            <div class="header-sub-title">
                <nav class="breadcrumb breadcrumb-dash">
                    <a href="{{url('home')}}" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Home</a>
                    <a class="breadcrumb-item" href="#">Installer List</a>
                    
                </nav>
            </div>
        </div>
        @if (session('info'))
        <script type="text/javascript">toastr.success("{{session('info')}}");</script>
        @endif  
       <div class="row">
          <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                     <h2>Installer List</h2>
                </div>
                <div class="card-body">
                    <table class="table table-hover" id="installerlist">
                        <thead>
                            <tr>
                                <th>Sr</th>
                                <th>Installer Name</th>
                                <th>Phono No </th>
                                <th>Address</th>
                                <th>Action </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($installers as $installer)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$installer->name}}</td>
                                <td>{{$installer->contact_no}}</td>
                                <td>{{$installer->adddress}}</td>
                                <td>
                                    <a href="{{url('customer/installerdetails/'.$installer->id)}}" class="btn btn-warning btn-xs"> <i class="anticon anticon-eye"></i> view</a>
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

@endsection
@section('script')
<script src="{{url('admin-assets/js/pages/form-elements.js')}}"></script>
<script src="{{ url('admin-assets/vendors/jquery-validation/jquery.validate.min.js')}}"></script><script src="{{asset('admin-assets/vendors/datatables/jquery.dataTables.min.js')}}"></script>
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

$("#installerlist").DataTable();
</script>
@endsection
