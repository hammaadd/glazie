@extends('admin-layout.layouts')
@section('title','Frame Colors')
@section('content')

<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
<link href="{{asset('admin-assets/vendors/datatables/dataTables.bootstrap.min.css')}}" rel="stylesheet">

<!-- page js -->

<div class="page-container">
    <div class="main-content">
        <div class="page-header">
            <h2 class="header-title ">Frame Colors </h2>
            <div class="header-sub-title float-right">
                <nav class="breadcrumb breadcrumb-dash">
                    <a href="{{url('admin/dashboard')}}" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Home</a>
                    <a class="breadcrumb-item" href="{{url('admin/addon/view/'.$id)}}">Product</a>
                    <a class="breadcrumb-item" href="#">Frame Colors</a>
                    
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
                            <a class="btn btn-primary" href="{{url('admin/framecolor/create/'.$id)}}">
                                <i class="anticon anticon-plus-circle m-r-5"></i>
                                <span>Add new Color </span>
                            </a>
                        </div>
                    </div> 
              
            <div class="col-md-12">
                
                <div class="table-responsive" ></div>
                <table class="table table-hover" id="brands">
                    <thead>
                        <th>Sr.#</th>
                        
                        <th>Color</th>
                        <th>Price </th>
                        <th>Quantity</th>
                        <th>Internal/Enternal</th>
                       <th> Action</th>
                    </thead>
                    <tbody>
                       

                        @if(count($framecolors)>0)
                        @foreach($framecolors as $colors)

                        <tr>
                            <td>{{$loop->iteration}}</td>
                           
                        <td><div style="background-color: {{$colors->value}}; height:50px; width:50px;border-radius:50%;" ></div></td>
                        <td>{{$colors->price}}</td>   
                        <td>{{$colors->quantity}}</td>   
                         <td>
                            @if ($colors->side=="external")
                            <span class="text-success"><b>External</b></span>
                            @else
                            <span class="text-danger"><b>Internal</b></span>
                            
                            @endif
                         </td>
                        <td><a href="{{url('admin/framecolor/edit/'.$colors->id)}}" class="btn btn-info btn-xs"> <i class="fa fa-edit"></i> Edit</a>
                                <a href="{{url('admin/framecolor/delete/'.$colors->id)}}" class="btn btn-danger btn-xs"> <i class="fa fa-trash"></i> Delete</a>
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


