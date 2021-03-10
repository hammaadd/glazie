@extends('admin-layout.layouts')
@section('title','Add Product Variation ')
@section('content')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />

<div class="page-container">
    <div class="main-content">
        <div class="page-header">
            <h2 class="header-title">Product Size</h2>
            <div class="header-sub-title float-right">
                <nav class="breadcrumb breadcrumb-dash">
                    <a href="#" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Home</a>
                    <a class="breadcrumb-item" href="#">Add Product Variation</a>
                    
                </nav>
            </div>
        </div>
        <div class="row">
            
            <div class="col-md-12">
                <div class="card">
                    <form action="{{ url('admin/productsize/create/')}}"  method="post" enctype="multipart/form-data" id="create_size">
                    <div class="card-header">
                        <h4 class="card-title">Add Product Variation</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                        @if(count($errors)>0)
                                @foreach($errors->all() as $error)
                                <div class="col-md-6">
                                    <div class="alert alert-danger">
                                        {{$error}}
                                    </div>
                                </div>
                                @endforeach
                            @endif
                        </div>
                        
                        <div class="row">                          
                            @csrf                           
                            @for ($i = 0; $i < $count; $i++)
                            <table class="table table-hover">
                                 
                            @if(count($dataarray)>1)
                                
                            @endif
                            </table>
                            @endfor
                        <div class="row">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-success mt-3"><i class="fa fa-plus"></i> Add Product Variation</button>
                            <a href="{{url('admin/productattribute') }}" class="btn btn-danger mt-3 ml-3"> <i class="fa fa-times"></i> Cancel</a>
                       
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
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>


@endsection
