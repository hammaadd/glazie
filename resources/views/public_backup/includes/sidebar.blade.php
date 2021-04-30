@section('sidebar')
<div class="side-nav">
                <div class="side-nav-inner">
                    <ul class="side-nav-menu scrollable">
                        <li class="nav-item dropdown">
                            <a class="dropdown-toggle" href="javascript:void(0);">
                                <span class="icon-holder">
                                    <i class="anticon anticon-dashboard"></i>
                                </span>
                                <span class="title">Dashboard</span>
                                <span class="arrow">
                                    <i class="arrow-icon"></i>
                                </span>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="{{url('admin/categories')}}">Categories</a>
                                </li>
                                <li>
                                    <a href="{{url('admin/brands')}}">Brands</a>
                                </li>
                                <li>
                                    <a href="{{ url('admin/user') }}">User Management</a>
                                </li>
                               
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="dropdown-toggle" href="javascript:void(0);">
                                <span class="icon-holder">
                                    <i class="anticon anticon-user"></i>
                                </span>
                                <span class="title">Products</span>
                                <span class="arrow">
                                    <i class="arrow-icon"></i>
                                </span>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="{{url('admin/products')}}">Prodcuts</a>
                                </li>
                                <li>
                                    <a href="{{url('admin/product/list')}}">Product List</a>
                                </li>
                                <li>
                                    <a href="{{url('admin/categories')}}">Categories</a>
                                </li>
                                <li>
                                    <a href="{{url('admin/productdetail')}}">Product Details</a>
                                </li>
                                
                                <li>
                                    <a href="{{url('admin/brands')}}">Brands</a>
                                </li>
                                <li>
                                    <a href="{{url('admin/attributes')}}">Attributes</a>
                                </li>
                                <li>
                                    <a href="{{url('admin/products/addon')}}">AddOns</a>
                                </li>
                                 <li>
                                    <a href="{{ url('admin/prodcutattrbute') }}">Product Attribute</a>
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
                                <span class="title">Orders</span>
                                <span class="arrow">
                                    <i class="arrow-icon"></i>
                                </span>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="{{url('admin/orders/list')}}">Orders </a>
                                </li>
                                <li>
                                    <a href="{{url('admin/orderdetails')}}">Order Details </a>
                                </li>
                                <li>
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
                                    <i class="anticon anticon-user"></i>
                                </span>
                                <span class="title">Installer</span>
                                <span class="arrow">
                                    <i class="arrow-icon"></i>
                                </span>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="{{url('admin/orders/installer')}}">Installers List</a>
                                </li>
                                <li>
                                    <a href="{{url('admin/addinstaller')}}">Add Installer</a>
                                </li>
                                
                                <li>
                                    <a href="{{url('admin/requesthiring')}}">Request Hiring </a>
                                </li>
                                <li>
                                    <a href="{{url('admin/requesthiring/details')}}">Hiring Details </a>
                                </li>
                                
                                <!--<li>
                                    <a href="index-projects.html">Projects</a>
                                </li> -->
                            </ul>
                        </li>
                        
                      
               
               
                    </ul>
                </div>
            </div>