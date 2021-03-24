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
            <h1 class="header-title">Add Furniture</h1>
            <div class="header-sub-title float-right">
                <nav class="breadcrumb breadcrumb-dash ">
                    <a href="{{url('admin/dashboard')}}" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Home</a>
                    <a class="breadcrumb-item" href="{{url('admin/addon/view/'.$id)}}">Product</a>
                    
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
                        <form action="{{url('admin/createfurniture')}}" method="post" enctype="multipart/form-data" id="addon">
                            @csrf

                            <div class="row">
                                <div class="col-md-12">
                                    <button type="button" class="btn btn-success btn-xs float-right" id="addcolor"><i class="fa fa-plus-circle"></i> Add Furniture</button>
                                    
                                </div>
                            </div>
                            <input type="hidden" name="addon_id" value="{{$id}}">
                            <div class="row mt-3" id="datadiv" >

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

       let row='<div class="card card-primary" id="card-data'+j+'">';
         row+='<div class="card-header bg-primary ">';
        row+='<h4 style="color:white;" class="mt-2">Furniture Details</h4>';
        row+='</div>';
        row+='<div class="card-body">';
        row+='<div class="row" >';
        row+='<div class="col-md-11">';
        row+='<div class="row">';
        row+='<div class="col-md-3">';
        row+='<label for=""> Name</label>';
        row+='<input type="text" class="form-control rounded-0" name="name[]" required placeholder="Enter  Name">';
        row+='</div>';
        row+='<div class="col-md-3">';
        row+='<label for=""> Furniture Type</label>';
        row+='<select class="form-control rounded-0" name="type[]" required>';
        row+='<option value="handle">Handle</option>';
        row+='<option value="knocker">Knocker</option>';
        row+='<option value="letterbox">Letter Box</option>';
        row+='</select>';
        row+='</div>';
        row+='<div class="col-md-3">';
        row+='<label for="">Image <small class="text-danger">(Only Svg Image)</small>  </label>';
        row+='<input type="file" class="form-control rounded-0" name="image[]" id="image'+j+'" onchange="abc('+j+')" required>';
        row+='</div>';
        row+='<div class="col-md-3">';
        row+='<label for="">Price</label>';
        row+='<input type="number" class="form-control rounded-0" name="price[]" required placeholder="Enter Price">';
        row+='</div>';
        row+='<div class="col-md-3">';
        row+='<label for="">Quantity</label>';
        row+='<input type="number" class="form-control rounded-0" name="quantity[]" required placeholder="Enter price">';
        row+='</div>';
        row+='<div class="col-md-3">';
        row+='<label for="">Weight <small>(In Kg)</small></label>';
        row+='<input type="number" class="form-control rounded-0" name="weight[]" required placeholder="Enter weight in Kg">';
        row+='</div>';
        row+='<div class="col-md-3">';
        row+='<label for="">Length</label>';
        row+='<input type="number" class="form-control rounded-0" name="length[]" required placeholder="Enter Length">';
        row+='</div>';
        row+='<div class="col-md-3">';
        row+='<label for="">Height</label>';
        row+='<input type="number" class="form-control rounded-0" name="height[]" required placeholder="Enter Frame Height">';
        row+='</div>';
        row+='<div class="col-md-3">';
        row+='<label for="">Width</label>';
        row+='<input type="number" class="form-control rounded-0" name="width[]" required placeholder="Enter Frame Width">';
        row+='</div>';
        row+='</div>';
        row+='</div>';
        row+='<div class="col-md-1">';
        row+='<button class="btn btn-danger mt-5"type="button" onclick="removediv('+j+')" title="remove"><i class="fa fa-minus"></i></button>';
        row+='</div>';
        row+='</div>';
        row+='</div>';
        row+='</div>';
        $('#datadiv').append(row);
        j++;
    });
    
    
});
function removediv(i){
    $('#card-data'+i).remove();
}
function abc(v)
{
    var fuData = document.getElementById('image'+v);
        var FileUploadPath = fuData.value;
        if (FileUploadPath == '') {
            alert("Please upload an image");

        } else {
            var Extension = FileUploadPath.substring(
                    FileUploadPath.lastIndexOf('.') + 1).toLowerCase();
            
if (Extension == "svg"||Extension == "png"  ) {

// To Display
                if (fuData.files && fuData.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#blah').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(fuData.files[0]);
                }

            } 

//The file upload is NOT an image
else {
                alert("Svg, png  Photo only");
                $('#image'+v).val("");
            }
        }
    }



</script>
@endsection


