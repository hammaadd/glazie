@extends('admin-layout.layouts')
@section('title','Product Size')
@section('content')
<link href="{{asset('admin-assets/vendors/datatables/dataTables.bootstrap.min.css')}}" rel="stylesheet">

<!-- page js -->

<div class="page-container">
    <div class="main-content">
        <div class="page-header">
            <h2 class="header-title ">Product Size</h2>
            <div class="header-sub-title">
                <nav class="breadcrumb breadcrumb-dash">
                    <a href="#" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Home</a>
                    <a class="breadcrumb-item" href="#">Product Size</a>
                    
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
            <div class="col-md-3">
                <a  class="btn btn-success btn-xs" href="{{url('admin/productsize/add')}}"><i class="fa fa-plus"></i>Add New Size </a>
            </div>
            <div class="col-md-12">
                
                <div class="table-responsive" ></div>
                <table class="table table-hover" id="brands">
                    <thead>
                        <th>Sr.#</th>
                        <th>prodcut Name </th>
                        <th>Size Name</th>
                        <th>Price</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        <?php
                        $i=1;
                        ?>
                        

                        @if(count($products)>0)
                        @foreach($products as $product)

                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $product->product_name; ?></td>
                            <td><?php echo $product->	name; ?></td>
                            <td><?php echo $product->price; ?></td>
                            
                            <td>
                               <a href="{{url('admin/productsize/edit/'.$product->id)}}" class="badge badge-primary"> <i class="fa fa-edit"></i> Edit</a>
                                <a href="{{url('admin/productsize/delete/'.$product->id)}}" class="badge badge-danger" onclick="return confirm('Are You Sure to delete?')"> <i class="fa fa-trash"></i> Delete</a> 
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


