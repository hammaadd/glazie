@extends('admin-layout.layouts')
@section('title','Product Details')
@section('content')
<link href="{{ asset('admin-assets/css/style.css') }}" rel="stylesheet">
<link href="{{ asset('admin-assets/css/app.min.css') }}" rel="stylesheet">
<link href="{{asset('admin-assets/vendors/datatables/dataTables.bootstrap.min.css')}}" rel="stylesheet">
<link href='http://fonts.googleapis.com/css?family=Roboto+Condensed' rel='stylesheet' type='text/css'>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="{{asset('admin-assets/js/jstars.js')}}"></script>
<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
<div class="page-container">
   @php
        $i=0;
       foreach ($products->gallery as $value) {
           if ($value->is_primary=="1") {
               $imagess = $value->image;
               echo $imagess;
               $i=1;
           }

       }
       if ($i==0) {
           $imagess = $value->image;
           echo $imagess;
       }

   @endphp
    <div class="main-content">
        <div class="page-header no-gutters has-tab">
            <div class="d-md-flex m-b-15 align-items-center justify-content-between">
                <div class="media align-items-center m-b-15">
                    {{-- <div class="avatar avatar-image rounded" style="height: 70px; width: 70px">
                        <img src="{{asset($imagess)}}" alt="">
                    </div> --}}
                    <div class="m-l-15">
                        <h1 class="m-b-0">{{$products->product_name}}</h1>
                        <p class="text-muted m-b-0"></p>
                        
                    </div>
                </div>
                @if (session('info'))
                <script type="text/javascript">toastr.success("{{session('info')}}");</script>
                @endif 
                <div class="m-b-15">
                    <a href="{{url('admin/products/edit/'.$products->id)}}" class="btn btn-primary">
                        <i class="anticon anticon-edit"></i>
                        <span>Edit</span>
                    </a>
                </div>
            </div>
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#product-overview">Overview</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#product-images">Product Images</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#product-attribute">Product Attribute</a>
                </li>
        @php
            $i=0;
            $net_feedback = 0
        @endphp
        @foreach ($products->feedback
        as $feedback)
            @php
               
                    $net_feedback +=$feedback->rating;
                    $i++;
                
                //echo $net_feedback;
            @endphp
        @endforeach
                @if ($i>0)
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#product_reviews">Product Reviews</a>
                </li>
                @endif
            </ul>
        </div>
        <div class="container-fluid">
            <div class="tab-content m-t-15">
                <div class="tab-pane fade show active" id="product-overview">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="media align-items-center">
                                        <i class="font-size-40 text-success anticon anticon-smile"></i>
                                        <div class="m-l-15">
                                        @if ($i>0)
                                            
                                        <p class="m-b-0 text-muted">{{$net_feedback/$i}} ratings</p>
                                        <div class="jstars" data-value="{{$net_feedback/$i}}"></div>
                                        @else 
                                        <div class="jstars" data-value="0.1"></div>
                                        @endif                                            

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="media align-items-center">
                                        <i class="font-size-40 text-primary anticon anticon-shopping-cart"></i>
                                        <div class="m-l-15">
                                            <p class="m-b-0 text-muted">Sales</p>
                                            
                                            <h3 class="m-b-0 ls-1">
                                                @php
                                                    $quantity = 0;
                                                @endphp
                                            @foreach ($products->orderdetails as $order)
                                                @php
                                                    $quantity  =  $quantity +$order->quantity;
                                                @endphp
                                            @endforeach 
                                            {{$quantity}}   
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="media align-items-center">
                                        <i class="font-size-40 text-primary anticon anticon-message"></i>
                                        <div class="m-l-15">
                                            <p class="m-b-0 text-muted">Reviews</p>
                                            <h3 class="m-b-0 ls-1">{{$i}}</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="media align-items-center">
                                        <i class="font-size-40 text-primary anticon anticon-stock"></i>
                                        <div class="m-l-15">
                                            <p class="m-b-0 text-muted">Available Stock</p>
                                            <h3 class="m-b-0 ls-1">{{$products->quantity}}</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Basic Info</h4>
                            <div class="table-responsive">
                                <table class="product-info-table m-t-20">
                                    <tbody>
                                        <tr>
                                            <td>Regular Price:</td>
                                            <td class="text-dark font-weight-semibold">{{$products->regular_price}} </td>
                                        </tr>
                                        
                                        <tr>
                                            <td>Sale Price:</td>
                                            <td class="text-dark font-weight-semibold">{{$products->sale_price}}</td>
                                        </tr>
                                        <tr>
                                            <td>Categories</td>
                                            <td>
                                                @foreach ($products->categories as $prd_cat)
                                                   
                                                        <ul>
                                                            <li style="list-style-type: none">{{$prd_cat->catrecord->cat_name}}</li>
                                                        </ul>
                                                    
                                                @endforeach
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Brand:</td>
                                            <td>{{$products->brands->brand_name}}</td>
                                        </tr>
                                        
                                        <tr>
                                            <td>Status:</td>
                                            <td>
                                               @if ($products->quantity>0)
                                               <span class="badge badge-pill badge-cyan">In Stock</span>
                                               @else
                                               <span class="badge badge-pill badge-magenta bg-magenta">Out Of Stock</span>
                                               @endif
                                            </td>
                                        </tr>
                                    </tbody>
                                </table> 
                            </div>
                        </div>
                    </div>
                    {{-- <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Option Info</h4>
                            <div class="table-responsive">
                                <table class="product-info-table m-t-20">
                                    <tbody>
                                        <tr>
                                            <td>Sizes:</td>
                                            <td>S, M, L, XL</td>
                                        </tr>
                                        <tr>
                                            <td>Colors:</td>
                                            <td class="d-flex">
                                                <span class="d-flex align-items-center m-r-20">
                                                    <span class="badge badge-dot product-color m-r-5" style="background-color: #4c4e69"></span>
                                                    <span>Dark Blue</span>
                                                </span>
                                                <span class="d-flex align-items-center m-r-20">
                                                    <span class="badge badge-dot product-color m-r-5" style="background-color: #868686"></span>
                                                    <span>Gray</span>
                                                </span>
                                                <span class="d-flex align-items-center m-r-20">
                                                    <span class="badge badge-dot product-color m-r-5" style="background-color: #8498c7"></span>
                                                    <span>Gray Blue</span>
                                                </span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Fit:</td>
                                            <td>Skinny Fit</td>
                                        </tr>
                                        <tr>
                                            <td>Material:</td>
                                            <td>Polyester</td>
                                        </tr>
                                        <tr>
                                            <td>Ship From:</td>
                                            <td>Columbia</td>
                                        </tr>
                                    </tbody>
                                </table> 
                            </div>
                        </div>
                    </div> --}}
                    @if ($products->short_description)
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Product Short Description</h4>
                        </div>
                            <div class="card-body">
                            <p class="text-justify" id="shortdes" >@php
                                echo substr($products->short_description, 0, 40);
                            @endphp</p>
                            
                            
                                <p class="text-justify" id="shortdescription" style="display: none">
                                    {{$products->short_description}}
                                </p>
                                
                                <button id="short_btn" class="btn btn-success">Read more</button>
                            </div>
                        </div>
                    @endif
                   @if($products->description) 
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">
                                Prodcut Long Description
                            </h4>
                        </div>
                        <div class="card-body" >
                        
                            <div class="row">
                                <div class="col-md-12" style="display: none;" id="completedescription">
                                    <p class="text-justify">
                                        {!!$products->description!!}
                                    </p>
                                </div>
                            </div>
                           <button class="btn btn-success" id="longdescbtn">Read</button>
                        </div>
                    </div>
                    @endif
                </div>
                <div class="tab-pane fade" id="product-images">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                @foreach ($products->gallery as $productimages)
                                    
                                
                                <div class="col-md-3 d-flex">
                                    <img class="img-fluid" src="{{asset("productimages/".$productimages->image)}}" >
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="product-attribute">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <h2>Product Attribute List</h2>
                                   @if ($number>count($products->attribute))
                                        <a href="{{url('admin/product/addattr/'.$products->id)}}" class="btn btn-success float-right btn-xs"> <i class="fa fa-plus-circle"></i> Add Product Attribute</a>
                                   @endif
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Sr #</th>
                                                <th> Attribute Name</th>
                                                <th> Attribute Option</th>
                                                <th> Action</th>
                                            </tr>

                                        </thead>
                                        <tbody>
                                            
                                            @foreach ($products->attribute as $attribute)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$attribute->attribute->attribute_name}}</td>
                                                <td>
                                                    @foreach ($products->terms as $terms)
                                                        @if($terms->attribute_id==$attribute->attribute->id)
                                                            <span class="badge badge-pill  badge-{{$terms->term->name}}"> {{$terms->term->name}}</span>
                                                        @endif  
                                                    @endforeach
                                                </td>
                                                <td>
                                                     <a href="{{url('admin/editprdattribute/'.$attribute->id)}}" class="btn btn-info btn-xs" ><i class="fa fa-edit"></i> Edit</a>
                                                    <a href="{{url('admin/removeprdattribute/'.$attribute->id)}}" class="btn btn-danger btn-xs" ><i class="fa fa-times"></i> Remove</a> 
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                

                            </div> 
                        </div>
                    </div>
                </div>
                @if (count($products->feedback)>0)
                <div class="tab-pane fade" id="product_reviews">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <td>Name</td>
                                                <td>Email</td>
                                                <td>Rating </td>
                                                <td>Feedback</td>
                                                <td>Delete</td>
                                            </tr>
                                        </thead>
                                    @foreach ($products->feedback as $feedback)
                                        
                                            <tr>
                                                <td>{{$feedback->name}}</td>
                                                <td>{{$feedback->email}}</td>
                                                <td>{{$feedback->rating}}</td>
                                                <td>{{$feedback->reviews}}</td>
                                                <td><a href="{{url('admin/deletefeedback/'.$feedback->id)}}" class="btn btn-xs btn-danger" onclick="return confirm('Are you sure ')">Delete</a></td>
                                            </tr>
                                     
                                    @endforeach
                                </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
    <!-- Content Wrapper END -->

    
</div>
@endsection
@section('script')
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
    
   
    $(document).ready(function(){
    $("#short_btn").click(function(){
      $('#shortdes').toggle(1000);
      $('#shortdescription').toggle(1000);
    });
    $('#longdescbtn').click(function(){
        $("#halflongdesc").toggle(1000);
        $('#completedescription').toggle(1000);
    });
   
  

  });  
 
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