@extends('admin-layout.layouts')
@section('title','Add New Attribute')
@section('content')
<div class="page-container">
    <div class="main-content">
        <div class="page-header">
            <h2 class="header-title">Attribute</h2>
            <div class="header-sub-title">
                <nav class="breadcrumb breadcrumb-dash">
                    <a href="#" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Home</a>
                    <a class="breadcrumb-item" href="#">Add New Attribute</a>
                    
                </nav>
            </div>
        </div>
        <div class="row">
         
            <div class="col-md-12">
                <div class="card">
                    <form action="{{ url('/admin/attributes/create')}}"  method="post" enctype="multipart/form-data">
                    <div class="card-header">
                        <h4 class="card-title">Add New Attribute</h4>
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
                            <div class="col-md-6">
                                <label for="">Attribute Name</label>
                                <input type="text" class="form-control" name="attribute_name" placeholder="Attribute Name" autofocus>
                            </div>
                            <div class="col-md-6">
                                <label for="">Attribute Price </label>
                            <input type="number" class="form-control" name="attribute_price" placeholder="Price of the Attribute" >
                            </div>
                            @csrf
                           
                            
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">Procut Type</label>
                                <select name="product_type"  class="form-control">
                                    <option value="">--Select Product Type--</option>
                                    <option value="door">Door</option>
                                    <option value="handle">Handle</option>
                                    <option value="lentern">Lentern</option>
                                    <option value="frame">Frame</option>
                                    <option value="window">Window</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="">Image</label>
                                <input type="file" class="form-control" name="image">
                            </div>
                        </div>
                        <div class="row">
                           <label for="">Description</label>
                           
                           <textarea name="description" class="form-control" cols="30" rows="10" placeholder="Attribute Description"></textarea>
                        </div>
                        
                        <div class="row">
                            <button type="submit" class="btn btn-success mt-3"><i class="fa fa-plus"></i> Create Attribute</button>
                            <a href="{{url('admin/attributes') }}" class="btn btn-danger mt-3 ml-3"> <i class="fa fa-times"></i> Cancel</a>
                       
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
