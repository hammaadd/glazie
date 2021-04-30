@if(count($frames)>0)
<link rel="stylesheet" href="{{asset('assets2/vendors/animate/animate.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets2/vendors/bootstrap/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets2/vendors/owlcarousel/css/owlcarousel.min.css')}}">
	<!-- <link rel="stylesheet" href="{{asset('assets2/vendors/fontawesome/css/all.min.css')}}"> -->
	<link rel="stylesheet" href="{{asset('assets2/vendors/boxicons/css/boxicons.min.css')}}">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<script src="{{asset('assets2/js/svg-inject.js')}}"></script>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Roboto:wght@300;400;500;700&display=swap">
	<link rel="stylesheet" href="{{asset('assets2/css/style.css')}}">
<section class="section product-section">
			      		<div class="title-box">
							<div class="container">
								<!--Sec Title-->
								<div class="sec-title text-center">
									<div class="title-inner">
										<h2>What type of <span class="theme_color">Frame</span> would you like?</h2>
									</div>
								</div>
							</div>
						</div>

						<div class="lower-section pt-0">
							<div class="lower-inner-section">
								<div class="container">
									<div class="row">
										<div class="col-12">
											<div id="owl-frame" class="owl-builder owl-carousel owl-theme">
                                                @foreach ($frames as $key => $frame)
                                                    
                                                
											    <li class="item list-unstyled text-center">
											    	<button type="button" class="button-door border-0 bg-transparent my-5 w-100" onclick="addFrameImageN({{$frame->id}},{{$frame->frame_price}},'{{url('admin-assets/addon/frame/'.$frame->image)}}')">
											    		<div class="door">
                                                           
											    			<object type="image/svg+xml" 
											    			onload="doorGlassIm('{{url('admin-assets/addon/frame/'.$frame->image)}}'),{{$key}}" id="frame_svg<?php echo $key ?>" class="door-image" data="{{asset('admin-assets/addon/frame/'.$frame->image)}}" align=""></object>
											    		</div>
											    	</button>
											    </li>
                                                @endforeach
											   
											   
											    
											</div>
											<div class="customNavigation">
												<a class="btn btn-fill-out theme_bgcolor2 text-white px-4 rounded-0 py-2 " onclick="openglass()">Prev</a>
											    <a class="btn btn-fill-out theme_bgcolor2 text-white px-4 rounded-0 py-2 float-end " onclick="frame_ex_color();framedata()">Next</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>						

			      	</section>
    <script src="{{asset('assets2/js/jquery.min.js')}}"></script>
	<script src="{{asset('assets2/vendors/bootstrap/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('assets2/vendors/owlcarousel/js/owlcarousel.min.js')}}"></script>
	<script src="{{asset('assets2/vendors/videopopup/js/videopopup.js')}}"></script>
	<script src="{{asset('assets2/js/script.js')}}"></script>
	<script>
		
		// function doorGlassIm(image,id){
		// 	var a = document.getElementById("frame_svg"+id);
  //           //var mainsvgDoc = a.contentDocument;
  //           //console.log(a);
		// }
		
			// var image = $('#door_pic').val();
			// image_name = '<?php echo asset("admin-assets/addon/glass/"); ?>'+'/'+image;
			// a = document.getElementById("doorimage");
			// doc = a.children[0];
			// doc = doc.getElementById("door");
			// //console.log(doc);
			// // //final = doc.innerHTML='';
			// // if (doc.hasChildNodes()) {
   // //              var st = doc.removeChild(doc.childNodes[0]);
   // //          }
		//}

		
		
	</script>
    @else
	<h3 class="text-center">Selected Model has no frame</h3>
	@endif