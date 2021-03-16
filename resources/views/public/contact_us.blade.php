@extends('public/layouts/layouts')
@section('title','Product Cart')
<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 mt-3">
            <h2 class="text-center">Contact Us</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            @if(count($errors)>0)
                                @foreach($errors->all() as $error)
                                <div class="col-md-12">
                                    <div class="alert alert-danger text-light" style="background-color: #e2584c">
                                        {{$error}}
                                    </div>
                                </div>
                                @endforeach
                            @endif
            <form action="{{url('contactsubmit')}}" method="post" id="contactus_form">
                @csrf
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" class="form-control rounded-1" name="name" placeholder="Enter Name">
                </div>
                <div class="form-group">
                    <label for="">Email Address</label>
                    <input type="email" class="form-control rounded-0" name="email" placeholder="Enter Email Address">
                </div>
                <div class="form-group">
                    <label for="">Message</label>
                    <textarea name="message"  rows="10" placeholder="Enter Your Message" class="form-control rounded-0"></textarea>
                </div>
                
                    {{-- <div class="form-group col-lg-12" style="text-align: left;">
                        <div class="g-recaptcha"  id="recptcha"data-sitekey="6Lcaz0caAAAAAMWWjNVkuLGfNwtJDsF9ifbnz6Pc">
                        </div>  
                        
                    </div> --}}
                    
                <div class="form-group mt-4 mb-4">
                    <button class="btn btn-outline-success rounded-0" type="submit" > <i class="fa fa-check"></i> Submit</button>
                    <button class="btn btn-outline-danger rounded-0" type="reset"><i class="fa fa-times"></i> Cancel</button>
                </div>
            </form>
        </div>

    </div>
</div>


@endsection
@section('script')

<script src="{{ url('admin-assets/vendors/jquery-validation/jquery.validate.min.js')}}"></script>
<script src='https://www.google.com/recaptcha/api.js'></script>
<script>

  

$("#contactus_for").validate({
    
    errorElement: 'label',
    errorClass: 'is-invalid',
    validClass: 'is-valid',
    rules: {
        name: {
            required: true
        },
        email: {
            required: true,
            email:true
            
        },
        message: {
            required:true
        },
        receptcha:{
            required:true
        }

    }
});

  

</script>
@endsection
