@extends('admin-layout.layouts')
@section('title','Add New Attribute')
@section('content')
<div class="page-container">
    <div class="main-content">
        <div class="page-header">
            <h2 class="header-title">Attribute</h2>
            <div class="header-sub-title float-right">
                <nav class="breadcrumb breadcrumb-dash">
                    <a href="#" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Home</a>
                    <a class="breadcrumb-item" href="#">Add New Attribute</a>
                    
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="card">
                    <form action="{{ url('/admin/productattribute/create')}}"  method="post" enctype="multipart/form-data" id="create_prdattr">
                    <div class="card-header">
                        <h4 class="card-title">Add New Attribute</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                        @if(count($errors)>0)
                                @foreach($errors->all() as $error)
                                <div class="col-md-12">
                                    <div class="alert alert-danger">
                                        {{$error}}
                                    </div>
                                </div>
                                @endforeach
                            @endif
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="">Products</label>
                                <select name="product_id" id="product_id" class="form-control">
                                    <option value="">Select Product</option>
                                    @foreach ($products as $prd)
                                        <option value="{{$prd->id}}">{{$prd->product_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                            @csrf
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="">Available Attributes</label>
                                <select name="attirbute_id" id="attribubte_id" class="form-control">
                                    <option value="">Select the Attribute</option>
                                    
                                </select>
                            </div>
                        </div>
                          
                        <div class="row">
                            <button type="submit" class="btn btn-success mt-3"><i class="fa fa-plus"></i> Create Attribute</button>
                            <a href="{{url('admin/productattribute') }}" class="btn btn-danger mt-3 ml-3"> <i class="fa fa-times"></i> Cancel</a>
                       
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
    $(document).ready(function(){
        $("#product_id").change(function(){
            var product_id =$("#product_id").val();
            //alert(product_id);
            $.ajaxSetup({
				headers:{'X-CSRF-Token':'{{csrf_token()}}'}
            });
            url = "{{url('admin/productattribute/getattribute')}}";
            $.ajax({
           type:'POST',
           url:url,
            data:{
                product_id:product_id,
               
           },

           success:function(result){
               //console.log(result);
               var jsonResult = JSON.parse(result.substring(result.indexOf('{'), result.indexOf('}')+1));
               var len =jsonResult[0].length;
               var option = "";
                $('#attribubte_id').empty();
                var option = "<option >"+" Select Attribute"+"</option>";
                for(var i=0; i<len; i++)
                    {
                    var attrId = jsonResult[0][i];
                    var attrName = jsonResult[1][i];
                    option += "<option value="+ attrId +">"+attrName+"</option>";
                    }
                    $('#attribubte_id').html(option);

         		}
         		  	
           		
            });
        });
    });
           
   
    $("#create_prdattr").validate({
    ignore: ':hidden:not(:checkbox)',
    errorElement: 'label',
    errorClass: 'is-invalid',
    validClass: 'is-valid',
    rules: {
        product_id: {
            required: true
        },
        attirbute_id: {
            required: true
           
        }
    }
});

    </script>
@endsection
