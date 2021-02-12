@extends('admin-layout.layouts')
@section('title','Social ')
@section('content')
<div class="page-container">
    <div class="main-content">
        <div class="page-header">
            <h2 class="header-title">Site</h2>
            <div class="header-sub-title">
                <nav class="breadcrumb breadcrumb-dash">
                    <a href="#" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Home</a>
                    <a class="breadcrumb-item" href="#">Add New Social </a>
                    
                </nav>
            </div>
        </div>
        <div class="row">
            
            <div class="col-md-12">
                <div class="card">
                    <form action="{{ url('admin/social/store')}}"  method="post" enctype="multipart/form-data" id="create_size">
                    <div class="card-header">
                        @csrf
                        <h4 class="card-title">Add NewSocail </h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                        @if(count($errors)>0)
                                @foreach($errors->all() as $error)
                                <div class="col-md-6">
                                    <div class="alert alert-danger text-light bg-danger">
                                        {{$error}}
                                    </div>
                                </div>
                                @endforeach
                            @endif
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">Key</label>
                                <input type="text" class="form-control" name="key" placeholder="Enter Key">
                            </div>
                            <div class="col-md-6">
                                <label for="">Value</label>
                                <input type="text" class="form-control" name="value" placeholder="Enter Value Of key">
                            </div>
                        </div>
                                                  
                        <div class="row">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-success mt-3"><i class="fa fa-plus"></i> Add New Social</button>
                            <a href="{{url('admin/social') }}" class="btn btn-danger mt-3 ml-3"> <i class="fa fa-times"></i> Cancel</a>
                       
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
            
        </div>
      
    </div>

@endsection
@section('script')
<script src="{{url('admin-assets/js/pages/form-elements.js')}}"></script>


    <script src="{{url('admin-assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
    <script src="{{ url('admin-assets/vendors/jquery-validation/jquery.validate.min.js')}}"></script>
    <script>
    
   
    $("#create_size").validate({
    ignore: ':hidden:not(:checkbox)',
    errorElement: 'label',
    errorClass: 'is-invalid',
    validClass: 'is-valid',
    rules: {
        product_id: {
            required: true
        },
        name: {
            required: true
           
        },
        height: {
            required: true ,
             
        },
        width: {
            required: true ,
             
        },
        thikness: {
            required: true ,
             
        },
        price: {
            required: true ,
             
        }

    }
});

    </script>
@endsection
