@extends('admin-layout.layouts')
@section('title','Edit Attribute')
@section('content')
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<div class="page-container">
    <div class="main-content">
        <div class="page-header">
            <h2 class="header-title">Attribute</h2>
            <div class="header-sub-title float-right">
                <nav class="breadcrumb breadcrumb-dash">
                    <a href="#" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Home</a>
                    <a class="breadcrumb-item" href="#">Edit Attribute</a>
                    
                </nav>
            </div>
        </div>
        <div class="row">
         
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <form action="{{ url('/admin/attributes/update/'.$attribute->id)}}"  method="post" enctype="multipart/form-data">
                    <div class="card-header">
                        <h4 class="card-title">Edit Attribute</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                        @if(count($errors)>0)
                                @foreach($errors->all() as $error)
                                <div class="col-md-12">
                                    <div class="alert alert-danger text-light" style="background-color: #e2584c">
                                        {{$error}}
                                    </div>
                                </div>
                                @endforeach
                            @endif
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="">Attribute Name</label>
                                <input type="text" class="form-control" name="attribute_name" placeholder="Attribute Name" autofocus value="{{$attribute->attribute_name}}">
                            </div>
                           
                            @csrf
                            <div class="row mt-4">
                                <div class="col-md-4"></div>
                                <div class="col-md-6" id="imagediv"> 
                                    @if ($attribute->image)
                                        
                                    
                                    <img src="{{asset($attribute->image)}}" alt="" width="100px" height="100px">
                                    <button type="button" class="btn btn-danger btn-xs mt-2 " onclick="deleteimage({{$attribute->id}})"> <i class="fa fa-times"></i> Remove Image</button>
                                    @endif
                                </div>
                            </div>
                    
                            
                            <div class="col-md-12">
                                <label for="">Image</label>
                                <input type="file" class="form-control" name="image">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="">Terms</label>
                                <select name="terms[]" multiple id="terms" class="form-control">
                                    <option value="" disabled>Create or Update terms</option>
                                    @foreach ($terms as $term)
                                    <option value="{{$term->id}}" selected>{{$term->name}}</option>                                        
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                          <div class="col-md-12">
                            <label for="">Description</label>
                           
                            <textarea name="description" class="form-control" cols="30" rows="10" placeholder="Attribute Description">{{$attribute->description}}</textarea>
                          </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-success mt-3"><i class="fa fa-edit"></i> Update Attribute</button>
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
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>


    <script src="{{url('admin-assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
    <script src="{{ url('admin-assets/vendors/jquery-validation/jquery.validate.min.js')}}"></script>

    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
 
 <script>
     toastr.options = {
     "closeButton": true,
     "debug": false,
     "newestOnTop": false,
     "progressBar": true,
     "positionClass": "toast-top-right",
     "preventDuplicates": true,
     "onclick": null,
     "showDuration": "300",
     "hideDuration": "1000",
     "timeOut": "5000",
     "extendedTimeOut": "1000",
     "showEasing": "swing",
     "hideEasing": "linear",
     "showMethod": "fadeIn",
     "hideMethod": "fadeOut"
 }
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
$(document).ready(function() {
    $('#terms').select2(
        {
            tags:true,
            tokenSeparators: [",", " "]
        });
    
});
function deleteimage(id)
    {
        $.ajaxSetup({
				headers:{'X-CSRF-Token':'{{csrf_token()}}'}
            });
            url = "{{url('admin/brands/removeimage')}}";
            console.log(url);
            $.ajax({
           type:'POST',
           url:url,

            data:{
                id:id,  
                type:"attribute"
           },
           success:function(result){
               if(result=="1")
               {
                   $("#imagediv").remove();
                   toastr.success("Image removed successfully");

               }
           }
            });
    }
    </script>
@endsection
