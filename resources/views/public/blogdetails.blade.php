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
            <div class="col-md-4">
               <a href="{{asset('admin-assets/blogs/'.$blog->image)}}"> <img src="{{asset('admin-assets/blogs/'.$blog->image)}}" alt="" width="100px" height="100px" style="text-align: center"></a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <p>{!!$blog->description!!}</p>
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
                @endforeach
            </div>
        </div>
    </div>
</section>
@endsection
@section('script')
    
@endsection