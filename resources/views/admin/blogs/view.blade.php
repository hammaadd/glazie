@extends('admin-layout.layouts')
@section('title','Blogs Details')
@section('content')
<link href="{{ asset('admin-assets/css/style.css') }}" rel="stylesheet">
<link href="{{ asset('admin-assets/css/app.min.css') }}" rel="stylesheet">
<link href="{{asset('admin-assets/vendors/datatables/dataTables.bootstrap.min.css')}}" rel="stylesheet">
<link href='http://fonts.googleapis.com/css?family=Roboto+Condensed' rel='stylesheet' type='text/css'>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="{{asset('admin-assets/js/jstars.js')}}"></script>
<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
<div class="page-container">
  
    <div class="main-content">
        <div class="page-header no-gutters has-tab">
            <div class="d-md-flex m-b-15 align-items-center justify-content-between">
                <div class="media align-items-center m-b-15">
                    @if ($blog->image)
                    <div class="avatar avatar-image rounded" style="height: 70px; width: 70px">
                        <img src="{{asset('admin-assets/blogs/'.$blog->image)}}" alt="">
                    </div> 
                    @endif
                    <div class="m-l-15">
                        <h1 class="m-b-0">{{$blog->title}}</h1>
                        <p class="text-muted m-b-0"></p>
                        
                    </div>
                </div>
                @if (session('info'))
                <script type="text/javascript">toastr.success("{{session('info')}}");</script>
                @endif 
                <div class="m-b-15">
                    <a href="{{url('admin/blogs/edit/'.$blog->id)}}" class="btn btn-primary">
                        <i class="anticon anticon-edit"></i>
                        <span>Edit</span>
                    </a>
                </div>
            </div>
            
        </div>
        <div class="container-fluid">
            
                    <div class="card">  
                        <div class="card-body" >
                              
                            <div class="row">
                                <div class="col-md-12"  id="completedescription">
                                    <p class="text-justify">
                                        {!!$blog->description!!}
                                    </p>
                                </div>
                            </div>
                           
                        </div>
                    </div>
                </div>
                
                
                
           
    </div>
 

    
</div>
@endsection
@section('script')
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
    
   
    $(document).ready(function(){
    $("#short_btn").click(function(){
      $('#shortdes').toggle(1000);
      $('#shortdescription').toggle(1000);
    });
    $('#longdescbtn').click(function(){
        $("#halflongdesc").toggle(1000);
        $('#completedescription').toggle(1000);
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

</script>
@endsection