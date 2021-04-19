@extends('admin-layout.layouts')
@section('title','Create Product Deal')
@section('content')
<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>



<!-- page js -->

<div class="page-container">
    <div class="main-content">
        <div class="page-header">
            <h1 class="header-title">Create Product Deal </h1>
            <div class="header-sub-title float-right">
                <nav class="breadcrumb breadcrumb-dash ">
                    <a href="{{url('admin/dashboard')}}" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Home</a>
                    <a class="breadcrumb-item" href="{{url('admin/addon/view/')}}">Product Deal </a>
                    <a class="breadcrumb-item" href="#">Create Prodcut Deal </a>
                    
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
                        <form action="{{url('admin/productdeals/update/'.$deals->id)}}" method="post" enctype="multipart/form-data" id="addon">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="">Product Deal Name</label>
                                    <input type="text" class="form-control" name="deal_name" placeholder="Deal Name" value="{{$deals->deal_name}}">
                                </div>
                                <div class="col-md-6">
                                    <label for="">Deal Image</label>
                                    <input type="file" class="form-control" name="image" >
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="">Deal Start Date</label>
                                    <input type="date" class="form-control" name="start_date" onchange="checkdate()" id="start_date" min="{{date('Y-m-d')}}" value="{{$deals->started_date}}">
                                </div>
                                <div class="col-md-6">
                                    <label for="">Deal End Date</label>
                                    <input type="date" class="form-control" name="end_date"  id="end_date" onchange="checkdate()" min="{{date('Y-m-d')}}" value="{{$deals->end_date}}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 offset-md-3">
                                    <span class="text-danger " id="message"></span>
                                </div>
                            </div>
                            <div class="row mt-3">
                                @if(count($deals->dealdetails)>0)
                                <div class="col-md-10">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Product Name</th>
                                                <th>Quantity</th>
                                                <th>Remove</th>
                                            </tr>
                                            <tbody>
                                                @foreach ($deals->dealdetails as $dealdetail)
                                                    <tr id="row{{$dealdetail->id}}">
                                                        <td><input type="text" class="form-control" disabled value="{{$dealdetail->products->product_name}}"> </td>
                                                        <td><input type="number" class="form-control"  value="{{$dealdetail->quantity}}" min="1" onchange="update_qty({{$dealdetail->id}})" id="updateqty{{$dealdetail->id}}"></td>
                                                        <td><button onclick="remove_product({{$dealdetail->id}})" type="button" class="btn btn-danger btn-xs"><i class="fa fa-times"></i></button></td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </thead>
                                    </table>
                                </div>
                                @endif
                               
                                <div class="col-md-2" id="imagediv">
                                    @if($deals->image)
                                        <img src="{{ asset('/admin-assets/productdeal/'.$deals->image) }}" alt="" class="float-center" width="50%">
                                        <button class="btn btn-danger btn-xs mt-2" type="button" onclick="removeimage({{$deals->id}})"><i class="fa fa-times"></i> Remove image</button>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <button type="button" class="btn btn-success btn-xs float-right mt-3" id="addcolor"><i class="fa fa-plus-circle"></i> Add Product</button>
                                </div>
                            </div>
                            
                            <div class="row">
                               <div class="col-md-12">
                                   <div class="table-responsive" >
                                    <table class="table" id="colortable" >
                                        <thead>
                                            <th>Product Name </th>
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
                                <div class="col-md-6">
                                    <label for="">Deal Price</label>
                                    <input type="number" class="form-control"  name="price" value="{{$deals->price}}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="">Description</label>
                                    <textarea name="description" id="" cols="30" rows="10" class="form-control" placeholder="Product Deal Description">{{$deals->description}}</textarea>
                                </div>
                            </div>
                            
                            <div class="row mt-2">
                                <div class="col-md-12 ">
                                    <button type="submit" class="btn btn-success" id="button"><i class="fa fa-check"> Submit</i></button>
                                    <a href="{{url('admin/productdeals')}}" class="btn btn-danger"> <i class="fa fa-times"></i> Cancel</a>
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
function remove_product(id)
{
    confirmation = confirm('Are you sure to remove the product ');
    if(confirmation==true)
    {
        
            url = "{{url('admin/productdeals/removeprd')}}";
            console.log(url);
            $.ajax({
           type:'POST',
           url:url,

            data:{
                id:id,  
                
           },
           success:function(result){
               $('#row'+id).remove();
               toastr.success("Product removed Successfully");

            }
            });
    }
    
}
function removeimage(id){
    confirmation = confirm('Are you sure to remove the Image ');
    if(confirmation==true)
    {
        
            url = "{{url('admin/productdeals/removeimage')}}";
            console.log(url);
            $.ajax({
           type:'POST',
           url:url,

            data:{
                id:id,         
           },
           success:function(result){
               $('#imagediv').remove();
               toastr.success("Image  removed Successfully");

            }
            });
    }
}
function update_qty(id)
{
    prdouctqty = $('#updateqty'+id).val();


        $.ajaxSetup({
				headers:{'X-CSRF-Token':'{{csrf_token()}}'}
            });
            url = "{{url('admin/productdeals/prdouctqty')}}";
            console.log(url);
            $.ajax({
           type:'POST',
           url:url,

            data:{
                id:id, 
                prdouctqty:prdouctqty 
                
           },
           success:function(result){
               
               toastr.success("proudct Quantity Updated Successfully");
           }
            });
    
    
}
function checkdate()
{
    var start_date = $('#start_date').val();
    var end_date = $('#end_date').val();
    

    if(end_date===''||start_date==='')
    {}
    else{
        if(end_date<start_date){
           $('#message').html("<i class='fa fa-times-circle'></i> Start Date can not be greater than the Ending Date");
            $('#button').prop('disabled',true);
        }
        else{
            $('#message').html("");
            $('#button').prop('disabled',false);
        
        }
    }
}
let j=1;
$(document).ready(function(){
    $('#addcolor').click(function(){
        $('#colortable').show(2000);
        let row = '';
        
        var document_array = <?php echo json_encode($products,JSON_PRETTY_PRINT)?>;
        
        row+='<tr>';
           
        row+='<td>';
            
        row+='<select name="product_id[]" class="form-control rounded-0">';
            
            for (let i = 0; i < document_array.length; i++) {
                row+='<option value="'+document_array[i]["id"]+'">'+document_array[i]["product_name"]+'</option>';
            }
            row+='</select>';
        row+='</td>';
        row+='<td>';
        
        row+='<input type="number" required min="1" class="form-control rounded-0 " placeholder="Quantity in Deal " name="quantity[]" value="1">';
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
            $('#colortable').hide();
         }  
      
        });

    $("#addon").validate({
    ignore: ':hidden:not(:checkbox)',
    errorElement: 'label',
    errorClass: 'is-invalid',
    validClass: 'is-valid',
    rules: {
        product_id:{
            required:true
        },
        svgimage:{
            required:true
        },
        color_code:{
            required:true
        },
        
        }
});




</script>
@endsection


