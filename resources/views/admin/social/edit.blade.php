@extends('admin-layout.layouts')
@section('title','Social ')
@section('content')
<div class="page-container">
    <div class="main-content">
        <div class="page-header">
            <h2 class="header-title">Site</h2>
            <div class="header-sub-title float-right">
                <nav class="breadcrumb breadcrumb-dash">
                    <a href="#" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Home</a>
                    <a class="breadcrumb-item" href="#">Update Social </a>
                    
                </nav>
            </div>
        </div>
        <div class="row">
            
            <div class="col-md-12">
                <div class="card">
                    <form action="{{ url('admin/social/update/'.$social->id)}}"  method="post" enctype="multipart/form-data" id="create_size">
                    <div class="card-header">
                        @csrf
                        <h4 class="card-title">Update Social </h4>
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
                                <input type="text" class="form-control" name="key" placeholder="Enter Key" value="{{$social->key}}">
                            </div>
                            <div class="col-md-6">
                                <label for="">Value</label>
                                <input type="text" class="form-control" name="value" placeholder="Enter Value Of key"value="{{$social->value}}">
                            </div>
                        </div>
                                             
                        <div class="row">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-success mt-3"><i class="fa fa-plus"></i> Update Social</button>
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
