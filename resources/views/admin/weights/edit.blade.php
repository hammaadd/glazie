@extends('admin-layout.layouts')
@section('title','Edit Weight  ')
@section('content')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<style>
    img:hover{
        cursor: pointer;
    }
</style>
<div class="page-container">
    <div class="main-content">
        <div class="page-header">
            <h2 class="header-title">Edit WEight</h2>
            <div class="header-sub-title">
                <nav class="breadcrumb breadcrumb-dash float-right">
                    <a href="{{url('admin/dashboard')}}" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Home</a>
                    <a class="breadcrumb-item" href="#">Add New weight Slot</a>
                    
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        @if(count($errors)>0)
                        @foreach($errors->all() as $error)
                        <div class="col-md-12 alert alert-danger text-light" style="background-color: #e2584c">
                            <li class="text-light" style="list-style-type: none">{{$error}}</</li>
                        </div>
                        @endforeach
                    @endif

                        <form action="{{url('admin/weights/update/'.$weights->id)}}" method="post" id="varieties">
                           
                            <div class="form-group">
                                @csrf
                                
                                <label for="">Minimum Weight (KG) </label>
                                <input type="number" class="form-control" name="min_weight" placeholder="Minimum Weight" id="min_weight" oninput="checkweght()" value="{{$weights->min_weight}}">
                            </div>
                            <div class="form-group">
                          
                                
                                <label for="">Maximum Weight (KG) </label>
                                <input type="number" class="form-control" name="max_weight" placeholder="Maximum  Weight" id="max_weight" oninput="checkweght()" value="{{$weights->max_weight}}">
                            </div>
                            <div class="form-group">
                                <label for=""> Price</label>
                                <input type="number" class="form-control" name="price" placeholder="Enter Price" value="{{$weights->price}}" >
                            </div>
                            <div class="formgroup">
                                <span class="text-danger" id="message"></span>
                            </div>

                            
                            <div class="form-group mt-3">
                                <button type="submit" class="btn btn-success" id="btn-check"> <i class="anticon anticon-edit"></i> Update Weight Slot</button>
                                <a href="{{url('admin/weights')}}" class="btn btn-danger" > <i class="fa fa-times"></i> Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        
    </div>

@endsection
@section('script')

<script src="{{url('admin-assets/js/pages/form-elements.js')}}"></script>


    <script src="{{url('admin-assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
    <script src="{{ url('admin-assets/vendors/jquery-validation/jquery.validate.min.js')}}"></script>
    <script>
    $("#varieties").validate({
    ignore: ':hidden:not(:checkbox)',
    errorElement: 'label',
    errorClass: 'is-invalid',
    validClass: 'is-valid',
    rules: {
        min_weight:{
            required:true,
            min:1
        },
        max_weight:{
            required:true,
            min:1
        },
        price:{
            required:true
        },
        }
});
function checkweght()
{
    var min_weight = parseInt($('#min_weight').val());
    var max_weight = parseInt($('#max_weight').val());
    if(min_weight>=max_weight){
        $('#btn-check').prop('disabled',true);
        $('#message').html('<i class="fa fa-times-circle"></i><b> Minimum Weight can not be greater than Minimum Weight</b>')
    }
    else{
        $('#btn-check').prop('disabled',false);
        $('#message').html('');
        
    }
    
}
    </script>
@endsection
