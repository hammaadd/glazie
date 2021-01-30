@extends('admin-layout.layouts')
@section('title','Add New Category')
@section('content')
<div class="page-container">
    <div class="main-content">
        <div class="page-header">
            {{-- <h2 class="header-title">Add New Categories</h2> --}}
            <div class="header-sub-title">
                <nav class="breadcrumb breadcrumb-dash">
                    <a href="{{url('admin/dashboard')}}" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Home</a>
                    <a href="{{url('admin/categories')}}" class="breadcrumb-item m-r-5">Categories List</a>
                    <a class="breadcrumb-item" href="#">Add New Categories</a>
                    
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="card">
                    <form action="{{ url('/admin/category/create')}}"  method="post" id="categories" enctype="multipart/form-data">
                    <div class="card-header">
                        <h4 class="card-title">Add Category</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                        @csrf
                        @if(count($errors)>0)
                        @foreach($errors->all() as $error)
                        <div class="col-md-12">
                            <div class="alert alert-danger text-light" style="background-color: #e2584c">
                                {{$error}}
                            </div>
                        </div>
                        @endforeach
                        @endif
                            <br>
                            <label for="" >Select Parent category</label>
                            
                            <select name="parent_id"  class="form-control">
                                <option value="">Select Parent Category</option>
                                @foreach($categories as $category)
                                <option value="<?php echo $category->id ?>"><?php echo $category->cat_name ?></option>
                                @endforeach
                            </select>
                            
                        </div>
                        <div class="row">
                            <label for="">Category Name</label>
                            <input type="text" class="form-control" name="category_name" value="{{old('cat_name')}}" placeholder="Category Name">
                           
                        </div>
                        <div class="row">
                            <label for="">Image</label>
                            <input type="file" class="form-control" name="image">
                        </div>
                        <div class="row">
                            <label for="">Description</label>
                            <textarea name="description" class="form-control" rows="10" placeholder="Description"> {{old('description')}}</textarea>
                        </div>
                        
                        <div class="row">
                            <button type="submit" class="btn btn-success mt-3"><i class="fa fa-plus"></i> Create Category</button>
                            <a href="{{url('admin/categories')}}" class="btn btn-danger mt-3 ml-3"><i class="fa fa-times"></i> Cancel</a>
                       
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


   
    <script src="{{ url('admin-assets/vendors/jquery-validation/jquery.validate.min.js')}}"></script>
    <script>
    
    
    $("#categories").validate({
    ignore: ':hidden:not(:checkbox)',
    errorElement: 'label',
    errorClass: 'is-invalid',
    validClass: 'is-valid',
    rules: {
        category_name: {
            required: true
        }
    }
});

    </script>

   
@endsection
