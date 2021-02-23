@extends('admin-layout.layouts')
@section('title','Product Add On')
@section('content')
<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>



<!-- page js -->

<div class="page-container">
    <div class="main-content">
        <div class="page-header">
            <h1 class="header-title">Product Add On</h1>
            <div class="header-sub-title float-right">
                <nav class="breadcrumb breadcrumb-dash ">
                    <a href="{{url('admin/dashboard')}}" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Home</a>
                    <a class="breadcrumb-item" href="#">Product Add On Details</a>
                    
                </nav>
            </div>
        </div>
        @if (session('info'))
        <script type="text/javascript">toastr.success("{{session('info')}}");</script>
        @endif 
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="media align-items-center m-b-15">
                                    <div class="avatar avatar-image rounded-0" style="height: 70px; width: 70px">
                                        <img src="{{asset('admin-assets/addon/'.$addon->svgimage)}}" alt="">
                                    </div>
                                    <div class="m-l-15">
                                        <h1 class="m-b-0">{{$addon->model_name}}</h1>
                                        <p class="text-muted m-b-0"></p>
                                        
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="col-md-6">
                                <a href="{{url('admin/addon/edit/'.$addon->id)}}" class="btn btn-primary float-right mt-3"> <i class="fa fa-pencil"></i> Edit</a>
                            </div> 
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <h2>AddOn </h2>
                                <div class="accordion" id="accordion-default">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="card-title">
                                                <a class="collapsed" data-toggle="collapse" href="#collapseTwoDefault">
                                                    <span class="float-lef">Colors</span>
                                                    
                                                </a>
                                                
                                            </h5>
                                        </div>
                                        <div id="collapseTwoDefault" class="collapse" data-parent="#accordion-default">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <a href="{{url('admin/addcolor/'.$addon->id)}}" class="btn btn-success btn-xs m-2 float-right"> <i class="fa fa-plus-circle"></i> Add New Color</a>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        @if (count($addon->colors)>0)
                                                            
                                                        
                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th>Sr #</th>
                                                                    <th>Color Name</th>
                                                                    <th>Side</th>
                                                                    <th>Color</th>
                                                                    <th>Price </th>
                                                                    <th>Quantity</th>
                                                                    <th>Action</th>
                                                                </tr>
                                                                @foreach ($addon->colors as $color)
                                                                    <tr>
                                                                        <td>{{$loop->iteration}}</td>
                                                                        <td>{{$color->name}}</td>
                                                                        <td><div style="background-color: {{$color->color_code}}; height:50px; width:50px;border-radius:50%;" ></div></td>
                                                                        <td>
                                                                            @if ($color->side=="external")
                                                                            <span class="text-success"><b>External</b></span>
                                                                            @else
                                                                            <span class="text-danger"><b>Internal</b></span>
                                                                            
                                                                            @endif

                                                                        </td>
                                                                        <td>{{$color->price}}</td>
                                                                        <td>{{$color->quantity}}</td>
                                                                        <td>
                                                                            <a href="{{url('admin/editcolor/'.$color->id)}}" class="btn btn-info btn-xs"> <i class="anticon anticon-edit"></i> Edit</a>
                                                                            <a href="{{url('admin/deletecolor/'.$color->id)}}" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure?')"> <i class="anticon anticon-delete"></i> Delete</a>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            </thead>
                                                        </table>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="card-title">
                                                <a class="collapsed" data-toggle="collapse" href="#collapseThreeDefault">
                                                    <span>Frames</span>
                                                </a>
                                            </h5>
                                        </div>
                                        <div id="collapseThreeDefault" class="collapse" data-parent="#accordion-default">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <a href="{{url('admin/addframe/'.$addon->id)}}" class="btn btn-success btn-xs float-right"> <i class="fa fa-plus-circle"></i> Add Frame </a>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        @if (count($addon->frames)>0)
                                                            
                                                        
                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th>Sr #</th>
                                                                    <th>Frame Name</th>
                                                                    <th>Price</th>
                                                                    <th>Quantity</th>
                                                                    <th>Image</th>
                                                                    <th>Action</th>
                                                                </tr>
                                                                @php
                                                                    $i=1;
                                                                @endphp
                                                                @foreach ($addon->frames as $frame)
                                                                    @if ($frame->type=="frame")
                                                                    <tr>
                                                                        <td>{{$i}}</td>
                                                                        <td>{{$frame->name}}</td>
                                                                        <td>{{$frame->frame_price}}</td>
                                                                        <td>{{$frame->quantity}}</td>
                                                                        <td><img src="{{asset('admin-assets/addon/frame/'.$frame->image)}}" height="100px"></td>
                                                                        
                                                                        <td>
                                                                            <a href="{{url('admin/framecolors/'.$frame->id)}}" class="btn btn-warning btn-xs" title="View Frame Colors"> <i class="anticon anticon-eye"></i>Colors</a>
                                                                            
                                                                            <a href="{{url('admin/frameglasses/'.$frame->id)}}" class="btn btn-primary btn-xs" title="View Frame Glasses"> <i class="anticon anticon-eye"></i>Glass</a>
                                                                            <a href="{{url('admin/editframe/'.$frame->id)}}" class="btn btn-info btn-xs"> <i class="anticon anticon-edit"></i> Edit</a>
                                                                            <a href="{{url('admin/deleteframe/'.$frame->id)}}" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure to delete')"> <i class="anticon anticon-delete"></i> Delete</a>
                                                                        </td>
                                                                    </tr>
                                                                    @php
                                                                        $i++;
                                                                    @endphp
                                                                    @endif
                                                                @endforeach
                                                            </thead>
                                                        </table>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="card-title">
                                                <a class="collapsed" data-toggle="collapse" href="#collapseThreeDefaults">
                                                    <span>Glass</span>
                                                </a>
                                            </h5>
                                        </div>
                                        <div id="collapseThreeDefaults" class="collapse" data-parent="#accordion-default">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <a href="{{url('admin/addglass/'.$addon->id)}}" class="btn btn-success btn-xs float-right"> <i class="fa fa-plus-circle"></i> Add Glass </a>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        @if (count($addon->frames)>0)
                                                            
                                                        
                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th>Sr #</th>
                                                                    <th>Glass Name</th>
                                                                    <th>Price</th>
                                                                    <th>Quantity</th>
                                                                    <th>Image</th>
                                                                    <th>Action</th>
                                                                </tr>
                                                                @php
                                                                    $i=1;
                                                                @endphp
                                                                @foreach ($addon->frames as $glass)
                                                                    @if ($glass->type=="glass")
                                                                    <tr>
                                                                        <td>{{$i}}</td>
                                                                        <td>{{$glass->name}}</td>
                                                                        <td>{{$glass->frame_price}}</td>
                                                                        <td>{{$glass->quantity}}</td>
                                                                        <td><img src="{{asset('admin-assets/addon/glass/'.$glass->image)}}" height="100px" width="100px"></td>
                                                                        
                                                                        <td>
                                                                          
                                                                            
                                                                            <a href="{{url('admin/editglass/'.$glass->id)}}" class="btn btn-info btn-xs"> <i class="anticon anticon-edit"></i> Edit</a>
                                                                            <a href="{{url('admin/deleteglass/'.$glass->id)}}" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure to delete')"> <i class="anticon anticon-delete"></i> Delete</a>
                                                                        </td>
                                                                    </tr>
                                                                    @php
                                                                        $i++;
                                                                    @endphp
                                                                    @endif
                                                                @endforeach
                                                            </thead>
                                                        </table>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="card-title">
                                                <a class="collapsed" data-toggle="collapse" href="#collapsefourDefaults">
                                                    <span>Furniture</span>
                                                </a>
                                            </h5>
                                        </div>
                                        <div id="collapsefourDefaults" class="collapse" data-parent="#accordion-default">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <a href="{{url('admin/addfurniture/'.$addon->id)}}" class="btn btn-success btn-xs float-right"> <i class="fa fa-plus-circle"></i> Add Furniture </a>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        @if (count($addon->furniture)>0)
                                                            
                                                        
                                                        <table class="table table-re">
                                                            <thead>
                                                                <tr>
                                                                    <th>Sr #</th>
                                                                    <th>Name</th>
                                                                    <th>Furniture Type</th>
                                                                    <th>Price</th>
                                                                    <th>Quantity</th>
                                                                    <th>Action</th>
                                                                </tr>
                                                              
                                                                @foreach ($addon->furniture as $furniture)
                                                                    
                                                                    <tr>
                                                                        <td>{{$loop->iteration}}</td>
                                                                        <td>{{$furniture->name}}</td>
                                                                        <td>{{$furniture->type}}</td>
                                                                        <td>£ {{$furniture->price}}</td>
                                                                        <td><img src="{{asset('admin-assets/addon/furniture/'.$furniture->image)}}" height="100px"></td>
                                                                        
                                                                        <td>
                                                                          
                                                                            
                                                                            <a href="{{url('admin/editfurniture/'.$furniture->id)}}" class="btn btn-info btn-xs"> <i class="anticon anticon-edit"></i> Edit</a>
                                                                            <a href="{{url('admin/deletefurniture/'.$furniture->id)}}" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure to delete')"> <i class="anticon anticon-delete"></i> Delete</a>
                                                                        </td>
                                                                    </tr>
                                                                   
                                                                @endforeach
                                                            </thead>
                                                        </table>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="card-title">
                                                <a class="collapsed" data-toggle="collapse" href="#hinges">
                                                    <span>Hinge</span>
                                                </a>
                                            </h5>
                                        </div>
                                        <div id="hinges" class="collapse" data-parent="#accordion-default">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        @if (count($addon->hinges)<2)
                                                        <a href="{{url('admin/addhinge/'.$addon->id)}}" class="btn btn-success btn-xs float-right"> <i class="fa fa-plus-circle"></i> Add Hinge </a>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <table class="table table-hover">
                                                            <thead>
                                                                <tr>
                                                                    <th>Sr #</th>
                                                                    <th>Hinge Side</th>
                                                                    <th>Delete</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($addon->hinges as $hinge)
                                                                    <tr>
                                                                        <td>{{$loop->iteration}}</td>
                                                                        <td>
                                                                            @if ($hinge->hingeside=='right')
                                                                            <span class="text-success font-weight-bold">Right</span>
                                                                            @else 
                                                                            <span class="text-danger font-weight-bold">Left</span>
                                                                            @endif
                                                                        </td>
                                                                        <td><a href="{{url('admin/addon/removehinge/'.$hinge->id)}}" class="btn btn-danger btn-xs" title="Remove" onclick="return confirm('Are you sure to remove?')"><i class="fa fa-times"></i></a></td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       
        
      
    </div>
    <!-- Model Start Here-->
    

@endsection
@section('script')

<!-- page js -->
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="{{ url('admin-assets/vendors/jquery-validation/jquery.validate.min.js')}}"></script>
  
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


