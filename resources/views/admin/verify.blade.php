@extends('admin-layout.layouts')
@section('title','COnfirm Code')
@section('content')
<div class="page-container">
    <div class="main-content">
        <div class="page-header">
            <h2 class="header-title">Confirm Code</h2>
            <div class="header-sub-title">
                <nav class="breadcrumb breadcrumb-dash">
                    <a href="#" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Home</a>
                    <a class="breadcrumb-item" href="#">Confirm Code   </a>
                    
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="card">
                    <form action="{{url('admin/confirmcode')}}" id="checkcode" method="post">
                    <div class="card-header">
                        <h4 class="card-title">Enter Confirmation Code</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                        @csrf
                        <div class="col-md-12">
                        @if(count($errors)>0)
                            @foreach($errors->all() as $error)
                            <div class="alert alert-danger bg-danger text-light">
                                {{$error}}
                            </div>
                            @endforeach
                            @endif
                            
                            </div>
                            <br>
                           
                        </div>
                        <div class="row">
                          
                            <label for="">Confirmation Code </label>
                            <!-- <div class="input-group mb-3"> -->
                                <input type="text" class="form-control" placeholder="Confirm Code" autofocus name="newcode">
                                <div class="col-md-12">
                                    @if(session('status'))
				                            <span class="text-danger font-weight-bold text-center"><i class="fa fa-times mr-3"></i> {{session('status')}}</span>
                                        @endif
                                </div>
                               
                            </div>
                        <div class="row">
                                <button type="submit" class="btn btn-success mt-3"><i class="fa fa-check"></i> Submit</button>
                                <a href="{{url('customer/profile/edit')}}" class="btn btn-danger mt-3 ml-3"><i class="fa fa-times"></i> Cancel</a>
                       
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
   
    $("#checkcode").validate({
    ignore: ':hidden:not(:checkbox)',
    errorElement: 'label',
    errorClass: 'is-invalid',
    validClass: 'is-valid',
    rules: {
        newcode: {
            required: true
        },
        
    }
});

    </script>
@endsection
