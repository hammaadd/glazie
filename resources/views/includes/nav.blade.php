@section("nav")

<div class="header " style="background-color: #e3e3e3;box-shadow: 0 0 5px rgba(0,0,0,0.45)">
 <?php 
    
    use Illuminate\Support\Facades\Auth;

    $user = Auth::user();
?>
    
                <div class="logo logo-dark">
                    <a href="#" class="ml-3">
                        <img src="{{ asset('admin-assets/images/logo/logo.png')}}" alt="Logo">
                        <img class="logo-fold" src="{{asset('foldlogo.PNG')}}" width="80%"  alt="Logo">
                    </a>
                </div>
                <div class="logo logo-white">
                    <a href="#">
                        <img src="{{ asset('admin-assets/images/logo/logo.png')}}" alt="Logo">
                        <img class="logo-fold" src="{{asset('foldlogo.png')}}" width="80%" alt="Logo">
                    </a>
                    
                </div>
                <div class="nav-wrap ">
                    <ul class="nav-left">
                        <li class="desktop-toggle">
                            <a href="javascript:void(0);">
                                <i class="anticon"></i>
                            </a>
                        </li>
                        <li class="mobile-toggle">
                            <a href="javascript:void(0);">
                                <i class="anticon"></i>
                            </a>
                        </li>
                        <li>
                            {{-- <a href="javascript:void(0);" data-toggle="modal" data-target="#search-drawer">
                                <i class="anticon anticon-search"></i>
                            </a> --}}
                        </li>
                    </ul>
                    <ul class="nav-right">
                        <li class="dropdown dropdown-animated scale-left">
                            <a href="javascript:void(0);" data-toggle="dropdown" onclick="get_notification()">
                                <i class="anticon anticon-bell notification-badge"></i>
                                 <sup><sup class="badge badge-pill badge-secondary text-xs" id="countnotification"></sup></sup>
                            </a>
                            <div class="dropdown-menu pop-notification">
                                <div class="p-v-15 p-h-25 border-bottom d-flex justify-content-between align-items-center" >
                                    <p class="text-dark font-weight-semibold m-b-0">
                                        <i class="anticon anticon-bell"></i>
                                        <span class="m-l-10">Notification</span>
                                    </p>
                                    <a class="btn-sm btn-default btn" href="{{url('admin/notifications')}}">
                                        <small>View All</small>
                                    </a>
                                </div>
                                <div class="relative">
                                    <div class="overflow-y-auto relative scrollable" style="max-height: 300px" id="allnotification">
                                       
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="dropdown dropdown-animated scale-left">
                            <div class="pointer" data-toggle="dropdown">
                                <div class="avatar avatar-image  m-h-10 m-r-15">
                                    <img src="{{ asset('/admin-assets/admin-images/'.$user->profile)}}"  alt="">
                                </div>
                            </div>
                            <div class="p-b-15 p-t-20 dropdown-menu pop-profile">
                                <div class="p-h-20 p-b-15 m-b-10 border-bottom">
                                    <div class="d-flex m-r-50">
                                        <div class="avatar avatar-lg avatar-image">
                                            <img src="{{ asset('/admin-assets/admin-images/'.$user->profile)}}" alt="">
                                        </div>
                                        <div class="m-l-10">
                                      
                                            <p class="m-b-0 text-dark font-weight-semibold"><?= $user->name; ?></p>
                                        </div>
                                    </div>
                                </div>
                                <a href="{{url('admin/profile/edit')}}" class="dropdown-item d-block p-h-15 p-v-10">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div>
                                            <i class="anticon opacity-04 font-size-16 anticon-user"></i>
                                            <span class="m-l-10">Edit Profile</span>
                                        </div>
                                        <i class="anticon font-size-10 anticon-right"></i>
                                    </div>
                                </a>
                                <a href="{{url('admin/changepass')}}" class="dropdown-item d-block p-h-15 p-v-10">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div>
                                            <i class="anticon opacity-04 font-size-16 anticon-lock"></i>
                                            <span class="m-l-10">Account Setting</span>
                                        </div>
                                        <i class="anticon font-size-10 anticon-right"></i>
                                    </div>
                                </a>
                                {{-- <a href="javascript:void(0);" class="dropdown-item d-block p-h-15 p-v-10">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div>
                                            <i class="anticon opacity-04 font-size-16 anticon-project"></i>
                                            <span class="m-l-10">Projects</span>
                                        </div>
                                        <i class="anticon font-size-10 anticon-right"></i>
                                    </div>
                                </a> --}}
                                <a href="{{url('admin/adminlogout')}}" class="dropdown-item d-block p-h-15 p-v-10">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div>
                                            <i class="anticon opacity-04 font-size-16 anticon-logout"></i>
                                            <span class="m-l-10">Logout</span>
                                        </div>
                                        <i class="anticon font-size-10 anticon-right"></i>
                                    </div>
                                </a>
                            </div>
                        </li>
                        <li>
                            {{-- <a href="javascript:void(0);" data-toggle="modal" data-target="#quick-view">
                                <i class="anticon anticon-appstore"></i>
                            </a> --}}
                        </li>
                    </ul>
                </div>
            </div> 