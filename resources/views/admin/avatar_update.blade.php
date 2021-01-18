@extends('admin-layout.layouts')
@section('title','Edit Profile')
@section('content')

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<div class="page-container">
    <div class="main-content">
        <div class="page-header">
            <h2 class="header-title">Update Avatar</h2>
            <div class="header-sub-title">
                <nav class="breadcrumb breadcrumb-dash">
                    <a href="#" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Home</a>
                    <a class="breadcrumb-item" href="#">Update Avatae</a>
                    
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Avatar update</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                                <div class="avatar avatar-icon avatar-lg">
                                    <img src="{{ asset('/admin-assets/admin-images/'.$user->profile) }}">
                                </div>
                            </div>
                            
                            
                        </div>

                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <form action="{{url('/admin/avat/update')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                <div class="col-md-12">
                                @if(count($errors)>0)
                                        @foreach($errors->all() as $error)
                                    
                                        <div class="alert alert-danger bg-red">
                                            
                                            {{$error}}
                                        </div>
                                        
                                        @endforeach
                                        @endif
                                        @if(session('status'))
				                            <div class="alert alert-success">{{session('status')}}</div>
                                        @endif
                                        </div>
                                </div>
                                    <label for="">Profile</label>
                                    
                                    <input type="file" class="form-control" name="image">
                                    <button type="submit" class="btn btn-success btn-outline mt-3"><i class="fa fa-edit"> Update</i></button>
                                    <a href="{{url('admin/profile/edit')}}" class="btn btn-primary mt-3"><i class="fa fa-times"></i> Cancel</a>
                                </form>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
      
        
    </div>

@endsection
@section('script')
<script>
    toast.success("{{ Session::get('message') }}");
</script>

