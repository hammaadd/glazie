@extends('admin-layout.layouts')
@section('title','Add New Brand')
@section('content')
<div class="page-container">
    <div class="main-content">
        <div class="page-header">
            <h2 class="header-title">Add New Brand</h2>
            <div class="header-sub-title">
                <nav class="breadcrumb breadcrumb-dash">
                    <a href="{{url('admin/dashboard')}}" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Home</a>
                    <a href="{{url('admin/brands')}}" class="breadcrumb-item"></i>Brands</a>
                    <a class="breadcrumb-item" href="#">Add New Brand</a>
                    
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="card">
                    <form action="{{ url('/admin/brands/create')}}"  method="post" enctype="multipart/form-data">
                    <div class="card-header">
                        <h4 class="card-title">Add New Brand</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                        @if(count($errors)>0)
                                @foreach($errors->all() as $error)
                                <div class="alert alert-danger">
                                    {{$error}}
                                </div>
                                @endforeach
                            @endif
                        </div>
                        <div class="row">
                            @csrf
                            <label for="">Brand Name</label>
                            <input type="text" class="form-control" name="brand_name" placeholder="Brand Name" autofocus>
                            
                        </div>
                        <div class="row">
                            
                            <label for="">Brand Image </label>
                            <input type="file" class="form-control" name="image" placeholder="Brand Image" >
                            
                        </div>
                        <div class="row">
                            
                            <label for="">Descrition </label>
                            <textarea name="description" class="form-control" cols="30" rows="10"></textarea>
                        </div>
                        
                        <div class="row">
                            <button type="submit" class="btn btn-success mt-3"><i class="fa fa-plus"></i> Create brand</button>
                       
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
    <script src="{{ url('admin-assets/vendors/jquery-validation/jquery.validate.min.js')"></script>
    <script>
        var pwd = document.getElementById('oldpwd');
        var eye1 = document.getElementById('eye1');

        eye1.addEventListener('click',togglePass);

        function togglePass(){
        eye1.classList.toggle('active');
        
        (pwd.type=='password')? pwd.type='text' :
        pwd.type='password';
        eye.classList.toggle('active');
        
        

    }
        var newpwd = document.getElementById('newpwd');
        var conpwd = document.getElementById('cpassword');
        var eye2 = document.getElementById('eye2');

        eye2.addEventListener('click',togglePass1);

        function togglePass1(){
        eye2.classList.toggle('active');
        
        (newpwd.type=='password')? newpwd.type='text' :
        newpwd.type='password';
        (conpwd.type=='password')? conpwd.type='text' :
        conpwd.type='password';
        eye2.classList.toggle('active');
        
        

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
@endsection
