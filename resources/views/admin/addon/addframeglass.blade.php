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
            <h1 class="header-title">Add Frame Glass</h1>
            <div class="header-sub-title float-right">
                <nav class="breadcrumb breadcrumb-dash ">
                    <a href="{{url('admin/dashboard')}}" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Home</a>
                    <a class="breadcrumb-item" href="{{url('admin/addon/view/'.$addon_id)}}">Product</a>
                    <a class="breadcrumb-item" href="{{url('admin/frameglasses/'.$id)}}">Frame Glass</a>
                    <a class="breadcrumb-item" href="#">Product Add On</a>
                    
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
                        @if(count($errors)>0)
                        @foreach($errors->all() as $error)
                        <div class="alert alert-danger bg-danger text-light">
                            
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
                            </button>                            
                            {{$error}}
                        </div>
                        @endforeach
                        @endif
                        <form action="{{url('admin/createfraemglass')}}" method="post" enctype="multipart/form-data" id="addon">
                            @csrf

                            <div class="row">
                                <div class="col-md-12">
                                    <button type="button" class="btn btn-success btn-xs float-right" id="addcolor"><i class="fa fa-plus-circle"></i> Add Frame Glass</button>
                                    
                                </div>
                            </div>
                            <input type="hidden" name="frame_id" value="{{$id}}">
                            <div class="row">
                               <div class="col-md-12">
                                   <div class="table-responsive" >
                                    <table class="table" id="colortable" >
                                        <thead>
                                            <th>Frame Glass Name</th>
                                            <th>Image</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            <th>Remove</th>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                   </div>
                               </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-success" ><i class="fa fa-check" > Submit</i></button>
                                    <a class="btn btn-danger ml-1" href="{{url('admin/frameglasses/'.$id)}}"><i class="fa fa-times"></i> Cancel</a>
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
let j=1;
$(document).ready(function(){
    $('#addcolor').click(function(){
       
        let row = '';
        
       
        
        row+='<tr>';
            row+='<td>';
            row+='<input type="text" class="form-control rounded-0" name="name[]" placeholder="Frame Glass Name" required>';
            
            row+='</td>';
        row+='<td>';
            row+='<input type="file" class="form-control rounded-0" name="images[]" placeholder="Frame Glass Name" required>'; 
       
        row+='</td>';
        row+='<td>';
        
        row+='<input type="number" required min="1" class="form-control rounded-0 " placeholder="Color Price" name="price[]" required>';
        row+='</td>';
        row+='<td>';
        row+='<input type="number" class="form-control rounded-0 " name="quantity[]" placeholder="Enter Quantity" required >';
        row+='</td>';
        row+='<td>';
        row+='<button class="btn btn-danger btn-xs removecolor"  type="button"> <i class="fa fa-minus"></i> </button>';
        row+='</td>';
        row+='</tr>';
        j++;
        $('#colortable').append(row);
    });
    
    
});
$(document).on('click', '.removecolor', function(){
     
       
        $(this).closest("tr").remove();
        j--;
         if(j==1){
            $('#table').hide();
         }  
      
        });






</script>
@endsection


