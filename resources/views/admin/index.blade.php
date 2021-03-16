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
            
               
        <figure class="highcharts-figure">
        <div id="container"></div>
        <p class="highcharts-description">
        </p>
    </figure>
                
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
<script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/data.js"></script>
    <script src="https://code.highcharts.com/modules/drilldown.js"></script>

    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    <script type="text/javascript">
        Highcharts.chart('container', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Total Monthly Sales'
            },
            subtitle: {
                text: ''
            },
            credits: {
    enabled: false
},
            xAxis: {
                categories: [
                    'Products',
                ],
                crosshair: true
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Number Of Sale Items'
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y:.1f} </b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            series: <?php echo $sales; ?>
        });
    </script>
@endsection
