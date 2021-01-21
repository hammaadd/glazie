@extends('admin-layout.layouts')
@section('title','Categories')
@section('content')

<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
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
                                @if ($categories->id!=$catgry->id)
                                    
                                
                                <option value="<?php echo $catgry->id ?>" 
                                    <?php
                                        if($catgry->id==$categories->parent_id){
                                            echo "selected";
                                        }
                                    ?>
                                ><?php echo $catgry->cat_name ?></option>
                                @endif
                                @endforeach
                            </select>
                            
                        </div>
                        <div class="row">
                            <label for="">Category Name</label>
                            <input type="text" class="form-control" name="cat_name" value="{{$categories->cat_name}}">
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-4"></div>
                            <div class="col-md-4" id="imagediv">
                                @if ($categories->image)
                                    <img src="{{asset('admin-assets/categories/'.$categories->image)}}" alt="" width="100px" height="100px">
                                    <button type="button" class="btn btn-danger btn-xs mt-2" onclick="deleteimage({{$categories->id}})"> <i class="fa fa-times"></i> Remove Image</button>
                                @endif
                            </div>
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
@section('script')
{{-- <script src="{{url('admin-assets/js/pages/form-elements.js')}}"></script> --}}


    <script src="{{url('admin-assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
    <script src="{{ url('admin-assets/vendors/jquery-validation/jquery.validate.min.js')}}"></script>
   <script>
    function deleteimage(id)
    {
        $.ajaxSetup({
				headers:{'X-CSRF-Token':'{{csrf_token()}}'}
            });
            url = "{{url('admin/brands/removeimage')}}";
            console.log(url);
            $.ajax({
           type:'POST',
           url:url,
            data:{
                id:id,
                type:"categories"
           },
           success:function(result){
               if(result=="1")
               {
                   $("#imagediv").remove();
                   toastr.success("The image removed successfully");
               }
           }
            });
    }
            
    $("#form-validation").validate({
    ignore: ':hidden:not(:checkbox)',
    errorElement: 'label',
    errorClass: 'is-invalid',
    validClass: 'is-valid',
    rules: {
        oldpwd: {
            required: true
        },
        newpwd: {
            required: true
           
        },
        conf_password: {
            required: true ,
            equalTo: '#cpassword'  
        }
    }
});


    </script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": true,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }
    </script>
@endsection



