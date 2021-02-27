@extends('customer.layouts.layouts')
@section('title','All Posts')
@section('content')
<?php 
    
use Illuminate\Support\Facades\Auth;

$user = Auth::user();
?>
<div class="page-container">
    <div class="main-content">
        <div class="page-header">
            <h2 class="header-title">Post Details</h2>
            <div class="header-sub-title float-right">
                <nav class="breadcrumb breadcrumb-dash">
                    <a href="#" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Home</a>
                    <a class="breadcrumb-item" href="#"> Posts Details</a>
                    
                </nav>
            </div>
        </div>
        <div class="row">
          <div class="col-md-12">
              <div class="card">
                  <div class="card-body">
                      <div class="row">
                          <div class="col-md-8">
                            <h1>{{$blog->title}}</h1>
                            
                          </div>
                          <div class="col-md-4">
                            <img src="{{asset('admin-assets/blogs/'.$blog->image)}}" alt="">
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-md-12">
                              <span>{!!$blog->description!!}</span>
                          </div>
                      </div>
                      <div class="row mt-3">
                          <div class="col-md-6">
                              <form action="{{url('customer/comment')}}" method="post">
                                @csrf
                                  <input type="text" class="form-control" name="comment" placeholder="Enter Comment" >
                                  <input type="hidden" name="blog_id" value="{{$blog->id}}">
                                  <button class="btn btn-info mt-2"> Comment</button>
                              </form>
                          </div>
                      </div>
                      <div class="row mt-3">
                          <div class="col-md-6">
                              <h3>Your Comments</h3>
                              @foreach ($blog->comments as $comment)
                                 <div class="card">
                                     <div class="card-body">
                                         <div class="row">
                                             <div class="col-md-12">
                                                 {{$comment->comment}}
                                             </div>
                                         </div>
                                         <div class="row">
                                             <div class="col-md-12">
                                                <small>{{date("d-M-Y", strtotime($comment->created_at))}}</small>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                              @endforeach
                          </div>
                      </div>
                  </div>
              </div>
          </div>
        </div>
        
    </div>

@endsection
@section('script')
<script src="{{url('admin-assets/js/pages/form-elements.js')}}"></script>


   
    <script src="{{ url('admin-assets/vendors/jquery-validation/jquery.validate.min.js')}}"></script>
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
