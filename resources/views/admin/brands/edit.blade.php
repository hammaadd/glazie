@extends('admin-layout.layouts')
@section('title','Edit  Brand')
@section('content')
<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
<div class="page-container">
    <div class="main-content">
        <div class="page-header">
            <h2 class="header-title">Edit Brand</h2>
            <div class="header-sub-title">
                <nav class="breadcrumb breadcrumb-dash">
                    <a href="{{url('admin/dashboard')}}" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Home</a>
                    <a href="{{url('admin/brands')}}" class="breadcrumb-item"> Brands</a>
                    <a class="breadcrumb-item" href="#">Edit  Brand</a>
                    
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="card">
                    <form action="{{ url('/admin/brands/update/'.$brands->id)}}"  method="post" enctype="multipart/form-data" id="brand">
                    <div class="card-header">
                        <h4 class="card-title">Edit  Brand</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                        @if(count($errors)>0)
                                @foreach($errors->all() as $error)
                                <div class="col-md-12 " >
                                    <div class="alert alert-danger text-light" style="background-color: #e2584c">
                                        {{$error}}
                                    </div>
                                </div>
                                @endforeach
                            @endif</div>
                        <div class="row">
                            @csrf
                            <label for="">Brand Name</label>
                            <input type="text" class="form-control" name="brand_name" placeholder="Brand Name" autofocus value="{{$brands->brand_name}}">
                            
                        </div>
                        
                            <div class="row mt-4">
                                <div class="col-md-4"></div>
                                <div class="col-md-4" id="imagediv"> 
                                    @if ($brands->image)
                                        
                                    
                                    <img src="{{asset('admin-assets/brands/'.$brands->image)}}" alt="" width="100px" height="100px">
                                    <button type="button" class="btn btn-danger btn-xs mt-2" onclick="deleteimage({{$brands->id}})"> <i class="fa fa-times"></i> Remove Image</button>
                                    @endif
                                </div>
                            </div>
                        
                        <div class="row mt-3">
                            
                            <label for="">Brand Image </label>
                            <input type="file" class="form-control" name="image" placeholder="Brand Image" >
                            
                        </div>
                        <div class="row">
                            
                            <label for="">Descrition </label>
                            <textarea name="description" class="form-control" cols="30" rows="10">{{$brands->description}}{{old('description')}}</textarea>
                        </div>
                        
                        
                        
                        <div class="row">
                            <button type="submit" class="btn btn-success mt-3"><i class="fa fa-edit"></i> Update Brand</button>
                            <a href="{{url('admin/brands')}}" class="btn btn-danger mt-3 ml-3"><i class="fa fa-times"></i> Cancel</a>
                       
                        </div>
                    </div>
                    </form>
                </div>
            </div>
            
        </div>
        
    </div>

@endsection
@section('script')
{{-- <script src="{{url('admin-assets/js/pages/form-elements.js')}}"></script> --}}


    <script src="{{url('admin-assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
    <script src="{{ url('admin-assets/vendors/jquery-validation/jquery.validate.min.js')}}"></script>
   <script>
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
                type:"brand"
           },
           success:function(result){
               if(result=="1")
               {
                   $("#imagediv").remove();
                   toastr.success("The image removed successfully");

               }
           }
            });
    }
            
    $("#brand").validate({
    ignore: ':hidden:not(:checkbox)',
    errorElement: 'label',
    errorClass: 'is-invalid',
    validClass: 'is-valid',
    rules: {
       brand_name:{
           required:true
       }
    }
});


     </script>
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
     </script>
@endsection
