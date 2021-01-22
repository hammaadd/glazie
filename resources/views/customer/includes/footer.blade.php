       @section("footer")
       </div>
    </div>
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
                          <input type="text" class="form-control" style="border-radius: 20px" placeholder="@ Your Email" name="email" >
                          <button class="badge badge-pill badge-primary btn p-2 mt-3"> Subscribe</button>
                      </div>
                  </form>
              </div>
          </div>
      </div>
    <!-- Core Vendors JS -->
    <script src="{{ asset('toast/toastr.min.js')}}"></script>
    <script src="{{ asset('toast/jquery.min.js')}}"></script>
    <script src="{{ asset('admin-assets/js/vendors.min.js')}}"></script>
    

    <!-- page js -->

    <!-- Core JS -->
    <script src="{{ asset('admin-assets/js/app.min.js')}}"></script>
 
</body>

</html>