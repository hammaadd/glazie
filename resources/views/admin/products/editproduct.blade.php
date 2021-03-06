@extends('admin-layout.layouts')
@section('title','Update Product')
@section('content')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<div class="page-container">
    <div class="main-content">
        <div class="page-header">
            <h2 class="header-title"> Product</h2>
            <div class="header-sub-title">
                <nav class="breadcrumb breadcrumb-dash">
                    <a href="#" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Home</a>
                    <a class="breadcrumb-item" href="#">Edit Product</a>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card ">
                    <form action="{{ url('/admin/products/update/')}}"  method="post" enctype="multipart/form-data" id="edit_product">
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
                        
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">Product Name</label>
                                <input type="text" class="form-control" name="product_name" placeholder="product Name" autofocus value="Alumenium Door">
                            </div>
                            <div class="col-md-6">
                                <label for="">Brand Name </label>
                                <select name="brand_name" class="form-control">
                                    <option value="">--Selecct  Brand--</option>
                                    <option value="1">Shoes</option>
                                    <option value="2"selected>Doors</option>    
                                </select>
                            </div>
                            
                           
                        </div>
                      
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">Regular Price</label>
                                <input type="number" name="regular_price" class="form-control" value="400">
                            </div>
                            <div class="col-md-6">
                                <label for="">Sale Price</label>
                                <input type="number" name="sale_price" class="form-control" value="300">
                            </div>
                                
                       
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">Weight</label>
                                <input type="number" name="weight" class="form-control" value="40"> 
                            </div>
                            <div class="col-md-6">
                                <label for="">Quantity </label>
                            <input type="number" name="quantity" class="form-control" value="232"> 
                            </div>
                              
                        
                               
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">Product Type</label>
                                <select name="product_type"  class="form-control">
                                    <option value="">--Select Product Type--</option>
                                    <option value="door">Door</option>
                                    <option value="handle"
                                     >Handle</option>
                                    <option value="lentern" 
                                    >Lentern</option>
                                    <option value="frame"                                         selected
                                    >Frame</option>
                                    <option value="window"
                                     >Window</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="">Products images</label>
                                <input type="file" class="form-control" multiple name="image_gallery[]">
                            </div>
                           
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="">Short Descrition </label>
                                <textarea name="short_description" class="form-control"  rows="5">This is short Description of the proudct </textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="">Long Description</label>
                                <textarea name="description" id="summernote"  class="form-control"> <b><i>This is the long description </i></b></textarea>
                            </div>
                            
                        </div>
                     
                        
                        <div class="row">
                            <div class="col-md-6">

                                <label for="">Attribute</label>
                                <select name="attribute" id="attribute" class="form-control">
                                    <option value="">Select Attribute</option>
                                    <option value="11"> Color </option>
                                    <option value="12"selected> Size </option>
                                    <option value="13" >abc</option>
                                    <option value="14"> abcd </option>
                                    <option value="15">abcde</option>
                                    <option value="18">assa</option>
                                    <option value="19">sdfsd</option>
                                    <option value="20">sdf</option>                                        
                                    <option value="21">sdjflksd</option>                                        
                                </select>
                               
                            </div>
                            <div class="col-md-6">
                                <label for="">Terms</label>
                                <select name="terms[]" id="terms" multiple="multiple" class="form-control select2">
                                      <option value="12" seleted>Square</option>                               
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for=""><b>Categories</b></label>
                                <select name="category_id[]" multiple id="category" class="form-control">
                                    <option value="" disabled>Select Categories</option>
                                    <option value="1">Door</option>
                                    <option value="2" selected >Knob</option>
                                    <option value="4">handle</option>
                                    <option value="5">handle</option>
                                    <option value="6">sdfsd</option>
                                     
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
            
                                               
            <div class="col-md-2" id="abc116">
               <img src="{{asset('productimages/2020/12/5fe528234ae34download (1).jfif')}}" alt="" height="150px" width=100%>
               <div class="row mt-2 mb-4">
                   
                   <div class="col-md-8" id="primary_div116"> 
                       <button class="btn btn-primary btn-xs btn-flat border-0 mt-1" data-id="116" title="Make this image primary" onclick="makeprimary(116)" id="primary" 
                                                               disabled
                                                               >Primary<i class="fa fa-user"></i> </button>
                   </div>
                      
                   
                   <div class="col-md-4 ">
                       <button class="btn btn-danger btn-xs btn-flat border-0 mt-1"  title="Remove image" id="remove" onclick="remove(116)"> <i class="fa fa-trash"></i> </button>
                   </div>
               </div>
           </div>
                                                      
            <div class="col-md-2" id="abc117">
               <img src="{{asset('productimages/2020/12/5fe528238666fdownload (2).jfif')}}" alt="" height="150px" width=100%>
               <div class="row mt-2 mb-4">
                   
                   <div class="col-md-8" id="primary_div117"> 
                       <button class="btn btn-primary btn-xs btn-flat border-0 mt-1" data-id="117" title="Make this image primary" onclick="makeprimary(117)" id="primary" 
                                                               >Primary<i class="fa fa-user"></i> </button>
                   </div>
                      
                   
                   <div class="col-md-4 ">
                       <button class="btn btn-danger btn-xs btn-flat border-0 mt-1"  title="Remove image" id="remove" onclick="remove(117)"> <i class="fa fa-trash"></i> </button>
                   </div>
               </div>
           </div>
                                                      
            <div class="col-md-2" id="abc118">
               <img src="{{asset('productimages/2020/12/5fe5282399663download.jfif')}}" alt="" height="150px" width=100%>
               <div class="row mt-2 mb-4">
                   
                   <div class="col-md-8" id="primary_div118"> 
                       <button class="btn btn-primary btn-xs btn-flat border-0 mt-1" data-id="118" title="Make this image primary" onclick="makeprimary(118)" id="primary" 
                                                               >Primary<i class="fa fa-user"></i> </button>
                   </div>
                      
                   
                   <div class="col-md-4 ">
                       <button class="btn btn-danger btn-xs btn-flat border-0 mt-1"  title="Remove image" id="remove" onclick="remove(118)"> <i class="fa fa-trash"></i> </button>
                   </div>
               </div>
           </div>
                                                      
            <div class="col-md-2" id="abc119">
               <img src="{{asset('productimages/2020/12/5fe52823a4611front-door-designs-for-homes-home-front-door-design.jpg')}}" alt="" height="150px" width=100%>
               <div class="row mt-2 mb-4">
                   
                   <div class="col-md-8" id="primary_div119"> 
                       <button class="btn btn-primary btn-xs btn-flat border-0 mt-1" data-id="119" title="Make this image primary" onclick="makeprimary(119)" id="primary" 
                                                               >Primary<i class="fa fa-user"></i> </button>
                   </div>
                      
                   
                   <div class="col-md-4 ">
                       <button class="btn btn-danger btn-xs btn-flat border-0 mt-1"  title="Remove image" id="remove" onclick="remove(119)"> <i class="fa fa-trash"></i> </button>
                   </div>
               </div>
           </div>
                                                      
            <div class="col-md-2" id="abc120">
               <img src="{{asset('productimages/2020/12/5fe52823af3b8images.jfif')}}" alt="" height="150px" width=100%>
               <div class="row mt-2 mb-4">
                   
                   <div class="col-md-8" id="primary_div120"> 
                       <button class="btn btn-primary btn-xs btn-flat border-0 mt-1" data-id="120" title="Make this image primary" onclick="makeprimary(120)" id="primary" 
                                                               >Primary<i class="fa fa-user"></i> </button>
                   </div>
                      
                   
                   <div class="col-md-4 ">
                       <button class="btn btn-danger btn-xs btn-flat border-0 mt-1"  title="Remove image" id="remove" onclick="remove(120)"> <i class="fa fa-trash"></i> </button>
                   </div>
               </div>
           </div>
                              
</div>

        
    </div>

@endsection
@section('script')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script src="{{ url('admin-assets/vendors/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script>
    $(document).ready(function() {
    $('#terms').select2(
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
            
           },

           success:function(result){
                    alert("The image is selected for primary");

         		}
         		  	
           		
            });
        }
    }
    function remove(id){
        confirmation = confirm("Are you sure to delete the image");
if (confirmation==true) {
    $.ajaxSetup({
        headers:{'X-CSRF-Token':'{{csrf_token()}}'}
    });
    url = "{{url('admin/products/prdremove')}}";
    $.ajax({
   type:'POST',
   url:url,
    data:{id:id
   },

   success:function(result){
            $("#abc"+id).css('display','none');
          //  alert("The image is removed");
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
    <script>
       
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
                //console.log(result)
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
    </script>
@endsection
