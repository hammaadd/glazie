@section("footer")
<style>
    .about_us:hover{
        color: deepskyblue;
    }
</style>
<div class="container-fluid mt-2">
  <div class="jumbotron">
    <div class="row">
        <div class="col-md-3">
            <img src="{{asset('admin-assets/images/logo/logo.png')}}" alt=""> <br>
            <a href="#"><i class="fab fa-linkedin-in m-2"></i></a>
            <a href="#"><i class="fab fa-facebook-f m-2"></i></a>
            <a href="#"><i class="fab fa-twitter m-2"></i></a>
            <a href="#"><i class="fab fa-youtube m-2 text-danger"></i></a>
        </div>
        <div class="col-md-3">
            <h2 class="font-20 text-info"> Get to Know Us</h2>
            <a href="#" class="about_us text-dark">About Us</a>
        </div>
        <div class="col-md-3">
            <h2> Get Help</h2>
            <a href="#">Send Feedback</a>
            <a href="#">Contact Us</a>
        </div>
        <div class="col-md-3">
            <form action="{{url('subscribe')}}" method="post" >
                <div class="form-group">
                    @csrf
                    <input type="email" class="form-control" style="border-radius: 20px" placeholder="@ Your Email" name="email" >
                    <button class="badge badge-pill badge-primary btn p-2 mt-3"> Subscribe</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>

</body>

</html>
<script>
    $(document).ready(function(){
        $.ajaxSetup({
				headers:{'X-CSRF-Token':'{{csrf_token()}}'}
            });
            url = "{{url('countproduct')}}";
            $.ajax({
           type:'POST',
           url:url,
           success:function(result){
                   // $('#cart_item').html(result);
                    if (parseInt(result)!=0) {
                        $('#cart_items').show();
                        $('#cart_items').html(result);
                    }
                    else{
                        $('#cart_items').hide();
                    }
}
         		  	
           		
            });
            url = "{{url('getnavlinks')}}";
            $.ajax({
           type:'POST',
           url:url,
           success:function(result){
            //console.log(result);
            $('#dropdownlink').html(result);
       
}
         		  	
           		
            });
    });
  </script>