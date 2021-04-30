<section class="section product-section">
    <div class="title-box">
      <div class="container">
          <!--Sec Title-->
          <div class="sec-title text-center">
              <div class="title-inner">
                  <h2>Choose a default size <span class="theme_color">Your Door</span></h2>
              </div>
          </div>
      </div>
  </div>

  <div class="lower-section pt-0">
      <div class="lower-inner-section">
          <div class="container">
              <div class="row">
                  <div class="col-12">
                      <div id="owl-default-size" class="owl-builder owl-carousel owl-theme">
                          @foreach ($sizes as $size)                          
                          <li class="item list-unstyled text-center">
                              <button type="button" class="button-door border-0 bg-transparent my-5 w-100" onclick="setprice({{$size->id}},{{$size->price}},12)">
                                  <div class="door">
                                      <img class="door-image" src="{{asset('admin-assets/addon/'.$addon->svgimage)}}" align="">
                                  </div>
                                  <span class="defaultsize">{{$size->door_width}} X {{$size->door_height}} </span>
                              </button>
                          </li>
                          @endforeach
                      </div>
                      <div class="customNavigation">
                          <a class="btn btn-fill-out theme_bgcolor2 text-white px-4 rounded-0 py-2  btnModel mb-3">Prev</a>
                          <a class="btn btn-fill-out theme_bgcolor2 text-white px-4 rounded-0 py-2 float-end btnColor mb-3 ">Next</a>
                          <a class="btn btn-fill-out theme_bgcolor2 text-white px-4 rounded-0 py-2 float-end btnSize mb-3 m-3 mt-0">Custom Size</a>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>						

</section>
<script src="assets2/js/jquery.min.js"></script>
<script src="assets2/vendors/bootstrap/js/bootstrap.min.js"></script>
<script src="assets2/vendors/owlcarousel/js/owlcarousel.min.js"></script>
<script src="assets2/vendors/videopopup/js/videopopup.js"></script>
<script src="assets2/js/script.js"></script>

<script type="text/javascript">
  
    $('.owl-builder li button').on('click', function(){
        $('li button.selected').removeClass('selected');
        $(this).addClass('selected');
    });
</script>