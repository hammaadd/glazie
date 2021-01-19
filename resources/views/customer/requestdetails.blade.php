@extends('customer.layouts.layouts')
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
            {{-- <h2 class="header-title">Categories</h2> --}}
            <div class="header-sub-title">
                <nav class="breadcrumb breadcrumb-dash">
                    <a href="{{url('admin/dashboard')}}" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Home</a>
                    <a class="breadcrumb-item" href="#">Categories</a>
                    
                </nav>
            </div>
        </div>
        
      <div class="row">
          <div class="col-md-12">
              <div class="card">
                  <div class="card-header" style="background-color: #e3e3e3">
                      <h2 class="mt-1">User Information </h2>
                  </div>
                  <div class="card-body">
                      
                      <div class="row mt-2">
                          <div class="col-md-12" style="background-color: #E3E3E3">
                              <h2>Installer Information </h2>
                          </div>
                      </div>
                      <div class="row">
                        <div class="col-md-3">
                            <h5 class=""><b>Name:</b></h5> 
                        </div>
                        <div class="col-md-5">
                            <h5>{{$requesthire->installer->name}} </h5>
                        </div>
                    </div>
                      <div class="row">
                        <div class="col-md-3">
                            <h5 class=""><b>Address:</b></h5> 
                        </div>
                        <div class="col-md-5">
                            <h5>{{$requesthire->installer->address}} </h5>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-3">
                            <h5 class=""><b>Contact No:</b></h5> 
                        </div>
                        <div class="col-md-5">
                            <h5>{{$requesthire->installer->contact_no}} </h5>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-3">
                            <h5 class=""><b>Email Address:</b></h5> 
                        </div>
                        <div class="col-md-5">
                            <h5 class="text-info"><a href="mailto:{{$requesthire->installer->email}}">{{$requesthire->installer->email}}</a> </h5>
                        </div>
                      </div>
                      <div class="row">
                          <div class="col-md-12 mt-2" style="background-color: #E3E3E3">
                              <h2 class="mt-1">Working Details</h2>
                          </div>
                      </div>
                      <div class="row mt-3">
                          <div class="col-md-3">
                              <h5 class="font-weight-bold ">Estimated Time</h5>
                          </div>
                          <div class="col-md-9">
                              <h5 class="text-info">{{$requesthire->estimated_time}}</h5>
                          </div>
                      </div>
                      <div class="row mt-3">
                        <div class="col-md-3">
                            <h5 class="font-weight-bold ">Estimated Budget</h5>
                        </div>
                        <div class="col-md-9">
                            <h5 class="text-info">{{$requesthire->amount}}</h5>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-3">
                            <h5 class="font-weight-bold ">Working Details</h5>
                        </div>
                        <div class="col-md-9">
                            <h5>{!!$requesthire->working_details!!}</h5>
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


