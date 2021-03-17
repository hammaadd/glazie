@extends('admin-layout.layouts')
@section('title','Website Content')
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
                    <a class="breadcrumb-item" href="#">Web Content</a>
                    
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
                               
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 text-right">
                        <a class="btn btn-primary" href="{{url('admin/cms/add')}}">
                            <i class="anticon anticon-plus-circle m-r-5"></i>
                            <span>Add new Page</span>
                        </a>
                    </div>
                </div>
                <div class="table-responsive" >
                <table class="table table-hover" id="content">
                    <thead>
                        <th>Sr.#</th>
                        <th>Page Title</th>
                        <th>Image</th>
                        <th>Action</th>
                    </thead>
                    <tbody> 
                        @foreach ($contents as $content)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$content->title}}</td>
                                <td>
                                    @if ($content->image)
                                        <img src="{{asset('admin-assets/cms/'.$content->image)}}" alt="" width="60px" height="60px">
                                    @endif
                                </td>
                                <td>
                                    <a href="{{url('admin/cms/view/'.$content->id)}}" class="btn btn-info btn-xs"><i class="fa fa-eye"></i> View</a>
                                    
                                    <a href="{{url('admin/cms/edit/'.$content->id)}}" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Edit</a>
                                    
                                    <a href="{{url('admin/cms/delete/'.$content->id)}}" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Delete</a>


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
    <!-- Model Start Here-->
    
    
    

@endsection
@section('script')

<!-- page js -->
<script src="{{asset('admin-assets/vendors/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('admin-assets/vendors/datatables/dataTables.bootstrap.min.js')}}"></script>
<script>
$("#content").DataTable();
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


