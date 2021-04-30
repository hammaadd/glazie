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
                            <button type="button" class="button-door border-0 bg-transparent my-5 w-100" onclick="setprice({{$hinge->id}},0,11);hingVal('left')">
                                <div class="door">
                                    <img class="door-image" src="{{asset('admin-assets/addon/hinge/2.PNG')}}" align="">
                                </div>
                            </button>
                        </li>
                        @endif
                        @if($hinge->hingeside=='right')
                        <li class="item list-unstyled text-center">
                           <button type="button" class="button-door border-0 bg-transparent my-5 w-100" onclick="setprice({{$hinge->id}},0,11);hingVal('right')">
                               <div class="door">
                                   <img class="door-image" src="{{asset('admin-assets/addon/hinge/1.PNG')}}" align="">
                               </div>
                           </button>
                       </li>
                       @endif
                         @endforeach
                       
                      </div>
                      <div class="customNavigation">
                          <a class="btn btn-fill-out theme_bgcolor2 text-white px-4 rounded-0 py-2 " onclick="framinternal()">Prev</a>
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
        function hingVal(val){
            if(val == 'left'){
                var fdoor = document.getElementById("main_image");
                var mainsvgFDoc = fdoor.contentDocument;
                var fdoor = mainsvgFDoc.getElementById("left_handle");

                inner = fdoor.childNodes[0];
                base64 = inner.getAttribute("xlink:href");
                if (fdoor.hasChildNodes()) {
                    var st = fdoor.removeChild(fdoor.childNodes[0]);
                }
                
                var lftdoor = mainsvgFDoc.getElementById("right_handle");
                setTimeout(function() {
                    var x = document.createElementNS("http://www.w3.org/2000/svg","image");
                    x.setAttributeNS('http://www.w3.org/1999/xlink',"xlink:href",base64);
                    x.setAttributeNS(null,"class","cls-22");
                    x.setAttributeNS(null,"x","308.1");
                    x.setAttributeNS(null,"y","203");
                    x.setAttributeNS(null,"width","100");
                    x.setAttributeNS(null,"height","615");
                    lftdoor = lftdoor.appendChild(x);
                }, 500);
            }
            if(val == 'right'){
                var fdoor = document.getElementById("main_image");
                var mainsvgFDoc = fdoor.contentDocument;
                var fdoor = mainsvgFDoc.getElementById("right_handle");
                inner = fdoor.childNodes[0];
                base64 = inner.getAttribute("xlink:href");
                if (fdoor.hasChildNodes()) {
                    var st = fdoor.removeChild(fdoor.childNodes[0]);
                }
                var lftdoor = mainsvgFDoc.getElementById("left_handle");
                if (lftdoor.hasChildNodes()) {
                    var st = lftdoor.removeChild(lftdoor.childNodes[0]);
                }
                setTimeout(function() {
                    var x = document.createElementNS("http://www.w3.org/2000/svg","image");
                    x.setAttributeNS('http://www.w3.org/1999/xlink',"xlink:href",base64);
                    x.setAttributeNS(null,"class","cls-22");
                    x.setAttributeNS(null,"x","-2");
                    x.setAttributeNS(null,"y","203");
                    x.setAttributeNS(null,"width","100");
                    x.setAttributeNS(null,"height","615");
                    lftdoor = lftdoor.appendChild(x);
                }, 500);
                // if (fdoor.hasChildNodes()) {
                //     var st = fdoor.removeChild(fdoor.childNodes[0]);
                // }
                // var item = mainsvgFDoc.getElementById("left_handle").childNodes[0];
                // item.replaceChild(righthinge, item.childNodes[0]);
                // var lftdoor = mainsvgFDoc.getElementById("left_handle");
                // if (lftdoor.hasChildNodes()) {
                //     var st = lftdoor.removeChild(lftdoor.childNodes[0]);
                // }
                // $("#left_handle").prepend(righthinge);
                // console.log(righthinge);
            }
            
        }
    </script>
 