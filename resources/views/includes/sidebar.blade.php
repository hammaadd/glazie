@section('sidebar')
@php
    $url = str_replace("/glazieltd/","", $_SERVER["REQUEST_URI"]);
@endphp
<div class="side-nav" style="background-color: #e3e3e3">
                <div class="side-nav-inner">
                    <ul class="side-nav-menu scrollable">
                        <li class="nav-item dropdown"  >
                            <a class="dropdown-toggle" href="{{url('admin/dashboard')}}">
                                <span class="icon-holder">
                                    <i class="anticon anticon-dashboard"></i>
                                </span>
                                <span class="title"> Dashboard</span>
                            </a>   
                        </li>
                        <li class="nav-item dropdown">
                            <a class="dropdown-toggle" href="javascript:void(0);">
                                <span class="icon-holder">
                                    <i class="fab fa-product-hunt"></i>
                                </span>
                                <span class="title">Products</span>
                                <span class="arrow">
                                    <i class="arrow-icon"></i>
                                </span>
                            </a>
                            <ul class="dropdown-menu">
                                <li @if ($url=="admin/products") class="active" @endif>
                                    <a href="{{url('admin/products')}}">Product List</a>
                                </li>
                                <li @if ($url=="admin/products/add") class="active" @endif>
                                    <a href="{{url('admin/products/add')}}">Add Product</a>
                                </li>
 
                                {{-- <li @if ($url=="admin/products") class="active" @endif>
                                    <a href="{{url('admin/products')}}">Prodcuts</a>
                                </li> --}}
                                <li @if ($url=="admin/categories") class="active" @endif>
                                    <a href="{{url('admin/categories')}}">Categories</a>
                                </li>
                                <li @if ($url=="admin/attributes") class="active" @endif>
                                    <a href="{{url('admin/attributes')}}">Attributes</a>
                                </li>
                                <li @if ($url=="admin/brands")
                                class="active"
                            @endif>
                                    <a href="{{url('admin/brands')}}">   Brands</a>
                                </li>
                                
                               
                                {{-- <li @if ($url=="admin/productdetail") class="active" @endif>
                                    <a href="{{url('admin/productdetail')}}">Product Details</a>
                                </li> --}}
                                
                                
                                
                                {{-- <li @if ($url=="admin/attributes") class="active" @endif>
                                    <a href="{{url('admin/attributes')}}">Attributes</a>
                                </li> --}}
                              
                                 {{-- <li>
                                    <a href="{{ url('admin/productattribute') }}">Product Attribute</a>
                                </li> --}}
                                <!--<li>
                                    <a href="index-projects.html">Projects</a>
                                </li> -->
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="dropdown-toggle" href="javascript:void(0);">
                                <span class="icon-holder">
                                    
                                    <i class="fas fa-puzzle-piece"></i>
                                </span>
                                <span class="title">Product Add On</span>
                                <span class="arrow">
                                    <i class="arrow-icon"></i>
                                </span>
                            </a>
                            <ul class="dropdown-menu">
                                <li  @if ($url=="admin/addons")
                                    class="active"
                                @endif>
                                    <a href="{{url('admin/addons')}}">Model List</a>
                                </li>
                                <li @if ($url=="admin/colors")
                                    class="active"
                                @endif>
                                    <a href="{{url('admin/colors')}}">Available Colors</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="dropdown-toggle" href="javascript:void(0);">
                                <span class="icon-holder">
                                    <i class="anticon anticon-hdd"></i>
                                </span>
                                <span class="title">Orders</span>
                                <span class="arrow">
                                    <i class="arrow-icon"></i>
                                </span>
                            </a>
                            <ul class="dropdown-menu">
                                <li @if ($url=="admin/orders") class="active" @endif>
                                    <a href="{{url('admin/orders')}}">Orders </a>
                                </li>
                                <li @if ($url=="admin/weights") class="active" @endif>
                                    <a href="{{url('admin/weights')}}">Weight Slot </a>
                                </li>
                                {{-- <li @if ($url=="admin/orderdetails") class="active" @endif>
                                    <a href="{{url('admin/orderdetails')}}">Order Details </a>
                                </li> --}}
                                <li @if ($url=="admin/orderconfirm") class="active" @endif>
                                    <a href="{{url('admin/orderconfirm')}}">Order Confirmation </a>
                                </li>
                                
                                <!--<li>
                                    <a href="index-projects.html">Projects</a>
                                </li> -->
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="dropdown-toggle" href="javascript:void(0);">
                                <span class="icon-holder">
                                    <i class="far fa-money-bill-alt"></i>
                                </span>
                                <span class="title">Coupun </span>
                                <span class="arrow">
                                    <i class="arrow-icon"></i>
                                </span>
                            </a>
                            <ul class="dropdown-menu">
                                <li @if ($url=="admin/coupen")
                                    class="active"
                                @endif>
                                    <a href="{{url('admin/coupen
                                    ')}}">Coupun</a>
                                </li >
                                
                               
                                
                                <!--<li>
                                    <a href="index-projects.html">Projects</a>
                                </li> -->
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="dropdown-toggle" href="javascript:void(0);">
                                <span class="icon-holder">
                                    <i class="fa fa-users"></i>
                                </span>
                                <span class="title">Customers</span>
                                <span class="arrow">
                                    <i class="arrow-icon"></i>
                                </span>
                            </a>
                            <ul class="dropdown-menu"><li @if ($url=="admin/customers") class="active" @endif>
                                <a href="{{ url('admin/customers') }}">Customers</a>
                            </li>
                            <li @if ($url=="admin/customers/add")
                                class="active"
                            @endif>
                                <a href="{{ url('admin/customers/add') }}">Add Customer</a>
                            </li>
                                
                                
                                <!--<li>
                                    <a href="index-projects.html">Projects</a>
                                </li> -->
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="dropdown-toggle" href="javascript:void(0);">
                                <span class="icon-holder">
                                    <i class="fa fa-hard-hat"></i>
                                </span>
                                <span class="title">Installer</span>
                                <span class="arrow">
                                    <i class="arrow-icon"></i>
                                </span>
                            </a>
                            <ul class="dropdown-menu">
                                <li @if ($url=="admin/installer") class="active" @endif>
                                    <a href="{{url('admin/installer')}}">Installers List</a>
                                </li >
                                <li @if ($url=="admin/addinstaller") class="active" @endif>
                                    <a href="{{url('admin/addinstaller')}}">Add Installer</a>
                                </li>
                                
                                <li @if ($url=="admin/requesthiring") class="active" @endif>
                                    <a href="{{url('admin/requesthiring')}}">Request Hiring </a>
                                </li>
                               
                                
                                <!--<li>
                                    <a href="index-projects.html">Projects</a>
                                </li> -->
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="dropdown-toggle" href="javascript:void(0);">
                                <span class="icon-holder">
                                    <i class="anticon anticon-user"></i>
                                </span>
                                <span class="title">SubScribers</span>
                                <span class="arrow">
                                    <i class="arrow-icon"></i>
                                </span>
                            </a>
                            <ul class="dropdown-menu">
                                <li @if ($url=='admin/subscription')
                                    class="active"   
                                @endif>
                                    <a href="{{url('admin/subscription')}}">Subscribers</a>
                                </li >
                                
                               
                                
                                <!--<li>
                                    <a href="index-projects.html">Projects</a>
                                </li> -->
                            </ul>
                        </li>
                        {{-- <li class="nav-item dropdown">
                            <a class="dropdown-toggle" href="javascript:void(0);">
                                <span class="icon-holder">
                                    <i class="anticon anticon-user"></i>
                                </span>
                                <span class="title">All Notifications</span>
                                <span class="arrow">
                                    <i class="arrow-icon"></i>
                                </span>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="{{url('admin/notifications')}}">Notifications</a>
                                </li >
                                
                               
                                
                                <!--<li>
                                    <a href="index-projects.html">Projects</a>
                                </li> -->
                            </ul>
                        </li> --}}
                        <li class="nav-item dropdown">
                            <a class="dropdown-toggle" href="javascript:void(0);">
                                <span class="icon-holder">
                                    <i class="fas fa-info-circle"></i>
                                </span>
                                <span class="title">WebSite Content </span>
                                <span class="arrow">
                                    <i class="arrow-icon"></i>
                                </span>
                            </a>
                            <ul class="dropdown-menu">
                                <li @if ($url=="admin/cms")
                                    class="active"
                                @endif>
                                    <a href="{{url('admin/cms')}}">Manage Web Content</a>
                                </li >
                                
                               
                                
                                <!--<li>
                                    <a href="index-projects.html">Projects</a>
                                </li> -->
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="dropdown-toggle" href="javascript:void(0);">
                                <span class="icon-holder">
                                    <i class="fa fa-envelope"></i>
                                </span>
                                <span class="title">User Message </span>
                                <span class="arrow">
                                    <i class="arrow-icon"></i>
                                </span>
                            </a>
                            <ul class="dropdown-menu">
                                <li @if ($url=="admin/usermessage")
                                    class="active"
                                @endif>
                                    <a href="{{url('admin/usermessage
                                    ')}}">User's Message</a>
                                </li >
                                
                               
                                
                                <!--<li>
                                    <a href="index-projects.html">Projects</a>
                                </li> -->
                            </ul>
                        </li>
                        
                        <li class="nav-item dropdown">
                            <a class="dropdown-toggle" href="javascript:void(0);">
                                <span class="icon-holder">
                                    <i class="fas fa-cogs"></i>
                                </span>
                                <span class="title">Site Settings</span>
                                <span class="arrow">
                                    <i class="arrow-icon"></i>
                                </span>
                            </a>
                            <ul class="dropdown-menu">
                                <li @if($url=="admin/social") class="active" @endif>
                                    <a href="{{url('admin/social
                                    ')}}">Site Settings</a>
                                </li >
                                
                               
                                
                                <!--<li>
                                    <a href="index-projects.html">Projects</a>
                                </li> -->
                            </ul>
                        </li>
               
               
                    </ul>
                </div>
            </div>