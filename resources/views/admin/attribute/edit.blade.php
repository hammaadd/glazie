@extends('admin-layout.layouts')
@section('title','Edit Attribute')
@section('content')
<div class="page-container">
    <div class="main-content">
        <div class="page-header">
            <h2 class="header-title">Attribute</h2>
            <div class="header-sub-title">
                <nav class="breadcrumb breadcrumb-dash">
                    <a href="#" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Home</a>
                    <a class="breadcrumb-item" href="#">Edit Attribute</a>
                    
                </nav>
            </div>
        </div>
        <div class="row">
         
            <div class="col-md-12">
                <div class="card">
                    <form action="{{ url('/admin/attributes/update/'.$attribute->id)}}"  method="post" enctype="multipart/form-data">
                    <div class="card-header">
                        <h4 class="card-title">Edit Attribute</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                        @if(count($errors)>0)
                                @foreach($errors->all() as $error)
                                <div class="col-md-6">
                                    <div class="alert alert-danger text-light" style="background-color: #e2584c">
                                        {{$error}}
                                    </div>
                                </div>
                                @endforeach
                            @endif
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">Attribute Name</label>
                                <input type="text" class="form-control" name="attribute_name" placeholder="Attribute Name" autofocus value="{{$attribute->attribute_name}}">
                            </div>
                           
                            @csrf
                           
                    
                            
                            <div class="col-md-6">
                                <label for="">Image</label>
                                <input type="file" class="form-control" name="image">
                            </div>
                        </div>
                        <div class="row">
                           <label for="">Description</label>
                           
                           <textarea name="description" class="form-control" cols="30" rows="10" placeholder="Attribute Description">{{$attribute->description}}</textarea>
                        </div>
                        
                        <div class="row">
                            <button type="submit" class="btn btn-success mt-3"><i class="fa fa-edit"></i> Update Attribute</button>
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
    <script src="{{ url('admin-assets/vendors/jquery-validation/jquery.validate.min.js')}}"></script>
    <script>
    $("#attribute").validate({
    ignore: ':hidden:not(:checkbox)',
    errorElement: 'label',
    errorClass: 'is-invalid',
    validClass: 'is-valid',
    rules: {
        attribute_name: {
            required: true
        }
      
    }
});

    </script>
@endsection
