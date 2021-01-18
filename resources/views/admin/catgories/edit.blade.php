@extends('admin-layout.layouts')
@section('title','Categories')
@section('content')
<div class="page-container">
    <div class="main-content">
        <div class="page-header">
            <h2 class="header-title">Categories</h2>
            <div class="header-sub-title">
                <nav class="breadcrumb breadcrumb-dash">
                    <a href="{{url('admin/dashboard')}}" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Home</a>
                    <a href="{{url('admin/categories')}}" class="breadcrumb-item">Categories</a>
                    <a class="breadcrumb-item" href="#">Edit Category</a>
                    
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="card">
                    <form action="{{ url('/admin/category/update/'.$categories->id)}}"  method="post" enctype="multipart/form-data">
                    <div class="card-header">
                        <h4 class="card-title">Edit Category</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                        @csrf
                        <div class="col-md-12">
                        @if(count($errors)>0)
                            @foreach($errors->all() as $error)
                            <div class="alert alert-danger ">
                                {{$error}}
                            </div>
                            @endforeach
                            @endif
                            
                            </div>
                                        <br>
                            <label for="" >Select Parent category</label>
                            
                            <select name="parent_id"  class="form-control">
                                <option value="">Select Parent Category</option>
                                @foreach($select_cat as $catgry)
                                <option value="<?php echo $catgry->id ?>" 
                                    <?php
                                        if($catgry->id==$categories->parent_id){
                                            echo "selected";
                                        }
                                    ?>
                                ><?php echo $catgry->cat_name ?></option>
                                @endforeach
                            </select>
                            
                        </div>
                        <div class="row">
                            <label for="">Category Name</label>
                            <input type="text" class="form-control" name="cat_name" value="{{$categories->cat_name}}">
                        </div>
                        <div class="row">
                            <label for="">Image</label>
                            <input type="file" class="form-control" name="image">
                        </div>
                        <div class="row">
                            <label for="">Description</label>
                            <textarea name="description" class="form-control" rows="10">{{$categories->description}}</textarea>
                        </div>
                        
                        <div class="row">
                            <button type="submit" class="btn btn-success mt-3"><i class="fa fa-edit"></i> Update Category</button>
                            <a href="{{url('admin/categories')}}" class="btn btn-danger mt-3 ml-3"><i class="fa fa-times"></i> Cancel</a>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
            
        </div>
        
    </div>

@endsection


