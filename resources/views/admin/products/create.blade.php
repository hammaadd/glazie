@extends('admin-layout.layouts')
@section('title','Add New Product')
@section('content')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />

<div class="page-container">
    <div class="main-content">
        <div class="page-header">
            <h2 class="header-title">Add New product</h2>
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
                    <form action="{{ url('/admin/products/create')}}"  method="post" enctype="multipart/form-data" id="add_product">
                    <div class="card-header" style="background-color: #E3E3E3">
                        <h4 class="card-title">Add New Product</h4>
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
                                <label for="">Product Name</label>
                                <input type="text" class="form-control" name="product_name" placeholder="product Name" autofocus>
                                </div>
                            <div class="col-md-6">
                                <label for="">Brand Name </label>
                            <select name="brand_name" class="form-control">
                                <option value="">--Selecct  Brand--</option>
                                @foreach ($brands as $brand)
                                <option value="{{$brand->id}}">{{$brand->brand_name}}</option>    
                                @endforeach
                            </select>
                            
                            </div>
                        </div>
                       
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">Regular Price</label>
                                <input type="number" name="regular_price" class="form-control" min="1">
                            </div>
                            <div class="col-md-6">
                                 <label for="">Sale Price</label>
                            <input type="number" name="sale_price" class="form-control" min="1"> 
                            </div>
                               
                        </div>
                       
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">Weight</label>
                            <input type="text" name="weight" class="form-control" > 
                            </div>
                            <div class="col-md-6">
                                <label for="">Quantity </label>
                                <input type="number" name="quantity" class="form-control" min="1">
                            </div>
                               
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">Product Type</label>
                            <select name="product_type"  class="form-control">
                                <option value="">--Select Product Type--</option>
                                <option value="door">Door</option>
                                <option value="handle">Handle</option>
                                <option value="lentern">Lentern</option>
                                <option value="frame">Frame</option>
                                <option value="window">Window</option>
                            </select>
                            </div>
                            <div class="col-md-6">
                                <label for="">Image <sub class="text-danger">(Press CTRL to upload more than one)</sub></label>
                           <input type="file" name="image_gallery[]" class="form-control" multiple>
                            </div>

                            
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for=""><b>Categories</b></label>
                                <select name="category_id[]" multiple id="category" class="form-control">
                                    <option value="" disabled>Select Categories</option>
                                    @foreach ($categories as $category)
                                    <option value="{{$category->id}}">{{$category->cat_name}}</option>
                                    @endforeach 
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for=""> Product Type</label>
                                <select name="type" id="" class="form-control">
                                    <option value="simple">Simple Product</option>
                                    <option value="customize">Customizable Product</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="">Short Descrition </label>
                                <textarea name="short_description" class="form-control"  rows="5"></textarea>
                            
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="">Long Descrition </label>
                            <textarea name="description" id="summernote"class="form-control" cols="30" rows="5"></textarea>
                            </div>
                        </div>
                        
                        
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">Attribute</label>
                                <select name="attribute" id="attribute" class="form-control">
                                    <option value="">Select Attribute</option>
                                    @foreach ($attributes as $attribute)
                                        <option value="{{$attribute->id}}">{{$attribute->attribute_name}}</option>                                        
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="">Terms</label>
                                <select name="terms[]" id="terms" multiple="multiple" class="form-control select2">
  
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <button class="btn mt-1 btn-xs btn-success float-right" type="button" id="add"> Add</button>
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
                           <div class="col-md-12">
                               <label for="">Search Tags <small class="text-danger">(Press Space to Add new Tag)</small></label>
                               <select name="tags[]" id="tags" multiple="multiple" class="form-control select2">
                                    <option value="" disabled> Create Tag for Product</option>
                                </select>
                           </div>
                            
                           
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="" ></label>
                                <button type="submit"  class="btn btn-success mt-3 "><i class="fa fa-plus" ></i> Add Product</button>
                                <a href="{{url('admin/products')}}" class="btn btn-danger mt-3 ml-3"> <i class="fa fa-times"> Cancel</i> </a>
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
        product_name: {
            required: true,
            minlength: 6
        },
        brand_name: {
            required: true
           
        },
        'image_gallery[]': {
        required: true,
        minlength: 1
        },
        category_id:{
            required:true
        },
        terms: {
            required: true,
            minlength: 1
        },
      
     
        product_type: {
            required: true
           
        },
        regular_price: {
            required: true,
            min:1
           
        },
        sale_price: {
            required: true,
            min:1
        },
        attribute:{
            required:true
        },
        weight: {
            required: true         
        },
        quantity: {
            required: true,
            min:1   
        }


        
    }
});
</script>
<Script>
    $(document).ready(function(){
        $("#addbtn").click(function(){
            var new_attr = $("#new_attr").val();
            
            //alert(product_id);
            $.ajaxSetup({
				headers:{'X-CSRF-Token':'{{csrf_token()}}'}
            });
            url = "{{url('admin/attribute/creates')}}";
            $.ajax({
           type:'POST',
           url:url,
            data:{
                new_attr:new_attr,
               
            },

           success:function(result){
               console.log(result);
               var jsonResult = JSON.parse(result.substring(result.indexOf('{'), result.indexOf('}')+1));
               
               var len =jsonResult[0].length;
               var option = "";
                $('#attribute').empty();
                var option = "<option >"+" Select Attribute"+"</option>";
                for(var i=0; i<len; i++)
                    {
                    var attrId = jsonResult[0][i];
                    var attrName = jsonResult[1][i];
                    option += "<option value="+ attrId +" selected>"+attrName+"</option>";
                    }
                    $('#attribute').html(option);

         		}
         		  	
           		
            });
        
    
    });
    $("#attribute").change(function(){
        $.ajaxSetup({
				headers:{'X-CSRF-Token':'{{csrf_token()}}'}
            });
       var attr = $("#attribute").val();
       
       url = "{{url('admin/attribute/get_terms')}}";
            $.ajax({
           type:'POST',
           url:url,
            data:{
                attr:attr,
               
            },
            success:function(result){
                console.log(result);
                var jsonResult = JSON.parse(result.substring(result.indexOf('{'), result.indexOf('}')+1));
               
               var len =jsonResult[0].length;
               var option = "";
                $('#terms').empty();
                var option = "<option disabled>"+" Select Terms"+"</option>";
                for(var i=0; i<len; i++)
                    {
                    var attrId = jsonResult[0][i];
                    var attrName = jsonResult[1][i];
                    option += "<option value='"+ attrId +"' selected>"+attrName+"</option>";
                    }
                    $('#terms').html(option);
                    //console.log(option);

         		}
         		  	
               
         		
    });
});
    });
</Script>
@endsection
