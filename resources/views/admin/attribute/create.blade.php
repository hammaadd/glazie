@extends('admin-layout.layouts')
@section('title','Add New Attribute')
@section('content')
<div class="page-container">
    <div class="main-content">
        <div class="page-header">
            <h1 class="header-title">Attribute</h1>
            <div class="header-sub-title float-right">
                <nav class="breadcrumb breadcrumb-dash">
                    <a href="#" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Home</a>
                    <a class="breadcrumb-item" href="#">Add New Attribute</a>
                    
                </nav>
            </div>
        </div>
        <div class="row">
         
            <div class="col-md-12">
                <div class="card">
                    <form action="{{ url('/admin/attributes/create')}}"  method="post" enctype="multipart/form-data" id="attribute">
                    <div class="card-header">
                        <h4 class="card-title">Add New Attribute</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                        @if(count($errors)>0)
                                @foreach($errors->all() as $error)
                               <div class="col-md-6">
                                <div class="alert alert-danger text-light" style="background-color: #E2584C">
                                    {{$error}}
                                </div>
                               </div>
                                @endforeach
                            @endif
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">Attribute Name</label>
                                <input type="text" class="form-control" name="attribute_name" placeholder="Attribute Name" autofocus value="{{old('attribute_name')}}">
                            </div>
                          
                            @csrf
                           
                       
                           
                            <div class="col-md-6">
                                <label for="">Image</label>
                                <input type="file" class="form-control" name="image">
                            </div>
                            <div class=""></div>
                        </div>
                        <div class="row">
                           <div class="col-md-12">
                            <label for="">Description</label>
                           
                            <textarea name="description" class="form-control" rows="5" placeholder="Attribute Description">{{old('description')}}</textarea>
                           </div>
                        </div>
                        
                        <div class="row">
                           <div class="col-md-12">
                            <button type="submit" class="btn btn-success mt-3"><i class="fa fa-plus"></i> Create Attribute</button>
                            <a href="{{url('admin/attributes') }}" class="btn btn-danger mt-3 ml-3"> <i class="fa fa-times"></i> Cancel</a>
                           </div>
                       
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
    <script src="{{ url('admin-assets/vendors/jquery-validation/jquery.validate.min.js')}}"></script>
   <script>
    $("#attribute").validate({
    ignore: ':hidden:not(:checkbox)',
    errorElement: 'label',
    errorClass: 'is-invalid',
    validClass: 'is-valid',
    rules: {
        attribute_name: {
           required : true
        }
       
    }
});

    </script>
@endsection
