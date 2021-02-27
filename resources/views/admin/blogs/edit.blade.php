@extends('admin-layout.layouts')
@section('title','News And Blog ')
@section('content')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>

<!-- page js -->

<div class="page-container">
    <div class="main-content">
        <div class="page-header">
            <h2 class="header-title ">News And Blogs</h2>
            <div class="header-sub-title float-right">
                <nav class="breadcrumb breadcrumb-dash">
                    <a href="{{url('admin/dashboard')}}" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Home</a>
                    <a class="breadcrumb-item" href="#">News And Blogs</a>
                    
                </nav>
            </div>
        </div>
        @if (session('info'))
        <script type="text/javascript">toastr.success("{{session('info')}}");</script>
        @endif   
                
        <div class="row">
            <div class="col-md-12">
                <div class="card">
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
                        <form action="{{url('admin/blogs/update/'.$blog->id)}}" method="post" id="create_blog" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="">Blog Title </label>
                                    <input type="text" class="form-control" name="title" placeholder="Enter title" value="{{$blog->title}}">
                                </div>
                                <div class="col-md-6">
                                    <label for="">Image</label>
                                    <input type="file" class="form-control" name="image">
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-6">
                                    <label for="">Slug</label>
                                    <input type="text" class="form-control" name="slug" placeholder="Slug" value="{{$blog->slug}}">
                                </div>
                                
                                <div class="col-md-6">
                                    <label for="">Publish the blog</label>
                                    <select name="publish" class="form-control">
                                        <option value="">Publish the Blog</option>
                                        <option value="private"
                                            @if ($blog->publish=="private")
                                                selected
                                            @endif
                                        >No </option>
                                        <option value="public"
                                        @if ($blog->publish=="public")
                                            selected
                                        @endif
                                    >Yes</option>
                                    </select>
                                    
                                </div>
                                <div class="col-md-6">
                                    <div class="col-md-4" id="imagediv"> 
                                        @if ($blog->image)
                                            <img src="{{asset('admin-assets/blogs/'.$blog->image)}}" alt="" width="100px" height="100px">
                                        <button type="button" class="btn btn-danger btn-xs mt-2" onclick="deleteimage({{$blog->id}})"> <i class="fa fa-times"></i> Remove Image</button>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-12">
                                    <label for="">Description </label>
                                    <textarea name="description" id="description" class="form-control" rows="10" placeholder="Description of the Blog">{{$blog->description}}</textarea>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-12">
                                    <button class="btn btn-success" type="submit"><i class="anticon anticon-check-circle "></i> Submit</button>
                                    <a href="{{url('admin/blogs')}}" class="btn btn-danger"><i class="fa fa-times"></i> Cancel</a>
                                </div>
                            </div>
                        </form>        
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    <!-- Model Start Here-->
    
</div>
    <link href="{{asset('admin-assets/vendors/datatables/dataTables.bootstrap.min.css')}}" rel="stylesheet">

@endsection
@section('script')

<!-- page js -->
<script src="{{url('admin-assets/js/pages/form-elements.js')}}"></script>


    <script src="{{url('admin-assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
    <script src="{{ url('admin-assets/vendors/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script>
    $("#create_blog").validate({
    ignore: ':hidden:not(:checkbox)',
    errorElement: 'label',
    errorClass: 'is-invalid',
    validClass: 'is-valid',
    rules: {
        title:{
            required:true
        }
        }
});
$(document).ready(function() {
        $('#description').summernote({
        height: 200,
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          
          ['view', ['fullscreen', 'codeview', 'help']]
        ]
        });
        
    });
    function deleteimage(id)
    {
        $.ajaxSetup({
				headers:{'X-CSRF-Token':'{{csrf_token()}}'}
            });
            url = "{{url('admin/blogs/removeimage')}}";
            console.log(url);
            $.ajax({
           type:'POST',
           url:url,

            data:{
                id:id,  
                
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


