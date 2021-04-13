<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Customize Your Item</title>
	<meta name="description" content="Bespoke Double glazing supplier and Installer over 25 years experience.Transform your home with premium quality windows and doors contact us.">
	<link rel="icon" href="{{asset('assets2/media/logo.png')}}">
	<link rel="stylesheet" href="{{asset('assets2/vendors/animate/animate.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets2/vendors/bootstrap/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets2/vendors/owlcarousel/css/owlcarousel.min.css')}}">
	 <link rel="stylesheet" href="{{asset('assets2/vendors/fontawesome/css/all.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets2/vendors/boxicons/css/boxicons.min.css')}}">
	{{-- <link rel="preconnect" href="https://fonts.gstatic.com">--}}
	<link rel="stylesheet" href="{{asset('assets2/css2.css')}}">
	<link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
	<!-- Style Libraries -->

	<style type="text/css">
		
.colorsubchild,.framecolorsubchild,.sizesubchild,.furnituresubchild{
	display: none;
}
.defaultsize{
	font-size: 13px;
}



	</style>
<script type="text/javascript">
	var product_info = {};
</script>
</head>
<body>
	<!-- loader -->
	<!-- <div class="preloader">
		<div class="lds-ellipsis">
			<span></span>
			<span></span>
			<span></span>
		</div>
	</div> -->
	<!-- /loader -->

	<div class="wrapper">
		<!-- header -->
		<header class="header">
			<!-- header top -->
			<div class="header-top">
				<div class="container">
					<div class="row align-items-md-center">
						<div class="col-md-6">
							<div class="wl-msg text-center text-md-start mb-3 mb-md-0">
								<p>Welcome to Glazie Customizer</p>
							</div>
						</div>
						<div class="col-md-6">
							<div class="float-md-end text-center text-md-end">
								<ul class="dt-sc-sociable list-inline mb-0">
									<li class="d-inline px-2">
										<a href="#" title="Facebook" target="_blank">
											<i class='bx bxl-facebook'></i>
										</a>
									</li>
									<li class="d-inline px-2">
										<a href="#" title="Linkedin" target="_blank">
											<i class='bx bxl-linkedin'></i>
										</a>
									</li>
									<li class="d-inline px-2">
										<a href="#" title="Twitter" target="_blank">
											<i class='bx bxl-twitter'></i>
										</a>
									</li>
									<li class="d-inline px-2">
										<a href="#" title="Instagram" target="_blank">
											<i class='bx bxl-instagram'></i>
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>

			<!-- header middle -->
			<div class="header-middle">
				<div class="container">
					<div class="row align-items-center">
						<div class="col-xl-3 col-md-2 col-sm-6">
							<div class="logo">
								<a href="{{url('/')}}">
									<img src="assets2/media/glazie-logo.png" alt="Double Glaze Windows and Doors">
								</a>
							</div>
						</div>
						<div class="col-xl-9 col-md-10 col-sm-6">
							<ul class="navbar-nav text-end">
								<li class="nav-item active">
									<a class="nav-link" href="{{url('/')}}">Back To Home</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</header>
		<!-- /header -->

		<div class="builder">
			<div class="row w-100 vh-100">
			  	<div class="col-md-2 theme_bgcolor2 pe-0 pt-3">
			    	<ul class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
			      		<li class="list-unstyled nav-item">
			      			<a class="nav-link rounded-0 active text-white" id="v-pills-model-tab" data-bs-toggle="pill" href="#v-pills-model" role="tab" aria-controls="v-pills-model" aria-selected="true">
			      				<img src="assets2/media/svg/modal.svg" class="pe-3">Model
			      			</a>
			      		</li>
			       		<li class="list-unstyled nav-item parent-child"><a class="nav-link rounded-0 text-white"  onclick="showdoortoggle()"   data-bs-toggle="pill"  role="tab"  aria-selected="true" style="cursor:pointer;"><img src="assets2/media/svg/color.svg" class="pe-3">Door Color</a></li>
			       		<li class="list-unstyled nav-item colorsubchild"><a class="nav-link rounded-0 text-white text-center" id="v-pills-external-color-tab" data-bs-toggle="pill" href="#v-pills-external-color" role="tab" aria-controls="v-pills-external-color" aria-selected="true" onclick="getexternalcolors()"> External Color</a></li>
			        	<li class="list-unstyled nav-item colorsubchild"><a class="nav-link rounded-0 text-white text-center" id="v-pills-internal-color-tab" data-bs-toggle="pill" href="#v-pills-internal-color" role="tab" aria-controls="v-pills-internal-color" aria-selected="true" onclick="get_internalcolors()">Internal Color</a></li>
			      		<li class="list-unstyled nav-item"><a class="nav-link rounded-0 text-white" id="v-pills-glass-tab" data-bs-toggle="pill" href="#v-pills-glass" role="tab" aria-controls="v-pills-glass" aria-selected="true"><img src="assets2/media/svg/glass.svg" class="pe-3">Glass</a></li>
			      		<li class="list-unstyled nav-item"><a class="nav-link rounded-0 text-white" id="v-pills-frame-tab" data-bs-toggle="pill" href="#v-pills-frame" role="tab" aria-controls="v-pills-frame" aria-selected="true"><img src="assets2/media/svg/frame.svg" class="pe-3">Frame</a></li>
			      		<li class="list-unstyled nav-item parent-child"><a class="nav-link rounded-0 text-white" onclick="showframetoggle()"  data-bs-toggle="pill"  role="tab"  aria-selected="true" style="cursor: pointer"><img src="assets2/media/svg/frame-color.svg" class="pe-3"> Frame Color </a></li>
			       		<li class="list-unstyled nav-item text-center framecolorsubchild"><a class="nav-link rounded-0 text-white float-right" id="v-pills-frame-external-color-tab" data-bs-toggle="pill" href="#v-pills-frame-external-color" role="tab" aria-controls="v-pills-frame-external-color" aria-selected="true" onclick="framedata()"> External Color</a></li>
			      		<li class="list-unstyled nav-item framecolorsubchild"><a class="text-center nav-link rounded-0 text-white" id="v-pills-frame-internal-color-tab" data-bs-toggle="pill" href="#v-pills-frame-internal-color" role="tab" aria-controls="v-pills-frame-color" aria-selected="true" onclick="internalframecolors()"> Internal Color</a></li>
			      		<li class="list-unstyled nav-item"><a class="nav-link rounded-0 text-white" id="v-pills-frame-glass-tab" data-bs-toggle="pill" href="#v-pills-frame-glass" role="tab" aria-controls="v-pills-frame-glass" aria-selected="true" onclick="frameglasses()" style="cursor:pointer;"><img src="assets2/media/svg/frame-glass.svg" class="pe-3" >Frame Glass</a></li>
			      		<li class="list-unstyled nav-item"><a class="nav-link rounded-0 text-white"  data-bs-toggle="pill"  onclick="showfurnituretoggle()" aria-controls="v-pills-furniture" aria-selected="true" style="cursor: pointer"><img src="assets2/media/svg/furniture.svg" class="pe-3">Furniture</a></li>
						  <li class="list-unstyled nav-item furnituresubchild"><a class="nav-link rounded-0 text-white text-center" id="v-pills-handels-tab" data-bs-toggle="pill" href="#v-pills-handels" role="tab" aria-controls="v-pills-external-color" aria-selected="true">Handel</a></li>
						  <li class="list-unstyled nav-item furnituresubchild"><a class="nav-link rounded-0 text-white text-center" id="v-pills-knocker-tab" data-bs-toggle="pill" href="#v-pills-knocker" role="tab" aria-controls="v-pills-internal-color" aria-selected="true">Knocker</a></li>
						  <li class="list-unstyled nav-item furnituresubchild"><a class="nav-link rounded-0 text-white text-center" id="v-pills-letterbox-tab" data-bs-toggle="pill" href="#v-pills-letter-box" role="tab" aria-controls="v-pills-external-color" aria-selected="true"> Letter Box</a></li>
						  
			      		<li class="list-unstyled nav-item"><a class="nav-link rounded-0 text-white" id="v-pills-hing-tab" data-bs-toggle="pill" href="#v-pills-hing" role="tab" aria-controls="v-pills-hing" aria-selected="true"><img src="assets2/media/svg/frame-glass.svg" class="pe-3">Hinge</a></li>
			      		<li class="list-unstyled nav-item d-none"><a class="nav-link rounded-0 text-white" id="v-pills-price-tab" data-bs-toggle="pill" href="#v-pills-price" role="tab" aria-controls="v-pills-price" aria-selected="true"><img src="assets2/media/svg/price.svg" class="pe-3">Price</a></li>
			      		<li class="list-unstyled nav-item"><a class="nav-link rounded-0 text-white text-center pt-4" href="{{url('door-build')}}"><img src="assets2/media/svg/refresh.svg" width="30px" height="30px"></a></li>
			    	</ul>
			  	</div>
			  	<div class="col-md-7 px-4">
			  		<form method="POST" action="{{url('submit-query')}}">
			    		<div class="tab-content" id="v-pills-tabContent">
			      			<div class="tab-pane fade show active" id="v-pills-model" role="tabpanel" aria-labelledby="v-pills-model-tab">
			      				<section class="section product-section">
						      		<div class="title-box">
										<div class="container">
											<!--Sec Title-->
											<div class="sec-title text-center">
												<div class="title-inner">
													<h2>Choose a modal for <span class="theme_color">Your Door</span></h2>
												</div>
											</div>
										</div>
									</div>
									<div class="lower-section pt-0">
										<div class="lower-inner-section">
											<div class="container">
												<div class="row">
													<div class="col-12">
														<div id="owl-model" class="owl-builder owl-carousel owl-theme">
														    @foreach ($addons as $addon)
															    <li class="item list-unstyled text-center" >
															    	
															    	<button type="button" class="button-door border-0 bg-transparent my-5 w-100" onclick="get_glasses({{$addon->id}});setprice({{$addon->id}},{{$addon->price}},0);setimage('{{asset('admin-assets/addon/'.$addon->svgimage)}}')">
															    		<div class="door">
															    			<img class="door-image" src="{{asset('admin-assets/addon/'.$addon->svgimage)}}" align="">
															    		</div>
															    	</button>
															    </li>
														    @endforeach
														</div>
														<div class="customNavigation">
														    <a class="btn btn-fill-out theme_bgcolor2 text-white px-4 rounded-0 py-2 float-end  mb-3" onclick="get_colors()">Next</a>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
			      				</section>
			      			</div>

			      			<div class="tab-pane fade" id="v-pills-external-color" role="tabpanel" aria-labelledby="v-pills-external-color-tab">
						      	<div class="row">
									  <div class="col-md-6 offset-md-3">
										<img src="{{asset('loader/giphy.gif')}}" alt="">
									  </div>
								  </div>
			      			</div>
			      			<div class="tab-pane fade" id="v-pills-internal-color" role="tabpanel" aria-labelledby="v-pills-internal-color-tab">
								<h3 id="internalcolor">Please Selecte the Model </h3>
								<div class="row">
									<div class="col-md-6 offset-md-3">
										<img src="{{asset('loader/giphy.gif')}}" alt="" id="img" style="display:none;" width="100%">
									</div>
								</div>	
			      			</div>
			      			<div class="tab-pane fade" id="v-pills-glass" role="tabpanel" aria-labelledby="v-pills-glass-tab">
								<h3 class="text-center">Please Select the Model</h3>
			      			</div>
						    <div class="tab-pane fade" id="v-pills-frame" role="tabpanel" aria-labelledby="v-pills-frame-tab">
								<h3 class="text-center">Please Select the Model</h3>
						    </div>
						    <div class="tab-pane fade" id="v-pills-frame-external-color" role="tabpanel" aria-labelledby="v-pills-frame-external-color-tab">
								<h3 class="text-center">Please Select the Model and Frame</h3>
						    </div>
						    <div class="tab-pane fade" id="v-pills-frame-internal-color" role="tabpanel" aria-labelledby="v-pills-frame-internal-color-tab">
								<h3 class="text-center" id="frameinternalcolorheading">Please Select the Model and Frame</h3>
								<div class="row">
									<div class="col-md-6 offset-md-3">
										<img src="{{asset('loader/giphy.gif')}}" alt="" id="imgframeinter" style="display:none;" width="100%">
									</div>
								</div>	
						    </div>
						    <div class="tab-pane fade" id="v-pills-frame-glass" role="tabpanel" aria-labelledby="v-pills-frame-glass-tab">
								<h3 class="text-center">Please Select the Model and Frame</h3>
						    </div>
						    
						    <div class="tab-pane fade" id="v-pills-handels" role="tabpanel" aria-labelledby="v-pills-handels-tab">
						      	
								  <h3 class="text-center">Please Select the model</h3>
						    </div>
							<div class="tab-pane fade" id="v-pills-knocker" role="tabpanel" aria-labelledby="v-pills-knocker-tab">
								<h3 class="text-center">Please Select the model</h3>
						  	</div>
							  <div class="tab-pane fade" id="v-pills-letter-box" role="tabpanel" aria-labelledby="v-pills-knocker-tab">
								<h3 class="text-center">Please Select the model</h3>
						  	</div>
							  <div class="tab-pane fade" id="v-pills-hing" role="tabpanel" aria-labelledby="v-pills-hing-tab">
								<h3 class="text-center">Please Select the model</h3>
						    </div>
						    @CSRF
						    {{-- <input type="submit" value="Submit" name="final"> --}}
						</form>
			      <div class="tab-pane fade" id="v-pills-price" role="tabpanel" aria-labelledby="v-pills-price-tab">
			      </div>
			    </div>
			  </div>
			  <div class="col-md-3 text-center border-start pt-4">
				<input type="hidden" id="doorcolor" value="#fff">
				<input type="hidden" id="abc" >
				  <div id="doorimag">

					<object type="image/svg+xml" id="main_image" data="{{asset('admin-assets/addon/'.$addon->svgimage)}}" class="door-image" style="width: 138px;text-align:center; " ></object>
				  </div>
				  	<h4 class="custom-price pt-4"><span class="theme_color">Price:</span> &#163;<i id="p_price">0</i></h4>
				  	<button type="button" class="btn btn-fill-out theme_bgcolor2 text-white px-4 rounded-0 py-2 mt-4" onclick="addtocart()">Add To Cart</button>
			  </div>
			</div>
		</div>
		<!-- footer -->
		<footer class="footer">

			<div class="footer-bottom">
				<div class="container">
					<div class="row align-items-md-center">
						<div class="col-md-6">
							<div class="dt-sc-copyright text-center text-md-start mb-3 mb-md-0">
								<p>Copyright © 2020 Glazie LTD</p>
							</div>
						</div>
						<div class="col-md-6">
							<div class="custom-sub-nav text-center text-md-end">
								<ul class="dt-custom-nav list-unstyled">
									<li><a href="#">Privacy Policy</a></li>
									<li><a href="#">Terms and Conditions</a></li>
									<li><a href="#">Refund Policy</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</footer>
		<!-- /footer -->

	</div>
	<!-- JS Libraries -->
	<script src="{{asset('assets2/js/jquery.min.js')}}"></script>
	<script src="{{asset('assets2/vendors/bootstrap/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('assets2/vendors/owlcarousel/js/owlcarousel.min.js')}}"></script>
	<script src="{{asset('assets2/vendors/videopopup/js/videopopup.js')}}"></script>
	<script src="{{asset('assets2/js/script.js')}}"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
	<script type="text/javascript">
	    toastr.options = {
    "closeButton": true,
    "debug": false,
    "newestOnTop": false,
    "progressBar": true,
    "positionClass": "toast-top-right",
    "preventDuplicates": true,
    "onclick": null,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "5000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
}
	let idarray = Array(0,0,0,0,0,0,0,0,0,0,0,0);
	let typearray = Array(0,0,0,0,0,0,0,0,0,0,0,0);
	let id = 0;
	let frame_id = 0;
	let colorfulldoor = '';
	let amountarray  = Array(0,0,0,0,0,0,0,0,0,0,0,0);
		function showdoortoggle(){
			

			$('.colorsubchild').toggle(150);
		}
		function showframetoggle(){
			$('.framecolorsubchild').toggle(150);
		}
		function showsizetoggle(){
			$('.sizesubchild').toggle(150)
		}
		function showfurnituretoggle(){
			$('.furnituresubchild').toggle(150);
		}
		$(document).ready(function() {
			$("#owl-model").owlCarousel({
				items : 6
			});
		});
		function gotomodel()
		{
			
			$('.sizesubchild').hide();
			$('#v-pills-tab a[href="#v-pills-model"]').tab('show');
		}
		function get_colors(){
			
			$('.colorsubchild').show();
			getexternalcolors();
			$('#v-pills-tab a[href="#v-pills-external-color"]').tab('show');
		}
		function get_internal()
		{
			
			$('.colorsubchild').show();
    		$('#v-pills-tab a[href="#v-pills-internal-color"]').tab('show');
			get_internalcolors();
		}
		function openglass()
		{
			
			$('.colorsubchild').hide();
    		$('#v-pills-tab a[href="#v-pills-glass"]').tab('show');
		}
		function openframe()
		{
			
			$('.framecolorsubchild').hide();
    		$('#v-pills-tab a[href="#v-pills-frame"]').tab('show');
			framedata();
		}
		function frame_ex_color()
		{
			
			$('.framecolorsubchild').show();
    		$('#v-pills-tab a[href="#v-pills-frame-external-color"]').tab('show');
		}
		function framglass()
		{
			
			$('.framecolorsubchild').hide();
    		$('#v-pills-tab a[href="#v-pills-frame-glass"]').tab('show');
			frameglasses();
		}
		function framinternal()
		{
			
			$('.framecolorsubchild').show()
    		$('#v-pills-tab a[href="#v-pills-frame-internal-color"]').tab('show');
		}
		function get_handels()
		{
			
			$('.furnituresubchild').show()
    		$('#v-pills-tab a[href="#v-pills-handels"]').tab('show');
		}
		function getknocker()
		{
			
			$('.furnituresubchild').show()
    		$('#v-pills-tab a[href="#v-pills-knocker"]').tab('show');
		}
		function getletterbox()
		{
			
			$('.furnituresubchild').show()
    		$('#v-pills-tab a[href="#v-pills-letter-box"]').tab('show');
		}
		function hingedata()
		{
			
			$('.furnituresubchild').hide()
    		$('#v-pills-tab a[href="#v-pills-hing"]').tab('show');
		}
	    $('.owl-builder li button').on('click', function(){
		    $('li button.selected').removeClass('selected');
		    $(this).addClass('selected');
		});
		function getsvg()
		{
			
			var ads= document.getElementById('main_image');
			
			
		}
		function abcc()
		{
			
			var m = document.getElementById('main_image');
			console.log(m);
			var mod = m.contentDocument;
			var color = $('#doorcolor').val();
			var modelglasses = mod.getElementById("main_color");

			var  modelinnertag= modelglasses.querySelector('polyline');
			modelinnertag.style.fill = color;
		}
		function setimage(imagename)
		{
			$('#main_image').attr('data', imagename);
			var frame = document.getElementById("main_image");
			//console.log(imagename);
			var svgframeDoc = frame.contentDocument;
		    var svgframeItem = svgframeDoc.getElementById("door");
			//console.log(svgframeDoc);
			//svgframeItem.innerHTML = svgframeItem.innerHTML + colorfulldoor;
			 
			
		
			
		}

		
		function getexternalcolors()
				
			{
			
				
				
            url = "{{url('get_colors')}}";
            //console.log(url);
            $.ajax({
           type:'POST',
           url:url,

            data:{
            	"_token": "{{ csrf_token() }}",
                "id":id,  
              
           },
           	success:function(result){
			   	$('#v-pills-external-color').html(result);
				$("#owl-external-color,#owl-internal-color").owlCarousel({
					items : 6
				});
           	}
            });
			get_glasses(id);
    }
	function get_internalcolors()

		{
			
		$('#img').show();
		$('#internalcolor').hide();
		url = "{{url('get_internal_color')}}";
		//console.log(url);
		//alert(id);
		$.ajax({
		type:'POST',
		url:url,

		data:{
			"_token": "{{ csrf_token() }}",
			id:id,  
		
		},
		success:function(result){
		$('#v-pills-internal-color').html(result);
		$("#owl-internal-color").owlCarousel({
			items : 6
		});
		}
		});
		
		}
	function  get_glasses(i)
	{
		
		id = i;
		url = "{{url('get_glasses')}}";
		//console.log(url);
		$.ajax({
		type:'POST',
		url:url,

		data:{
			"_token": "{{ csrf_token() }}",
			"id":id,  
		
		},
		success:function(result){
		$('#v-pills-glass').html(result);
		$("#owl-glass").owlCarousel({
				items : 6
			});
		}
		});
		get_frame(id)
	}
	function get_frame(id)
	{
		//$('#v-pills-model').removeClass("");
		
		url = "{{url('get_frames')}}";
		//console.log(url);
		$.ajax({
		type:'POST',
		url:url,

		data:{
			"_token": "{{ csrf_token() }}",
			"id":id,  
		
		},
		success:function(result){
		$('#v-pills-frame').html(result);
		$("#owl-frame").owlCarousel({
				items : 6
			});
		}
		});
		get_handles(id);
	}
	function get_handles(id)
	{
	
		
		url = "{{url('get_handles')}}";
		//console.log(url);
		$.ajax({
		type:'POST',
		url:url,

		data:{
			"_token": "{{ csrf_token() }}",
			"id":id,  
		
		},
		success:function(result){
		$('#v-pills-handels').html(result);
		$("#owl-handles").owlCarousel({
				items : 6
			});
		}
		});
		get_knocker(id);
	}
	function get_knocker(id)
	{
		
		url = "{{url('get_knocker')}}";
		//console.log(url);
		$.ajax({
		type:'POST',
		url:url,

		data:{
			"_token": "{{ csrf_token() }}",
			"id":id,  
		
		},
		success:function(result){
		$('#v-pills-knocker').html(result);
		$("#owl-knocker").owlCarousel({
				items : 6
			});
		}
		});
		get_letter_box(id);
		
	}
	
	function get_letter_box(id){
		
		url = "{{url('get_letterbox')}}";
		//console.log(url);
		$.ajax({
		type:'POST',
		url:url,

		data:{
			"_token": "{{ csrf_token() }}",
			"id":id,  
		
		},
		success:function(result){
		$('#v-pills-letter-box').html(result);
		$("#owl-letterbox").owlCarousel({
				items : 6
			});
		}
		});
		
		get_hinge(id);
	}
	function get_hinge(id)
	{
		
		url = "{{url('get_hinge')}}";
		//console.log(url);
		$.ajax({
		type:'POST',
		url:url,

		data:{
			"_token": "{{ csrf_token() }}",
			"id":id,  
		
		},
		success:function(result){
		$('#v-pills-hing').html(result);
		$("#owl-hing").owlCarousel({
				items : 6
			});
		}
		});
	}
	function getframedata(frame)
	{
		frame_id = frame;
		
	}
	function framedata()
	{
	
		url = "{{url('frameexternalcolors')}}";
		//console.log(url);
		$.ajax({
		type:'POST',
		url:url,

		data:{
			"_token": "{{ csrf_token()}}",
			frame_id:frame_id,  
		
		},
		success:function(result){
			////console.log(result);
			$('#v-pills-frame-external-color').html(result);
			$("#owl-frame-color").owlCarousel({
				items : 6
			});
			
		}
		});
		
	}
	
	function internalframecolors()
	{
		$('#frameinternalcolorheading').hide();
		$('#imgframeinter').show();
		url = "{{url('frameinternalcolors')}}";
		//console.log(url);
		console.log(frame_id);
		$.ajax({
		type:'POST',
		url:url,

		data:{
			"_token": "{{ csrf_token()}}",
			frame_id:frame_id,  
		
		},
		success:function(result){
			////console.log(result);
			$('#v-pills-frame-internal-color').html(result);
			$("#owl-frame-intcolor").owlCarousel({
				items : 6
			});
			
		}
		});
		
	}
	function frameglasses()
	{
		
		url = "{{url('frameglass')}}";
		//console.log(url);
		$.ajax({
		type:'POST',
		url:url,

		data:{
			"_token": "{{ csrf_token()}}",
			frame_id:frame_id,  
		
		},
		success:function(result){
			////console.log(result);
			$('#v-pills-frame-glass').html(result);
			$("#owl-frame-glass").owlCarousel({
				items : 6
			});
			
		}
		});
		
	} 
	function setprice(id,price,index)
	{	let net_total = 0
		if(index==0)
		{
			for (let i = 0; i < amountarray.length; i++) {
				amountarray[i] = 0;
				idarray[i] = 0;
			}
		
		}
		if(index==4)
		{
			idarray[5] = 0;
			idarray[6] = 0;
			idarray[7] = 0;
			amountarray[5] = 0;
			amountarray[6] = 0;
			amountarray[7] = 0;
		}
			idarray[index] = id;
			amountarray[index] = price;
		
		for (let i = 0; i < amountarray.length; i++) {
			net_total +=amountarray[i];
			
		}
		$('#p_price').html(net_total);
		// console.log(amountarray);
		 //console.log(idarray);
	}
	function addtocart()
	{
		typearray[0] = 'model';
		typearray[1] = 'exteranal_color';
		typearray[2] = 'interanal_color';
		typearray[3] = 'glass';
		typearray[4] = 'frame';        
		typearray[5] = 'frameexcolor';
		typearray[6] = 'frameinternalcolor';
		typearray[7] = 'frame_glass';
		typearray[8] = 'handle';
		typearray[9] = 'knocker';
		typearray[10] = 'letterbox';
		typearray[11] = 'hinge';
		amountarray[0] = 0;
		url = "{{url('customizeaddtocart')}}";
		
		$.ajax({
		type:'POST',
		url:url,

		data:{
			"_token": "{{ csrf_token()}}",
			typearray:typearray,
			idarray:idarray,
			amountarray:amountarray
		
		},
		success:function(result){
			alert('Product is add to cart successfully');
			window.location="{{url('/products')}}";
		}
		});
	}
	function remove()
	{
		$('#v-pills-model').removeClass("active");
			$('#v-pills-external-color').removeClass("active");
			$('#v-pills-internal-color').removeClass("active");
			$('#v-pills-glass').removeClass("active");
			$('#v-pills-frame').removeClass("active");
			$('#v-pills-frame-external-color').removeClass("active");
			$('#v-pills-frame-internal-color').removeClass("active");
			$('#v-pills-frame-glass').removeClass("active");
			$('#v-pills-handels').removeClass("active");
			$('#v-pills-knocker').removeClass("active");
			$('#v-pills-letter-box').removeClass("active");
			$('#v-pills-hing').removeClass("active");

			$('#v-pills-model').removeClass("show");
			$('#v-pills-external-color').removeClass("show");
			$('#v-pills-internal-color').removeClass("show");
			$('#v-pills-glass').removeClass("show");
			$('#v-pills-frame').removeClass("show");
			$('#v-pills-frame-external-color').removeClass("show");
			$('#v-pills-frame-internal-color').removeClass("show");
			$('#v-pills-frame-glass').removeClass("show");
			$('#v-pills-handels').removeClass("show");
			$('#v-pills-knocker').removeClass("show");
			$('#v-pills-letter-box').removeClass("show");
			$('#v-pills-hing').removeClass("show");
	}
	function setcolorimage(colors)
	{
		alert(colors);
		var a = document.getElementById("main_image");
		var mainsvgDoc = a.contentDocument;
		var svgItems = mainsvgDoc.getElementById("base_x5F_colour");
		svgItem = svgItems.childNodes[1].style.fill = colors;
	}
	</script>

</body>
</html>