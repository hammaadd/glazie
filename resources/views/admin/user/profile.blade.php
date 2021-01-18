@extends('admin-layout.layouts')
@section('title','Profile')
@section('content')
<link href="{{asset('admin-assets/vendors/datatables/dataTables.bootstrap.min.css')}}" rel="stylesheet">

<!-- page js -->

<div class="page-container">
    <div class="main-content">
        <div class="page-header">
            <h2 class="header-title">Profile</h2>
            <div class="header-sub-title">
                <nav class="breadcrumb breadcrumb-dash">
                    <a href="{{url('admin/user')}}" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Home</a>
                    <a class="breadcrumb-item" href="#">Profile</a>
                    
                </nav>
            </div>
        </div>
        @if(session('info'))
				<div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <div class="alert alert-success" style="background-color: green;color:white;"><i class="fa fa-check"></i> {{session('info')}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="color: white"><span aria-hidden="true">&times;</span></button>
                        </div>

                    </div>
                </div>
                @endif
                <div class="card">
    <div class="card-body">
        <div class="row align-items-center">
            <div class="col-md-7">
                <div class="d-md-flex align-items-center">
                    <div class="text-center text-sm-left ">
                        <div class="avatar avatar-image" style="width: 150px; height:150px">
                            <img src="{{asset('user-images/'.$user->avatar)}}" alt="">
                        </div>
                    </div>
                    <div class="text-center text-sm-left m-v-15 p-l-30">
                        <h2 class="m-b-5"><?php echo $user->first_name." ". $user->last_name; ?></h2>
                        <!-- <p class="text-opacity font-size-13">@Marshallnich</p>
                        <p class="text-dark m-b-20">Frontend Developer, UI/UX Designer</p> -->
                        <!-- <button class="btn btn-primary"><i class="fa fa-edit"></i>Edit Profile</button>
                        <button class="btn btn-primary"><i class="fa fa-h"></i>Change Password</button>
                        <button class="btn btn-primary"><i class="fa fa-trash"></i>    Deactivate</button> -->
                        
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="row">
                    <div class="d-md-block d-none border-left col-1"></div>
                    <div class="col">
                        <ul class="list-unstyled m-t-10">
                            <li class="row">
                                <p class="col-sm-4 col-4 font-weight-semibold text-dark m-b-5">
                                    <i class="m-r-10 text-primary anticon anticon-mail"></i>
                                    <span>Email: </span> 
                                </p>
                                <p class="col font-weight-semibold"><?php echo $user->email?></p>
                            </li>
                            <li class="row">
                                <p class="col-sm-4 col-4 font-weight-semibold text-dark m-b-5">
                                    <i class="m-r-10 text-primary anticon anticon-phone"></i>
                                    <span>Phone: </span> 
                                </p>
                                <p class="col font-weight-semibold"><?php echo $user->contact_no?></p>
                            </li>
                            <li class="row">
                                <p class="col-sm-4 col-5 font-weight-semibold text-dark m-b-5">
                                    <i class="m-r-10 text-primary anticon anticon-compass"></i>
                                    <span>Location: </span> 
                                </p>
                                <p class="col font-weight-semibold"><?php echo $user->address?></p>
                            </li>
                        </ul>
                        <div class="d-flex font-size-22 m-t-15">
                            <a href="" class="text-gray p-r-20">
                                <i class="anticon anticon-facebook"></i>
                            </a>        
                            <a href="" class="text-gray p-r-20">    
                                <i class="anticon anticon-twitter"></i>
                            </a>
                            <a href="" class="text-gray p-r-20">
                                <i class="anticon anticon-behance"></i>
                            </a> 
                            <a href="" class="text-gray p-r-20">   
                                <i class="anticon anticon-dribbble"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="card mt-5">
                    <div class="card-header">
                        <h4 class="card-title">Account Settings</h4>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <th>Name</th>
                                <td><?php echo $user->name ?></td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td><?php echo $user->email ?></td>
                            </tr>
                            <tr>
                                <th>Change Pasword</th>
                                <td><a href="{{url('admin/user/editpassword/'.$user->id)}}">Change Password</a></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="card mt-5">
                    <div class="card-header">
                        <h4 class="card-title">Profile Settings</h4>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <th>Change Profile </th>
                                <td><a href="{{url('admin/user/editprofile/'.$user->id)}}">Change Profile</a></td>
                            </tr>
                            <tr>
                                <th>Change Avatar</th>
                                <td><a href="{{url('/admin/user/updateavat/'.$user->id)}}">Change Avatar</a></td>
                            </tr>
                          
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
  
        
    </div>
    <!-- Model Start Here-->
    
    
    <link href="{{asset('admin-assets/vendors/datatables/dataTables.bootstrap.min.css')}}" rel="stylesheet">

@endsection
@section('script')

<!-- page js -->
<script src="{{asset('admin-assets/vendors/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('admin-assets/vendors/datatables/dataTables.bootstrap.min.js')}}"></script>
<script>
$("#categories").DataTable();
</script>
@endsection


