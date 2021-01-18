@extends('admin-layout.layouts')
@section('title','User  List')
@section('content')
<link href="{{asset('admin-assets/vendors/datatables/dataTables.bootstrap.min.css')}}" rel="stylesheet">

<!-- page js -->

<div class="page-container">
    <div class="main-content">
        <div class="page-header">
            <h2 class="header-title">User </h2>
            <div class="header-sub-title">
                <nav class="breadcrumb breadcrumb-dash">
                    <a href="#" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Home</a>
                    <a class="breadcrumb-item" href="#">User </a>
                    
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
        <div class="row">
            <div class="col-md-3">
                <a  class="btn btn-success btn-xs" href="{{url('admin/user/add')}}"><i class="fa fa-plus"></i>Add New User</a>
            </div>
            <div class="col-md-12">
                <div class="table-responsive" ></div>
                <table class="table table-hover" id="categories">
                    <thead>
                        <th>Sr.#</th>
                        <th>User Name </th>
                        <th>Email</th>
                        <th>Profile</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        <?php
                        $i=1;
                       
                        ?>
                        @if(count($users)>0)
                        @foreach($users as $user)

                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $user->name; ?></td>
                           
                            <td><?php echo $user->email; ?></td>
                            <td><img src="{{asset('user-images/'.$user->avatar)}}" height="50px" width="50px" style="border-radius:50%;"></td> 
                            <td>
                                <a href="{{url('admin/user/profile/'.$user->id)}}" class="badge badge-warning" > <i class="fa fa-eye"></i> Profile</a>
                                <a href="{{url('admin/user/edit/'.$user->id)}}" class="badge badge-primary" > <i class="fa fa-edit"></i> Edit</a>
                                <a href="{{url('admin/user/delete/'.$user->id)}}" class="badge badge-danger" onclick="return confirm('Are You Sure to delete?')"> <i class="fa fa-trash"></i> Delete</a>
                            </td>

                        </tr>
                        <?php
                        $i++; ?>
                        @endforeach
                        @endif
                    </tbody>
                </table>
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


