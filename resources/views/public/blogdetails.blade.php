@extends('public/layouts/layouts')
@section('title','Welcome')
@section('content')
<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h1>{{$blog->title}}<h1>
            </div>
            
        </div>
        <div class="row">
            <div class="col-md-3">
               
                    <a href="{{asset('admin-assets/blogs/'.$blog->image)}}"> <img src="{{asset('admin-assets/blogs/'.$blog->image)}}" alt="" width="200px" height="200px" style="text-align: center"></a>
                 
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <p>{!!$blog->description!!}</p>
            </div>
        </div>
        @if(count($blog->comments) > 0)
        <div class="row mt-3">
            <div class="col-md-6">
                <h3>Comments: </h3>
                @foreach ($blog->comments as $comment)
                   <div class="card">
                       <div class="card-body">
                           <div class="row">
                               <div class="col-md-12">
                                   <h4>{{$comment->user->name}}</h4>
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
                   <br>
                @endforeach
            </div>
        </div>
        @else
        <div class="row mt-3">
            <div class="col-md-6">
                <h3>Comments:</h3>
                
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                No comment exist
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
        @if(empty(Auth::id()) || Auth::id() == 0)
            <div class="row mt-3">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    Please login to comment
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="row mt-3">
                <div class="col-md-6">
                    <form method="POST" action="{{route('comment')}}">
                        @csrf
                        <input type="hidden" name="blog_id" value="{{$blog->id}}">
                        <input type="hidden" name="user_id" value="{{Auth::id()}}">
                        <input type="hidden" name="slug" value="{{$blog->slug}}">
                        <div class="row">
                            <div class="form-group col-md-10">
                                <label for="about">Enter Your Comments: </label>
                                <textarea id="about" class="form-control" name="comment" rows="4" placeholder="Your comments goes here...." style="overflow: hidden; overflow-wrap: break-word; resize: none; height: 112px;"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <button class="btn btn-primary btn___submit" id="rat_rev" name="Add" type="submit">Post Comment</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        @endif
    </div>
</section>
@endsection
@section('script')
    
@endsection