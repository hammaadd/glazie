       @section("footer")
       </div>
    </div>
    <div class="container-fluid mt-2"style="padding-right: 0px !important;">
        <div class="jumbotron" style="margin-bottom: 0px !important;border-radius: 0px;">
            <div class="row">
                <div class="col-md-4">
                    
                </div>
                <div class="col-md-4">
                    <h2> Get Help</h2>
                    <a href="{{url('contact-us')}}">Contact Us</a>
                </div>
                <div class="col-md-4">
                    <form action="{{url('subscribe')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <input type="email" required style="border-radius: 20px" class="form-control rounded-0" placeholder="Enter Email Address" name="email">
                            <button class="badge badge-pill badge-primary btn p-2 mt-3"> Subscribe</button>
                        </div>
                    </form>
                </div>
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