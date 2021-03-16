@extends('admin-layout.layouts')
@section('title','Categories List')
@section('content')
<link href="{{asset('admin-assets/vendors/datatables/dataTables.bootstrap.min.css')}}" rel="stylesheet">
<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
<!-- page js -->

<div class="page-container">
    <div class="main-content">
        <div class="page-header">
             <h2 class="header-title">Categories</h2>
            <div class="header-sub-title float-right">
                <nav class="breadcrumb breadcrumb-dash">
                    <a href="{{url('admin/dashboard')}}" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Home</a>
                    <a class="breadcrumb-item" href="#">Categories</a>
                    
                </nav>
            </div>
        </div>
        @if (session('info'))
        <script type="text/javascript">toastr.success("{{session('info')}}");</script>
        @endif   
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <a  class="btn btn-primary float-right m-3" href="{{url('admin/categories/add')}}"><i class="fa fa-plus-circle"></i> Add Category</a>
                    </div>
                    <div class="col-md-12">
                        <div class="table-responsive" ></div>
                        <table class="table table-hover" id="categories">
                            <thead>
                                <th>Sr.#</th>
                                <th>Catogory Name </th>
                                <th>Parent Category</th>
                               <th>Category Image</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                              
                                @if(count($categories)>0)
                                @foreach($categories as $category)
        
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{ $category->cat_name}}</td>
                                    <td>
                                        @php
                                        $i=0;
                                            if($category->parent_id==null){
                                                echo "<span class='text-danger' title='This is parent Category'> None </span>";
                                            }
                                            
                                            else{
                                                foreach ($categories as $key => $cat) {
                                                    if ($category->parent_id==$cat->id) {
                                                        echo $cat->cat_name;
                                                        $i=1;
                                                    }
                                                    
                                                }
                                                if ($i!=1) {
                                                    echo "<span class='text-danger' title='This is parent Category'> None </span>";
                                                }
                                            }
        
                                        @endphp
                                    </td>
                                    <td>
                                        @if($category->image) 
                                         <a href="{{ asset('/admin-assets/categories/'.$category->image) }}"><img src="{{ asset('/admin-assets/categories/'.$category->image) }}" alt="" class="rounded-circle " width="50px" height="50px"> </a> 
                                            @endif
                    
                                    </td>
                                    <td>
                                    {{-- <a href="{{url('admin/category/details/'.$category->id)}}" class="badge badge-info"> <i class="fa fa-eye"></i> Details</a> --}}
                                        <a href="{{url('admin/category/edit/'.$category->id)}}" class="badge badge-primary"> <i class="fa fa-eye"></i> edit</a>
                                        <a href="{{url('admin/category/delete/'.$category->id)}}" class="badge badge-danger" onclick="return confirm('Are You Sure to delete?')"> <i class="fa fa-trash"></i> Delete</a>
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
    
    
    

@endsection
@section('script')

<!-- page js -->
<script src="{{asset('admin-assets/vendors/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('admin-assets/vendors/datatables/dataTables.bootstrap.min.js')}}"></script>
<script>
$("#categories").DataTable();
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


