@extends('admin-layout.layouts')
@section('title','installer details')
@section('content')
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
crossorigin="anonymous"></script>
<script src="{{asset('admin-assets/js/jstars.js')}}"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
<div class="page-container">
    <div class="main-content">
        <div class="page-header">
            <h2 class="header-title">Installer Details</h2>
            <div class="header-sub-title float-right">
                <nav class="breadcrumb breadcrumb-dash">
                    <a href="{{url('admin/dashboard')}}" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Home</a>
                    <a href="{{url('admin/installer')}}" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Installer</a>
                    <span class="breadcrumb-item" href="#">Installer Details</span>
                    
                </nav>
            </div>
        </div>
        @if (session('info'))
            <script type="text/javascript">toastr.success("{{session('info')}}");</script>
        @endif  
       <div class="row">
           <div class="col-md-12">
               <div class="card">
                   <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-md-7">
                            <div class="d-md-flex align-items-center">
                                <div class="text-center text-sm-left ">
                                    <div class="avatar avatar-image" style="width: 150px; height:150px">
                                        <img src="{{asset('installerprofile/'.$user->avatar)}}" alt="">
                                    </div>
                                </div>
                                <div class="text-center text-sm-left m-v-15 p-l-30">
                                    <h2 class="m-b-5">{{$user->name}}</h2>
                                    <p class="text-opacity font-size-13"></p>
                                    <p class="text-dark m-b-20"></p>
                                    {{-- <button class="btn btn-primary btn-tone">Contact</button> --}}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="row">
                                <div class="d-md-block d-none border-left col-1"></div>
                                <div class="col">
                                    <ul class="list-unstyled m-t-10">
                                        <li class="row">
                                            <p class="col-sm-4 col-4 font-weight-semibold text-dark m-b-5">
                                                <i class="m-r-10 text-primary anticon anticon-mail"></i>
                                                <span>Email: </span> 
                                            </p>
                                            <p class="col font-weight-semibold"> {{$user->email}}</p>
                                        </li>
                                        <li class="row">
                                            <p class="col-sm-4 col-4 font-weight-semibold text-dark m-b-5">
                                                <i class="m-r-10 text-primary anticon anticon-phone"></i>
                                                <span>Phone: </span> 
                                            </p>
                                            <p class="col font-weight-semibold">{{$user->contact_no}}</p>
                                        </li>
                                        <li class="row">
                                            <p class="col-sm-4 col-5 font-weight-semibold text-dark m-b-5">
                                                <i class="m-r-10 text-primary anticon anticon-compass"></i>
                                                <span>Location: </span> 
                                            </p>
                                            <p class="col font-weight-semibold">{{$user->address}}</p>
                                        </li>
                                    </ul>
                                    <div class="d-flex font-size-22 m-t-15">
                                        {{-- <a href="" class="text-gray p-r-20">
                                            <i class="anticon anticon-facebook"></i>
                                        </a>        
                                        <a href="" class="text-gray p-r-20">    
                                            <i class="anticon anticon-twitter"></i>
                                        </a>
                                        <a href="" class="text-gray p-r-20">
                                            <i class="anticon anticon-behance"></i>
                                        </a> 
                                        <a href="" class="text-gray p-r-20">   
                                            <i class="anticon anticon-dribbble"></i>
                                        </a> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <ul class="nav nav-tabs nav-justified" id="myTabJustified" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="home-tab-justified" data-toggle="tab" href="#home-justified" role="tab" aria-controls="home-justified" aria-selected="true">Installer Info</a>
                                            </li>
                                          
                                            @if ($user->company_info=="1")
                                            <li class="nav-item">
                                                <a class="nav-link" id="profile-tab-justified" data-toggle="tab" href="#profile-justified" role="tab" aria-controls="profile-justified" aria-selected="false">Company Info</a>
                                            </li>
                                            @endif
                                            <li class="nav-item">
                                                <a class="nav-link " id="testmonial-tab-justified" data-toggle="tab" href="#testmonial-justified" role="tab" aria-controls="testmonial-justified" aria-selected="false">Testimonial</a>
                                            </li>
                                            
                                        </ul>
                                        <div class="tab-content m-t-15" id="myTabContentJustified">
                                            <div class="tab-pane fade show active" id="home-justified" role="tabpanel"  aria-labelledby="home-tab-justified">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col-md-2"></div>
                                                                <div class="col-md-4"><b>Name </b></div>
                                                                
                                                                <div class="col-md-6">{{$user->name}}</div>
                                                            </div>
                                                            <br>
                                                            <div class="row">
                                                                <div class="col-md-2"></div>
                                                                <div class="col-md-4"><b>Email </b></div>
                                                                
                                                                <div class="col-md-6">{{$user->email}}</div>
                                                            </div>
                                                            <br>
                                                            <div class="row">
                                                                <div class="col-md-2"></div>
                                                                <div class="col-md-4"><b>Password</b></div>
                                                                <div class="col-md-6"> <a href="{{url('admin/installerpassword/'.$user->id)}}">Change Password</a> </div>
                                                            </div>
                                                            <div class="row mt-4">
                                                                <div class="col-md-2"></div>
                                                                <div class="col-md-2"><b>Change Profile</b></div>
                                                                <div class="col-md-2">
                                                                    <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target=".bd-example-modal-lg" onclick="abc()"> <i class="anticon anticon-edit"></i> Change Profile</button>


                                                                </div>
                                                                <div class="col-md-4">
                                                                    
                                                                    <button type="button" class="btn btn-primary  btn-xs" data-toggle="modal" data-target="#exampleModal"><i class="anticon anticon-user"></i>Update Avatar</button>
                                                                    
                                                                    <!-- Modal -->
                                                                    
                                                                </div>
                                                            </div>
                                                            
                                                        </div>
                                                    </div>
                                                </div>


                                            </div>
                                            @if ($user->company_info=="1")
                                            <div class="tab-pane fade" id="profile-justified" role="tabpanel" aria-labelledby="profile-tab-justified">
                                                
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col-md-2"></div>
                                                                <div class="col-md-4"><b>Name </b></div>
                                                                
                                                                <div class="col-md-6">{{$user->companies->company_name}}</div>
                                                            </div>
                                                            <br>
                                                            <div class="row">
                                                                <div class="col-md-2"></div>
                                                                <div class="col-md-4"><b>Email </b></div>
                                                                
                                                                <div class="col-md-6">{{$user->companies->email}}</div>
                                                            </div>
                                                            <br>
                                                            <div class="row">
                                                                <div class="col-md-2"></div>
                                                                <div class="col-md-4"><b>Logo</b></div>
                                                                <div class="col-md-2"> <img src="{{asset('companies/'.$user->companies->logo)}}" alt="" width="70px" height="70px"> </div>
                                                                <div class="col-md-3">
                                                                    <button type="button" class="btn btn-primary btn-xs mt-3" data-toggle="modal" data-target="#company_logo">
                                                                        Change Logo 
                                                                    </button>
                                                                    
                                                               
                                                                </div>
                                                            </div>
                                                            <div class="row mt-3">
                                                                <div class="col-md-2"></div>
                                                                <div class="col-md-4"><b>Cover</b></div>
                                                                <div class="col-md-2"> <img src="{{asset('companies/'.$user->companies->cover)}}" alt="" width="70px" height="70px"> </div>
                                                                <div class="col-md-3">
                                                                    <button type="button" class="btn btn-primary btn-xs mt-3" data-toggle="modal" data-target="#company_cover">
                                                                        Change cover  
                                                                    </button>
                                                                    
                                                               
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="row mt-4">
                                                                <div class="col-md-2"></div>
                                                                <div class="col-md-2"><b>Change Profile</b></div>
                                                                <div class="col-md-2">
                                                                    

                                                                </div>
                                                                <div class="col-md-4">
                                                                    
                                                                    <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#company_info">Large modal</button>
                                                                    
                                                                    <!-- Modal -->
                                                                    
                                                                </div>
                                                            </div>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endif
                                            <div class="tab-pane fade" id="testmonial-justified" role="tabpanel" aria-labelledby="testmonial-tab-justified">
                                                
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <a href="{{url('admin/addtestmonial/'.$user->id)}}" class="btn btn-success btn-xs float-right"><i class="fa fa-plus-circle"></i> Add Testimonial </a>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                       @if ($user->testmonial)
                                                       <table class="table table-hover">
                                                            <thead>
                                                                <tr>
                                                                    <th>Sr #</th>
                                                                    <th>Image</th>
                                                                    <th>Rating</th>
                                                                    <th>Desctiption</th>
                                                                    <th>Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($user->testmonial as $userstest)
                                                                    <tr>
                                                                        <td>{{$loop->iteration}}</td>
                                                                        <td>
                                                                            @if($userstest->image)
                                                                            <a href="{{asset('admin-assets/testmonial/'.$userstest->image)}}"><img src="{{asset('admin-assets/testmonial/'.$userstest->image)}}" width="70px" height="70px"></a>
                                                                            @endif
                                                                        </td>
                                                                        <td><div class="jstars" data-value="{{$userstest->rating}}"></div></td>
                                                                        
                                                                        <td>{{mb_strimwidth($userstest->description, 0, 20, ' ........')}}</td>
                                                                        <td>
                                                                            <a href="{{url('admin/edittestmonial/'.$userstest->id)}}" class="btn btn-info btn-xs"><i class="fa fa-edit"></i> Edit</a>
                                                                            <a href="{{url('admin/deletetestmonial/'.$userstest->id)}}" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Delte</a>
                                                                        </td>
                                                                    </tr>
                                                                    
                                                                @endforeach
                                                            </tbody>
                                                       </table>
                                                       @endif
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
               </div>
           </div>
       </div>
        
    </div>
    <div class="modal fade" id="exampleModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Upload Avatar</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <i class="anticon anticon-close"></i>
                    </button>
                </div>
                <form action="{{url('admin/installeravatar/'.$user->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="">Choose Image</label>
                                <input type="file" class="form-control" name="image" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade bd-example-modal-lg">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title h4">Large modal</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <i class="anticon anticon-close"></i>
                    </button>
                </div>
                <form action="{{url('admin/updateinstallerinfo/'.$user->id)}}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">First Name</label>
                                <input type="text" class="form-control" name="first_name" placeholder="First Name" value="{{$user->first_name}}">
                            </div>
                            <div class="col-md-6">
                                <label for="">Last Name</label>
                                <input type="text" value="{{$user->last_name}}" class="form-control" name="last_name" placeholder="Last Name">

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">Contact No </label>
                                <input type="text" class="form-control" name="contact_no" placeholder="Contact No " value="{{$user->contact_no}}">
                            </div>
                            <div class="col-md-6">
                                <label for="">Address</label>
                                <input type="text" class="form-control" name="address" placeholder="Address" value="{{$user->address}}">

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">Experience </label>
                                <input type="text" class="form-control" name="experience" placeholder="Experience" value="{{$user->installinfo->experience}}">
                            </div>
                            <div class="col-md-6">
                                <label for="">Recharge</label>
                                <input type="hidden" name="installinfoid" value="{{$user->installinfo->id}}">
                                <input type="text" class="form-control" name="recharge" placeholder="Recharge" value="{{$user->installinfo->recharge}}">

                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12">
                                
                                <label for="">Installer Type</label>
                                <select name="installation_type[]" id="installer_type" class="form-control" multiple>
                                    <option value="" disabled>Select Types</option>
                                    @php
                                        $types =  explode(",",$user->installinfo->installation_type);
                                        for ($i=0; $i <count($types) ; $i++) { 
                                            echo '<option value="'.$types[$i].'" selected>'.$types[$i].'</option>';
                                        }
                                    @endphp
                                </select>
                            </div>
                        </div>
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
                
            </div>
        </div>
    </div>
         <!-- Modal -->
         @if ($user->company_info==1)
             
         
         <div class="modal fade" id="company_logo">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Update Company Logo</h5>
                        <button type="button" class="close" data-dismiss="modal">
                            <i class="anticon anticon-close"></i>
                        </button>
                    </div>
                    <form action="{{url('admin/updatecompanylogo/'.$user->companies->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <label for="">Select Logo</label>
                            <input type="file" class="form-control" name="logo">
                            <input type="hidden" name="user_id" value="{{$user->id}}">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal fade" id="company_cover">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Update Company cover</h5>
                        <button type="button" class="close" data-dismiss="modal">
                            <i class="anticon anticon-close"></i>
                        </button>
                    </div>
                    <form action="{{url('admin/updatecompanycover/'.$user->companies->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <label for="">Select image</label>
                            <input type="file" class="form-control" name="cover">
                            <input type="hidden" name="user_id" value="{{$user->id}}">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        

<div class="modal fade bd-example-modal-lg" id="company_info">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title h4">Company Information</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <i class="anticon anticon-close"></i>
                </button>
            </div>
            <form action="{{url('admin/updatecompanydata/'.$user->companies->id)}}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="">Company Name </label>
                            <input type="text" class="form-control" required name="company_name" placeholder="Company Name" @isset($user->companies->company_name)
                            value="{{$user->companies->company_name}}"
                            @endisset>
                            
                        </div>
                        <div class="col-md-6">
                            <label for="">EmailAddress</label>
                            <input type="email" class="form-control" required name="company_email" placeholder="Company Email Address" value="{{$user->companies->email}}">
                        </div>
                    </div>
                 <input type="hidden" required name="installinfoid" value="{{$user->id}}">
                   
                    <div class="row">
                        <div class="col-md-6">
                            <label for="">Country Name</label>
                            <select required name="country_id" id="country_id" class="form-control">
                                <option value="">Select Country</option>
                                @foreach ($countries as $country)
                                    <option value="{{$country->id}}" 
                                        @if ($country->id==$user->companies->country_id)
                                            selected
                                        @endif
                                        >{{$country->name}}</option>
                                @endforeach 
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="">State Name</label>
                            <input type="text" class="form-control" required name="state_id" placeholder="Enter State Name " value="{{$state->name}}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="">City Name</label>
                            <input type="text" required name="city_id" id="" class="form-control" placeholder="City Name " value="{{$city->name}}" required>
                        </div>
                        <div class="col-md-6">
                            <label for="">Post Code</label>
                            <input type="text" class="form-control" required name="postcode" placeholder="Post Code " value="{{$user->companies->postcode}}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="">Company Contact No  </label>
                            <input type="text" class="form-control" required name="company_contactno" placeholder="Company Contact No" value="{{$user->companies->contact_no}}">
                        </div>
                        <div class="col-md-6">
                            <label for=""> Address</label>
                            <input type="text" class="form-control" required name="address" placeholder="Address" value="{{$user->companies->address}}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mt-2">
                            <label for="">About Company </label>
                        <textarea required name="companydesc" id="company_description"  class="form-control" rows="10">{{$user->companies->company_description}}</textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
            
        </div>
    </div>
</div>

@endif
@endsection
@section('script')
<script src="{{ url('admin-assets/vendors/jquery-validation/jquery.validate.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script>
        $(document).ready(function() {
        $('#summernote,#company_description').summernote({
        height: 200,
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          
          ['view', ['fullscreen', 'codeview', 'help']]
        ]
        });
        
    });



    toastr.options = {
    "closeButton": true,
    "debug": false,
    "newestOnTop": false,
    "progressBar": true,
    "positionClass": "toast-top-right",
    "preventDuplicates": true,
    "onclick": null,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "5000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
}

    $(document).ready(function() {
    $('#company_info').click(function(){
        if($(this).prop("checked") == true){
                $("#company_data").show();
            }
            else if($(this).prop("checked") == false){
                $("#company_data").hide();
            }
    });
});
    $(document).ready(function() {
    $('#companies,#installer_type').select2(
        {
            tags:true,
            tokenSeparators: [","]
        }
    );
});
    
    $("#users").validate({
    ignore: ':hidden:not(:checkbox)',
    errorElement: 'label',
    errorClass: 'is-invalid',
    validClass: 'is-valid',
    rules: {
        first_name: {
            required: true
        },
        
        last_name: {
            required: true
        },
        
        email: {
            required: true,
            email: true
        },
        contact_no:{
            required: true
        },
        password:{
            required:true,
            minlength: 8
        },
        confpass:{
            required: true,
            equalTo: '#password'
        },
        address:{
            required:true,
           
        }

    }
});
   function abc(){
    $('#installer_type').select2(
        {
            tags:true,
            tokenSeparators: [","]
        }
    );
}

    </script>
@endsection
