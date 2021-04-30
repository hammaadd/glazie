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
                @foreach ($blogs as $blog)
                    <div class="card mt-1" style="background-color: #E3E3E3">
                        <div class="card-header">
                            
                            <h4>{{$blog->title}}</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    
                                    
                                @php
                                    $countlike = $countdislike = 0;
                                @endphp
                                @foreach ($blog->likes as $like)
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
                                @endforeach
                                    
                                </div>
                            </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <a href="{{url('blog/details/'.$blog->slug)}}" class="text-danger">Read More</a>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        Posted On:{{date("d-M-Y", strtotime($blog->created_at))}}
                                    </div>
                                    <div class="col-md-6">
                                       <a style="padding:10px;background-color:white;margin-right:20px;border-radius:10px; " title="Like"><i class="far fa-thumbs-up" style="font-size:20px;cursor:pointer;"></i><b> {{$countlike}}</b></a>
                                       <a  style="padding:10px;background-color:white;margin-right:20px;border-radius:10px;" title="Dislike"><i class="far fa-thumbs-down" style="font-size:20px "></i></i><b>{{$countdislike}}</b></a>
                                       
                                       
                                    </div>
                                </div>
                                <div class="row">
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