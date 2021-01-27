@extends('public/layouts/layouts')
@section('title','Product Cart')
@section('content')

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />

<div class="container mt-3">
    <div class="row">
        <div class="col-md-12">
            <h3>Billing Address</h3>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-9">
        <form action="{{url('checkoutsubmit')}}" method="post" id="chekcoutform">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <label for="">First Name</label>
                    <input type="text" class="form-control" name="first_name" placeholder="First Name">

                </div>
                <div class="col-md-6">
                    <label for="">Last Name</label>
                    <input type="text" class="form-control" name="last_name" placeholder="Last Name">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label for="">Email </label>
                    <input type="email" class="form-control" name="email" placeholder="Email Address">

                </div>
                <div class="col-md-6">
                    <label for="">Contact No</label>
                    <input type="text" class="form-control" name="contact_no" placeholder="Contact No">
                </div>
            </div>
            
            <div class="row">
                
                <div class="col-md-6">
                    <label for="">Country Name</label>
                    <select name="country"  class="form-control">
                        <option value="" disabled selected>select Country</option>
                        @foreach ($countries as $country)
                            <option value="{{$country->id}}">{{$country->name}}</option>
                        @endforeach
                    </select>
                </div>
                
            
                <div class="col-md-6">
                    <label for="">State </label>
                    <input type="text" class="form-control" id="tags" name="state">

                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label for="">City</label>
                    <input type="text" class="form-control" name="city_name" placeholder="City Name">
                </div>
                
            
                
                <div class="col-md-6">
                    <label for="">Post Code</label>
                    <input type="text" class="form-control" name="post_code" placeholder="Post Code">

                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label for="">Address </label>
                    <input type="text" class="form-control" name="address" placeholder="House No Street No ">

                </div>
                
                
            </div>
            <div class="row">
                <div class="col-md-12 mt-3">
                    <label for=""><input type="checkbox" id="diff_address_check" name="checkshipadd" value="1"> SHIP TO A DIFFERENT ADDRESS?</label>
                </div>
                <div class="col-md-6"></div>
            </div>
            <div id="diff_address" style="display: none" >
               
                <div class="row">  
                    <div class="col-md-6">
                        <label for="">Country Name</label><br>
                        <select name="shipcountry"  class="form-control w-100">
                            <option value="" disabled selected>select Country</option>
                            @foreach ($countries as $country)
                                <option value="{{$country->id}}">{{$country->name}}</option>
                            @endforeach
                        </select>
                    </div>
                  
                    <div class="col-md-6">
                        <label for="">State </label>
                        <input type="text" class="form-control"  name="shipstate" placeholder="Ship State ">
    
                    </div>
                      
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="">City</label>
                        <input type="text" class="form-control" name="shipcity" placeholder="City Name">
                    </div>
                    
                
                    
                    <div class="col-md-6">
                        <label for="">Post Code</label>
                        <input type="text" class="form-control" name="shippost_code" placeholder="Post Code">
    
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="">Address </label>
                        <input type="text" class="form-control" name="shipaddress" placeholder="House No Street No ">
    
                    </div>
                    
                    
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <button class="btn btn-outline-success mt-3"><i class="fa fa-check"></i> Submit</button>
                </div>
            </div>
        </form>
        </div>    
        <div class="col-md-3">
            @php
            $price=$quantity=$regular_price = 0;
                foreach ($carts as $key => $cart) {
                    $quantity+=$cart->quantity;
                    $regular_price +=$cart->quantity*$cart->regular_price;
                    $price +=$cart->quantity*$cart->price; 
                }
            @endphp
            <div class="card">
                <div class="card-header bg-info">
                    <h2 class="text-center">Bill Info</h2>
                </div>
                <div class="card-body">
                    <table class="table">
                       
                        <tr>
                            <th>Total Quantity:</th>
                            <td> <span >{{$quantity}}</span> </td>
                        </tr>
                        <tr>
                            <th>Total Amount</th>
                            <td>{{$regular_price}}</td>
                        </tr>
                        <tr>
                            <th>Discount</th>
                            <td>{{$regular_price-$price}}</td>
                        </tr>
                        <tr>
                            <th>Total Amount:</th>
                            <td><span >{{$price}}</span></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
</div>
@endsection
@section('script')

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

<script src="{{ url('admin-assets/vendors/jquery-validation/jquery.validate.min.js')}}"></script>
    <script>
  
  

    $(document).ready(function(){
        $('#countries').select2();
        });
        $(document).ready(function(){
        $('#shipcountries').select2();
        });
        
        $(document).ready(function(){
            $("#diff_address_check").click(function(){
                if($('#diff_address_check').prop("checked") == true){
                    $('#diff_address').show();
                    $("#chekcoutform").validate({
                    ignore: ':hidden:not(:checkbox)',
                    errorElement: 'label',
                    errorClass: 'is-invalid',
                    validClass: 'is-valid',
                    rules: {
                        first_name: {
                            required: true
                        },
                        last_name: {
                            required: true
                            
                        },
                        email: {
                            required:true
                        },
                        contact_no:{
                            required:true
                        },
                        country:{
                            required:true
                        }
                        ,
                        state:{
                            required:true
                        },
                        city_name:{
                            required:true
                        },
                        address:{
                            required:true
                        },
                        post_code: {
                            required:true
                        },
                        

                    }
                });

                }
                else{
                    $('#diff_address').hide();
                }
                    
                
            });
        });
        $("#chekcoutform").validate({
    ignore: ':hidden:not(:checkbox)',
    errorElement: 'label',
    errorClass: 'is-invalid',
    validClass: 'is-valid',
    rules: {
        first_name: {
            required: true
        },
        last_name: {
            required: true
            
        },
        email: {
            required:true
        },
        contact_no:{
            required:true
        },
        country:{
            required:true
        }
        ,
        state:{
            required:true
        },
        city_name:{
            required:true
        },
        address:{
            required:true
        },
        post_code: {
            required:true
        },
        shipcountry:{
            required:true
        },
        shipstate:{
            required:true
        },
        shipcity:{
            required:true
        },
        shipaddress:{
            required:true
        },
        shippost_code: {
            required:true
        }

    }
});

  

</script>
@endsection
