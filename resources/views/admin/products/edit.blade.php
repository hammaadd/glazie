@extends('admin-layout.layouts')
@section('title','Update Product')
@section('content')
<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<div class="page-container">
    <div class="main-content">
        <div class="page-header">
            <h2 class="header-title">Edit Product</h2>
            <div class="header-sub-title float-right">
                <nav class="breadcrumb breadcrumb-dash">
                    <a href="#" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Home</a>
                    <a class="breadcrumb-item" href="#">Edit Product</a>
                    
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card ">
                    <form action="{{ url('/admin/products/update/'.$products->id)}}"  method="post" enctype="multipart/form-data" id="edit_product">
                    <div class="card-header">
                        <h4 class="card-title">Edit Product</h4>
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
                        @php
                            $image_gallery = $products->gallery;
                        @endphp
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">Product Name</label>
                                <input type="text" class="form-control" name="product_name" placeholder="product Name" autofocus value="{{$products->product_name}}">
                            </div>
                            <div class="col-md-6">
                                <label for="">Brand Name </label>
                            <select name="brand_name" class="form-control">
                                <option value="">--Selecct  Brand--</option>
                                @foreach ($brands as $brand)
                                <option value="{{$brand->id}}"
                                    @if ($brand->id==$products->brand_id)
                                        selected
                                    @endif
                                    >{{$brand->brand_name}}</option>    
                                @endforeach
                            </select>
                            </div>
                            @csrf
                           
                        </div>
                      
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">Regular Price</label>
                                <input type="number" name="regular_price" class="form-control" value="{{$products->regular_price}}">
                            </div>
                            <div class="col-md-6">
                                <label for="">Sale Price</label>
                                <input type="number" name="sale_price" class="form-control" value="{{$products->sale_price}}">
                            </div>
                                
                       
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">Weight</label>
                                <input type="text" name="weight" class="form-control" value="{{$products->weight}}"> 
                            </div>
                            <div class="col-md-6">
                                <label for="">Quantity </label>
                            <input type="number" name="quantity" class="form-control" value="{{$products->quantity}}"> 
                            </div>
                              
                        
                               
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">Products images</label>
                                <input type="file" class="form-control" multiple name="image_gallery[]">
                            </div>
                           <div class="col-md-6">
                            <label for="">Product Variety </label>
                            <select name="verity_id" class="form-control">
                                <option value="">Select Variety</option>
                                @foreach ($varieties as $variety)
                                    <option value="{{$variety->id}}" 
                                        @if ($variety->id==$products->verity_id)
                                            selected
                                        @endif
                                        >{{$variety->prd_name}}</option>
                                @endforeach
                            </select>
                           </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="">Short Descrition </label>
                                <textarea name="short_description" class="form-control"  rows="5">{{$products->short_description}}</textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="">Long Description</label>
                                <textarea name="description" id="summernote"  class="form-control"> {{$products->description}}</textarea>
                            </div>
                            
                        </div>
                        <div class="row">
                            
                            {{-- <div class="col-md-4">
                                <label for="">Add new Attribute</label>
                                <input type="text" class="form-control" placeholder="Add new attribute" id="new_attr">
                            </div>
                            <div class="col-md-2">
                               <button type="button" class="btn btn-success btn-xs btn-tone" style="margin-top:35px" id="addbtn"> <i class="fa fa-plus" ></i> Add Attribute</button>
                            </div> --}}
                        </div>
                       
                        <div class="row">
                            <div class="col-md-6">
                                <label for=""><b>Categories</b></label>
                                 <select name="category_id[]" multiple id="category" class="form-control">
                                     <option value="" disabled>Select Categories</option>
                                     @foreach ($categories as $category)
                                     <option value="{{$category->id}}"
                                            @foreach ($product_cats as $product_cat)
                                                @if ($product_cat->category_id==$category->id)
                                                    selected
                                                @endif
                                            @endforeach
                                        
                                        >{{$category->cat_name}}</option>
                                     @endforeach 
                                 </select>
                             </div>  
                             <div class="col-md-6">
                                <label for="">Height <small>(cm)</small></label>
                                <input type="number" class="form-control" name="height" placeholder="Enter Height of the Product" min="1" value="{{$products->height}}">
                            </div>
                            
                         </div>
                         <div class="row">
                            <div class="col-md-6">
                                <label for="">Length <small>(cm)</small></label>
                                <input type="number" class="form-control" name="length" placeholder="Enter Length of Product" min="1" value="{{$products->length}}">
                            </div>
                            <div class="col-md-6">
                                <label for="">Width <small>(cm)</small></label>
                                <input type="number" class="form-control" name="width" placeholder="Enter Width of the products " min="1" value="{{$products->width}}">
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="">Product Search Tags</label>
                                <select name="prdtags[]" multiple id="tags" class="form-control">
                                    @foreach ($product_tag as $search_tag)
                                       <option value="{{$search_tag->id}}" selected> {{$search_tag->tag_name}} </option> 
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <button type="submit" class="btn btn-success mt-3"><i class="fa fa-edit"></i>Update Product</button>
                            <a href="{{url('admin/products')}}" class="btn btn-danger ml-3 mt-3"><i class="fa fa-times"></i> Cancel</a>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
            
        </div>
        <div class="row">
            
            @foreach ($image_gallery as $images)
                
                   
                     <div class="col-md-2" id="abc{{$images->id}}">
                        <img src="{{ asset('productimages/'.$images->image) }}" alt="" height="150px" width=100%>
                        <div class="row mt-2 mb-4">
                            
                            <div class="col-md-8" id="primary_div{{$images->id}}"> 
                                <button class="btn btn-primary btn-xs btn-flat border-0 mt-1" id="primary{{$images->id}}" title="Make this image primary" onclick="makeprimary({{$images->id}})" 
                                    @if ($images->is_primary==1)
                                    disabled
                                    @endif
                                    >Primary<i class="fa fa-user"></i> </button>
                            </div>
                               
                            
                            <div class="col-md-4 ">
                                <button class="btn btn-danger btn-xs btn-flat border-0 mt-1"  title="Remove image" id="remove" onclick="remove({{$images->id}})"> <i class="fa fa-trash"></i> </button>
                            </div>
                        </div>
                    </div>
               
            @endforeach
           
        </div>
        
    </div>

@endsection
@section('script')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script src="{{ url('admin-assets/vendors/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script>
    $(document).ready(function() {
    $('#terms,#tags').select2(
        {
            tags:true,
            tokenSeparators: [",", " "]
        }
    );
});
$(document).ready(function() {
    $('#category').select2();
});
    function makeprimary(id){
        confirmation = confirm("Are you sure to make this image primary");
        if (confirmation==true) {
            $.ajaxSetup({
				headers:{'X-CSRF-Token':'{{csrf_token()}}'}
            });
            url = "{{url('admin/products/primary')}}";
            $.ajax({
           type:'POST',
           url:url,
            data:{
                id:id,
                prodcut_id:{{$products->id}}
           },

           success:function(result){
            toastr.success("Iamge selected  successfully");
            $('primary'+id).prop('disabled',true);
         		}
         		  	
           		
            });
        }
    }
    function remove(id){
        //console.log({{$products->id}});
        confirmation = confirm("Are you sure to delete the image");
            if (confirmation==true) {
                $.ajaxSetup({
                    headers:{'X-CSRF-Token':'{{csrf_token()}}'}
                });
                url = "{{url('admin/products/prdremove')}}";
                $.ajax({
            type:'POST',
            url:url,
                data:{id:id,
                    product_id:{{$products->id}}
            },

            success:function(result){
                console.log(result);
                if(result==0)
                {
                    toastr.success("There should be only one image of product");
                }
                else{
                    toastr.success("Iamge removed successfully");
                    $('#abc'+id).remove();

                }

            }       
                    
                });
            }
    }
    $(document).ready(function() {
        $('#summernote').summernote({
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
  
    $("#edit_product").validate({
    ignore: ':hidden:not(:checkbox)',
    errorElement: 'label',
    errorClass: 'is-invalid',
    validClass: 'is-valid',
    rules: {
        product_name: {
            required: true,
            minlength: 6
        },
        brand_name: {
            required: true
           
        },
        brand_name: {
            required: true
           
        },
        product_type: {
            required: true
           
        },
        regular_price: {
            required: true
           
        },
        sale_price: {
            required: true
        },
        weight: {
            required: true            
        },
        quantity: {
            required: true   
        },
        attribute:{
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
