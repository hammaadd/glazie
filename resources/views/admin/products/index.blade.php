@extends('admin-layout.layouts')
@section('title','Products List')
@section('content')
<link href="{{asset('admin-assets/vendors/datatables/dataTables.bootstrap.min.css')}}" rel="stylesheet">

<!-- page js -->

<div class="page-container">
    <div class="main-content">
        <div class="page-header">
            <h2 class="header-title ">Products</h2>
            <div class="header-sub-title float-right">
                <nav class="breadcrumb breadcrumb-dash">
                    <a href="{{url('admin/dashboard')}}" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Home</a>
                    <a class="breadcrumb-item" href="#">Products</a>
                    
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
                        <div class="d-md-flex">
                            <div class="m-b-10 m-r-15">
                                {{-- <select class="custom-select" style="min-width: 180px;">
                                    <option selected>Catergory</option>
                                    <option value="all">All</option>
                                    
                                </select> --}}
                            </div>
                            <div class="m-b-10">
                                <select class="custom-select" style="min-width: 180px;" id="status" onchange="filtertable()">
                                    <option value="">All</option>
                                    <option value="instock">In Stock </option>
                                    <option value="stockout">Out of Stock</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 text-right">
                        <a class="btn btn-primary" href="{{url('admin/products/add')}}">
                            <i class="anticon anticon-plus-circle m-r-5"></i>
                            <span>Add Product</span>
                        </a>
                    </div>
                </div>
                <div class="table-responsive" id="productstable">
                <table class="table table-hover" id="products">
                    <thead>
                        <th>Sr.#</th>
                        <th>Produt Name </th>
                        <th>Brand</th>
                        <th>Description</th>
                        <th>Available Quantity</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                    

                        @if(count($products)>0)
                        @foreach($products as $product)

                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$product->product_name}}</td>
                            <td>{{$product->brand_name}}</td>

                            <td>@php
                                echo substr($product->short_description, 0, 30);
                            @endphp</td>
                            <td>
                                @if ($product->quantity==0)
                                <span class="text-danger">Out of stock</span>
                                @else
                                <span class="text-success">In stock</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{url('admin/products/view/'.$product->id)}}" class="badge badge-warning"> <i class="fa fa-eye"></i> View</a>
                                <a href="{{url('admin/products/edit/'.$product->id)}}" class="badge badge-primary"> <i class="fa fa-edit"></i> Edit</a>
                                <a href="{{url('admin/products/delete/'.$product->id)}}" class="badge badge-danger" onclick="return confirm('Are You Sure to delete?')"> <i class="fa fa-trash"></i> Delete</a> 
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
    
    
    <link href="{{asset('admin-assets/vendors/datatables/dataTables.bootstrap.min.css')}}" rel="stylesheet">

@endsection
@section('script')

<!-- page js -->
<script src="{{asset('admin-assets/vendors/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('admin-assets/vendors/datatables/dataTables.bootstrap.min.js')}}"></script>
<script>
$("#products").DataTable();
function filtertable()
{
    var status = $('#status').val();
    url = "{{url('admin/products/filter')}}";
            $.ajax({
           type:'POST',
           url:url,
            data:{
                status:status,
               
            },
            success:function(result){
                $('#productstable').html(result);
            }
         		  	
               
         		
    });  
}
</script>
@endsection


