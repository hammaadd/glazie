@extends('admin-layout.layouts')
@section('title','Products List')
@section('content')
<link href="{{asset('admin-assets/vendors/datatables/dataTables.bootstrap.min.css')}}" rel="stylesheet">

<!-- page js -->

<div class="page-container">
    <div class="main-content">
        <div class="page-header">
            <h2 class="header-title ">products</h2>
            <div class="header-sub-title">
                <nav class="breadcrumb breadcrumb-dash">
                    <a href="#" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Home</a>
                    <a class="breadcrumb-item" href="#">products</a>
                    
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
                                <select class="custom-select" style="min-width: 180px;">
                                    <option selected>Catergory</option>
                                    <option value="all">All</option>
                                    
                                </select>
                            </div>
                            <div class="m-b-10">
                                <select class="custom-select" style="min-width: 180px;" id="status" onchange="filtertable()">
                                    <option value="">All</option>
                                    <option value="in stock">In Stock </option>
                                    <option value="Out of stock">Out of Stock</option>
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
                <div class="table-responsive" >
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
                        <?php
                        $i=1;
                        ?>
                        

                        @if(count($products)>0)
                        @foreach($products as $product)

                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$product->product_name}}</td>
                            <td>{{$product->brand_name}}</td>

                            <td>{{$product->short_description}}</td>
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
function filtertable() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("status");
  filter = input.value.toUpperCase();
  table = document.getElementById("products");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[4];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}
</script>
@endsection


