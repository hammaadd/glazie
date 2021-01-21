@extends('admin-layout.layouts')
@section('title','Product Details')
@section('content')
<link href="{{ asset('admin-assets/css/style.css') }}" rel="stylesheet">
<link href="{{ asset('admin-assets/css/app.min.css') }}" rel="stylesheet">
<link href="{{asset('admin-assets/vendors/datatables/dataTables.bootstrap.min.css')}}" rel="stylesheet">
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
                                            <p class="m-b-0 text-muted">10 ratings</p>
                                            <div class="star-rating m-t-5">
                                                <input type="radio" id="star3-5" name="rating-3" value="5" checked="" disabled=""><label for="star3-5" title="5 star"></label>
                                                <input type="radio" id="star3-4" name="rating-3" value="4" disabled=""><label for="star3-4" title="4 star"></label>
                                                <input type="radio" id="star3-3" name="rating-3" value="3" disabled=""><label for="star3-3" title="3 star"></label>
                                                <input type="radio" id="star3-2" name="rating-3" value="2" disabled=""><label for="star3-2" title="2 star"></label>
                                                <input type="radio" id="star3-1" name="rating-3" value="1" disabled=""><label for="star3-1" title="1 star"></label>
                                            </div>
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
                                            <h3 class="m-b-0 ls-1">1,521</h3>
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
                                            <h3 class="m-b-0 ls-1">27</h3>
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
                                                    @if ($prd_cat->catrecord->status=='1')
                                                        <ul>
                                                            <li style="list-style-type: none">{{$prd_cat->catrecord->cat_name}}</li>
                                                        </ul>
                                                    @endif
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
                    
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">
                                Prodcut Long Description
                            </h4>
                        </div>
                        <div class="card-body" >
                           <P class="text-justify" id="longdesc">
                                @php
                                    echo  substr($products->description, 0, 40);
                                @endphp
                           </P>
                           <p class="text-justify" id="longdescription" style="display: none">{!!$products->description!!}</p>
                            <button class="btn btn-success" id="longdescbtn"> Read More</button>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="product-images">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                @foreach ($products->gallery as $productimages)
                                    
                                
                                <div class="col-md-3 d-flex">
                                    <img class="img-fluid" src="{{asset($productimages->image)}}" alt="">
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Content Wrapper END -->

    
</div>
@endsection
@section('script')
<script>
    $(document).ready(function(){
    $("#short_btn").click(function(){
      $('#shortdes').toggle(1000);
      $('#shortdescription').toggle(1000);
    });
    
  $("#longdescbtn").click(function(){
    $("#longdesc").toggle(1000);
    $("#longdescription").toggle(1000);
  });

  });   
</script>
@endsection