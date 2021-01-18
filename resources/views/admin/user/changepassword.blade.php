@extends('admin-layout.layouts')
@section('title','Edit Profile')
@section('content')
<div class="page-container">
    <div class="main-content">
        <div class="page-header">
            <h2 class="header-title">Change User Password</h2>
            <div class="header-sub-title">
                <nav class="breadcrumb breadcrumb-dash">
                    <a href="#" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Home</a>
                    <a class="breadcrumb-item" href="#">Change User Password</a>
                    
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="card">
                    <form action="{{ url('/admin/user/changepassword/'.$id)}}" id="form-validation" method="post">
                    <div class="card-header">
                        <h4 class="card-title">Change Password</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                        @csrf
                        <div class="col-md-12">
                        @if(count($errors)>0)
                                        @foreach($errors->all() as $error)
                                        <div class="alert alert-danger bg-danger">
                                            {{$error}}
                                        </div>
                                        @endforeach
                                        @endif
                                     
                                        </div>
                                        <br>
                            <label for="" >Old Password</label>
                            <!-- <div class="input-group mb-3"> -->
                                <input type="password" class="form-control" placeholder="Old Password" autofocus id="oldpwd" name="oldpwd">
                                <!-- <div class="input-group-append">
                                    <span class="input-group-text" id="eye1"><i class="fa fa-eye"></i></span>
                                </div> -->
                            <!-- </div> -->
                        </div>
                        <div class="row">
                            <label for="">Password</label>
                            <!-- <div class="input-group mb-3"> -->
                                <input type="password" class="form-control" placeholder="New Password" autofocus id="newpwd" name="newpwd">
                                <!-- <div class="input-group-append">
                                    <span class="input-group-text" id="eye2"><i class="fa fa-eye"></i></span>
                                </div> -->
                            <!-- </div> -->
                        </div>
                        <div class="row">
                            <label for="">Confirm Password</label>
                            <input type="password" class="form-control" placeholder="Confirm Password" id="cpassword" name="conf_password">
                        </div>
                        
                        <div class="row">
                           
                                <button type="submit" class="btn btn-success mt-3"><i class="fa fa-edit"></i> Update Password</button>
                                <a href="{{url('admin/profile/edit')}}" class="btn btn-danger mt-3 ml-3"><i class="fa fa-times"></i> Cancel</a>
                       
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
    //     var pwd = document.getElementById('oldpwd');
    //     var eye1 = document.getElementById('eye1');

    //     eye1.addEventListener('click',togglePass);

    //     function togglePass(){
    //     eye1.classList.toggle('active');
        
    //     (pwd.type=='password')? pwd.type='text' :
    //     pwd.type='password';
    //     eye.classList.toggle('active');
        
        

    // }
    //     var newpwd = document.getElementById('newpwd');
    //     var conpwd = document.getElementById('cpassword');
    //     var eye2 = document.getElementById('eye2');

    //     eye2.addEventListener('click',togglePass1);

    //     function togglePass1(){
    //     eye2.classList.toggle('active');
        
    //     (newpwd.type=='password')? newpwd.type='text' :
    //     newpwd.type='password';
    //     (conpwd.type=='password')? conpwd.type='text' :
    //     conpwd.type='password';
    //     eye2.classList.toggle('active');
        
        

    // }
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
            required: true,
            minlength: 8
        },
        conf_password: {
            required: true ,
            equalTo: '#newpwd'  
        }
    }
});

    </script>
@endsection
