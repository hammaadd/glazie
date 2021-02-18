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
                                <a href="{{url('')}}" class="btn btn-primary float-right mt-3"> <i class="fa fa-pencil"></i> Edit</a>
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
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>Sr #</th>
                                                            <th>Color Name</th>
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
                                                                <td>{{$color->price}}</td>
                                                                <td>{{$color->quantity}}</td>
                                                                <td>
                                                                    <a href="{{url('admin/editcolor/'.$color->id)}}" class="btn btn-info btn-xs"> <i class="anticon anticon-edit"></i> Edit</a>
                                                                    <a href="{{url('admin/deletecolor/'.$color->id)}}" class="btn btn-danger btn-xs"> <i class="anticon anticon-delete"></i> Delete</a>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </thead>
                                                </table>
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
                                                ...
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="card-title">
                                                <a class="collapsed" data-toggle="collapse" href="#collapseThreeDefaults">
                                                    <span>Frame Glass</span>
                                                </a>
                                            </h5>
                                        </div>
                                        <div id="collapseThreeDefaults" class="collapse" data-parent="#accordion-default">
                                            <div class="card-body">
                                                ...
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
let j=1;
$(document).ready(function(){
    $('#addcolor').click(function(){
       
        let row = '';
        
        $('#colortable').show();
        row=`<tr>
        <td>
        <input type="text" class="form-control rounded-0" name="name[]" placeholder="Color Name">    
        </td>
        <td>
        <input type="color" class="form-control rounded-0" name="color_code[]" >
        </td>
        <td>
        <input type="number" required min="1" class="form-control rounded-0 " placeholder="Color Price" name="price[]">    
        </td>
        <td>
        <input type="number" class="form-control rounded-0 " name="quantity[]" placeholder="Enter Quantity" required >
        </td>
        <td>
        <button class="btn btn-danger btn-xs removecolor"  type="button"> <i class="fa fa-minus"></i> </button>
        </td>
        </tr>`;
       
        $('#colortable').append(row);
        j++;
    });
    
    
});
$(document).on('click', '.removecolor', function(){
     
       
        $(this).closest("tr").remove();
        j--;
         if(j==1){
            $('#table').hide();
         }  
      
        });

    $("#addon").validate({
    ignore: ':hidden:not(:checkbox)',
    errorElement: 'label',
    errorClass: 'is-invalid',
    validClass: 'is-valid',
    rules: {
        product_id:{
            required:true
        },
        svgimage:{
            required:true
        },
        color_code:{
            required:true
        },
        
        }
});




</script>
@endsection


