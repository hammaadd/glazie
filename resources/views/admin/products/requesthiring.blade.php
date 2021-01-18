@extends('admin-layout.layouts')
@section('title','Request Hiring ')
@section('content')

<link href="{{asset('admin-assets/vendors/datatables/dataTables.bootstrap.min.css')}}" rel="stylesheet">
<div class="page-container">

    <!-- Content Wrapper START -->
    <div class="main-content">
        <div class="page-header">
            <h2 class="header-title">Request Hiring </h2>
            <div class="header-sub-title">
                <nav class="breadcrumb breadcrumb-dash">
                    <a href="{{url('admin/dashboard')}}" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Home</a>
                    <a href="{{url('admin/orders/installer')}}" class="breadcrumb-item"> Installer</a>
                    <span class="breadcrumb-item active">Request Hiring</span>
                </nav>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="row m-b-30">
                    <div class="col-lg-8">
                        <div class="d-md-flex">
                            <div class="m-b-10 m-r-15">
                                <select class="custom-select" style="min-width: 180px;">
                                    <option selected>Catergory</option>
                                    <option value="all">All</option>
                                    <option value="homeDeco">Home Decoration</option>
                                    <option value="eletronic">Window</option>
                                    <option value="jewellery">Door </option>
                                </select>
                            </div>
                            <div class="m-b-10">
                                <select class="custom-select" style="min-width: 180px;">
                                    <option selected>Status</option>
                                    <option value="all">All</option>
                                    <option value="inStock">In Progress </option>
                                    <option value="outOfStock">Complete</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 text-right">
                       
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover e-commerce-table">
                        <thead>
                            <tr>
                                <th>
                                    <div class="checkbox">
                                        <input id="checkAll" type="checkbox">
                                        <label for="checkAll" class="m-b-0"></label>
                                    </div>
                                </th>
                                <th>ID</th>
                                <th>Customer Name</th>
                                <th>Servoice Category</th>
                                <th>Price </th>
                                <th>Time</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="checkbox">
                                        <input id="check-item-1" type="checkbox">
                                        <label for="check-item-1" class="m-b-0"></label>
                                    </div>
                                </td>
                                <td>
                                    #31
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img class="img-fluid rounded" src="{{ asset('admin-assets/images/others/thumb-9.jpg')}}" style="max-width: 60px" alt="">
                                        <h6 class="m-b-0 m-l-10">John Smith</h6>
                                    </div>
                                </td>
                                <td>Home Decoration</td>
                                <td>$912.00</td>
                                <td>2 Hours</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="badge badge-success badge-dot m-r-10"></div>
                                        <div> Complete</div>
                                    </div>
                                </td>
                                <td class="text-right">
                                    <a  href="{{url('admin/requesthiring/details')}}" title="hiring Details">
                                        <i class="anticon anticon-eye"></i>
                                    </a><button class="btn btn-icon btn-hover btn-sm btn-rounded pull-right">
                                        <i class="anticon anticon-edit"></i>
                                    </button>
                                    <button class="btn btn-icon btn-hover btn-sm btn-rounded">
                                        <i class="anticon anticon-delete"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="checkbox">
                                        <input id="check-item-2" type="checkbox">
                                        <label for="check-item-2" class="m-b-0"></label>
                                    </div>
                                </td>
                                <td>
                                    #32
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img class="img-fluid rounded" src="{{ asset('admin-assets/images/others/thumb-10.jpg')}}" style="max-width: 60px" alt="">
                                        <h6 class="m-b-0 m-l-10">James</h6>
                                    </div>
                                </td>
                                <td>Window</td>
                                <td>$137.00</td>
                                <td>5 hours</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="badge badge-success badge-dot m-r-10"></div>
                                        <div> Complete</div>
                                    </div>
                                </td>
                                <td class="text-right">
                                     <a  href="{{url('admin/requesthiring/details')}}">
                                        <i class="anticon anticon-eye"></i>
                                    </a><button class="btn btn-icon btn-hover btn-sm btn-rounded pull-right">
                                        <i class="anticon anticon-edit"></i>
                                    </button>
                                    <button class="btn btn-icon btn-hover btn-sm btn-rounded">
                                        <i class="anticon anticon-delete"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="checkbox">
                                        <input id="check-item-3" type="checkbox">
                                        <label for="check-item-3" class="m-b-0"></label>
                                    </div>
                                </td>
                                <td>
                                    #33
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img class="img-fluid rounded" src="{{ asset('admin-assets/images/others/thumb-11.jpg')}}" style="max-width: 60px" alt="">
                                        <h6 class="m-b-0 m-l-10">Harper.</h6>
                                    </div>
                                </td>
                                <td>Home Decoration</td>
                                <td>$912.00</td>
                                <td>5.5 hours</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="badge badge-success badge-dot m-r-10"></div>
                                        <div> Complete</div>
                                    </div>
                                </td>
                                <td class="text-right">
                                     <a  href="{{url('admin/requesthiring/details')}}">
                                        <i class="anticon anticon-eye"></i>
                                    </a><button class="btn btn-icon btn-hover btn-sm btn-rounded pull-right">
                                        <i class="anticon anticon-edit"></i>
                                    </button>
                                    <button class="btn btn-icon btn-hover btn-sm btn-rounded">
                                        <i class="anticon anticon-delete"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="checkbox">
                                        <input id="check-item-4" type="checkbox">
                                        <label for="check-item-4" class="m-b-0"></label>
                                    </div>
                                </td>
                                <td>
                                    #34
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img class="img-fluid rounded" src="{{ asset('admin-assets/images/others/thumb-12.jpg')}}" style="max-width: 60px" alt="">
                                        <h6 class="m-b-0 m-l-10">Mason</h6>
                                    </div>
                                </td>
                                <td>Home Decoration</td>
                                <td>$128.00</td>
                                <td>8 Houes</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="badge badge-danger badge-dot m-r-10"></div>
                                        <div>Rejected</div>
                                    </div>
                                </td>
                                <td class="text-right">
                                     <a  href="{{url('admin/requesthiring/details')}}">
                                        <i class="anticon anticon-eye"></i>
                                    </a><button class="btn btn-icon btn-hover btn-sm btn-rounded pull-right">
                                        <i class="anticon anticon-edit"></i>
                                    </button>
                                    <button class="btn btn-icon btn-hover btn-sm btn-rounded">
                                        <i class="anticon anticon-delete"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="checkbox">
                                        <input id="check-item-5" type="checkbox">
                                        <label for="check-item-5" class="m-b-0"></label>
                                    </div>
                                </td>
                                <td>
                                    #35
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img class="img-fluid rounded" src="{{ asset('admin-assets/images/others/thumb-13.jpg')}}" style="max-width: 60px" alt="">
                                        <h6 class="m-b-0 m-l-10">Evelyn</h6>
                                    </div>
                                </td>
                                <td>Window</td>
                                <td>$776.00</td>
                                <td>10 hours</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="badge badge-danger badge-dot m-r-10"></div>
                                        <div>Rejected</div>
                                    </div>
                                </td>
                                <td class="text-right">
                                     <a  href="{{url('admin/requesthiring/details')}}">
                                        <i class="anticon anticon-eye"></i>
                                    </a><button class="btn btn-icon btn-hover btn-sm btn-rounded pull-right">
                                        <i class="anticon anticon-edit"></i>
                                    </button>
                                    <button class="btn btn-icon btn-hover btn-sm btn-rounded">
                                        <i class="anticon anticon-delete"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="checkbox">
                                        <input id="check-item-6" type="checkbox">
                                        <label for="check-item-6" class="m-b-0"></label>
                                    </div>
                                </td>
                                <td>
                                    #36
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img class="img-fluid rounded" src="{{ asset('admin-assets/images/others/thumb-14.jpg')}}" style="max-width: 60px" alt="">
                                        <h6 class="m-b-0 m-l-10">Ella</h6>
                                    </div>
                                </td>
                                <td>Window</td>
                                <td>$119.00</td>
                                <td> 1 Hours</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="badge badge-success badge-dot m-r-10"></div>
                                        <div> Complete</div>
                                    </div>
                                </td>
                                <td class="text-right">
                                     <a  href="{{url('admin/requesthiring/details')}}">
                                        <i class="anticon anticon-eye"></i>
                                    </a><button class="btn btn-icon btn-hover btn-sm btn-rounded pull-right">
                                        <i class="anticon anticon-edit"></i>
                                    </button>
                                    <button class="btn btn-icon btn-hover btn-sm btn-rounded">
                                        <i class="anticon anticon-delete"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="checkbox">
                                        <input id="check-item-7" type="checkbox">
                                        <label for="check-item-7" class="m-b-0"></label>
                                    </div>
                                </td>
                                <td>
                                    #37
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img class="img-fluid rounded" src="{{ asset('admin-assets/images/others/thumb-15.jpg')}}" style="max-width: 60px" alt="">
                                        <h6 class="m-b-0 m-l-10">Jackson</h6>
                                    </div>
                                </td>
                                <td>Home Decoration</td>
                                <td>$199.00</td>
                                <td>20 hours</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="badge badge-info badge-dot m-r-10"></div>
                                        <div> In Progress</div>
                                    </div>
                                </td>
                                <td class="text-right">
                                     <a  href="{{url('admin/requesthiring/details')}}">
                                        <i class="anticon anticon-eye"></i>
                                    </a><button class="btn btn-icon btn-hover btn-sm btn-rounded pull-right">
                                        <i class="anticon anticon-edit"></i>
                                    </button>
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
