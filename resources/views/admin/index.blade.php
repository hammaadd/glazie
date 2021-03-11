@extends('admin-layout.layouts')
@section('title','Welcome to the Admin Panel')
@section('content')
<div class="page-container">
    <style>
    .canvasjs-chart-credit{
        display: none;
    }
    </style>            
    <!-- Content Wrapper START -->
    <div class="main-content">
        <div class="row">
           @php
               $product_name = array();
           @endphp
            <div class="col-md-6 col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <div class="media align-items-center">
                            <div class="avatar avatar-icon avatar-lg avatar-cyan">
                                <i class="anticon anticon-user"></i>
                            </div>
                            <div class="m-l-15">
                                <h2 class="m-b-0">{{$installers}}</h2>
                                <p class="m-b-0 text-muted">Installers</p>
                               @foreach ($product_type as $products)
                                    @php
                                      //  array_push($product_name,$products->product->varities->prd_name);
                                    @endphp
                               @endforeach
                               @php
                                    //print_r($product_name);
                               @endphp
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <div class="media align-items-center">
                            <div class="avatar avatar-icon avatar-lg avatar-purple">
                                <i class="anticon anticon-user"></i>
                            </div>
                            <div class="m-l-15">
                                <h2 class="m-b-0">{{$customers}}</h2>
                                <p class="m-b-0 text-muted">Customers</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <div class="media align-items-center">
                            <div class="avatar avatar-icon avatar-lg avatar-gold">
                                <i class="anticon anticon-profile"></i>
                            </div>
                            <div class="m-l-15">
                                <h2 class="m-b-0">{{$orders}}</h2>
                                <p class="m-b-0 text-muted">Orders</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
        <div class="row">
           
            <div class="col-md-6 col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <div class="media align-items-center">
                            <div class="avatar avatar-icon avatar-lg avatar-cyan">
                                <i class="anticon anticon-profile"></i>
                            </div>
                            <div class="m-l-15">
                                <h2 class="m-b-0"> @php
                                    echo number_format($today_sale, 0);
                                @endphp</h2>
                                <p class="m-b-0 text-muted">Today Quantity  Sale</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
           
            <div class="col-md-6 col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <div class="media align-items-center">
                            <div class="avatar avatar-icon avatar-lg avatar-purple">
                                <i class="anticon anticon-profile"></i>
                            </div>
                            <div class="m-l-15">
                                <h2 class="m-b-0"> @php
                                    echo number_format($monthly_sale, 0);
                                @endphp</h2>
                                <p class="m-b-0 text-muted">Monthly Sale</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <div class="media align-items-center">
                            <div class="avatar avatar-icon avatar-lg avatar-cyan">
                                <i class="anticon anticon-profile"></i>
                            </div>
                            <div class="m-l-15">
                                <h2 class="m-b-0"> @php
                                    echo number_format($yearly_sale, 0);
                                @endphp  </h2>
                                <p class="m-b-0 text-muted">Yearly Sale</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
     <div class="row">
         <div class="col-md-12">
            <script>
                // var quantiy = <?php //echo json_encode($quantity_array,JSON_PRETTY_PRINT)?>;
                // var name =  <?php //echo json_encode($variety_name,JSON_PRETTY_PRINT)?>;
                
                window.onload = function () {
                
                var chart = new CanvasJS.Chart("chartContainer", {
                    animationEnabled: true,
                    theme: "light2", // "light1", "light2", "dark1", "dark2"
                    title:{
                        text: "Total Sales"
                    },
                    axisY: {
                        title: "No of sales"
                    },
                    data: [{        
                        type: "column",  
                        showInLegend: true, 
                        legendMarkerColor: "grey",
                        legendText: "",
                        dataPoints: <?php echo $sales; ?>
                    }]
                });
                chart.render();
                
                }
                </script>
               
                <div id="chartContainer" style="height: 300px; width: 100%; "></div>
                
         </div>
     </div>
        <div class="row mt-3">
            <div class="col-md-12 col-lg-6">
                <div class="card">
                    <div class="card-header ">
                        <h4 class="mt-2">Top Selling Product</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Product Name</th>
                                        <th>Quantity</th>
                                        <th>Price <small>(per unit)</small></th>
                                    </tr>
                                </thead>
                               <tbody>
                                   @foreach ($latest_products as $products)
                                       <tr>
                                           <td><a href="{{url('admin/products/view/'.$products->id)}}" target="_blank">{{$products->id}}</a></td>
                                           <td>{{$products->product_name}}</td>
                                           <td>{{$products->quantity}}</td>
                                           <td>{{$products->sale_price}}</td>
                                       </tr>
                                   @endforeach
                               </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="col-md-12 col-lg-6">
               
                <div class="card">
                    <div class="card-header"> <h4 class="mt-2">Latest Order</h4></div>
                    <div class="card-body">
                       <div class="d-flex justify-content-between align-items-center">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Customer Name</th>
                                            <th>Date</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($latest_orders as $ordersdetails)
                                            <tr>
                                                <td><a href="{{url('admin/orderdetails/'.$ordersdetails->id)}}">{{$ordersdetails->id}}</a></td>
                                                <td><a href="{{url('admin/customers/details/'.$ordersdetails->customer->id)}}">{{$ordersdetails->customer->name}}</a></td>
                                                <td>{{$ordersdetails->created_at}}</td>
                                                <td>{{$ordersdetails->status}}</td>
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
@endsection
@section('script')
<script src="{{ asset('admin-assets/vendors/chartjs/Chart.min.js')}}"></script>
<script src="{{ asset('admin-assets/js/pages/dashboard-default.js')}}"></script>
<script src="{{asset('admin-assets/charts/canvasjs.min.js')}}"></script>
@endsection
