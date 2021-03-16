@extends('admin-layout.layouts')
@section('title','Coupen List')
@section('content')
<link href="{{asset('admin-assets/vendors/datatables/dataTables.bootstrap.min.css')}}" rel="stylesheet">

<!-- page js -->

<div class="page-container">
    <div class="main-content">
        <div class="page-header">
            <h2 class="header-title ">Coupun</h2>
            <div class="header-sub-title float-right">
                <nav class="breadcrumb breadcrumb-dash">
                    <a href="#" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Home</a>
                    <a class="breadcrumb-item" href="#">Coupun</a>
                    
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
                            {{-- <div class="m-b-10 m-r-15">
                                <select class="custom-select" style="min-width: 180px;">
                                    <option selected>Catergory</option>
                                    <option value="all">All</option>
                                    
                                </select>
                            </div> --}}
                            {{-- <div class="m-b-10">
                                <select class="custom-select" style="min-width: 180px;" id="status" onchange="filtertable()">
                                    <option value="">All</option>
                                    <option value="in stock">In Stock </option>
                                    <option value="Out of stock">Out of Stock</option>
                                </select>
                            </div> --}}
                        </div>
                    </div>
                    <div class="col-lg-4 text-right">
                        <a class="btn btn-primary" href="{{url('admin/coupen/create')}}">
                            <i class="anticon anticon-plus-circle m-r-5"></i>
                            <span>Add Coupun</span>
                        </a>
                    </div>
                </div>
                <div class="table-responsive" >
                <table class="table table-hover" id="products">
                    <thead>
                        <th>Sr.#</th>
                        <th>Coupun Name </th>
                        <th>Coupun Code</th>
                        
                        <th>Status</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        

                        @if(count($coupens)>0)
                        @foreach($coupens as $coupen)

                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$coupen->coupen_name}}</td>
                            <td>{{$coupen->coupen_code}}</td>
                            @php
                                $date = date('Y-M-d');
                            @endphp

                            <td>
                                @if (($coupen->limiteduser=='yes' && $coupen->no_of_user<=0)||($coupen->limited_time=='yes' && $coupen->limited_time<$date))
                                <span class="text-danger">Used</span>
                               @else
                                <span class="text-success">Unuse</span>
                                @endif
                            </td>
                            <td>
                               
                                <a href="{{url('admin/coupen/edit/'.$coupen->id)}}" class="badge badge-primary"> <i class="fa fa-edit"></i> Edit</a>
                                <a href="{{url('admin/coupen/delete/'.$coupen->id)}}" class="badge badge-danger" onclick="return confirm('Are You Sure to delete?')"> <i class="fa fa-trash"></i> Delete</a> 
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
    
    


@endsection
@section('script')

<!-- page js -->
<script src="{{asset('admin-assets/vendors/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('admin-assets/vendors/datatables/dataTables.bootstrap.min.js')}}"></script>
<script>
$("#products").DataTable();

</script>
@endsection


