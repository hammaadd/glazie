@extends('admin-layout.layouts')
@section('title','Edit Coupon')
@section('content')
<link href="{{asset('admin-assets/vendors/datatables/dataTables.bootstrap.min.css')}}" rel="stylesheet">

<!-- page js -->

<div class="page-container">
    <div class="main-content">
        <div class="page-header">
            <h2 class="header-title ">Coupon</h2>
            <div class="header-sub-title">
                <nav class="breadcrumb breadcrumb-dash">
                    <a href="#" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Home</a>
                    <a class="breadcrumb-item" href="#">Coupon</a>
                    
                </nav>
            </div>
        </div>
        @if(session('info'))
				<div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <div class="alert alert-success" style="background-color: green;color:white;"><i class="fa fa-check"></i> {{session('info')}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="color: white"><span aria-hidden="true">&times;</span></button>
                        </div>

                    </div>
                </div>
				@endif
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{url('admin/coupen/update/'.$coupen->id)}}" method="post" id="coupen">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="">Coupon Name </label>
                                    <input type="text" class="form-control" name="coupen_name" placeholder="Enter Coupon Name" id="coupen_name" value="{{$coupen->coupen_name}}">
                                </div>
                                <div class="col-md-6">
                                    <label for="">Coupon Code </label>
                                    <input type="text" class="form-control" name="coupen_code" placeholder="Enter Coupon Name" id="coupencode" value="{{$coupen->coupen_code}}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="">Discount Type</label>
                                    <select name="discount_type" class="form-control" id="discount_type">
                                        <option value="amount" 
                                        @if ($coupen->discount_type=="amount")
                                            selected
                                        @endif
                                        >Amount</option>
                                        <option value="percentage"
                                        @if ($coupen->discount_type=="percentage")
                                            selected
                                        @endif
                                        >Percentage</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="">Discount </label>
                                    <input type="number" class="form-control" name="discount_amount" placeholder="Enter Discount" id="discount_amount" value="{{$coupen->discount}}">
                                </div>
                            </div>
                             <div class="row">
                                <div class="col-md-6">
                                    <label for="">Limited User</label>
                                    <select name="limited_user" id="limituser" class="form-control">
                                        <option value="yes"
                                        @if ($coupen->limiteduser=="yes")
                                            selected
                                        @endif
                                        >Yes</option>
                                        <option value="no"
                                        @if ($coupen->limiteduser=="no")
                                            selected
                                        @endif
                                        >No</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="">No Of User</label>
                                    <input type="number" class="form-control" name="no_of_user" placeholder="No Of User" id="no_of_user" 
                                    @if ($coupen->limiteduser=="no")
                                            disabled
                                        @else
                                        	 value="{{$coupen->no_of_user}}"
                                        @endif
                                       
                                    >
                                </div> 
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="">Limited Days</label>
                                    <select name="limited_time" id="limitedtime" class="form-control">
                                        <option value="yes"
                                            @if ($coupen->limited_time=="yes")
                                                selected
                                            @endif
                                        >Yes</option>
                                        <option value="no"
                                        @if ($coupen->limited_time=="no")
                                                selected
                                            @endif
                                        >No</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="">Expiry Date</label>
                                    <input type="date" class="form-control" name="timelimit" placeholder="No Of User" id="limit" min="{{date('Y-m-d')}}" 
                                    
                                    @if ($coupen->limited_time=="no")
                                        	disabled
                                        @else                                  				value="{{$coupen->last_date}}"
                                        @endif

                                >
                                </div> 
                            </div> 
                            
                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <button class="btn btn-success mr-1" type="submit"> <i class="fa fa-check"></i> Submit</button>
                                    <a href="{{url('admin/coupen')}}" class="btn btn-danger"> <i class="anticon anticon-close-circle"></i> Cancel</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
            
        </div>
        
    </div>
    <!-- Model Start Here-->
    
    


@endsection
@section('script')

<!-- page js -->
<script src="{{ url('admin-assets/vendors/jquery-validation/jquery.validate.min.js')}}"></script>
<script>

function randomInteger(min, max) {
  return Math.floor(Math.random() * (max - min + 1)) + min;
}
$("#coupen_name").change(function(){
    var a = randomInteger(10000, 100000);
    $("#coupencode").val(a);
});
$('#discount_amount').on('input',function(){
    var discount_type = $("#discount_type").val();
    if(discount_type=="percentage"){
       var discount_amount = parseInt($('#discount_amount').val());
       if(discount_amount>=100){
           alert('Discount in percentage can not greater than 100');
          
           $('#discount_amount').val(""); 
       } 
    }
});
$('#discount_type').on('change',function(){
    var discount_type = $("#discount_type").val();
    if(discount_type=="percentage"){
       var discount_amount = parseInt($('#discount_amount').val());
       if(discount_amount>=100){
           alert('Discount in percentage can not greater than 100');
          
           $('#discount_amount').val(""); 
       } 
    }
});
$('#limituser').change(function(){
    var limited_user = $('#limituser').val();
    if (limited_user=="no") {
        $('#no_of_user').prop('disabled',true);
        $('#no_of_user').val('');
    }
    else{
        $('#no_of_user').prop('disabled',false);
    }
});
$('#limitedtime').change(function(){
    var limited_time = $('#limitedtime').val();
    if (limited_time=="no") {
        $('#limit').prop('disabled',true);
        $('#limit').val('');
    }
    else{
        $('#limit').prop('disabled',false);
    }
});
$("#coupen").validate({
    ignore: ':hidden:not(:checkbox)',
    errorElement: 'label',
    errorClass: 'is-invalid',
    validClass: 'is-valid',
    rules: {
        coupen_name: {
            required: true
        },
        coupen_code: {
            required: true
           
        },
     
        discount_amount: {
            required: true,
            min:1
        },

      

        
    }
});

</script>
@endsection


