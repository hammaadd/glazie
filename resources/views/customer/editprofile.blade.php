@extends('customer.layouts.layouts')
@section('title','Edit Profile')
@section('content')
@php
    $user = Auth::user();
@endphp
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<div class="page-container">
    <div class="main-content">
        <div class="page-header">
            <h2 class="header-title">Edit Profile</h2>
            <div class="header-sub-title">
                <nav class="breadcrumb breadcrumb-dash">
                    <a href="#" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Home</a>
                    <a class="breadcrumb-item" href="#">Edit Profile</a>
                    
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
            @if(session('info'))
				<div class="row">
                    
                    <div class="col-md-12">
                        <div class="alert alert-success" style="background-color: green;color:white;"><i class="fa fa-check"></i> {{session('info')}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="color: white"><span aria-hidden="true">&times;</span></button>
                        </div>

                    </div>
                </div>
				@endif
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Account Settings</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4"><b>Name </b></div>
                            <div class="col-md-2"></div>
                            <div class="col-md-6"><?php echo $user->name ?> </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-4"><b>Email </b></div>
                            <div class="col-md-2"></div>
                            <div class="col-md-6"><?php echo $user->email ?> </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-4"><b>Change Account </b></div>
                            <div class="col-md-2"></div>
                            <div class="col-md-6"><a href="{{url('customer/changeaccount')}}">Change Email</a> </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-4"><b>Password</b></div>
                            <div class="col-md-2"></div>
                            <div class="col-md-6"> <a href="{{url('customer/changepass')}}">Change Password</a> </div>
                        </div>
                        
                    </div>
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header ">
                    <div class="row">
                        <div class="col-md-4">
                        <h4 class="card-title">Change Profile </h4>
                   
                        </div>
                        <div class="col-md-4">
                        <a href="{{url('customer/profile/change')}}" class="mt-3 btn btn-primary btn-xs">Change Profile</a>
                    
                        </div>
                        <div class="col-md-4">
                        <a href="{{url('customer/avatar/update')}}" class="btn btn-success btn-xs mt-3">profile image</a>
                    
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>

@endsection
@section('script')
<script>
    toastr.success("{{ Session::get('message') }}");
</script>

