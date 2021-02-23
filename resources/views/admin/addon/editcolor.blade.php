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
                    <a href="{{url('admin/addon/view/'.$color->addon_id)}}" class="breadcrumb-item">  Products</a>
                    <a class="breadcrumb-item" href="#">Edit Color</a>
                    
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
                        <form action="{{url('admin/updatecolor/'.$color->id)}}" method="post" enctype="multipart/form-data" id="addon">
                            @csrf
                            <div class="form-group">
                                <label for="">Side</label>
                                <select name="side" class="form-control rounded-0">
                                    <option value="internal"
                                        @if ($color->side=="internal")
                                            selected
                                        @endif
                                    >Internal</option>
                                    <option value="external"
                                    @if ($color->side=="external")
                                            selected
                                        @endif
                                    >External</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Color Name</label>
                                <select name="color_code" class="form-control rounded-0">
                                    @foreach ($colors as $item_color)
                                        <option value="{{$item_color->id}}" 
                                                @if ($color->color_code==$item_color->color_code)
                                                    selected
                                                @endif
                                            >{{$item_color->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Price</label>
                                <input type="number" name="price" class="form-control rounded-0" placeholder="Enter Price" value="{{$color->price}}" min="1" required>
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="addon_id" value="{{$color->addon_id}}">
                                <label for="">Quantity</label>
                                <input type="number" class="form-control rounded-0" name="quantity" placeholder="Enter No of Available Quantity" value="{{$color->quantity}}" min="1" required>
                            </div>
                            
                            
                            <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-success" ><i class="fa fa-check"> Submit</i></button>
                                    <a href="{{url('admin/addon/view/'.$color->addon_id)}}" class="btn btn-danger"> <i class="anticon anticon-close"></i> Cancel</a>
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
        
        var document_array = <?php echo json_encode($colors,JSON_PRETTY_PRINT)?>;
        
        row+='<tr>';
            row+='<td>';
            row+='<select name="side[]" class="form-control">';
            row+='<option vlaue="internal">Internal</option>';
            row+='<option vlaue="internal">External</option>';
            row+='</select>'
            row+='</td>';
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


