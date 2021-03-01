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
                    <form action="{{ url('/admin/updateterms')}}"  method="post" enctype="multipart/form-data" id="add_product">
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
                        @foreach ($avalilterms as $ter)
                        
                        
                        @endforeach
                   
                            @csrf
                            <div class="row">
                      
                                <div class="col-md-12">
                                    <label for="">Select or create Terms </label>
                                    <select name="terms[]" id="terms" class="form-control" multiple>
                                        @foreach ($avalilterms as $ter)
                                            <option value="{{$ter->id}}" 
                                                @foreach ($ter->prdterms as $prdtrm)
                                                @if ($prdtrm->product_id ==$product_id && $prdtrm->attribute_id ==$attr_id)
                                                   selected 
                                                @endif    
                                                @endforeach
                                            >{{$ter->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            
                        <div class="row">
                            <div class="col-md-12 text-center mt-2">
                                <input type="hidden" name="attr_id" value="{{$attr_id}}">
                                <input type="hidden" name="product_attribute" value="{{$id}}">
                            </div>
                        </div>
                      
                        
                        <div class="row">
                            <div class="col-md-12">
                                <label for="" ></label>
                                <button type="submit"  class="btn btn-success mt-3 " id="btncheck"><i class="fa fa-edit" ></i>Update Product Terms</button>
                                <a href="{{url('admin/products/view/'.$product_id)}}" class="btn btn-danger mt-3 ml-3"> <i class="fa fa-times"> Cancel</i> </a>
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


 
    
   

  
    
</script>
@endsection
