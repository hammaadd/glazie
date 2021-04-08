

@if(count($internalcolors)>0)
<section class="section product-section">
    <div class="title-box">
        <div class="container">
            <!--Sec Title-->
            <div class="sec-title text-center">
                <div class="title-inner">
                    <h2>Choose Your <span class="theme_color">Internal  Color</span></h2>
                </div>
            </div>
        </div>
    </div>
    <div class="lower-section pt-0">
        <div class="lower-inner-section">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div id="owl-frame-intcolor" class="owl-builder owl-carousel owl-theme">
                            <?php $j=1; ?>
                            @foreach ($internalcolors as $key=> $color)
                              
                            <li class="item list-unstyled text-center selectable_ext">
                                <button type="button" class="button-door border-0 bg-transparent my-5 w-100" onclick="setprice({{$color->id}},{{$color->price}},6)">
                                    <div class="door">
                                    	<object type="image/svg+xml" id="frameinternal{{$key}}"  data="{{asset('admin-assets/addon/frame/'.$frame->image)}}" class="door-image" onload="setColor('{{$color->value}}',{{$key}})"></object>
                                    	
                                    </div>
                                </button>
                            </li>
                         
                            @endforeach
                        </div>
                        <div class="customNavigation">
                            <a class="btn btn-fill-out theme_bgcolor2 text-white px-4 rounded-0 py-2 " onclick="frame_ex_color();framedata()">Prev</a>
                            <a class="btn btn-fill-out theme_bgcolor2 text-white px-4 rounded-0 py-2 float-end " onclick="framglass();">Next</a>
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
  	<script type="text/javascript">
  		
  		function setColor(color,id){
		    colors(color,id);
		}
		function colors(color,id){
         
			var a = document.getElementById("frameinternal"+id);
		    var svgDoc = a.contentDocument;
		    
            var svgItem = svgDoc.getElementById("frame_x5F_colour");

            svgItem = svgItem.childNodes[1].style.fill = color;
          
		}

		
  	</script>
  @else
  <h3 class="text-center"> No Internal  Color Available for selected Model</h3>
  @endif