@extends('admin-layout.layouts')
@section('title','Product Add On')
@section('content')
<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>



<!-- page js -->

<div class="page-container">
    <div class="main-content">
        <div class="page-header">
            <h1 class="header-title">Product Add On</h1>
            <div class="header-sub-title float-right">
                <nav class="breadcrumb breadcrumb-dash ">
                    <a href="{{url('admin/dashboard')}}" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Home</a>
                    <a class="breadcrumb-item" href="#">Product Add On</a>
                    
                </nav>
            </div>
        </div>
        @if (session('info'))
        <script type="text/javascript">toastr.success("{{session('info')}}");</script>
        @endif  
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="card">
                    
                    <div class="card-body">
                        @if(count($errors)>0)
                        @foreach($errors->all() as $error)
                        <div class="alert alert-danger bg-danger text-light">
                            
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
                            </button>                            
                            {{$error}}
                        </div>
                        @endforeach
                        @endif
                        <form action="{{url('admin/addon/createhinge')}}" method="post" enctype="multipart/form-data" id="addon">
                            @csrf

                           
                            <input type="hidden" name="addon_id" value="{{$id}}" id="addon_id">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="">Hinge Side</label>
                                    <select name="hinge" id="hinge" class="form-control">
                                        <option value=""><--Select Hinge--></option>
                                            <option value="right">Right</option>
                                            <option value="Left">Left</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 text-center mt-2">
                                    <span id="message" class="text-danger mt-1 text-center"></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-success mt-3" id="btncheck"><i class="fa fa-check"> Submit</i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
      
    </div>
    <!-- Model Start Here-->
    

@endsection
@section('script')

<!-- page js -->
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="{{ url('admin-assets/vendors/jquery-validation/jquery.validate.min.js')}}"></script>
  <script>
      $(document).ready(function(){
          $("#hinge").change(function(){
              var addon_id = $('#addon_id').val();
              var hinge =  $('#hinge').val();
              
              url = "{{url('admin/addon/checkhinge')}}";
              $.ajax({
           type:'POST',
           url:url,

            data:{
                addon_id:addon_id,
                hinge:hinge
           },
           success:function(result){
              if(result==0){
                 $('#btncheck').prop('disabled',false);
                 $('#message').html('');
              }
              else{
                $('#message').html("<i class='fa fa-times-circle' aria-hidden='true'> </i> <b>The Hinge "+hinge+" of this model is already exist</b>");
                $('#btncheck').prop('disabled',true);
              }
           }
            });
          });
      });
      $("#addon").validate({
    ignore: ':hidden:not(:checkbox)',
    errorElement: 'label',
    errorClass: 'is-invalid',
    validClass: 'is-valid',
    rules: {
        hinge:{
            required:true
        },
        
        
        }
});
  </script>




</script>
@endsection


