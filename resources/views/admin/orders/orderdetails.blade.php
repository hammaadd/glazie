@extends('admin-layout.layouts')
@section('title','All Orders ')
@section('content')
<link href="{{ asset('admin-assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('admin-assets/css/app.min.css') }}" rel="stylesheet">
<link href="{{asset('admin-assets/vendors/datatables/dataTables.bootstrap.min.css')}}" rel="stylesheet">




<!-- page js -->

<div class="page-container">
    <div class="main-content">
        <div class="page-header">
            <h2 class="header-title ">Orders</h2>
            <div class="header-sub-title float-right">
                <nav class="breadcrumb breadcrumb-dash">
                    <a href="{{url('admin/dashboard')}}" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Home</a>
                    <a class="breadcrumb-item" href="#">Order</a>
                    
                </nav>
            </div>
        </div>
    
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-12" style="background-color: lightgray">
                                        <h2 class="font-weight-bold">Order Info</h2>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <h5 class="font-weight-bold">Order No </h5>
                                    </div>
                                    <div class="col-md-6">
                                        <h5>{{$order->id}}</h5>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <h5 class="font-weight-bold">Order Date </h5>
                                    </div>
                                    <div class="col-md-6">
                                        <h5>{{$order->created_at}}</h5>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12" style="background-color: lightgray">
                                        <h2 class="font-weight-bold">Customer Info</h2>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <h5 >Customer Name </h5>
                                    </div>
                                    <div class="col-md-6">
                                        <h5>{{$order->customer->name}}</h5>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <h5 >Customer Email </h5>
                                    </div>
                                    <div class="col-md-6">
                                        <h5>{{$order->customer->email}}</h5>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <h5 > Address </h5>
                                    </div>
                                    <div class="col-md-6">
                                        <h5>{{$order->customer->address}}</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-12">
                                        <form action="{{url('admin/checkorder')}}" method="post" class="mt-3">
                                            @csrf
                                            <div class="form-group">
                                                <select name="status" id="" class="form-control" required>
                                                    <option value="">Select Order </option>
                                                    <option value="canceled">Cancel</option>
                                                    <option value="shipped">shipped</option>
                                                    <option value="completed">Completed</option>
                                                </select>
                                                <input type="hidden" value="{{$order->id}}" name="order_id">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Message</label>
                                                <textarea name="message"  rows="5" class="form-control" placeholder="Enter Message "></textarea>
                                            </div>
                                            <div class="form-group">
                                                <button class="btn btn-success btn-xs mt-2 pull-center"><i class="fa fa-check"></i> Submit</button>
                                        
                                            </div>
                                           
                                           
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover w-100">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Product Name</th>
                                                <th>Quantity</th>
                                                <th>SubTotal</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                            $total_price=0;
                                            @endphp
                                            @foreach ($order->details as $orders)
                                                <tr>
                                                    <td>{{$loop->iteration}}</td>
                                                    <td>
                                                        {{$orders->product->product_name}}
                                                    </td>
                                                    <td>{{$orders->quantity}}</td>
                                                    
                                                    @if ($orders->product->type=='customize')
                                                    @php
                                                        $net_total = 0;
                                                        $total_amount = 0;
                                                         
                                                    @endphp
                                                        @foreach ($orders->prdorderdetails as $prdorderdetails)
                                                            @php
                                                                $net_total+= $prdorderdetails->price;
                                                            @endphp
                                                        @endforeach
                                                        @php
                                                            $net_total = $net_total*$orders->quantity;
                                                        @endphp
                                                        <td>&#163; {{$net_total+$total_amount}}</td>
                                                        @php
                                                             $net_total = 0;
                                                        @endphp
                                                    @endif
                                                    @if ($orders->product->type=='variable')
                                                    @php
                                                        $net_total = 0;
                                                       
                                                    @endphp
                                                        @foreach ($orders->prdorderdetails as $prdorderdetails)
                                                       
                                                        @endforeach
                                                        @php
                                                            $net_total = $prdorderdetails->price*$orders->quantity;
                                                        @endphp
                                                        @php
                                                           $net_total = $net_total+ $orders->price*$orders->quantity;
                                                           
                                                        @endphp
                                                        <td>&#163; {{$net_total}}</td>
                                                        
                                                    @endif
                                                    @if ($orders->product->type=='simple')
                                                   
                                                        <td>&#163; {{$orders->price*$orders->quantity}}</td>
                                                       
                                                    @endif
                                                    
                                                </tr>
                                                @if ($orders->product->type=='variable' || $orders->product->type=='customize')
                                                    <tr> 
                                                        <td colspan="4" class="text-center">
                                                            @if($orders->product->type=='variable')
                                                                @foreach ($orders->prdorderdetails as $prdorderdetails)
                                                                    
                                                                @endforeach
                                                                @php
                                                                     $variation_data = $prdorderdetails->variation;
                                                                   
                                                                   
                                                                    $variation_price = $variation_data->price;
                                                                    $variation_details = $variation_data->variationdetails
                                                                @endphp
                                                              
                                                            
                                                                @foreach ($variation_details as $details)
                                        
                                                                    <span class="badge  bg-light text-dark text-center" style="text-align: center">{{$details->prd_term->term->name}}</span>
                                                                @endforeach
                                                            @endif
                                                            @if($orders->product->type=='customize')
                                                           
                                  
                                                            
                                                            @foreach ($orders->prdorderdetails as $cartdetails)
                                                             @if($cartdetails->addon_type=='model')
                                                             <span class="badge  text-dark" title="Model Name ">{{$cartdetails->model->model_name}}</span>
                                                             @endif
                                                             @if($cartdetails->addon_type=='exteranal_color')
                                                              <span  class="badge bg-light text-dark" title="External Color">{{$cartdetails->color->name}}</span>
                                                             @endif
                                                             @if($cartdetails->addon_type=='interanal_color')
                                                             <span  class="badge bg-light text-dark" title="Internal Color">{{$cartdetails->color->name}}</span>
                                                             @endif
                                                             @if($cartdetails->addon_type=='glass')
                                                               <span  class="badge bg-light text-dark" title="Glass name ">{{$cartdetails->frame->name}}</span>
                                                             @endif
                                                             @if($cartdetails->addon_type=='frame')
                                                             <span  class="badge bg-light text-dark" title="Frame name ">{{$cartdetails->frame->name}}</span>
                                                             @endif
                                                             @if($cartdetails->addon_type=='frameexcolor')
                                                              <span class="badge bg-light text-dark" title="Frame External Color">{{$cartdetails->framecolor->value}}</span>
                                                             
                                                             @endif
                                                             @if($cartdetails->addon_type=='frameinternalcolor')
                                                              <span class="badge bg-light text-dark" title="Frame internal Color">{{$cartdetails->framecolor->value}}</span>
                                                             @endif
                                                             @if($cartdetails->addon_type=='frame_glass')
                                                              <span class="badge bg-light text-dark" title="Frame glass">{{$cartdetails->frameglass->glass_name}}</span>
                                                             @endif
                                                             @if($cartdetails->addon_type=='handle')
                                                              <span class="badge bg-light text-dark" title="Handle">{{$cartdetails->furniture->name}}</span>
                                                             @endif
                                                             @if($cartdetails->addon_type=='knocker')
                                                              <span class="badge bg-light text-dark" title="Knocker">{{$cartdetails->furniture->name}}</span>
                                                             @endif
                                                             @if($cartdetails->addon_type=='letterbox')
                                                              <span class="badge bg-light text-dark" title="Letter Box">{{$cartdetails->furniture->name}}</span>
                                                             @endif
                                                             @if($cartdetails->addon_type=='hinge')
                                                               <span class="badge bg-light text-dark" title="Hinge">{{$cartdetails->hinge->hingeside}}</span>
                                                             @endif
                                                             
                                                            @endforeach
                                                        @endif
                                                    
                                                        </td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        
                                    </div>
                                    <div class="col-md-2">
                                        <h6>Sub Total</h6>
                                        <h6>Shipping Cost</h6>
                                        <h6>Taxes</h6>
                                        <h6>Coupen</h6>
                                        <hr>
                                    </div>
                                    <div class="col-md-2">
                                        <h6><span>&#163;</span> {{$order->total_amount}}</h6>
                                        <h6><span>&#163;</span> {{$order->shipp_cost}}</h6>
                                        
                                        <h6><span>&#163;</span> 0</h6>
                                        <h6> <span>&#163;</span> {{$order->discount}}</h6>
                                        <hr>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8"></div>
                                    <div class="col-md-2">
                                        <h5><b>Payment Method</b></h5>
                                    </div>
                                    <div class="col-md-2">
                                        <h5>Cash On Delivery </h5>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8"></div>
                                    <div class="col-md-2">
                                        <h6><b>Total Payable Amount</b></h6>
                                    </div>
                                    <div class="col-md-2">
                                        <h6><span>&#163;</span> {{$order->net_total}}</h6>
                                        <hr>
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