@extends('admin-layout.layouts')
@section('title','Installer List')
@section('content')

<link href="{{asset('admin-assets/vendors/datatables/dataTables.bootstrap.min.css')}}" rel="stylesheet">
<div class="page-container">

    <!-- Content Wrapper START -->
    <div class="main-content">
        <div class="page-header">
            <h2 class="header-title">Installer  List</h2>
            <div class="header-sub-title">
                <nav class="breadcrumb breadcrumb-dash">
                    <a href="{{url('admin/dashboard')}}" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Home</a>
                    
                    <span class="breadcrumb-item active">Installer List</span>
                </nav>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="row m-b-30">
                    <div class="col-lg-8">
                        <div class="d-md-flex">
                            <div class="m-b-10">
                                <select class="custom-select" style="min-width: 180px;" >
                                    <option selected>Status</option>
                                    <option value="all">All</option>
                                    <option value="approved">Approved</option>
                                    <option value="pending">Pending</option>
                                    <option value="rejected">Rejected</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 text-right">
                        <a href="{{url('admin/addinstaller')}}" class="btn btn-primary">
                            <i class="anticon anticon-plus-circle"></i>
                            <span> Add New Installer</span>
                        </a>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover e-commerce-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Intaller Name</th>
                                <th>Joining Date</th>
                                <th>Installer Type</th>
                                <th>Amoount per Day</th>
                                <th>Action </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                
                                <td>
                                    #5331
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="avatar avatar-image avatar-sm m-r-10">
                                            <img src="{{asset('admin-assets/images/avatars/thumb-1.jpg')}}" alt="">
                                        </div>
                                        <h6 class="m-b-0">Erin Gonzales</h6>
                                    </div>
                                </td>
                                <td>8 May 2019</td>
                                <td>Fixing Window</td>
                                <td>$137.00</td>
                                
                                <td class="text-right">
                                    <a href="{{url('admin/editinstaller')}}" >
                                        <i class="anticon anticon-edit"></i>
                                    </a>
                                    <button class="btn btn-icon btn-hover btn-sm btn-rounded">
                                        <i class="anticon anticon-delete"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                
                                <td>
                                    #5375
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="avatar avatar-image avatar-sm m-r-10">
                                            <img src="{{asset('admin-assets/images/avatars/thumb-2.jpg')}}" alt="">
                                        </div>
                                        <h6 class="m-b-0">Darryl Day</h6>
                                    </div>
                                </td>
                                <td>6 May 2019</td>
                                <td>Fixing Doors</td>
                                <td>$322.00</td>
                                
                                <td class="text-right">
                                    <a href="{{url('admin/editinstaller')}}" >
                                        <i class="anticon anticon-edit"></i>
                                    </a>
                                    <button class="btn btn-icon btn-hover btn-sm btn-rounded">
                                        <i class="anticon anticon-delete"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                
                                <td>
                                    #5362
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="avatar avatar-image avatar-sm m-r-10">
                                            <img src="{{asset('admin-assets/images/avatars/thumb-3.jpg')}}" alt="">
                                        </div>
                                        <h6 class="m-b-0">Marshall Nichols</h6>
                                    </div>
                                </td>
                                <td>1 May 2019</td>
                                <td>Fixing Window</td>
                                <td>$543.00</td>
                                
                                <td class="text-right">
                                    <a href="{{url('admin/editinstaller')}}" >
                                        <i class="anticon anticon-edit"></i>
                                    </a>
                                    <button class="btn btn-icon btn-hover btn-sm btn-rounded">
                                        <i class="anticon anticon-delete"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                
                                <td>
                                    #5365
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="avatar avatar-image avatar-sm m-r-10">
                                            <img src="{{asset('admin-assets/images/avatars/thumb-4.jpg')}}" alt="">
                                        </div>
                                        <h6 class="m-b-0">Virgil Gonzales</h6>
                                    </div>
                                </td>
                                <td>28 April 2019</td>
                                <td>Fixing Lentern</td>
                                <td>$876.00</td>
                                
                                <td class="text-right">
                                    <a href="{{url('admin/editinstaller')}}" >
                                        <i class="anticon anticon-edit"></i>
                                    </a>
                                    <button class="btn btn-icon btn-hover btn-sm btn-rounded">
                                        <i class="anticon anticon-delete"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                
                                <td>
                                    #5213
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="avatar avatar-image avatar-sm m-r-10">
                                            <img src="{{asset('admin-assets/images/avatars/thumb-5.jpg')}}" alt="">
                                        </div>
                                        <h6 class="m-b-0">Nicole Wyne</h6>
                                    </div>
                                </td>
                                <td>28 April 2019</td>
                                <td>Fixing Window</td>
                                <td>$241.00</td>
                                
                                <td class="text-right">
                                    <a href="{{url('admin/editinstaller')}}" >
                                        <i class="anticon anticon-edit"></i>
                                    </a>
                                    <button class="btn btn-icon btn-hover btn-sm btn-rounded">
                                        <i class="anticon anticon-delete"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                
                                <td>
                                    #5311
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="avatar avatar-image avatar-sm m-r-10">
                                            <img src="{{asset('admin-assets/images/avatars/thumb-6.jpg')}}" alt="">
                                        </div>
                                        <h6 class="m-b-0">Riley Newman</h6>
                                    </div>
                                </td>
                                <td>19 April 2019</td>
                                <td>Fixing Window</td>
                                <td>$872.00</td>
                               
                                <td class="text-right">
                                    <a href="{{url('admin/editinstaller')}}" >
                                        <i class="anticon anticon-edit"></i>
                                    </a>
                                    <button class="btn btn-icon btn-hover btn-sm btn-rounded">
                                        <i class="anticon anticon-delete"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                
                                <td>
                                    #5387
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="avatar avatar-image avatar-sm m-r-10">
                                            <img src="{{asset('admin-assets/images/avatars/thumb-7.jpg')}}" alt="">
                                        </div>
                                        <h6 class="m-b-0">Pamela Wanda</h6>
                                    </div>
                                </td>
                                <td>18 April 2019</td>
                                <td>Fixing Window</td>
                                <td>$728.00</td>
                                
                                <td class="text-right">
                                    <a href="{{url('admin/editinstaller')}}" >
                                        <i class="anticon anticon-edit"></i>
                                    </a>
                                    <button class="btn btn-icon btn-hover btn-sm btn-rounded">
                                        <i class="anticon anticon-delete"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                
                                <td>
                                    #5390
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="avatar avatar-image avatar-sm m-r-10">
                                            <img src="{{asset('admin-assets/images/avatars/thumb-8.jpg')}}" alt="">
                                        </div>
                                        <h6 class="m-b-0">Emily Shaw</h6>
                                    </div>
                                </td>
                                <td>16 April 2019</td>
                                <td>Fixing Doors</td>
                                <td>$802.00</td>
                                
                                <td class="text-right">
                                    <a href="{{url('admin/editinstaller')}}" >
                                        <i class="anticon anticon-edit"></i>
                                    </a>
                                    <button class="btn btn-icon btn-hover btn-sm btn-rounded">
                                        <i class="anticon anticon-delete"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                
                                <td>
                                    #5317
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="avatar avatar-image avatar-sm m-r-10">
                                            <img src="{{asset('admin-assets/images/avatars/thumb-9.jpg')}}" alt="">
                                        </div>
                                        <h6 class="m-b-0">Victor Terry</h6>
                                    </div>
                                </td>
                                <td>12 April 2019</td>
                                <td>Fixing Door Frame</td>
                                <td>$569.00</td>
                                
                                <td class="text-right">
                                    <a href="{{url('admin/editinstaller')}}" >
                                        <i class="anticon anticon-edit"></i>
                                    </a>
                                    <button class="btn btn-icon btn-hover btn-sm btn-rounded">
                                        <i class="anticon anticon-delete"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                
                                <td>
                                    #5291
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="avatar avatar-image avatar-sm m-r-10">
                                            <img src="{{asset('admin-assets/images/avatars/thumb-10.jpg')}}" alt="">
                                        </div>
                                        <h6 class="m-b-0">Wyatt Wallace</h6>
                                    </div>
                                </td>
                                <td>10 April 2019</td>
                                <td>Fixing Lentern</td>
                                <td>$132.00</td>
                                
                                <td class="text-right">
                                    <a href="{{url('admin/editinstaller')}}" >
                                        <i class="anticon anticon-edit"></i>
                                    </a>
                                    <button class="btn btn-icon btn-hover btn-sm btn-rounded">
                                        <i class="anticon anticon-delete"></i>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
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
@section('script')

<script src="{{ asset('admin-assets/js/vendors.min.js')}}"></script>

    <!-- page js -->
    <script src="{{ asset('admin-assets/vendors/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('admin-assets/vendors/datatables/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{ asset('admin-assets/js/pages/e-commerce-order-list.js')}}"></script>

    <!-- Core JS -->
    <script src="{{ asset('admin-assets/js/app.min.js')}}"></script>
@endsection
