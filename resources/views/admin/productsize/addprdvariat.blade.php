@extends('admin-layout.layouts')
@section('title','Add Product Variation ')
@section('content')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />

<div class="page-container">
    <div class="main-content">
        <div class="page-header">
            <h2 class="header-title">Add Product Variation </h2>
            <div class="header-sub-title float-right">
                <nav class="breadcrumb breadcrumb-dash">
                    <a href="#" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Home</a>
                    <a class="breadcrumb-item" href="#">Add Product Variation</a>
                    
                </nav>
            </div>
        </div>
        <div class="row">
            
            <div class="col-md-6 offset-md-3" >
                <div class="card">
                    <form action="{{ url('admin/prdvariation/create/'.$id)}}"  method="post" enctype="multipart/form-data" id="create_size">
                    <div class="card-header">
                        <h4 class="card-title">Add Product Variation</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                        @if(count($errors)>0)
                                @foreach($errors->all() as $error)
                                <div class="col-md-6">
                                    <div class="alert alert-danger">
                                        {{$error}}
                                    </div>
                                </div>
                                @endforeach
                            @endif
                        </div>
                        
                        @csrf             
                        @for($i=0;$i<$count;$i++)
                        <div class="row mt-3">
                            <div class="col-md-12">
                                <label for="">{{$attrbute_array[$i]}}</label>
                                @php
                                    $j=$i+1;
                                @endphp
                                <select name="terms[]" required id="variation{{$j}}" class="form-control" onchange="checkvariation({{$j}})">
                                    <option value="">Select {{$attrbute_array[$i]}}</option>
                                    @foreach ($dataarray[$i] as $terms)
                                        <option value="{{$terms->id}}">{{$terms->term->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>   
                        @endfor   
                        <div class="row">
                            <div class="col-md-12">
                                <label for="">Price </label>
                                <input type="number" class="form-control" name="price" placeholder="Price" value="0" min="0">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <span class="text-danger text-center mt-3" id="message"></span>
                            </div> 
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-success mt-3" id="submitbutton"><i class="fa fa-plus"></i> Add Product Variation</button>
                            <a href="{{url('admin/products/view/'.$id."#product-variation") }}" class="btn btn-danger mt-3 ml-3"> <i class="fa fa-times"></i> Cancel</a>
                       
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
            
        </div>
      
    </div> 

@endsection
@section('script')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script>
    let term_id_array = Array();
    let idarray = Array();
    
    function checkvariation(i)
    {
        let k=-1;   
        var variation = $('#variation'+i).val();
        var product_id = {{$id}};
        var attribute_length = {{$j}};
        for (let j = 0; j < idarray.length; j++) {
            if(i==idarray[j])
            {
                k=j;
            }

            
        }
        if(k==-1){
           idarray.push(i);
           term_id_array.push(variation); 
        }
        else{
            term_id_array[k] = variation;
            idarray[k]= i;
        }

        console.log(term_id_array);
        if(term_id_array.length==attribute_length){
        $.ajaxSetup({
				headers:{'X-CSRF-Token':'{{csrf_token()}}'}
            });
            url = "{{url('admin/products/chceckvariation')}}";
            //console.log(url);
            $.ajax({
           type:'POST',
           url:url,
            data:{
                 
                product_id:product_id,
                attribute_length:attribute_length,
                term_id_array:term_id_array

           },
           success:function(result){
               //console.log(result);
            if(result==0){
                $('#submitbutton').prop('disabled',true);
                $('#message').html("<i class='fa fa-times-circle'></i><b> This variation is already exist</b>");
            }
            else{
                $('#submitbutton').prop('disabled',false);
                $('#message').html("");
            }
           }
            });
        }
    }
</script>
@endsection
