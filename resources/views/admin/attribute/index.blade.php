@extends('admin-layout.layouts')
@section('title','Attributes ')
@section('content')
<link href="{{asset('admin-assets/vendors/datatables/dataTables.bootstrap.min.css')}}" rel="stylesheet">

<!-- page js -->

<div class="page-container">
    <div class="main-content">
        <div class="page-header">
            <h2 class="header-title">Attributes</h2>
            <div class="header-sub-title float-right">
                <nav class="breadcrumb breadcrumb-dash">
                    <a href="{{url('admin/dashboard')}}" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Home</a>
                    <a class="breadcrumb-item" href="#">Attributes</a>
                    
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
                <div class="card">
                    <div class="card-body">
                        
        <div class="row">
            <div class="col-md-12">
                <a  class="btn btn-primary  float-right mb-2" href="{{url('admin/attributes/add')}}"><i class="fa fa-plus"></i> Add New Attribute</a>
            </div>
            <div class="col-md-12">
                
                <div class="table-responsive" >
                <table class="table table-hover" id="brands">
                    <thead>
                        <th>Sr.#</th>
                        <th>Attribute Name</th>
                        
                        <th>Image</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                    
                        

                        @if(count($attributes)>0)
                        @foreach($attributes as $attribute)

                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{ $attribute->attribute_name}}</td>
                            
                            <td>
                            @if($attribute->image)
                                 <a href="{{ asset($attribute->image) }}" target="_blank"><img src="{{ asset($attribute->image) }}" alt="" class="rounded-circle " width="50px" height="50px"> </a> 
                            @endif
                            </td>
                            <td>
                               <a href="{{url('admin/attributes/edit/'.$attribute->id)}}" class="badge badge-primary"> <i class="fa fa-edit"></i> Edit</a>
                                <a href="{{url('admin/attributes/delete/'.$attribute->id)}}" class="badge badge-danger" onclick="return confirm('Are You Sure to delete?')"> <i class="fa fa-trash"></i> Delete</a> 
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
$("#brands").DataTable();
</script>
@endsection


