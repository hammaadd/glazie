@extends('admin-layout.layouts')
@section('title','Edit Profile')
@section('content')

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<div class="page-container">
    <div class="main-content">
        <div class="page-header">
            <h2 class="header-title">Update Profile</h2>
            <div class="header-sub-title">
                <nav class="breadcrumb breadcrumb-dash">
                    <a href="#" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Home</a>
                    <a class="breadcrumb-item" href="#">Update Profile</a>
                    
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Update Profile</h4>
                    </div>
                    <div class="card-body">
                    @if(count($errors)>0)
                    @foreach($errors->all() as $error)
                   <div class="row">
                       <div class="col-md12">
                        <div class="alert alert-danger bg-danger">
                            {{$error}}
                        </div>
                       </div>
                   </div>
                    @endforeach
                    @endif
                                     
                        <form action="{{url('admin/user/changeprofile/'.$user->id)}}" method="post" id="changeprofile">
                        @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="first_name">First Name</label>
                                    <input type="text" class="form-control" name="first_name" placeholder="First Name" value="{{$user->first_name}}" autofocus>
                                </div>
                                <div class="col-md-6">
                                <label for="last_name">Last Name</label>
                                    <input type="text" class="form-control" name="last_name" placeholder="Last Name" value="{{$user->last_name}}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="contact_no">Phone No</label>
                                    <input type="text" class="form-control" name="contact_no" placeholder="Phone Number" value="{{$user->contact_no}}">
                                </div>
                                <div class="col-md-6">
                                <label for="address">Address</label>
                                    <input type="text" class="form-control" name="address" placeholder="Address" value="{{$user->address}}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-success mt-3"><i class="fa fa-edit"></i> Update</button>
                                    <a href="{{url('admin/profile/edit')}}" class="btn btn-primary mt-3"><i class="fa fa-times"></i> Cancel</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>
      
        
    </div>

@endsection
@section('script')
<script src="{{url('admin-assets/js/pages/form-elements.js')}}"></script>


   
    <script src="{{ url('admin-assets/vendors/jquery-validation/jquery.validate.min.js')}}"></script>
    <script>
    $("#changeprofile").validate({
    ignore: ':hidden:not(:checkbox)',
    errorElement: 'label',
    errorClass: 'is-invalid',
    validClass: 'is-valid',
    rules: {
        first_name: {
            required: true
        },
        last_name: {
            required: true
           
        },
        contact_no: {
            required: true  
        },
        address: {
            required: true 
        }
    }
});
</script>
@endsection


