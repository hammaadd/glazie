@extends('customer.layouts.layouts')
@section('title','Order List')
@section('content')
<div class="page-container">
    <div class="main-content">
        <div class="page-header">
            <h2 class="header-title">Order List</h2>
            <div class="header-sub-title">
                <nav class="breadcrumb breadcrumb-dash">
                    <a href="#" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Home</a>
                    <a class="breadcrumb-item" href="#">Order List</a>
                    
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Sr #</th>
                                                <th> Total Amount </th>
                                                <th>Discount</th>
                                                <th> Net Amount</th>
                                                <th> Date </th>
                                                <th>Details</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if(count($orders) > 0)
                                                @foreach ($orders as $order)
                                                    <tr>
                                                        <td>{{$loop->iteration}}</td>
                                                        <td>{{$order->total_amount}}</td>
                                                        <td>{{$order->discount}}</td>
                                                        <td>{{$order->net_total}}</td>
                                                        <td>{{$order->created_at}}</td>
                                                        <td><a href="{{url('customer/orderdetails/'.$order->id)}}" class="btn btn-info"> <i class="anticon anticon-eye"></i> View</a></td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                <tr>
                                                    <td colspan="6" style="text-align: center;">No Record Found</td>
                                                </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            
        </div>
        
    </div>

@endsection
@section('script')
<script src="{{url('admin-assets/js/pages/form-elements.js')}}"></script>


   
    <script src="{{ url('admin-assets/vendors/jquery-validation/jquery.validate.min.js')}}"></script>
    <script>
    //     var pwd = document.getElementById('oldpwd');
    //     var eye1 = document.getElementById('eye1');

    //     eye1.addEventListener('click',togglePass);

    //     function togglePass(){
    //     eye1.classList.toggle('active');
        
    //     (pwd.type=='password')? pwd.type='text' :
    //     pwd.type='password';
    //     eye.classList.toggle('active');
        
        

    // }
    //     var newpwd = document.getElementById('newpwd');
    //     var conpwd = document.getElementById('cpassword');
    //     var eye2 = document.getElementById('eye2');

    //     eye2.addEventListener('click',togglePass1);

    //     function togglePass1(){
    //     eye2.classList.toggle('active');
        
    //     (newpwd.type=='password')? newpwd.type='text' :
    //     newpwd.type='password';
    //     (conpwd.type=='password')? conpwd.type='text' :
    //     conpwd.type='password';
    //     eye2.classList.toggle('active');
        
        

    // }
    $("#form-validation").validate({
    ignore: ':hidden:not(:checkbox)',
    errorElement: 'label',
    errorClass: 'is-invalid',
    validClass: 'is-valid',
    rules: {
        oldpwd: {
            required: true
        },
        newpwd: {
            required: true,
            minlength: 8
        },
        conf_password: {
            required: true ,
            equalTo: '#newpwd'  
        }
    }
});

    </script>
@endsection
