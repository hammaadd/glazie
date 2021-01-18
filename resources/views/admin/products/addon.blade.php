@extends('admin-layout.layouts')
@section('title','Add On')
@section('content')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<style>
    img:hover{
        cursor: pointer;
    }
</style>
<div class="page-container">
    <div class="main-content">
        <div class="page-header">
            <h2 class="header-title">Add On</h2>
            <div class="header-sub-title">
                <nav class="breadcrumb breadcrumb-dash">
                    <a href="{{url('admin/dashboard')}}" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Home</a>
                    <a class="breadcrumb-item" href="#">Add On</a>
                    
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-md-10"></div>
            <div class="col-md-2">
                <a class="btn btn-flat btn-primary float-right" href="{{url('admin/addonproduct')}}"><i class="anticon anticon-plus"></i> Add</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Models</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Color</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-glass-tab" data-toggle="pill" href="#pills-glass" role="tab" aria-controls="pills-contact" aria-selected="false">Glasss</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-frame-tab" data-toggle="pill" href="#pills-frame" role="tab" aria-controls="pills-contact" aria-selected="false">Frame</a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link" id="pills-frame-color-tab" data-toggle="pill" href="#pills-frame-color" role="tab" aria-controls="pills-contact" aria-selected="false">Frame Colour</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-frame-glass-tab" data-toggle="pill" href="#pills-frame-glass" role="tab" aria-controls="pills-contact" aria-selected="false">Frame Glass</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-handle-tab" data-toggle="pill" href="#pills-handle" role="tab" aria-controls="pills-contact" aria-selected="false">Handle</a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link" id="pills-hingle-tab" data-toggle="pill" href="#pills-hingle" role="tab" aria-controls="pills-contact" aria-selected="false">Hingle Side</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-price-tab" data-toggle="pill" href="#pills-price" role="tab" aria-controls="pills-contact" aria-selected="false">Price</a>
                    </li>
                    
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                        <div class="row">
                            <div class="col-md-2 d-flex">
                                <div class="card">
                                    <div class="card-header">
                                        <img src="{{asset('new_folder/1211.png')}}" width="100%">
                                    </div>
                                    <div class="card-body">
                                        <button class="btn btn-info btn-xs"><i class="anticon anticon-edit"></i></button>
                                        <button class="btn btn-danger btn-xs"><i class="anticon anticon-delete"></i></button>
                                    </div>
                                </div>
                                
                                
                            </div>
                            <div class="col-md-2 d-flex">
                                <div class="card ">
                                    <div class="card-header">
                                        <img src="{{asset('new_folder/modle.png')}}" width="100%">
                                    </div>
                                    <div class="card-body mt-3">
                                        <button class="btn btn-info btn-xs"><i class="anticon anticon-edit"></i></button>
                                        <button class="btn btn-danger btn-xs"><i class="anticon anticon-delete"></i></button>
                                    </div>
                                </div>
                                
                                <br>  
                            </div>
                        </div>
                        
                    </div>
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                        
                        <div class="row">
                            <div class="col-md-2 d-flex">
                                <div class="card ">
                                    <div class="card-header">
                                        <img src="{{asset('new_folder/a.png')}}" width="100%">
                                        
                                    </div>
                                    <div class="card-body mt-3">
                                        <button class="btn btn-info btn-xs"><i class="anticon anticon-edit"></i></button>
                                        <button class="btn btn-danger btn-xs"><i class="anticon anticon-delete"></i></button>
                                    </div>
                                </div>
                                
                                
                            </div>
                            <div class="col-md-2 d-flex">
                                <div class="card ">
                                    <div class="card-header">
                                        
                                        <img src="{{asset('new_folder/bff.png')}}" width="100%" >
                                    </div>
                                    <div class="card-body mt-1">
                                        <button class="btn btn-info btn-xs"><i class="anticon anticon-edit"></i></button>
                                        <button class="btn btn-danger btn-xs"><i class="anticon anticon-delete"></i></button>
                                    </div>
                                </div>
                                
                                
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-glass" role="tabpanel" aria-labelledby="pills-glass-tab">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="card ">
                                    <div class="card-header">
                                        
                                        <img src="{{asset('new_folder/21.png')}}" width="100%" >
                                    </div>
                                    <div class="card-body mt-1">
                                        <button class="btn btn-info btn-xs"><i class="anticon anticon-edit"></i></button>
                                        <button class="btn btn-danger btn-xs"><i class="anticon anticon-delete"></i></button>
                                    </div>
                                </div>
                               
                                
                            </div>
                            <div class="col-md-2">
                                <div class="card ">
                                    
                                        <div class="card-header">
                                            
                                            <img src="{{asset('new_folder/21.png')}}" width="100%" >
                                        </div>
                                        <div class="card-body mt-1">
                                            <button class="btn btn-info btn-xs"><i class="anticon anticon-edit"></i></button>
                                            <button class="btn btn-danger btn-xs"><i class="anticon anticon-delete"></i></button>
                                        </div>
                                    
                                  
                                </div>
                                
                                
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-frame" role="tabpanel" aria-labelledby="pills-frame-tab">
                        <div class="row">
                            <div class="col-md-2 d-flex">
                                <div class="card">
                                    <div class="card-header">
                                        <img src="{{asset('new_folder/11111.png')}}" width="100%">
                                    </div>
                                    <div class="card-body">
                                        <button class="btn btn-info mt-2 btn-xs"> <i class="anticon anticon-edit"></i></button>
                                        <button class="btn btn-danger mt-2 btn-xs"><i class="anticon anticon-delete"></i></button>
                                    </div>
                                </div>
                                
                                
                                
                            </div>
                            <div class="col-md-2">
                                <div class="card">
                                    <div class="card-header">
                                        <img src="{{asset('new_folder/frame.png')}}" width="100%">
                                    </div>
                                    <div class="card-body">
                                        <button class="btn btn-info mt-2 btn-xs"> <i class="anticon anticon-edit"></i></button>
                                        <button class="btn btn-danger mt-2 btn-xs"><i class="anticon anticon-delete"></i></button>
                                    </div>
                                </div>
                               
                                
                                
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-frame-color" role="tabpanel" aria-labelledby="pills-frame-color-tab">
                        <div class="row">
                            <div class="col-md-2 d-flex">
                                <div class="card">
                                    <div class="card-header">
                                        <img src="{{asset('new_folder/framecolor.png')}}" width="100%">
                                    </div>
                                    <div class="card-body">
                                        <button class="btn btn-info mt-2 btn-xs"> <i class="anticon anticon-edit"></i></button>
                                        <button class="btn btn-danger mt-2 btn-xs"><i class="anticon anticon-delete"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2 d-flex">
                                <div class="card">
                                    <div class="card-header">
                                        <img src="{{asset('new_folder/frame.png')}}" width="100%">
                                
                                
                                    </div>
                                    <div class="card-body">
                                        <button class="btn btn-info mt-2 btn-xs"> <i class="anticon anticon-edit"></i></button>
                                        <button class="btn btn-danger mt-2 btn-xs"><i class="anticon anticon-delete"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="tab-pane fade" id="pills-frame-glass" role="tabpanel" aria-labelledby="pills-frame-glass-tab">
                        <div class="row">
                            <div class="col-md-2 d-flex">
                                <div class="card">
                                    <div class="card-header">
                                        <img src="{{asset('new_folder/212.png')}}" width="100%">
                                    </div>
                                    <div class="card-body">
                                        <button class="btn btn-info mt-2 btn-xs"> <i class="anticon anticon-edit"></i></button>
                                        <button class="btn btn-danger mt-2 btn-xs"><i class="anticon anticon-delete"></i></button>
                                    </div>
                                </div>
                                
                                <br>
                                
                            </div>
                            <div class="col-md-2">
                                <div class="card">
                                    <div class="card-header">
                                        <img src="{{asset('new_folder/frameglass.png')}}" width="100%">
                                    </div>
                                    <div class="card-body">
                                        <button class="btn btn-info mt-2 btn-xs"> <i class="anticon anticon-edit"></i></button>
                                        <button class="btn btn-danger mt-2 btn-xs"><i class="anticon anticon-delete"></i></button>
                                    </div>
                                </div>
                               
                                <br>
                                
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-handle" role="tabpanel" aria-labelledby="pills-handle-tab">
                        <div class="row">
                            <div class="col-md-2 d-flex">
                                <div class="card">
                                    <div class="card-header">
                                        <img src="{{asset('new_folder/11112.png')}}" width="100%">
                                    </div>
                                    <div class="card-body">
                                        <button class="btn btn-info mt-2 btn-xs"> <i class="anticon anticon-edit"></i></button>
                                        <button class="btn btn-danger mt-2 btn-xs"><i class="anticon anticon-delete"></i></button>
                                    </div>
                                </div>
                                
                                
                                
                            </div>
                            <div class="col-md-2 d-flex">
                                <div class="card">
                                    <div class="card-header">
                                        <img src="{{asset('new_folder/1221.png')}}" width="100%">
                                    </div>
                                    <div class="card-body mt-4">
                                        <button class="btn btn-info mt-2 btn-xs"> <i class="anticon anticon-edit"></i></button>
                                        <button class="btn btn-danger mt-2 btn-xs"><i class="anticon anticon-delete"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-hingle" role="tabpanel" aria-labelledby="pills-hingle-tab">
                        <div class="row">
                            <div class="col-md-2 d-flex">
                                <img src="{{asset('new_folder/3.png')}}" width="100%">
                                <br>
                                <button class="btn btn-info mt-2 btn-xs"> <i class="anticon anticon-edit"></i></button>
                                <button class="btn btn-danger mt-2 btn-xs"><i class="anticon anticon-delete"></i></button>
                            </div>
                            <div class="col-md-2 d-flex">
                                <img src="{{asset('new_folder/122.png')}}" width="100%">
                                <br>
                                <button class="btn btn-info mt-2 btn-xs"> <i class="anticon anticon-edit"></i></button>
                                <button class="btn btn-danger mt-2 btn-xs"><i class="anticon anticon-delete"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-price" role="tabpanel" aria-labelledby="pills-price-tab">
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-m-3">
                                <img src="{{asset('new_folder/pricedoor.png')}}" width="100%">
                                <br>
                                <button class="btn btn-info mt-2 btn-xs"> <i class="anticon anticon-edit"></i></button>
                                <button class="btn btn-danger mt-2 btn-xs"><i class="anticon anticon-delete"></i></button>
                            </div>
                            <div class="col-md-1"></div>
                            <div class="col-md-6 ">
                                <div class="card">
                                    <div class="card-body">
                                        <label for="">Name</label>
                                        <input type="text" class="form-control" placeholder="Enter Name " >
                                        <label for="">Email</label>
                                        <input type="email" class="form-control" placeholder="Email">
                                        <label for="">Phone</label>
                                        <input type="text" class="form-control" placeholder="Enter Phone " >
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="">PostCode</label>
                                                <input type="text" class="form-control" placeholder="PostCoee">
                                                
                                            </div>
                                            <div class="col-md-6">
                                                <label for="">House No</label>
                                                <input type="text" class="form-control" placeholder="House No">
                                                
                                            </div>
                                        </div>
                                        <label for="">Address 1</label>
                                        <input type="text" class="form-control" placeholder="Address Line 1">
                                        <label for="">Address Lline 2</label>
                                        <input type="text" class="form-control" placeholder="Address Line 2">
                                        <label for="">City</label>
                                        <input type="text" class="form-control" placeholder="City">
                                        <button class="btn btn-tone btn-danger"><i class="anticon anticon-close"></i> Cancel</button>
                                        <button class="btn btn-tone btn-success"><i class="anticon anticon-check"></i>Submit</button>
                                    </div>
                                </div>
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
  
@endsection
