@extends('admin-layout.layouts')
@section('title','Frame Glasses')
@section('content')

<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
<link href="{{asset('admin-assets/vendors/datatables/dataTables.bootstrap.min.css')}}" rel="stylesheet">

<!-- page js -->

<div class="page-container">
    <div class="main-content">
        <div class="page-header">
            <h2 class="header-title ">Frame Glasses </h2>
            <div class="header-sub-title float-right">
                <nav class="breadcrumb breadcrumb-dash">
                    <a href="{{url('admin/dashboard')}}" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Home</a>
                    <a class="breadcrumb-item" href="{{url('admin/addon/view/'.$addon_id)}}">Product</a>
                    <a class="breadcrumb-item" href="#">Frame Glasses</a>
                    
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
                            
                        </div>
                        <div class="col-lg-4 text-right">
                            <a class="btn btn-primary" href="{{url('admin/frameglass/create/'.$id)}}">
                                <i class="anticon anticon-plus-circle m-r-5"></i>
                                <span>Add Frame Glass </span>
                            </a>
                        </div>
                    </div> 
              
            <div class="col-md-12">
                
                <div class="table-responsive" ></div>
                <table class="table table-hover" id="brands">
                    <thead>
                        <th>Sr.#</th>
                        
                        <th>Glass Name</th>
                        <th>Image </th>
                        <th>Quantity</th>
                        <th>Price</th>
                       <th> Action</th>
                    </thead>
                    <tbody>
                       

                        @if(count($frameglass)>0)
                        @foreach($frameglass as $fglass)

                        <tr>
                            <td>{{$loop->iteration}}</td>
                           
                            <td>{{$fglass->glass_name}}</td>
                            <td><img src="{{asset('admin-assets/addon/frameglass/'.$fglass->image)}}" height="100px"></td>
                            <td>{{$fglass->price}}</td>   
                            <td>{{$fglass->quantity}}</td>   
                            
                            <td>
                                <a href="{{url('admin/frameglass/edit/'.$fglass->id)}}" class="btn btn-info btn-xs"> <i class="fa fa-edit"></i> Edit</a>
                                <a href="{{url('admin/frameglass/delete/'.$fglass->id)}}" class="btn btn-danger btn-xs"> <i class="fa fa-trash"></i> Delete</a>
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
</script>
@endsection


