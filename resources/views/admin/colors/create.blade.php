@extends('admin-layout.layouts')
@section('title','Add On Type ')
@section('content')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<style>
    img:hover{
        cursor: pointer;
    }
</style>
<div class="page-container">
    <div class="main-content">
        <div class="page-header">
            <h2 class="header-title">Add On Type</h2>
            <div class="header-sub-title">
                <nav class="breadcrumb breadcrumb-dash float-right">
                    <a href="{{url('admin/dashboard')}}" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Home</a>
                    <a class="breadcrumb-item" href="#">Add New Color</a>
                    
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        @if(count($errors)>0)
                        @foreach($errors->all() as $error)
                        <div class="col-md-12 alert alert-danger text-light" style="background-color: #e2584c">
                            <li class="text-light" style="list-style-type: none">{{$error}}</</li>
                        </div>
                        @endforeach
                    @endif
                        <form action="{{url('admin/colors/store')}}" method="post" id="varieties">
                            <div class="form-group">
                                <label for="">Product</label>
                                <select name="product_id" class="form-control">
                                    @foreach ($products as $product)
                                       <option value="{{$product->id}}">{{$product->product_name}}</option> 
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                @csrf
                                <label for="">Color Name</label>
                                <input type="text" class="form-control" name="name" placeholder="Enter Color Name ">
                            </div>
                            <div class="form-group">
                                <label for="">Color Code</label>
                                <input type="color" class="form-control" name="color_code">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success" > <i class="fa fa-plus-circle"></i> Add Color</button>
                                <a href="{{url('admin/adontype')}}" class="btn btn-danger" > <i class="fa fa-times"></i> Cancel</a>
                            </div>
                        </form>
                    </div>
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
    $("#varieties").validate({
    ignore: ':hidden:not(:checkbox)',
    errorElement: 'label',
    errorClass: 'is-invalid',
    validClass: 'is-valid',
    rules: {
        name:{
            required:true
        },
        color_code:{
            required:true
        }
        }
});

    </script>
@endsection
