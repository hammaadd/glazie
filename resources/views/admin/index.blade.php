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
            <div class="col-md-6 col-lg-3">
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
             @php
             $door = $window= $handle =$frame = $lentern=0; 
                 foreach($product_type as $product){
                    $product_qty = $product->quantity;
                    if($product->product->product_type=="door")
                    {
                        $door = $door+$product->quantity;
                    }
                    if($product->product->product_type=="handle")
                    {
                        $handle = $handle+$product->quantity;
                    }
                    if($product->product->product_type=="window")
                    {
                        $window = $window+$product->quantity;
                    }
                    
                    if($product->product->product_type=="frame")
                    {
                        $frame = $frame+$product->quantity;
                    }
                    
                    if($product->product->product_type=="lentern")
                    {
                        $lentern = $lentern+$product->quantity;
                    }
                 }
             @endphp
            <script>
                window.onload = function () {
                
                var chart = new CanvasJS.Chart("chartContainer", {
                    animationEnabled: true,
                    theme: "light1", // "light1", "light2", "dark1", "dark2"
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
                        dataPoints: [      
                            { y: {{$door}}, label: "Door" },
                            { y: {{$window}}, label: "Window" },
                            { y: {{$frame}}, label: "Frame" },
                            { y: {{$handle}}, label: "Handle" },
                            { y: {{$lentern}}, label: "Lentern" },
                            
                           
                            
                        ]
                    }]
                });
                chart.render();
                
                }
                </script>
               
                <div id="chartContainer" style="height: 300px; width: 100%;"></div>
                
         </div>
     </div>
        <div class="row">
            <div class="col-md-12 col-lg-6">
                <div class="card">
                    <div class="card-header ">
                        <h4 class="mt-2">Latest Sales</h4>
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
                                           <td>{{$loop->iteration}}</td>
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
                                            <th>ID</th>
                                            <th>Customer Name</th>
                                            <th>Date</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($latest_orders as $ordersdetails)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$ordersdetails->customer->name}}</td>
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
