@extends('admin-layout.layouts')
@section('title','Product Variety')
@section('content')
<link href="{{asset('admin-assets/vendors/datatables/dataTables.bootstrap.min.css')}}" rel="stylesheet">
<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>



<!-- page js -->

<div class="page-container">
    <div class="main-content">
        <div class="page-header">
            <h2 class="header-title ">Varities</h2>
            <div class="header-sub-title float-right">
                <nav class="breadcrumb breadcrumb-dash ">
                    <a href="{{url('admin/dashboard')}}" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Home</a>
                    <a class="breadcrumb-item" href="#">Product Variety </a>
                    
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
                       <div class="row">
                           <div class="col-md-12">
                            <a href="{{url('admin/prdvariety/create')}}" class="btn btn-primary float-right mb-3"> <i class="fa fa-plus"></i> Add New Variety</a>
                           </div>
                       </div>
                       <div class="row">

                           <div class="col-md-12">
                               
                               <table class="table table-hover" id="subscription">
                                   <thead>
                                       <tr>
                                           <th>Sr #</th>
                                           <th>Name </th>
                                           <th>Action</th>
                                       </tr>
                                   </thead>
                                   <tbody>
                                       @foreach ($varieties as $variety)
                                           <tr>
                                               <td>{{$loop->iteration}}</td>
                                               <td>{{$variety->prd_name}}</td>
                                               <td>
                                                <a href="{{url('admin/prdvariety/edit/'.$variety->id)}}" class="btn btn-info btn-xs" > <i class="anticon anticon-edit"></i> Edit</a>
                                                   <a href="{{url('admin/prdvariety/delete/'.$variety->id)}}" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure to remove')"> <i class="anticon anticon-delete"></i> Delete</a>
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
    </div>
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

$("#subscription").DataTable();


</script>
@endsection


