@section("footer")
<footer class="footer">

    <div class="footer-top">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="nw-heading">
                        <h3>Subscribe Our Newsletter</h3>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="newsletter_form">
                        <form action="{{url('subscribe')}}" method="post">
                            @csrf
                            <input type="email" required class="form-control rounded-0" placeholder="Enter Email Address" name="email">
                            <button type="submit" class="btn btn-dark rounded-0" name="submit" value="Submit">Subscribe</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-middle">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="footer-column">
                        <div class="footer-logo">
                            <a href="index.html">
                                <img src="{{asset('assets/media/footer-logo.png')}}" alt="Double Glaze Windows and Doors">
                            </a>
                        </div>

                        <p>We’re always keen to provide Help and support whether that’s answering your questions, preparing quotes or outlining the step-by-step processes.We are improving with time and making it easier for you to get in touch.</p>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="footer-column">
                        <h5>Company</h5>
                        <ul class="list-unstyled footer-menu">
                            <li><a href="#">Fitting Service</a></li>
                            <li><a href="#">Our Guarantee</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="{{url('contact-us')}}">Contact us</a></li>
                            <li><a href="#">About us</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="footer-column">
                        <h5>Useful Links</h5>
                        <ul class="list-unstyled footer-menu">
                            <li><a href="#">UPVC Windows</a></li>
                            <li><a href="#">UPVC Sash Windows</a></li>
                            <li><a href="#">Composite Doors</a></li>
                            <li><a href="#">Aluminium Bifold Doors</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="footer-column">
                        <h5>Contact Info</h5>
                        <ul class="list-unstyled contact-info-footer">
                            <li>
                                <i class='bx bx-phone'></i>
                                <p>08004480556</p>
                            </li>
                            <li>
                                <i class='bx bx-paper-plane'></i>
                                <p><a href="mailto:enquiries@glazieltd.co.uk">enquiries@glazieltd.co.uk</a></p>
                            </li>
                            <li>
                                <i class='bx bx-time'></i>
                                <p>Mon-Fri 9:00-5:00pm Sat 9:00-1:00pm</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="container">
            <div class="row align-items-md-center">
                <div class="col-md-6">
                    <div class="dt-sc-copyright text-center text-md-start mb-3 mb-md-0">
                        <p>Copyright © 2020 Glazie LTD</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="custom-sub-nav text-center text-md-end">
                        <ul class="dt-custom-nav list-unstyled">
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Terms and Conditions</a></li>
                            <li><a href="#">Refund Policy</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

    <script src="{{asset('assets/js/jquery.min.js')}}"></script>
	<script src="{{asset('assets/vendors/bootstrap/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('assets/vendors/owlcarousel/js/owlcarousel.min.js')}}"></script>
	<script src="{{asset('assets/vendors/videopopup/js/videopopup.js')}}"></script>
	<script src="{{asset('assets/js/script.js')}}"></script>
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
            url = "{{url('getmail')}}";
            $.ajax({
           type:'POST',
           url:url,
           success:function(result){
            var length = result.length;
            var email = phone = '';
            //console.log(result);
            for (let index = 0; index < result.length; index++) {
                if (result[index]['key']=="admin_phone") {
                $('#phoneno').html(result[index]['value']);
                $('#phone_link').prop('href','tel:'+result[index]['value']);
                }
                if (result[index]['key']=="admin_email") {
                $('#adminmail').html(result[index]['value']);
                $('#mail_link').prop('href','mailto:'+result[index]['value']);
                }
                
                
            }
       
            }	
            });
    });
  </script>