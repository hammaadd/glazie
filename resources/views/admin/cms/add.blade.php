@extends('admin-layout.layouts')
@section('title','Add New Page')
@section('content')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />

<div class="page-container">
    <div class="main-content">
        <div class="page-header">
            <h2 class="header-title">Add New Page</h2>
            <div class="header-sub-title">
                <nav class="breadcrumb breadcrumb-dash">
                    <a href="{{url('admin/dashboard')}}" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Home</a>
                    <a href="{{url('admin/product/list')}}" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Products</a>
                    <a class="breadcrumb-item" href="#">Add new product</a>
                    
                </nav>
            </div>
        </div>
        <div class="row">
            
            <div class="col-md-12">
                <div class="card ">
                    <form action="{{ url('/admin/cms/create')}}"  method="post" enctype="multipart/form-data" id="add_product">
                    <div class="card-header" style="background-color: #E3E3E3">
                        <h4 class="card-title">Add New Page</h4>
                    </div>
                    <div class="card-body">
                        
                        @if(count($errors)>0)
                            <div class="row">
                                @foreach($errors->all() as $error)
                                
                                    <div class="col-md-6">
                                        <div class="alert alert-danger bg-red" >
                                            {{$error}}
                                        </div>
                                    </div>
                            
                                @endforeach
                            </div>
                        @endif
                        
                        <div class="row">
                            @csrf
                            <div class="col-md-6">
                                <label for="">Page Title</label>
                                <input type="text" class="form-control" name="title" placeholder="Page Title" autofocus id="title">
                                </div>
                            <div class="col-md-6">
                               
                                <label for="">Image</label>
                                <input type="file" name="image" class="form-control" >
                            </div>
                        </div>
                       
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">Slug</label>
                                <input type="text" class="form-control" name="slug" placeholder="Slug" id="slug" readonly>
                            </div>
                            <div class="col-md-6">
                            <label for="">Pubsish</label>
                            <select name="publish" id="" class="form-control">
                                <option value="">Publish </option>
                                <option value="1">Yes </option>
                                <option value="0">No</option>
                            </select>
                            </div>
                               
                        </div>
                       
                        <div class="row">
                            <div class="col-md-6"><label for="">Meta Titles</label>
                                <input type="text" class="form-control" name="meta_title" placeholder="Meta Title for page">
                            </div>
                            
                            <div class="col-md-6">
                                <label for="">Mata Description</label>
                                <input type="text" name="meta_description" class="form-control" placeholder="Meta description"> 
                                   
                            </div>
                            
                        </div>
                        
                   
                    
                        <div class="row">
                            <div class="col-md-12">
                                <label for="">Page  Descrition </label>
                            <textarea name="description" id="summernote"class="form-control" cols="30" rows="5"></textarea>
                            </div>
                        </div>
                        
                        
                 
                        
                        <div class="row">
                            <div class="col-md-12">
                                <label for="" ></label>
                                <button type="submit"  class="btn btn-success mt-3 "><i class="fa fa-plus" ></i> Add Page</button>
                                <a href="{{url('admin/cms')}}" class="btn btn-danger mt-3 ml-3"> <i class="fa fa-times"> Cancel</i> </a>
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

    <script src="{{ url('admin-assets/vendors/jquery-validation/jquery.validate.min.js')}}"></script>
   
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<!-- page js -->

    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script>
        $(document).ready(function(){
            $('#title').on('input',function(){
                var title =  $('#title').val();
                var slug = title.replace(" ",'-');
                newslug = slug.toLowerCase();
                $('#slug').val(newslug);
            })
        });
      
        $(document).ready(function() {
        $('#summernote').summernote({
        height: 200,
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          
          ['view', ['fullscreen', 'codeview','link', 'help']]
        ]
        });
        
    });

    
    $(document).ready(function() {
    $('#terms,#category,#tags').select2(
        {
            tags:true,
            tokenSeparators: [",", " "]
        }
    );
});
$(document).ready(function() {
    $('#category,#terms1').select2();
});

 
    
   
       $("#add_product").validate({
    ignore: ':hidden:not(:checkbox)',
    errorElement: 'label',
    errorClass: 'is-invalid',
    validClass: 'is-valid',
    rules: {
        title: {
            required: true,
            minlength: 6
        },
        meta_description: {
            required: true
           
        },
     
        publish: {
            required: true
           
        },
        meta_title: {
            required: true,
           
           
        }

        
    }
});
</script>
@endsection
