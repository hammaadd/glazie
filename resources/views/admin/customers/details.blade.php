@extends('admin-layout.layouts')
@section('title','Customer Details')
@section('content')
<div class="page-container">
    <div class="main-content">
        <div class="page-header">
            <h2 class="header-title">Customer Details</h2>
            <div class="header-sub-title float-right">
                <nav class="breadcrumb breadcrumb-dash">
                    <a href="{{url('admin/dashboard')}}" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Home</a>
                    <a href="{{url('admin/customers')}}" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Customers</a>
                    <span class="breadcrumb-item" href="#">Customer Details</span>
                    
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
                                    <div class="" style="width: 150px; height:150px">
                                        {{-- <img src="{{asset('customersprofile/'.$user->avatar)}}" alt=""> --}}
                                        
                                    </div>
                                </div>
                                <div class="text-center text-sm-left m-v-15 p-l-30">
                                    <h2 class="m-b-5">{{$user->name}}</h2>
                                    <p class="text-opacity font-size-13"></p>
                                    <p class="text-dark m-b-20"></p>
                                    
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
                                                <a class="nav-link active" id="home-tab-justified" data-toggle="tab" href="#home-justified" role="tab" aria-controls="home-justified" aria-selected="true">Customer  Info</a>
                                            </li>
                                          
                                            
                                            <li class="nav-item">
                                                <a class="nav-link" id="profile-tab-justified" data-toggle="tab" href="#profile-justified" role="tab" aria-controls="profile-justified" aria-selected="false">Order Details</a>
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
                                                                <div class="col-md-6"> <a href="{{url('admin/customers/changepassword/'.$user->id)}}">Change Password</a> </div>
                                                            </div>
                                                            <div class="row mt-4">
                                                                <div class="col-md-2"></div>
                                                                <div class="col-md-4"><b>Change Profile</b></div>
                                                                <div class="col-md-">
                                                                   <a href="{{url('admin/customers/edit/'.$user->id)}}" class="btn btn-success  btn-xs">Change Profile </a>


                                                                </div>
                                                                <div class="col-md-4">
                                                                    
                                                                    
                                                                    <!-- Modal -->
                                                                    
                                                                </div>
                                                            </div>
                                                            
                                                        </div>
                                                    </div>
                                                </div>


                                            </div>
                                            <div class="tab-pane fade" id="profile-justified" role="tabpanel" aria-labelledby="profile-tab-justified">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <table class="table table-hover">
                                                            <thead>
                                                                <tr>
                                                                    <th>Sr #</th>
                                                                    <th> Total Amount</th>
                                                                    <th>Discount</th>
                                                                    <th>Net Total</th>
                                                                    <th>Date</th>
                                                                    <th>status</th>
                                                                    <th>Action </th>
                                                                </tr>
                                                                @if (count($user->orders)>0)
                                                                    
                                                                
                                                                @foreach ($user->orders as $order)
                                                                    <tr>
                                                                        <td>{{$loop->iteration}}</td>
                                                                        <td>{{$order->total_amount}}</td>
                                                                        <td>{{$order->discount}}</td>
                                                                        <td>{{$order->net_total}}</td>
                                                                        <td>{{$order->status}}</td>
                                                                        <td>{{$order->created_at}}</td>
                                                                        <td><a href="{{url('admin/customerorder/details/'.$order->id)}}" class="btn btn-warning btn-xs"> <i class="fa fa-eye"></i></a></td>
                                                                    </tr>
                                                                @endforeach
                                                                @else
                                                                <tr>
                                                                    <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td><span class="text-danger font-weight-bold">No Record Found</span></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                </tr>
                                                                @endif
                                                            </thead>
                                                        </table>
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
