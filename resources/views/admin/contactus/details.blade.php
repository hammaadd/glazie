@extends('admin-layout.layouts')
@section('title','User Messages')
@section('content')
<link href="{{asset('admin-assets/vendors/datatables/dataTables.bootstrap.min.css')}}" rel="stylesheet">

<!-- page js -->

<div class="page-container">
    <div class="main-content">
        <div class="page-header">
            <h2 class="header-title ">User Messages</h2>
            <div class="header-sub-title">
                <nav class="breadcrumb breadcrumb-dash">
                    <a href="#" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Home</a>
                    <a class="breadcrumb-item" href="#">Message</a>
                    
                </nav>
            </div>
        </div>
        @if(session('info'))
				<div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <div class="alert alert-success" style="background-color: green;color:white;"><i class="fa fa-check"></i> {{session('info')}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="color: white"><span aria-hidden="true">&times;</span></button>
                        </div>

                    </div>
                </div>
				@endif
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body" style="background-color: #F9FBF8">
                        <div class="row">
                            <div class="col-md-10">
                                <h2 class="font-weight-bold">User Details</h2>
                            </div>
                            <div class="col-md-2">
                                <a href="{{url('admin/messagedelete/'.$messagedetail->id)}}" class="btn btn-danger m-1" onclick="return confirm('Are You Sure ?')"> <i class="fa fa-trash"></i> Delete</a></td>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <h5 class="font-weight-bold">Name:</h5>
                                <h5 class="font-weight-bold">Email</h5>
                            </div>
                            <div class="col-md-10">
                                <h5>{{$messagedetail->name}}</h5>
                                <h5>{{$messagedetail->email}}</h5>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-md-12">
                                <h2 class="font-weight-bold">Message</h2>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-10">
                                {{$messagedetail->message}}
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
<script>
$("#brands").DataTable();
</script>
@endsection


