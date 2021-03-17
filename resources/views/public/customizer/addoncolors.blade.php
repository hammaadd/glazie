
<section class="section product-section">
    <div class="title-box">
      <div class="container">
          <!--Sec Title-->
          <div class="sec-title text-center">
              <div class="title-inner">
                  <h2>Choose Your <span class="theme_color">External Color</span></h2>
              </div>
          </div>
      </div>
  </div>

  <div class="lower-section pt-0">
      <div class="lower-inner-section">
          <div class="container">
              <div class="row">
                  <div class="col-12">
                      <div id="owl-external-color" class="owl-builder owl-carousel owl-theme">
                        @foreach ($colors as $color)
                            
                     
                        <li class="item list-unstyled text-center">
                            <button type="button" class="button-door border-0 bg-transparent my-5 w-100" onclick="fun({{$color->id}})">
                                <div class="door">
                                    <div class="door-image" style="background-color: {{$color->color_code}};height:100px;width:100px; border-radius:50%;"></div>
                                    {{-- <img class="door-image" src="https://www.apeer.co.uk/cmsfiles/doorbuilder/doors.g/ACDA2__c-ffffff.svg" align=""> --}}
                                </div>
                            </button>
                        </li>
                        @endforeach
                      </div>
                      <div class="customNavigation">
                          <a class="btn btn-fill-out theme_bgcolor2 text-white px-4 rounded-0 py-2 btnSize">Prev</a>
                          <a class="btn btn-fill-out theme_bgcolor2 text-white px-4 rounded-0 py-2 float-end btninternalColor">Next</a>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>						

</section>
