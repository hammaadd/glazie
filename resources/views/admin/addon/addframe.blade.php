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
            <h1 class="header-title">Add Frame</h1>
            <div class="header-sub-title float-right">
                <nav class="breadcrumb breadcrumb-dash ">
                    <a href="{{url('admin/dashboard')}}" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Home</a>
                    <a href="{{url('admin/addon/view/'.$id)}}" class="breadcrumb-item">Model</a>
                    <a class="breadcrumb-item" href="#">Add Frame</a>
                    
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
                        <form action="{{url('admin/createframe')}}" method="post" enctype="multipart/form-data" id="addon">
                            @csrf
                            <div class="row">
                               
                                <div class="col-md-6">
                                    <label for="">Frame Name </label>
                                    <input type="text" class="form-control rounded-0" name="model_name" placeholder="Enter Model Name">
                                </div>
                          
                                <div class="col-md-6">
                                    <label for="">Image <small>(Svg Only)</small></label>
                                    <input type="file" class="form-control rounded-0" name="image">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-6">
                                    <label for="">Price</label>
                                    <input type="number" class="form-control rounded-0" name="price" placeholder="Price of the Frame">
                                </div>
                                <div class="col-md-6">
                                    <label>Quantity</label>
                                    <input type="hidden" name="addon_id" value="{{$id}}">
                                    <input type="number" class="form-control rounded-0" placeholder="Quantity" name="quantity">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="">Weight <small class="text-danger">(KG)</small></label>
                                    <input type="number" class="form-control rounded-0" name="weight" placeholder="Enter Weight in Kg" min="1">
                                </div>
                                <div class="col-md-6">
                                    <label for="">Height <small class="text-danger">(cm)</small></label>
                                    <input type="number" class="form-control rounded-0" name="height" placeholder="Enter Height " min="1">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="">Width <small class="text-danger">(cm)</small></label>
                                    <input type="number" class="form-control rounded-0" name="width" placeholder="Enter Width" min="1">
                                </div>
                                <div class="col-md-6">
                                    <label for="">Length <small class="text-danger">(cm)</small></label>
                                    <input type="number" class="form-control rounded-0" name="length" placeholder="Enter Length" min="1">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <button type="button" class="btn btn-success btn-xs float-right m-3" id="addexternalcolor"><i class="fa fa-plus-circle"></i> Add External Color</button>
                                </div>
                            </div>
                           
                            <div class="row">
                               <div class="col-md-12">
                                   <div class="table-responsive" >
                                    <table class="table" id="externalcolor" style="display: none">
                                        <thead>
                                            <th>Value</th>
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
                                    <button type="button" class="btn btn-success btn-xs float-right m-3" id="addinternalcolor"><i class="fa fa-plus-circle"></i> Add Internal Color</button>
                                </div>
                            </div>
                            
                            <div class="row">
                               <div class="col-md-12">
                                   <div class="table-responsive" >
                                    <table class="table" id="internalcolor" style="display: none">
                                        <thead>
                                           
                                            <th>Color Value</th>
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
                                    <button type="submit" class="btn btn-success" ><i class="fa fa-check"> Submit</i></button>
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
    $('#addexternalcolor').click(function(){
        var document_array = <?php echo json_encode($colors,JSON_PRETTY_PRINT)?>;
        let row = '';
        
        $('#externalcolor').show();
        row+='<tr>';
        
        row+='<td>';
        row+='<select name="extercolor_code[]" class="form-control rounded-0">';
            
            for (let i = 0; i < document_array.length; i++) {
                row+='<option value="'+document_array[i]["id"]+'">'+document_array[i]["name"]+'</option>';
            }
            row+='</select>';
        row+='</td>';
        row+='<td>';
        
        row+='<input type="number" required min="1" class="form-control rounded-0 " placeholder="Color Price" name="exterprice[]">';
        row+='</td>';
        row+='<td>';
        row+='<input type="number" class="form-control rounded-0 " name="exterquantity[]" placeholder="Enter Quantity" required >';
        row+='</td>';
        row+='<td>';
        row+='<button class="btn btn-danger btn-xs removecolor"  type="button"> <i class="fa fa-minus"></i> </button>';
        row+='</td>';
        row+='</tr>';
       
        $('#externalcolor').append(row);
        j++;
    });
    $('#addinternalcolor').click(function(){
        var document_array = <?php echo json_encode($colors,JSON_PRETTY_PRINT)?>;
       let row = '';
       
       $('#internalcolor').show();
       row+='<tr>';
        
        row+='<td>';
        row+='<select name="intercolor_code[]" class="form-control rounded-0">';
            
            for (let i = 0; i < document_array.length; i++) {
                row+='<option value="'+document_array[i]["id"]+'">'+document_array[i]["name"]+'</option>';
            }
            row+='</select>';
        row+='</td>';
        row+='<td>';
        
        row+='<input type="number" required min="1" class="form-control rounded-0 " placeholder="Color Price" name="interprice[]">';
        row+='</td>';
        row+='<td>';
        row+='<input type="number" class="form-control rounded-0 " name="interquantity[]" placeholder="Enter Quantity" required >';
        row+='</td>';
        row+='<td>';
        row+='<button class="btn btn-danger btn-xs removecolor"  type="button"> <i class="fa fa-minus"></i> </button>';
        row+='</td>';
        row+='</tr>';
       
        
       $('#internalcolor').append(row);
       j++;
   });
   
    
});
$(document).on('click', '.removecolor', function(){
     
       
        $(this).closest("tr").remove();
        j--;
         if(j==1){
            $('#table').hide();
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


