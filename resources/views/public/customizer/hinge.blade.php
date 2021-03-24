<section class="section product-section">
    <div class="title-box">
      <div class="container">
          <!--Sec Title-->
          <div class="sec-title text-center">
              <div class="title-inner">
                  <h2>What type of <span class="theme_color">Hinge</span> would you like?</h2>
              </div>
          </div>
      </div>
  </div>

  <div class="lower-section pt-0">
      <div class="lower-inner-section">
          <div class="container">
              <div class="row">
                  <div class="col-12">
                      <div id="owl-hing" class="owl-builder owl-carousel owl-theme">
                         
                         @foreach ($hinges as $hinge)
                         @if($hinge->hingeside=='left')
                         <li class="item list-unstyled text-center">
                            <button type="button" class="button-door border-0 bg-transparent my-5 w-100" onclick="setprice({{$hinge->id}},0,11)">
                                <div class="door">
                                    <img class="door-image" src="{{asset('admin-assets/addon/hinge/2.PNG')}}" align="">
                                </div>
                            </button>
                        </li>
                        @endif
                        @if($hinge->hingeside=='right')
                        <li class="item list-unstyled text-center">
                           <button type="button" class="button-door border-0 bg-transparent my-5 w-100" onclick="setprice({{$hinge->id}},0,11)">
                               <div class="door">
                                   <img class="door-image" src="{{asset('admin-assets/addon/hinge/1.PNG')}}" align="">
                               </div>
                           </button>
                       </li>
                       @endif
                         @endforeach
                       
                      </div>
                      <div class="customNavigation">
                          <a class="btn btn-fill-out theme_bgcolor2 text-white px-4 rounded-0 py-2 btnFurniture">Prev</a>
                          <!-- <a class="btn btn-fill-out theme_bgcolor2 text-white px-4 rounded-0 py-2 float-end btnFurniture">Next</a> -->
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>						

</section>
    <!-- JS Libraries -->
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
 