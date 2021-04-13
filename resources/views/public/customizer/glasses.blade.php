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
						    	<button type="button" class="button-door border-0 bg-transparent my-5 w-100" onclick="setprice({{$glass->id}},{{$glass->frame_price}},3);setimag({{$key}})">
						    		<div class="door" id="doorimage{{$key}}">
						    			{{-- <img class="door-image" src="{{asset('admin-assets/addon/glass/'.$glass->image)}}" align=""> --}}
										<object type="image/svg+xml" id="img_door<?php echo $key ?>" data="{{asset('admin-assets/addon/glass/'.$glass->image)}}" class="door-image" onload="setdoorColor({{$key}})"></object>
						    		</div>
						    	</button>
						    </li>
                            @endforeach
						</div>
						<div class="customNavigation">
							<a class="btn btn-fill-out theme_bgcolor2 text-white px-4 rounded-0 py-2 " onclick="get_internal()">Prev</a>
						    <a class="btn btn-fill-out theme_bgcolor2 text-white px-4 rounded-0 py-2 float-end " onclick="openframe()">Next</a>
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
	
			var aa = document.getElementById("img_door"+id);

		    var svgDoca = aa.contentDocument;
			//console.log(svgDoca);
		    var svgItema = svgDoca.getElementById("main_color");
			
            var  innertaga= svgItema.querySelector('polyline');
			var color = $('#doorcolor').val();
			
			svgItem = innertaga.style.fill = color;
			
		}
		function setimag(id)
		{
			var aa = document.getElementById("doorimage"+id);
			var row = aa.childNodes;
			
			//aa.appendChild(row[1]);

			 
			 $('#doorimag').html(row[1]);
			// $('#doorimag').html(aa);
			aa.appendChild(row[1]);
			// aa.setAttribute('id','main_image');

			// //console.log(image);
			// var color = $('#doorcolor').val();
			// $('#main_image').attr('data', image);
			// //alert(color);	
			// var m = document.getElementById('main_image');
			// //console.log(m);

			// var mod = m.contentDocument;
			// //console.log(mod);
			// var modelglasses = mod.getElementById("main_color");
			// //console.log(modelglasses);
			// var  modelinnertag= modelglasses.querySelector('polyline');
			// console.log(modelinnertag);
			// //console.log(color);
			// svgItem = modelinnertag.style.fill = color;

			
			
		}
		// function abc()
		// {
		// 	alert();
		// 	var m = document.getElementById('main_image');
		// 	console.log(m);
		// 	var mod = m.contentDocument;
		// 	var color = $('#doorcolor').val();
		// 	var modelglasses = mod.getElementById("main_color");
		// 	var  modelinnertag= modelglasses.querySelector('polyline');
		// 	modelinnertag.style.fill = color;
		// }
        
    
 
    </script>
	  @else
	  <h3 class="text-center">Selected Model has no Glass</h3>
	  @endif