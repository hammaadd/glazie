@extends('public/layouts/layouts')
@section('title','Update Page')
@section('content')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />

<div class="container">
  
       <div class="row">
           <div class="col-md-12">
               <div class="card">
                   <div class="card-header">
                       <div class="row" style="background-color: #E3E3E3;padding:5px;">
                           
                               
                               <div class="col-md-9">
                                <h2>{{$cms->title}}</h2>
                               </div>
                               
                           
                       </div>
                   </div>
                   <div class="card-body">

                 
                    <div class="row">
                        <div class="col-md-4">
                            
                        </div>
                        <div class="col-md-3">
                            <img src="{{asset('adminassets/cms/'.$cms->image)}}" alt="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            {!!$cms->description!!}
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
<!-- page js -->

    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script>
      
     
@endsection
