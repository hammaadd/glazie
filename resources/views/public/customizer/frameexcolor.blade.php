

@if(count($externalcolors)>0)
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
                        <div id="owl-frame-color" class="owl-builder owl-carousel owl-theme">
                            <?php $j=1; ?>
                            @foreach ($externalcolors as $color)
                              
                            <li class="item list-unstyled text-center selectable_ext">
                                <button type="button" class="button-door border-0 bg-transparent my-5 w-100" onclick="setprice({{$color->id}},{{$color->price}},5)">
                                    <div class="door">
                                    	<object type="image/svg+xml" id="frameex<?php echo $j; ?>"  data="{{asset('admin-assets/addon/frame/'.$frame->image)}}" class="door-image" onload="setColor('{{$color->value}}')"></object>
                                    	
                                    </div>
                                </button>
                            </li>
                            <?php $j++; ?>
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
  		var i = 1;
  		function setColor(color){
		    colors(color);
		}
		function colors(color){
            console.log(color);
			var a = document.getElementById("frameex"+i);
		    var svgDoc = a.contentDocument;
		    
            var svgItem = svgDoc.getElementById("frame_x5F_colour");

            svgItem = svgItem.childNodes[1].style.fill = color;
          
			//svgItem.style.fill = "red";
			
			i++;
		}
  // 		window.onload=function() {
  // 			setColor(color);
		// };
		
  	</script>
  @else
  <h3 class="text-center"> No External Color Available for selected Model</h3>
  @endif