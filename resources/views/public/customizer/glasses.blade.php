@if(count($glasses)>0)
<section class="section product-section">
	<div class="title-box">
		<div class="container">
			<!--Sec Title-->
			<div class="sec-title text-center">
				<div class="title-inner">
					<h2>What type of <span class="theme_color">glass</span> would you like?</h2>
				</div>
			</div>
		</div>
	</div>
	<div class="lower-section pt-0">
		<div class="lower-inner-section">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div id="owl-glass" class="owl-builder owl-carousel owl-theme" >
                            @foreach ($glasses as $key=> $glass)
						    <li class="item list-unstyled text-center" >
						    	<button type="button" class="button-door border-0 bg-transparent my-5 w-100" 
						    	onclick='setprice({{$glass->id}},{{$glass->frame_price}},3);setimag("{{$glass->image}}","{{$glass->id}}")'>
						    		<div class="door" id="doorimage{{$key}}">
						    			{{-- <img class="door-image" src="{{asset('admin-assets/addon/glass/'.$glass->image)}}" align=""> --}}
										<object type="image/svg+xml" id="modelglass<?php echo $key ?>" data="{{asset('admin-assets/addon/glass/'.$glass->image)}}" class="door-image" onload="setdoorColor({{$key}})" ></object>
						    		</div>
						    	</button>
						    </li>
                            @endforeach
						</div>
						<div class="customNavigation">
							<a class="btn btn-fill-out theme_bgcolor2 text-white px-4 rounded-0 py-2 " onclick="gotomodel()()">Prev</a>
						    <a class="btn btn-fill-out theme_bgcolor2 text-white px-4 rounded-0 py-2 float-end " onclick="get_colors()">Next</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
    <!-- JS Libraries -->
  
    <script type="text/javascript">
       
        $('.owl-builder li button').on('click', function(){
            $('li button.selected').removeClass('selected');
            $(this).addClass('selected');
        });
		function setdoorColor(id)
		{
			var a = document.getElementById("modelglass"+id);
		    var svgDoc = a.contentDocument;
		    var svgItem = svgDoc.getElementById("main_color");
            var  innertag= svgItem.querySelector('polyline');
			var color = $('#doorcolor').val();

			svgItem = innertag.style.fill = color;

		}
      //   function setimag(key,id){
      //   	var color = $('#doorcolor').val();
      //   	var b = document.getElementById("main_image");
      //   	var image_name = '<?php echo asset("admin-assets/addon/glass/"); ?>'+'/'+key;
      //       var st = b.setAttribute("data", image_name);
      //       var mainsvgDoc = b.contentDocument;
            
      //       var svgItems = mainsvgDoc.getElementById("main_color");
      //       var new_val = svgItems.id = 'main_color_temp';
      //       var innertag= svgItems.querySelector('polyline');

   			// $('#door_glass').val(id);
   			// $('#door_pic').val(key);
   			// finalDoorGlass.push(b);
            
      //   }
    
 
    </script>
	  @else
	  <h3 class="text-center">Selected Model has no Glass</h3>
	  @endif