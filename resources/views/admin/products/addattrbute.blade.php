@extends('admin-layout.layouts')
@section('title','Add New Attribute')
@section('content')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />




<div class="page-container">
    <div class="main-content">
        <div class="page-header">
            <h2 class="header-title">Add New Attribute</h2>
            <div class="header-sub-title float-right">
                <nav class="breadcrumb breadcrumb-dash">
                    <a href="{{url('admin/dashboard')}}" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Home</a>
                    <a href="{{url('admin/products')}}" class="breadcrumb-item"></i>Products</a>
                    <a class="breadcrumb-item" href="#">Add new Attribute</a>
                    
                </nav>
            </div>
        </div>
        <div class="row">
            
            <div class="col-md-12">
                <div class="card ">
                    <form action="{{ url('/admin/prdattr/create/'.$id)}}"  method="post" enctype="multipart/form-data" id="add_product">
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
                        
                   
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="">Select Attribute</label>
                                    <select name="attribute_id" id="attribute" class="form-control">
                                        <option value="" selected disabled>Select Attribute</option>
                                        @foreach ($attributes as $attr)
                                        <option value="{{$attr->id}}">{{$attr->attribute_name}}</option>
                                    @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="">Select or create Terms </label>
                                    <select name="terms[]" id="terms" class="form-control" multiple></select>
                                </div>
                            </div>
                      
                       
                       
                       
                        
                        
                        {{-- <div class="row">
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
                                
  
                                </select>
                            </div>
                        </div> --}}
                        <div class="row">
                            <div class="col-md-12">
                                {{-- <input type="hidden" id="no_of_attribute" name="no_of_attribute">
                                <input type="hidden" id="no_of_attributes" name="no_of_attribute">
                                <button class="btn mt-1 btn-xs btn-success float-right" type="button" id="add"> <i class="fa fa-plus-circle"></i> Add</button> --}}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 text-center mt-2">
                                <span id="message" class="text-danger mt-1 text-center"></span>
                            </div>
                        </div>
                        {{-- <div class="row">
                            <div class="col-md-12">
                                <table class="table" id="tableattr" style="display: none">
                                    <thead>
                                        <th>Attribute</th>
                                        <th>Attribute Options</th>
                                        <th>Action</th>
                                    </thead>
                                    <tbody >
                                    
                                    </tbody>
                                </table>
                            </div>
                        </div> --}}
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
                                <label for="" ></label>
                                <button type="submit"  class="btn btn-success mt-3 " id="btncheck"><i class="fa fa-plus" ></i> Add Product Attribute</button>
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
    $('#terms').select2(
        {
            tags:true,
            tokenSeparators: [",", " "]
        }
    );
    
});


 
    
   

  
    $("#attribute").change(function(){
       
        
        
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
                    $('#terms').append(option);
                    //console.log(option);

         		}
         		  	
               
         		
    });
    url = "{{url('admin/attribute/checkattr')}}";
    $.ajax({
        
           type:'POST',
           url:url,
            data:{
                attr:attr,
                id:{{$id}}
               
            },
            success:function(result){
                console.log(result);
                if(result==0){
                 $('#btncheck').prop('disabled',false);
                 $('#message').html('');
              }
              else{
                $('#message').html("<i class='fa fa-times-circle' aria-hidden='true'> </i> <b>The Attribute already taken</b>");
                $('#btncheck').prop('disabled',true);
              }
         		}
         		  	
               
         		
    });
});
 
    let i = 1;
    let j=1;
    $("#add").click(function(){
        $('#tableattr').show();
        var document_array = <?php echo json_encode($attributes,JSON_PRETTY_PRINT)?>;
        let row = '';
        row+='<tr>';
        row+='<td>';
        
        row+='<select class="form-control" data-id="'+i+'" id="attribute'+i+'" onchange="abc('+i+')" name="attribute'+i+'" > ';
        row+='<option value="" selected disabled>Select Attribute</option>';
        
        for (let i = 0; i < document_array.length; i++) {
          row+='<option value="'+document_array[i]["id"]+'">'+document_array[i]["attribute_name"]+'</option>';
            
        }
    
        row+='</select>';
        row+='</td>';
        row+='<td><select name="terms'+i+'[]" id="terms'+i+'" class="form-control" disabled multiple> </select></td>';
        row+='<td> <button class="btn btn-danger btn-xs remove" type="button"> <i class="fa fa-minus"></i></button></td></tr>';
        
        $('#tableattr').append(row);
        $('#terms'+i).select2(
        {
            tags:true,
            tokenSeparators: [",", " "]
        });
        $('#no_of_attribute').val(i);
        $('#no_of_attributes').val(j);
        attributelength = $('#attributelength').val();
        if(attributelength==j) {
          $('#add').prop("disabled",true);  
        }
        i++;
        j++;
        
        
    });
    $(document).on('click', '.remove', function(){
        j--;
       
        $(this).closest("tr").remove();
        
          $('#add').prop("disabled",false);  
        
        });
    function abc(l){
        var attr = $("#attribute"+l).val();
       
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
                $('#terms'+i).empty();
                var option = "<option disabled>"+" Select Terms"+"</option>";
                for(var i=0; i<len; i++)
                    {
                    var attrId = jsonResult[0][i];
                    var attrName = jsonResult[1][i];
                    option += "<option value='"+ attrId +"' selected>"+attrName+"</option>";
                    }

                    $('#terms'+l).html(option);
                    $('#terms'+l).prop('disabled',false);
                    //console.log(option);

         		}
         		  	
               
         		
    });  
    }

</script>
@endsection
