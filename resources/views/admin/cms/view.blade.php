@extends('admin-layout.layouts')
@section('title','Update Page')
@section('content')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />

<div class="page-container">
    <div class="main-content">
        <div class="page-header">
            <h2 class="header-title">Update Page</h2>
            <div class="header-sub-title">
                <nav class="breadcrumb breadcrumb-dash">
                    <a href="{{url('admin/dashboard')}}" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Home</a>
                    
                    <a class="breadcrumb-item" href="#">Update Page</a>
                    
                </nav>
            </div>
        </div>
       <div class="row">
           <div class="col-md-12">
               <div class="card">
                   <div class="card-header">
                       <div class="row" style="background-color: #E3E3E3;padding:5px;">
                           
                               <div class="col-md-3">
                                   <h2>Page Title</h2>
                               </div>
                               <div class="col-md-7">
                                <h2>{{$cms->title}}</h2>
                               </div>
                               <div class="col-md-2">
                                   <a href="{{url('admin/cms/edit/'.$cms->id)}}" class="btn btn-info text-right"><i class="fa fa-edit"></i> Edit</a>
                               </div>
                           
                       </div>
                   </div>
                   <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <p>Meta Title</p>
                        </div>
                        <div class="col-md-9">
                            <p>{{$cms->meta_title}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <p>Meta Description</p>
                        </div>
                        <div class="col-md-9">
                            <p>{{$cms->met_description}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <p>Is Published</p>
                        </div>
                        <div class="col-md-9">
                            <p>
                                @if ($cms->publish=="1")
                                    <span class="text-success">This page is published publically</span>
                                @else
                                <span class="text-danger">This page is private</span>
                                @endif
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <p>Page Description </p>
                        </div>
                        <div class="col-md-9">
                            {!!$cms->description!!}
                        </div>
                    </div>
                   </div>
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
