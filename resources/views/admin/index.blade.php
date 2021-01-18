@extends('admin-layout.layouts')
@section('title','Welcome to the Admin Panel')
@section('content')
<div class="page-container">
                

    <!-- Content Wrapper START -->
    <div class="main-content">
        <div class="row">
           
            <div class="col-md-6 col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <div class="media align-items-center">
                            <div class="avatar avatar-icon avatar-lg avatar-cyan">
                                <i class="anticon anticon-line-chart"></i>
                            </div>
                            <div class="m-l-15">
                                <h2 class="m-b-0">+ 17.21%</h2>
                                <p class="m-b-0 text-muted">Growth</p>
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
                                <h2 class="m-b-0">3,685</h2>
                                <p class="m-b-0 text-muted">Orders</p>
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
                                <h2 class="m-b-0">1,832</h2>
                                <p class="m-b-0 text-muted">Customers</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
           
            <div class="col-md-6 col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <div class="media align-items-center">
                            <div class="avatar avatar-icon avatar-lg avatar-cyan">
                                <i class="anticon anticon-profile"></i>
                            </div>
                            <div class="m-l-15">
                                <h2 class="m-b-0">798</h2>
                                <p class="m-b-0 text-muted">Today Sale</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <div class="media align-items-center">
                            <div class="avatar avatar-icon avatar-lg avatar-gold">
                                <i class="anticon anticon-profile"></i>
                            </div>
                            <div class="m-l-15">
                                <h2 class="m-b-0">2285</h2>
                                <p class="m-b-0 text-muted">Weekly Sale</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <div class="media align-items-center">
                            <div class="avatar avatar-icon avatar-lg avatar-purple">
                                <i class="anticon anticon-profile"></i>
                            </div>
                            <div class="m-l-15">
                                <h2 class="m-b-0">7025</h2>
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
                                <h2 class="m-b-0">25885</h2>
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
                        legendText: "MMbbl = one hundred barrels",
                        dataPoints: [      
                            { y: 644, label: "Doors" },
                            { y: 414, label: "Windows" },
                            { y: 545,  label: "Frame" },
                            { y: 32,  label: "Lentern" }
                           
                            
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
                                    <tr>
                                        <td>12</td>
                                        <td>Alumenium Door</td>
                                        <td>2</td>
                                        <td>$400</td>
                                    </tr>
                                    <tr>
                                        <td>13</td>
                                        <td>Wood Door</td>
                                        <td>3</td>
                                        <td>$400</td>
                                    </tr>
                                    <tr>
                                        <td>12</td>
                                        <td>Window</td>
                                        <td>2</td>
                                        <td>$400</td>
                                    </tr>
                                    <tr>
                                        <td>12</td>
                                        <td>Widow Frame</td>
                                        <td>2</td>
                                        <td>$400</td>
                                    </tr>
                                    <tr>
                                        <td>12</td>
                                        <td>Lentern</td>
                                        <td>2</td>
                                        <td>$400</td>
                                    </tr>
                                    
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
                                        <tr>
                                            <td>#5331</td>
                                            <td>John Smith</td>
                                            <td><?php echo date('d/M/Y');?></td>
                                            <td><div class="badge badge-info badge-dot m-r-10"></div>Pending</td>
                                        </tr>
                                        <tr>
                                            <td>#5345</td>
                                            <td>David</td>
                                            <td><?php echo date('d/M/Y');?></td>
                                            <td><div class="badge badge-info badge-dot m-r-10"></div>Pending</td>
                                        </tr>
                                        <tr>
                                            <td>#5346</td>
                                            <td>Smith</td>
                                            <td><?php echo date('d')-1.. date('/M/Y');?></td>
                                            <td><div class="badge badge-info badge-dot m-r-10"></div>Pending</td>
                                        </tr>
                                        <tr>
                                            <td>#5348</td>
                                            <td>smantha</td>
                                            <td><?php echo date('d')-1.. date('/M/Y');?></td>
                                            <td><div class="badge badge-info badge-dot m-r-10"></div>Pending</td>
                                        </tr>
                                        <tr>
                                            <td>#5376</td>
                                            <td>Harper.</td>
                                            <td><?php echo date('d')-1.. date('/M/Y');?></td>
                                            <td><div class="badge badge-info badge-dot m-r-10"></div>Pending</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- Content Wrapper END -->

    <!-- Footer START -->
    <footer class="footer">
        <div class="footer-content">
            <p class="m-b-0">Copyright © 2019 Theme_Nate. All rights reserved.</p>
            <span>
                <a href="" class="text-gray m-r-15">Term &amp; Conditions</a>
                <a href="" class="text-gray">Privacy &amp; Policy</a>
            </span>
        </div>
    </footer>
    <!-- Footer END -->

</div>
@endsection
@section('script')
<script src="{{ asset('admin-assets/vendors/chartjs/Chart.min.js')}}"></script>
<script src="{{ asset('admin-assets/js/pages/dashboard-default.js')}}"></script>
<script src="{{asset('admin-assets/charts/canvasjs.min.js')}}"></script>
@endsection
