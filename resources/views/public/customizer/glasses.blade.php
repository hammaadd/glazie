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
                            @foreach ($glasses as $glass)
						    <li class="item list-unstyled text-center" >
						    	<button type="button" class="button-door border-0 bg-transparent my-5 w-100" onclick="setprice({{$glass->id}},{{$glass->frame_price}},3)">
						    		<div class="door">
						    			<img class="door-image" src="{{asset('admin-assets/addon/glass/'.$glass->image)}}" align="">
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
        
    
 
    </script>
	  @else
	  <h3 class="text-center">Selected Model has no Glass</h3>
	  @endif