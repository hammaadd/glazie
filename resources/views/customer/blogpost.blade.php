@extends('customer.layouts.layouts')
@section('title','All Posts')
@section('content')
<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>

<?php 
    
use Illuminate\Support\Facades\Auth;

$user = Auth::user();
?>
<div class="page-container">
    <div class="main-content">
        <div class="page-header">
            <h2 class="header-title">All Posts</h2>
            <div class="header-sub-title float-right">
                <nav class="breadcrumb breadcrumb-dash">
                    <a href="#" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Home</a>
                    <a class="breadcrumb-item" href="#"> Posts     </a>
                    
                </nav>
            </div>
        </div>
        @if (session('info'))
        <script type="text/javascript">toastr.success("{{session('info')}}");</script>
        @endif   
        <div class="row">
            <div class="col-md-8">
                @foreach ($blogs as $blog)
                    <div class="card mt-1" style="background-color: #E3E3E3">
                        <div class="card-header">
                            
                            <h4>{{$blog->title}}</h4>
                            <div class="row">
                                <div class="col-md-12">
                                    
                                    
                                    @php
                                    $countlike=$countdislike=$i=$j=0;
                                @endphp
                                  @foreach ($blog->likes   as $like)
                                      
                                    @if ($like->liketype=="like")
                                    @php
                                        $countlike++;
                                    @endphp
                                    @endif
                                    @if ($like->liketype=="dislike")
                                    @php
                                        $countdislike++;
                                    @endphp
                                    @endif
                                    @if($like->user_id==$user->id)
                                        @if($like->liketype=='like')
                                       
                                        @php
                                            $i=1;
                                        @endphp

                                        @endif
                                        @if($like->liketype=='dislike')
                                       
                                        @php
                                            $j=1;
                                        @endphp

                                        @endif
                                    
                                    @endif
                                  @endforeach
                                    
                                </div>
                                
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <a href="{{url('customer/blogs/details/'.$blog->slug)}}" class="text-info">Read More</a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                                      
                                </div>
                                <div class="col-md-6">

                                   <a href="javascript:void" style="padding:10px;background-color:white;margin-right:20px;border-radius:10px;" id="like{{$blog->id}}" onclick="checklike({{$user->id}},{{$blog->id}},'like')">
                                    
                                  @if ($i==0)
                                  <i class="far fa-thumbs-up"></i>
                                  @else 
                                  <i class="fas fa-thumbs-up"></i>
                                  @endif
                                    <b> {{$countlike}}</b></a>
                                   <a href="javascript:void" style="padding:10px;background-color:white;margin-right:20px;border-radius:10px;" id="dislike{{$blog->id}}" onclick="checklike({{$user->id}},{{$blog->id}},'dislike')">
                                    @if ($j==0)
                                  <i class="far fa-thumbs-down"></i>
                                  @else 
                                  <i class="fas fa-thumbs-down"></i>
                                  @endif
                                  <b>{{$countdislike}}</b>
                                    </a>
                                   
                                   
                                </div>
                            </div>
                            <div class="row">
                              
                                <div class="col-md-12">
                                    Posted On:{{date("d-M-Y", strtotime($blog->created_at))}}</div> 
                                
                         
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        
    </div>

@endsection
@section('script')
<script src="{{url('admin-assets/js/pages/form-elements.js')}}"></script>


   
    <script src="{{ url('admin-assets/vendors/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
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
    </script>
    <script>
   
    function checklike(user_id,blog,type)
    {
        $.ajaxSetup({
				headers:{'X-CSRF-Token':'{{csrf_token()}}'}
            });
        url = "{{url('customer/checklike')}}";
        $.ajax({
           type:'POST',
           url:url,
           data:{
                blog:blog,  
                user_id:user_id,
                type:type
           },
           success:function(result){
              var data = JSON.parse(result);
              //console.log(data);
              if(type=='like')
                {
                    if(data[2]=="like")
                    {
                        $('#like'+blog).html('<i class="fas fa-thumbs-up"></i> <b>'+data[0]+'<b/>');
                        $('#dislike'+blog).html('<i class="far fa-thumbs-down"></i> <b>'+data[1]+'<b/>');
                    }
                    if(data[2]==null)
                    {
                        $('#like'+blog).html('<i class="far fa-thumbs-up"></i> <b>'+data[0]+'<b/>')
                    }

                }
                if(type=='dislike')
                {
                    if(data[2]=="dislike")
                    {
                        $('#dislike'+blog).html('<i class="fas fa-thumbs-down"></i> <b>'+data[1]+'<b/>')
                            $('#like'+blog).html('<i class="far fa-thumbs-up"></i> <b>'+data[0]+'<b/>')
                    }
                    if(data[2]==null)
                    {
                        $('#dislike'+blog).html('<i class="far fa-thumbs-down"></i> <b>'+data[1]+'<b/>');
                           
                    }

                }
            }	
            });
    }

    </script>
    
@endsection
