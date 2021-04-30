
@if(count($frameglass)>0)
<section class="section product-section">
	<div class="title-box">
		<div class="container">
			<!--Sec Title-->
			<div class="sec-title text-center">
				<div class="title-inner">
					<h2>What type of <span class="theme_color">Frame glass</span> would you like?</h2>
				</div>
			</div>
		</div>
	</div>
	<div class="lower-section pt-0">
		<div class="lower-inner-section">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div id="owl-frame-glass" class="owl-builder owl-carousel owl-theme" >
                            @foreach ($frameglass as $frame)
						    <li class="item list-unstyled text-center">
						    	<button type="button" class="button-door border-0 bg-transparent my-5 w-100" onclick="setprice({{$frame->id}},{{$frame->price}},7)">
						    		<div class="door">
						    			<img class="door-image" src="{{asset('admin-assets/addon/frameglass/'.$frame->image)}}" align="">
						    		</div>
						    	</button>
						    </li>
                            @endforeach
						</div>
						<div class="customNavigation">
							<a class="btn btn-fill-out theme_bgcolor2 text-white px-4 rounded-0 py-2 "  onclick="framinternal();internalframecolors()">Prev</a>
						    <a class="btn btn-fill-out theme_bgcolor2 text-white px-4 rounded-0 py-2 float-end " onclick="get_handels()">Next</a>
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
	 <h3>Selected frame has no Frame Glass</h3>
	 @endif