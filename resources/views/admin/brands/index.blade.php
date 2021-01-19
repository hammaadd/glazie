@extends('admin-layout.layouts')
@section('title','Brands List')
@section('content')
<link href="{{asset('admin-assets/vendors/datatables/dataTables.bootstrap.min.css')}}" rel="stylesheet">

<!-- page js -->

<div class="page-container">
    <div class="main-content">
        <div class="page-header">
            <h2 class="header-title ">Brands</h2>
            <div class="header-sub-title">
                <nav class="breadcrumb breadcrumb-dash">
                    <a href="{{url('admin/dashboard')}}" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Home</a>
                    <a class="breadcrumb-item" href="#">Brands</a>
                    
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
                <div class="card-body">
                    <div class="row m-b-30">
                        <div class="col-lg-8">
                            
                        </div>
                        <div class="col-lg-4 text-right">
                            <a class="btn btn-primary" href="{{url('admin/brands/add')}}">
                                <i class="anticon anticon-plus-circle m-r-5"></i>
                                <span>Add New Brand</span>
                            </a>
                        </div>
                    </div> 
              
            <div class="col-md-12">
                
                <div class="table-responsive" ></div>
                <table class="table table-hover" id="brands">
                    <thead>
                        <th>Sr.#</th>
                        <th>Brand Name</th>
                        <th>Description</th>
                        <th></th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        <?php
                        $i=1;
                        ?>
                        

                        @if(count($brands)>0)
                        @foreach($brands as $brand)

                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $brand->brand_name; ?></td>
                            <td><?php echo $brand->description; ?></td>
                            <td><?php 
                            if ($brand->image) {?>
                                 <a href="{{ asset('/admin-assets/brands/'.$brand->image) }}"><img src="{{ asset('/admin-assets/brands/'.$brand->image) }}" alt="" class="rounded-circle " width="50px" height="50px"> </a> 
                            <?php }
                            ?></td>
                            <td>
                        {{-- <a href="{{url('admin/brands/edit/'.$brand->id)}}" class="badge badge-warning"> <i class="fa fa-eye"></i> Details</a> --}}
                                <a href="{{url('admin/brands/edit/'.$brand->id)}}" class="badge badge-primary"> <i class="fa fa-edit"></i> Edit</a>
                                <a href="{{url('admin/brands/delete/'.$brand->id)}}" class="badge badge-danger" onclick="return confirm('Are You Sure to delete?')"> <i class="fa fa-trash"></i> Delete</a> 
                            </td>
                        </tr>
                        <?php
                        $i++; ?>
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
@endsection


