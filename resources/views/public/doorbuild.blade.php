@extends('public/layouts/layouts')
@section('title','Product Cart')
@section('content')
<link rel="stylesheet" href="{{asset('assets2/vendors/animate/animate.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets2/vendors/bootstrap/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets2/vendors/owlcarousel/css/owlcarousel.min.css')}}">
	<!-- <link rel="stylesheet" href="{{asset('assets2/vendors/fontawesome/css/all.min.css')}}"> -->
	<link rel="stylesheet" href="{{asset('assets2/vendors/boxicons/css/boxicons.min.css')}}">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Roboto:wght@300;400;500;700&display=swap">
	<link rel="stylesheet" href="{{asset('assets2/css/style.css')}}">
	<div class="wrapper">
		<!-- header -->
		
		<!-- /header -->

		<div class="builder">
			<div class="row w-100 vh-100">
			  <div class="col-md-2 theme_bgcolor2 pe-0 pt-3">
			    <ul class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
			      <li class="list-unstyled nav-item"><a class="nav-link rounded-0 active text-white" id="v-pills-model-tab" data-bs-toggle="pill" href="#v-pills-model" role="tab" aria-controls="v-pills-model" aria-selected="true"><img src="assets/media/svg/modal.svg" class="pe-3">Model</a></li>
			      <li class="list-unstyled nav-item"><a class="nav-link rounded-0 text-white"  onclick="showsizetoggle()" data-bs-toggle="pill"  role="tab"  aria-selected="true"><img src="assets/media/svg/modal.svg" class="pe-3">Sizes</a></li>
			      <li class="list-unstyled nav-item sizesubchild"><a class="nav-link rounded-0 text-white text-center" id="v-pills-default-size-tab" data-bs-toggle="pill" href="#v-pills-default-size" role="tab" aria-controls="v-pills-default-size" aria-selected="true">Default Sizes</a></li>
			      <li class="list-unstyled nav-item sizesubchild"><a class="nav-link rounded-0 text-white text-center" id="v-pills-size-tab" data-bs-toggle="pill" href="#v-size-model" role="tab" aria-controls="v-pills-size" aria-selected="true">Custom Sizes</a></li>

			       <li class="list-unstyled nav-item "><a class="nav-link rounded-0 text-white" data-bs-toggle="pill" onclick="showdoortoggle()"  role="tab" aria-controls="v-pills-external-color" aria-selected="true"><img src="assets/media/svg/color.svg" class="pe-3">Door Color</a></li>

			       <li class="list-unstyled nav-item colorsubchild"><a class="nav-link rounded-0 text-white text-center" id="v-pills-external-color-tab" data-bs-toggle="pill" href="#v-pills-external-color" role="tab" aria-controls="v-pills-external-color" aria-selected="true"> External Color</a></li>
			        <li class="list-unstyled nav-item colorsubchild"><a class="nav-link rounded-0 text-white text-center" id="v-pills-internal-color-tab" data-bs-toggle="pill" href="#v-pills-internal-color" role="tab" aria-controls="v-pills-internal-color" aria-selected="true">Internal Color</a></li>
			      <li class="list-unstyled nav-item"><a class="nav-link rounded-0 text-white" id="v-pills-glass-tab" data-bs-toggle="pill" href="#v-pills-glass" role="tab" aria-controls="v-pills-glass" aria-selected="true"><img src="assets/media/svg/glass.svg" class="pe-3">Glass</a></li>
			      <li class="list-unstyled nav-item"><a class="nav-link rounded-0 text-white" id="v-pills-frame-tab" data-bs-toggle="pill" href="#v-pills-frame" role="tab" aria-controls="v-pills-frame" aria-selected="true"><img src="assets/media/svg/frame.svg" class="pe-3">Frame</a></li>
			      <li class="list-unstyled nav-item parent-child"><a class="nav-link rounded-0 text-white" onclick="showframetoggle()"  data-bs-toggle="pill"  role="tab"  aria-selected="true"><img src="assets/media/svg/frame-color.svg" class="pe-3"> Frame Color </a></li>
			     
			       	<li class="list-unstyled nav-item text-center framecolorsubchild"><a class="nav-link rounded-0 text-white float-right" id="v-pills-frame-external-color-tab" data-bs-toggle="pill" href="#v-pills-frame-external-color" role="tab" aria-controls="v-pills-frame-external-color" aria-selected="true"> External Color</a></li>
			      <li class="list-unstyled nav-item framecolorsubchild"><a class="text-center nav-link rounded-0 text-white" id="v-pills-frame-internal-color-tab" data-bs-toggle="pill" href="#v-pills-frame-internal-color" role="tab" aria-controls="v-pills-frame-color" aria-selected="true"> Internal Color</a></li>

			  

			      <li class="list-unstyled nav-item"><a class="nav-link rounded-0 text-white" id="v-pills-frame-glass-tab" data-bs-toggle="pill" href="#v-pills-frame-glass" role="tab" aria-controls="v-pills-frame-glass" aria-selected="true"><img src="assets/media/svg/frame-glass.svg" class="pe-3">Frame Glass</a></li>
			      
			      <li class="list-unstyled nav-item"><a class="nav-link rounded-0 text-white" id="v-pills-furniture-tab" data-bs-toggle="pill" href="#v-pills-furniture" role="tab" aria-controls="v-pills-furniture" aria-selected="true"><img src="assets/media/svg/furniture.svg" class="pe-3">Furniture</a></li>
			      <li class="list-unstyled nav-item"><a class="nav-link rounded-0 text-white" id="v-pills-hing-tab" data-bs-toggle="pill" href="#v-pills-hing" role="tab" aria-controls="v-pills-hing" aria-selected="true"><img src="assets/media/svg/frame-glass.svg" class="pe-3">Hinge</a></li>
			      <li class="list-unstyled nav-item d-none"><a class="nav-link rounded-0 text-white" id="v-pills-price-tab" data-bs-toggle="pill" href="#v-pills-price" role="tab" aria-controls="v-pills-price" aria-selected="true"><img src="assets/media/svg/price.svg" class="pe-3">Price</a></li>
			      <li class="list-unstyled nav-item"><a class="nav-link rounded-0 text-white text-center pt-4" id="v-pills-refresh-tab" data-bs-toggle="pill" href="#v-pills-refresh" role="tab" aria-controls="v-pills-refresh" aria-selected="true"><img src="assets/media/svg/refresh.svg" width="30px" height="30px"></a></li>
			    </ul>
			  </div>
			  <div class="col-md-7 px-4">
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
													
												
											    <li class="item list-unstyled text-center">
		
											    	<button type="button" class="button-door border-0 bg-transparent my-5 w-100" onclick="getexternalcolors({{$addon->id}})">
											    		<div class="door">
											    			<img class="door-image" src="{{asset('admin-assets/addon/'.$addon->svgimage)}}" align="">
											    		</div>
											    	</button>
											    </li>
											    @endforeach
											   
											</div>
											<div class="customNavigation">
											    <a class="btn btn-fill-out theme_bgcolor2 text-white px-4 rounded-0 py-2 float-end btnDefaultSize mb-3">Next</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>						

			      	</section>
			      </div>
			      {{-- <div class="tab-pane fade show" id="v-pills-default-size" role="tabpanel" aria-labelledby="v-pills-default-size-tab">
			      	<section class="section product-section">
			      		<div class="title-box">
							<div class="container">
								<!--Sec Title-->
								<div class="sec-title text-center">
									<div class="title-inner">
										<h2>Choose a default size <span class="theme_color">Your Door</span></h2>
									</div>
								</div>
							</div>
						</div>

						<div class="lower-section pt-0">
							<div class="lower-inner-section">
								<div class="container">
									<div class="row">
										<div class="col-12">
											<div id="owl-default-size" class="owl-builder owl-carousel owl-theme">
											    <li class="item list-unstyled text-center">
											    	<button type="button" class="button-door border-0 bg-transparent my-5 w-100">
											    		<div class="door">
											    			<img class="door-image" src="https://www.apeer.co.uk/cmsfiles/doorbuilder/doors.g/ACDA2__c-ffffff.svg" align="">
											    		</div>
											    		<span class="defaultsize">900 X 2100</span>
											    	</button>
											    </li>
											    <li class="item list-unstyled text-center">
											    	<button type="button" class="button-door border-0 bg-transparent my-5 w-100">
											    		<div class="door">
											    			<img class="door-image" src="https://www.apeer.co.uk/cmsfiles/doorbuilder/doors.g/ACDA2__c-ffffff.svg" align="">
											    		</div>
											    		<span class="defaultsize">950 X 2000</span>		
											    	</button>
											    </li>
											    <li class="item list-unstyled text-center">
											    	<button type="button" class="button-door border-0 bg-transparent my-5 w-100">
											    		<div class="door">
											    			<img class="door-image" src="https://www.apeer.co.uk/cmsfiles/doorbuilder/doors.g/ACDA2__c-ffffff.svg" align="">
											    			
											    		</div>
											    		<span class="defaultsize">1000 X 2145</span>
											    	</button>
											    </li>
											    <li class="item list-unstyled text-center">
											    	<button type="button" class="button-door border-0 bg-transparent my-5 w-100">
											    		<div class="door">
											    			<img class="door-image" src="https://www.apeer.co.uk/cmsfiles/doorbuilder/doors.g/APC3__c-ffffff.svg" align="">
											    		</div>
											    		<span class="defaultsize">900 X 2000</span>
											    	</button>
											    </li>
											    <li class="item list-unstyled text-center">
											    	<button type="button" class="button-door border-0 bg-transparent my-5 w-100">
											    		<div class="door">
											    			<img class="door-image" src="https://www.apeer.co.uk/cmsfiles/doorbuilder/doors.g/APC3__c-ffffff.svg" align="">
											    		</div>
											    		<span class="defaultsize">950 X 2000</span>
											    	</button>
											    </li>
											    <li class="item list-unstyled text-center">
											    	<button type="button" class="button-door border-0 bg-transparent my-5 w-100">
											    		<div class="door">
											    			<img class="door-image" src="https://www.apeer.co.uk/cmsfiles/doorbuilder/doors.g/APC3__c-ffffff.svg" align="">
											    		</div>
											    		<span class="defaultsize">1000 X 2100</span>
											    	</button>
											    </li>
											    <li class="item list-unstyled text-center">
											    	<button type="button" class="button-door border-0 bg-transparent my-5 w-100">
											    		<div class="door">
											    			<img class="door-image" src="https://www.apeer.co.uk/cmsfiles/doorbuilder/doors.g/APC3__c-ffffff.svg" align="">
											    		</div>
											    		<span class="defaultsize"> 1050 X 2050</span>
											    	</button>
											    </li>
											    <li class="item list-unstyled text-center">
											    	<button type="button" class="button-door border-0 bg-transparent my-5 w-100">
											    		<div class="door">
											    			<img class="door-image" src="https://www.apeer.co.uk/cmsfiles/doorbuilder/doors.g/APM2__c-ffffff.svg" align="">
											    		</div>
											    		 <span class="defaultsize">850 X 1950</span>
											    	</button>
											    </li>
											    <li class="item list-unstyled text-center">
											    	<button type="button" class="button-door border-0 bg-transparent my-5 w-100">
											    		<div class="door">
											    			<img class="door-image" src="https://www.apeer.co.uk/cmsfiles/doorbuilder/doors.g/APM2__c-ffffff.svg" align="">
											    		</div>
											    		<span class="defaultsize">950 X 2000</span>
											    	</button>
											    </li>
											    <li class="item list-unstyled text-center">
											    	<button type="button" class="button-door border-0 bg-transparent my-5 w-100">
											    		<div class="door">
											    			<img class="door-image" src="https://www.apeer.co.uk/cmsfiles/doorbuilder/doors.g/APM2__c-ffffff.svg" align="">
											    		</div>
											    		<span class="defaultsize">950 X 2050</span>
											    	</button>
											    </li>
											    <li class="item list-unstyled text-center">
											    	<button type="button" class="button-door border-0 bg-transparent my-5 w-100">
											    		<div class="door">
											    			<img class="door-image" src="https://www.apeer.co.uk/cmsfiles/doorbuilder/doors.g/APT2__c-ffffff.svg" align="">
											    		</div>
											    		<span class="defaultsize">900 X 1925</span>
											    	</button>
											    </li>
											    <li class="item list-unstyled text-center">
											    	<button type="button" class="button-door border-0 bg-transparent my-5 w-100">
											    		<div class="door">
											    			<img class="door-image" src="https://www.apeer.co.uk/cmsfiles/doorbuilder/doors.g/APT2__c-ffffff.svg" align="">
											    		</div>
											    		<span class="defaultsize">950 X 2000</span>
											    	</button>
											    </li>
											</div>
											<div class="customNavigation">
											    <a class="btn btn-fill-out theme_bgcolor2 text-white px-4 rounded-0 py-2  btnModel mb-3">Prev</a>
											    <a class="btn btn-fill-out theme_bgcolor2 text-white px-4 rounded-0 py-2 float-end btnColor mb-3 ">Next</a>
											    <a class="btn btn-fill-out theme_bgcolor2 text-white px-4 rounded-0 py-2 float-end btnSize mb-3 m-3 mt-0">Custom Size</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>						

			      	</section>
			      </div>
			      <div class="tab-pane fade show " id="v-size-model" role="tabpanel" aria-labelledby="v-pills-size-tab">
			      	<section class="section product-section">
			      		<div class="title-box">
							<div class="container">
								<!--Sec Title-->
								<div class="sec-title text-center">
									<div class="title-inner">
										<h2>Enter  <span class="theme_color">Your Door Size</span></h2>
									</div>
								</div>
							</div>
						</div>

						<div class="lower-section pt-0">
							<div class="lower-inner-section">
								<div class="container">
									<div class="row">
										<div class="col-12">
											<div class="row mt-4">
												<div class="col-md-3"></div>
												<div class="col-md-6">
													<div class="form-group">
														<label>Door Width <small>(836mm - 1245mm)</small> </label>
														<input type="number" class="form-control rounded-0" placeholder="Enter width of Your door" min="836" max="1245">
													</div>
												</div>
											</div>
											<div class="row mt-3">
												<div class="col-md-3"></div>
												<div class="col-md-6">
													<div class="form-group">
														<label>Door Height <small>(1999 - 2105mm)</small></label>
														<input type="number" class="form-control rounded-0" placeholder="Enter Height of Your door" min="1999" max="2105">
													</div>
												</div>
											</div>
											<div class="row mt-3">
												<div class="col-md-3"></div>
												<div class="col-md-6">
													<div class="form-group">
														<label>Flag Width <small>(250 - 1000mm)</small> </label>
														<input type="number" class="form-control rounded-0" placeholder="Enter width of Flag" min="250" max="1000">
													</div>
												</div>
											</div>
											<div class="row mt-3">
												<div class="col-md-3"></div>
												<div class="col-md-6">
													<div class="form-group">
														<label>Flag Height <small>(250 - 2105mm)</small> </label>
														<input type="number" class="form-control rounded-0" placeholder="Enter Height of Flag" min="250" max="2105">
													</div>
												</div>
											</div>
											<div class="customNavigation mt-4">
												<a class="btn btn-fill-out theme_bgcolor2 text-white px-4 rounded-0 py-2  btnDefaultSize mb-3 mt-3">Prev</a>
											    <a class="btn btn-fill-out theme_bgcolor2 text-white px-4 rounded-0 py-2 float-end btnColor mb-3 mt-3">Next</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>						

			      	</section>
			      </div>--}}

			      <div class="tab-pane fade" id="v-pills-external-color" role="tabpanel" aria-labelledby="v-pills-external-color-tab">
			      
			      	
			      </div>
			      <div class="tab-pane fade" id="v-pills-internal-color" role="tabpanel" aria-labelledby="v-pills-internal-color-tab">
			      
			      	
			      </div>

			      <div class="tab-pane fade" id="v-pills-glass" role="tabpanel" aria-labelledby="v-pills-glass-tab">
			      
			      </div>

			      <div class="tab-pane fade" id="v-pills-frame" role="tabpanel" aria-labelledby="v-pills-frame-tab">
			      	{{-- <section class="section product-section">
			      		<div class="title-box">
							<div class="container">
								<!--Sec Title-->
								<div class="sec-title text-center">
									<div class="title-inner">
										<h2>Select A <span class="theme_color">Frame Design</span></h2>
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
											    <li class="item list-unstyled text-center">
											    	<button type="button" class="button-door border-0 bg-transparent my-5 w-100">
											    		<div class="door">
											    			<img class="door-image" src="assets/media/doors/frames/1.png" align="">
											    		</div>
											    	</button>
											    </li>
											    <li class="item list-unstyled text-center">
											    	<button type="button" class="button-door border-0 bg-transparent my-5 w-100">
											    		<div class="door">
											    			<img class="door-image" src="assets/media/doors/frames/2.png" align="">
											    		</div>
											    	</button>
											    </li>
											    <li class="item list-unstyled text-center">
											    	<button type="button" class="button-door border-0 bg-transparent my-5 w-100">
											    		<div class="door">
											    			<img class="door-image" src="assets/media/doors/frames/3.png" align="">
											    		</div>
											    	</button>
											    </li>
											    <li class="item list-unstyled text-center">
											    	<button type="button" class="button-door border-0 bg-transparent my-5 w-100">
											    		<div class="door">
											    			<img class="door-image" src="assets/media/doors/frames/4.png" align="">
											    		</div>
											    	</button>
											    </li>
											    <li class="item list-unstyled text-center">
											    	<button type="button" class="button-door border-0 bg-transparent my-5 w-100">
											    		<div class="door">
											    			<img class="door-image" src="assets/media/doors/frames/5.png" align="">
											    		</div>
											    	</button>
											    </li>
											    <li class="item list-unstyled text-center">
											    	<button type="button" class="button-door border-0 bg-transparent my-5 w-100">
											    		<div class="door">
											    			<img class="door-image" src="assets/media/doors/frames/1.png" align="">
											    		</div>
											    	</button>
											    </li>
											    <li class="item list-unstyled text-center">
											    	<button type="button" class="button-door border-0 bg-transparent my-5 w-100">
											    		<div class="door">
											    			<img class="door-image" src="assets/media/doors/frames/2.png" align="">
											    		</div>
											    	</button>
											    </li>
											    <li class="item list-unstyled text-center">
											    	<button type="button" class="button-door border-0 bg-transparent my-5 w-100">
											    		<div class="door">
											    			<img class="door-image" src="assets/media/doors/frames/3.png" align="">
											    		</div>
											    	</button>
											    </li>
											    <li class="item list-unstyled text-center">
											    	<button type="button" class="button-door border-0 bg-transparent my-5 w-100">
											    		<div class="door">
											    			<img class="door-image" src="assets/media/doors/frames/4.png" align="">
											    		</div>
											    	</button>
											    </li>
											    <li class="item list-unstyled text-center">
											    	<button type="button" class="button-door border-0 bg-transparent my-5 w-100">
											    		<div class="door">
											    			<img class="door-image" src="assets/media/doors/frames/5.png" align="">
											    		</div>
											    	</button>
											    </li>
											    <li class="item list-unstyled text-center">
											    	<button type="button" class="button-door border-0 bg-transparent my-5 w-100">
											    		<div class="door">
											    			<img class="door-image" src="assets/media/doors/frames/1.png" align="">
											    		</div>
											    	</button>
											    </li>
											    <li class="item list-unstyled text-center">
											    	<button type="button" class="button-door border-0 bg-transparent my-5 w-100">
											    		<div class="door">
											    			<img class="door-image" src="assets/media/doors/frames/2.png" align="">
											    		</div>
											    	</button>
											    </li>
											</div>
											<div class="customNavigation">
												<a class="btn btn-fill-out theme_bgcolor2 text-white px-4 rounded-0 py-2 btnGlass">Prev</a>
											    <a class="btn btn-fill-out theme_bgcolor2 text-white px-4 rounded-0 py-2 float-end btnFrameexternalColor">Next</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>						

			      	</section> --}}
			      </div>

			      <div class="tab-pane fade" id="v-pills-frame-external-color" role="tabpanel" aria-labelledby="v-pills-frame-external-color-tab">
			      	<section class="section product-section">
			      		<div class="title-box">
							<div class="container">
								<!--Sec Title-->
								<div class="sec-title text-center">
									<div class="title-inner">
										<h2>Select A <span class="theme_color">Frame External Color</span></h2>
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
											    <li class="item list-unstyled text-center">
											    	<button type="button" class="button-door border-0 bg-transparent my-5 w-100">
											    		<div class="door">
											    			<img class="door-image" src="assets/media/doors/frame-colors/1.png" align="">
											    		</div>
											    	</button>
											    </li>
											    <li class="item list-unstyled text-center">
											    	<button type="button" class="button-door border-0 bg-transparent my-5 w-100">
											    		<div class="door">
											    			<img class="door-image" src="assets/media/doors/frame-colors/2.png" align="">
											    		</div>
											    	</button>
											    </li>
											    <li class="item list-unstyled text-center">
											    	<button type="button" class="button-door border-0 bg-transparent my-5 w-100">
											    		<div class="door">
											    			<img class="door-image" src="assets/media/doors/frame-colors/3.png" align="">
											    		</div>
											    	</button>
											    </li>
											    <li class="item list-unstyled text-center">
											    	<button type="button" class="button-door border-0 bg-transparent my-5 w-100">
											    		<div class="door">
											    			<img class="door-image" src="assets/media/doors/frame-colors/4.png" align="">
											    		</div>
											    	</button>
											    </li>
											    <li class="item list-unstyled text-center">
											    	<button type="button" class="button-door border-0 bg-transparent my-5 w-100">
											    		<div class="door">
											    			<img class="door-image" src="assets/media/doors/frame-colors/5.png" align="">
											    		</div>
											    	</button>
											    </li>
											    <li class="item list-unstyled text-center">
											    	<button type="button" class="button-door border-0 bg-transparent my-5 w-100">
											    		<div class="door">
											    			<img class="door-image" src="assets/media/doors/frame-colors/6.png" align="">
											    		</div>
											    	</button>
											    </li>
											    <li class="item list-unstyled text-center">
											    	<button type="button" class="button-door border-0 bg-transparent my-5 w-100">
											    		<div class="door">
											    			<img class="door-image" src="assets/media/doors/frame-colors/2.png" align="">
											    		</div>
											    	</button>
											    </li>
											    <li class="item list-unstyled text-center">
											    	<button type="button" class="button-door border-0 bg-transparent my-5 w-100">
											    		<div class="door">
											    			<img class="door-image" src="assets/media/doors/frame-colors/3.png" align="">
											    		</div>
											    	</button>
											    </li>
											    <li class="item list-unstyled text-center">
											    	<button type="button" class="button-door border-0 bg-transparent my-5 w-100">
											    		<div class="door">
											    			<img class="door-image" src="assets/media/doors/frame-colors/4.png" align="">
											    		</div>
											    	</button>
											    </li>
											    <li class="item list-unstyled text-center">
											    	<button type="button" class="button-door border-0 bg-transparent my-5 w-100">
											    		<div class="door">
											    			<img class="door-image" src="assets/media/doors/frame-colors/5.png" align="">
											    		</div>
											    	</button>
											    </li>
											    <li class="item list-unstyled text-center">
											    	<button type="button" class="button-door border-0 bg-transparent my-5 w-100">
											    		<div class="door">
											    			<img class="door-image" src="assets/media/doors/frame-colors/1.png" align="">
											    		</div>
											    	</button>
											    </li>
											    <li class="item list-unstyled text-center">
											    	<button type="button" class="button-door border-0 bg-transparent my-5 w-100">
											    		<div class="door">
											    			<img class="door-image" src="assets/media/doors/frame-colors/6.png" align="">
											    		</div>
											    	</button>
											    </li>
											</div>
											<div class="customNavigation">
												<a class="btn btn-fill-out theme_bgcolor2 text-white px-4 rounded-0 py-2 btnFrame">Prev</a>
											    <a class="btn btn-fill-out theme_bgcolor2 text-white px-4 rounded-0 py-2 float-end btninternalframecolor">Next</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>						

			      	</section>
			      </div>
			      <div class="tab-pane fade" id="v-pills-frame-internal-color" role="tabpanel" aria-labelledby="v-pills-frame-internal-color-tab">
			      	<section class="section product-section">
			      		<div class="title-box">
							<div class="container">
								<!--Sec Title-->
								<div class="sec-title text-center">
									<div class="title-inner">
										<h2>Select A <span class="theme_color">Frame Internal Color</span></h2>
									</div>
								</div>
							</div>
						</div>

						<div class="lower-section pt-0">
							<div class="lower-inner-section">
								<div class="container">
									<div class="row">
										<div class="col-12">
											<div id="owl-frame-internal-color" class="owl-builder owl-carousel owl-theme">
											    <li class="item list-unstyled text-center">
											    	<button type="button" class="button-door border-0 bg-transparent my-5 w-100">
											    		<div class="door">
											    			<img class="door-image" src="assets/media/doors/frame-colors/1.png" align="">
											    		</div>
											    	</button>
											    </li>
											    <li class="item list-unstyled text-center">
											    	<button type="button" class="button-door border-0 bg-transparent my-5 w-100">
											    		<div class="door">
											    			<img class="door-image" src="assets/media/doors/frame-colors/2.png" align="">
											    		</div>
											    	</button>
											    </li>
											    <li class="item list-unstyled text-center">
											    	<button type="button" class="button-door border-0 bg-transparent my-5 w-100">
											    		<div class="door">
											    			<img class="door-image" src="assets/media/doors/frame-colors/3.png" align="">
											    		</div>
											    	</button>
											    </li>
											    <li class="item list-unstyled text-center">
											    	<button type="button" class="button-door border-0 bg-transparent my-5 w-100">
											    		<div class="door">
											    			<img class="door-image" src="assets/media/doors/frame-colors/4.png" align="">
											    		</div>
											    	</button>
											    </li>
											    <li class="item list-unstyled text-center">
											    	<button type="button" class="button-door border-0 bg-transparent my-5 w-100">
											    		<div class="door">
											    			<img class="door-image" src="assets/media/doors/frame-colors/5.png" align="">
											    		</div>
											    	</button>
											    </li>
											    <li class="item list-unstyled text-center">
											    	<button type="button" class="button-door border-0 bg-transparent my-5 w-100">
											    		<div class="door">
											    			<img class="door-image" src="assets/media/doors/frame-colors/6.png" align="">
											    		</div>
											    	</button>
											    </li>
											    <li class="item list-unstyled text-center">
											    	<button type="button" class="button-door border-0 bg-transparent my-5 w-100">
											    		<div class="door">
											    			<img class="door-image" src="assets/media/doors/frame-colors/2.png" align="">
											    		</div>
											    	</button>
											    </li>
											    <li class="item list-unstyled text-center">
											    	<button type="button" class="button-door border-0 bg-transparent my-5 w-100">
											    		<div class="door">
											    			<img class="door-image" src="assets/media/doors/frame-colors/3.png" align="">
											    		</div>
											    	</button>
											    </li>
											    <li class="item list-unstyled text-center">
											    	<button type="button" class="button-door border-0 bg-transparent my-5 w-100">
											    		<div class="door">
											    			<img class="door-image" src="assets/media/doors/frame-colors/4.png" align="">
											    		</div>
											    	</button>
											    </li>
											    <li class="item list-unstyled text-center">
											    	<button type="button" class="button-door border-0 bg-transparent my-5 w-100">
											    		<div class="door">
											    			<img class="door-image" src="assets/media/doors/frame-colors/5.png" align="">
											    		</div>
											    	</button>
											    </li>
											    <li class="item list-unstyled text-center">
											    	<button type="button" class="button-door border-0 bg-transparent my-5 w-100">
											    		<div class="door">
											    			<img class="door-image" src="assets/media/doors/frame-colors/1.png" align="">
											    		</div>
											    	</button>
											    </li>
											    <li class="item list-unstyled text-center">
											    	<button type="button" class="button-door border-0 bg-transparent my-5 w-100">
											    		<div class="door">
											    			<img class="door-image" src="assets/media/doors/frame-colors/6.png" align="">
											    		</div>
											    	</button>
											    </li>
											</div>
											<div class="customNavigation">
												<a class="btn btn-fill-out theme_bgcolor2 text-white px-4 rounded-0 py-2 btnFrameexternalColor">Prev</a>
											    <a class="btn btn-fill-out theme_bgcolor2 text-white px-4 rounded-0 py-2 float-end btnFrameGlass">Next</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>						

			      	</section>
			      </div>

			      <div class="tab-pane fade" id="v-pills-frame-glass" role="tabpanel" aria-labelledby="v-pills-frame-glass-tab">
			      	<section class="section product-section">
			      		<div class="title-box">
							<div class="container">
								<!--Sec Title-->
								<div class="sec-title text-center">
									<div class="title-inner">
										<h2>What type of <span class="theme_color">frame glass</span> would you like?</h2>
									</div>
								</div>
							</div>
						</div>

						<div class="lower-section pt-0">
							<div class="lower-inner-section">
								<div class="container">
									<div class="row">
										<div class="col-12">
											<div id="owl-frame-glass" class="owl-builder owl-carousel owl-theme">
											    <li class="item list-unstyled text-center">
											    	<button type="button" class="button-door border-0 bg-transparent my-5 w-100">
											    		<div class="door">
											    			<img class="door-image" src="assets/media/doors/frame-glass/7.png" align="">
											    		</div>
											    	</button>
											    </li>
											    <li class="item list-unstyled text-center">
											    	<button type="button" class="button-door border-0 bg-transparent my-5 w-100">
											    		<div class="door">
											    			<img class="door-image" src="assets/media/doors/frame-glass/7.png" align="">
											    		</div>
											    	</button>
											    </li>
											    <li class="item list-unstyled text-center">
											    	<button type="button" class="button-door border-0 bg-transparent my-5 w-100">
											    		<div class="door">
											    			<img class="door-image" src="assets/media/doors/frame-glass/7.png" align="">
											    		</div>
											    	</button>
											    </li>
											    <li class="item list-unstyled text-center">
											    	<button type="button" class="button-door border-0 bg-transparent my-5 w-100">
											    		<div class="door">
											    			<img class="door-image" src="assets/media/doors/frame-glass/7.png" align="">
											    		</div>
											    	</button>
											    </li>
											    <li class="item list-unstyled text-center">
											    	<button type="button" class="button-door border-0 bg-transparent my-5 w-100">
											    		<div class="door">
											    			<img class="door-image" src="assets/media/doors/frame-glass/7.png" align="">
											    		</div>
											    	</button>
											    </li>
											    <li class="item list-unstyled text-center">
											    	<button type="button" class="button-door border-0 bg-transparent my-5 w-100">
											    		<div class="door">
											    			<img class="door-image" src="assets/media/doors/frame-glass/7.png" align="">
											    		</div>
											    	</button>
											    </li>
											    <li class="item list-unstyled text-center">
											    	<button type="button" class="button-door border-0 bg-transparent my-5 w-100">
											    		<div class="door">
											    			<img class="door-image" src="assets/media/doors/frame-glass/7.png" align="">
											    		</div>
											    	</button>
											    </li>
											    <li class="item list-unstyled text-center">
											    	<button type="button" class="button-door border-0 bg-transparent my-5 w-100">
											    		<div class="door">
											    			<img class="door-image" src="assets/media/doors/frame-glass/7.png" align="">
											    		</div>
											    	</button>
											    </li>
											    <li class="item list-unstyled text-center">
											    	<button type="button" class="button-door border-0 bg-transparent my-5 w-100">
											    		<div class="door">
											    			<img class="door-image" src="assets/media/doors/frame-glass/7.png" align="">
											    		</div>
											    	</button>
											    </li>
											    <li class="item list-unstyled text-center">
											    	<button type="button" class="button-door border-0 bg-transparent my-5 w-100">
											    		<div class="door">
											    			<img class="door-image" src="assets/media/doors/frame-glass/7.png" align="">
											    		</div>
											    	</button>
											    </li>
											    <li class="item list-unstyled text-center">
											    	<button type="button" class="button-door border-0 bg-transparent my-5 w-100">
											    		<div class="door">
											    			<img class="door-image" src="assets/media/doors/frame-glass/7.png" align="">
											    		</div>
											    	</button>
											    </li>
											    <li class="item list-unstyled text-center">
											    	<button type="button" class="button-door border-0 bg-transparent my-5 w-100">
											    		<div class="door">
											    			<img class="door-image" src="assets/media/doors/frame-glass/7.png" align="">
											    		</div>
											    	</button>
											    </li>
											</div>
											<div class="customNavigation">
												<a class="btn btn-fill-out theme_bgcolor2 text-white px-4 rounded-0 py-2 btninternalframecolor">Prev</a>
											    <a class="btn btn-fill-out theme_bgcolor2 text-white px-4 rounded-0 py-2 float-end btnFurniture">Next</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>						

			      	</section>
			      </div>

			      <div class="tab-pane fade" id="v-pills-hing" role="tabpanel" aria-labelledby="v-pills-hing">
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
											<div id="owl-hing-glass" class="owl-builder owl-carousel owl-theme">
											    <li class="item list-unstyled text-center">
											    	<button type="button" class="button-door border-0 bg-transparent my-5 w-100">
											    		<div class="door">
											    			<img class="door-image" src="assets/media/doors/hinge/2.PNG" align="">
											    		</div>
											    	</button>
											    </li>
											    <li class="item list-unstyled text-center">
											    	<button type="button" class="button-door border-0 bg-transparent my-5 w-100">
											    		<div class="door">
											    			<img class="door-image" src="assets/media/doors/hinge/1.PNG" align="">
											    		</div>
											    	</button>
											    </li>
										
											</div>
											<div class="customNavigation">
												<a class="btn btn-fill-out theme_bgcolor2 text-white px-4 rounded-0 py-2 btnFurniture">Prev</a>
											    <!-- <a class="btn btn-fill-out theme_bgcolor2 text-white px-4 rounded-0 py-2 float-end btnFurniture">Next</a> -->
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>						

			      	</section>
			      </div>

			      <div class="tab-pane fade" id="v-pills-furniture" role="tabpanel" aria-labelledby="v-pills-furniture-tab">
			      	<section class="section product-section">
			      		<div class="title-box">
							<div class="container">
								<!--Sec Title-->
								<div class="sec-title text-center">
									<div class="title-inner">
										<h2>Select Your Door <span class="theme_color">Furniture</span></h2>
									</div>
								</div>
							</div>
						</div>

						<div class="lower-section pt-0">
							<div class="lower-inner-section">
								<div class="container">
									<div class="row">
										<div class="col-12">
											<div id="owl-furniture" class="owl-builder owl-carousel owl-theme">
											    <li class="item list-unstyled text-center">
											    	<button type="button" class="button-door border-0 bg-transparent my-5 w-100">
											    		<div class="door">
											    			<img class="door-image" src="assets/media/doors/furniture/1.png" align="">
											    		</div>
											    	</button>
											    </li>
											    <li class="item list-unstyled text-center">
											    	<button type="button" class="button-door border-0 bg-transparent my-5 w-100">
											    		<div class="door">
											    			<img class="door-image" src="assets/media/doors/furniture/2.png" align="">
											    		</div>
											    	</button>
											    </li>
											    <li class="item list-unstyled text-center">
											    	<button type="button" class="button-door border-0 bg-transparent my-5 w-100">
											    		<div class="door">
											    			<img class="door-image" src="assets/media/doors/furniture/3.png" align="">
											    		</div>
											    	</button>
											    </li>
											    <li class="item list-unstyled text-center">
											    	<button type="button" class="button-door border-0 bg-transparent my-5 w-100">
											    		<div class="door">
											    			<img class="door-image" src="assets/media/doors/furniture/1.png" align="">
											    		</div>
											    	</button>
											    </li>
											    <li class="item list-unstyled text-center">
											    	<button type="button" class="button-door border-0 bg-transparent my-5 w-100">
											    		<div class="door">
											    			<img class="door-image" src="assets/media/doors/furniture/2.png" align="">
											    		</div>
											    	</button>
											    </li>
											    <li class="item list-unstyled text-center">
											    	<button type="button" class="button-door border-0 bg-transparent my-5 w-100">
											    		<div class="door">
											    			<img class="door-image" src="assets/media/doors/furniture/3.png" align="">
											    		</div>
											    	</button>
											    </li>
											    <li class="item list-unstyled text-center">
											    	<button type="button" class="button-door border-0 bg-transparent my-5 w-100">
											    		<div class="door">
											    			<img class="door-image" src="assets/media/doors/furniture/1.png" align="">
											    		</div>
											    	</button>
											    </li>
											    <li class="item list-unstyled text-center">
											    	<button type="button" class="button-door border-0 bg-transparent my-5 w-100">
											    		<div class="door">
											    			<img class="door-image" src="assets/media/doors/furniture/2.png" align="">
											    		</div>
											    	</button>
											    </li>
											    <li class="item list-unstyled text-center">
											    	<button type="button" class="button-door border-0 bg-transparent my-5 w-100">
											    		<div class="door">
											    			<img class="door-image" src="assets/media/doors/furniture/3.png" align="">
											    		</div>
											    	</button>
											    </li>
											    <li class="item list-unstyled text-center">
											    	<button type="button" class="button-door border-0 bg-transparent my-5 w-100">
											    		<div class="door">
											    			<img class="door-image" src="assets/media/doors/furniture/1.png" align="">
											    		</div>
											    	</button>
											    </li>
											    <li class="item list-unstyled text-center">
											    	<button type="button" class="button-door border-0 bg-transparent my-5 w-100">
											    		<div class="door">
											    			<img class="door-image" src="assets/media/doors/furniture/2.png" align="">
											    		</div>
											    	</button>
											    </li>
											    <li class="item list-unstyled text-center">
											    	<button type="button" class="button-door border-0 bg-transparent my-5 w-100">
											    		<div class="door">
											    			<img class="door-image" src="assets/media/doors/furniture/3.png" align="">
											    		</div>
											    	</button>
											    </li>
											</div>
											<div class="customNavigation">
												<a class="btn btn-fill-out theme_bgcolor2 text-white px-4 rounded-0 py-2 btnFrameGlass">Prev</a></a>
												<a class="btn btn-fill-out theme_bgcolor2 text-white px-4 rounded-0 py-2 btnHinge float-end">Next</a></a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>						

			      	</section>
			      </div> 

			      <div class="tab-pane fade" id="v-pills-price" role="tabpanel" aria-labelledby="v-pills-price-tab">
			      </div>
			    </div>
			  </div>
			  <div class="col-md-3 text-center border-start pt-4">
				  	<img src="" id="productimage" width="138px">
				  	<h4 class="custom-price pt-4"><span class="theme_color">Price:</span id=""> &#163;999.99</h4>
				  	<a href="cart.html" class="btn btn-fill-out theme_bgcolor2 text-white px-4 rounded-0 py-2 mt-4">Add To Cart</a>
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
	@endsection
	@section('script')
	<script src="{{asset('assets2/js/jquery.min.js')}}"></script>
	<script src="{{asset('assets2/vendors/bootstrap/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('assets2/vendors/owlcarousel/js/owlcarousel.min.js')}}"></script>
	<script src="{{asset('assets2/vendors/videopopup/js/videopopup.js')}}"></script>
	<script src="{{asset('assets2/js/script.js')}}"></script>
	<script type="text/javascript">
		function showdoortoggle(){
			$('.colorsubchild').toggle(150);
		}
		function showframetoggle(){
			$('.framecolorsubchild').toggle(150);
		}
		function showsizetoggle(){
			$('.sizesubchild').toggle(150)
		}
		$(document).ready(function() {
			$("#owl-model").owlCarousel({
				items : 6
			});
		});
		$(document).ready(function() {
			$("#owl-default-size").owlCarousel({
				items : 6
			});
		});
		$(document).ready(function() {
			$("#owl-external-color,#owl-internal-color").owlCarousel({
				items : 6
			});
		});
		$(document).ready(function() {
			$("#owl-glass").owlCarousel({
				items : 6
			});
		});
		$(document).ready(function() {
			$("#owl-frame").owlCarousel({
				items : 6
			});
		});
		$(document).ready(function() {
			$("#owl-frame-color,#owl-frame-internal-color").owlCarousel({
				items : 6
			});
		});
		$(document).ready(function() {
			$("#owl-frame-glass").owlCarousel({
				items : 6
			});
		});
		$(document).ready(function() {
			$("#owl-furniture").owlCarousel({
				items : 6
			});
		});
		$(document).ready(function() {
			$("#owl-hing-glass").owlCarousel({
				items : 6
			});
		});
		
		$('.btnSize').click(function(e){
	        e.preventDefault();
	        $('.sizesubchild').show();
	        $('#v-pills-tab a[href="#v-size-model"]').tab('show');
	    });
	    $('.btnDefaultSize').click(function(e){
	        e.preventDefault();
	        $('.sizesubchild').show();
	        $('#v-pills-tab a[href="#v-pills-default-size"]').tab('show');
	    });
		$('.btnModel').click(function(e){
	        e.preventDefault();
	        $('.sizesubchild').hide();
	        $('#v-pills-tab a[href="#v-pills-model"]').tab('show');
	    });
	    $('.btnColor').click(function(e){
	        e.preventDefault();
	        $('.colorsubchild').show();
	        $('.sizesubchild').hide();
	        $('#v-pills-tab a[href="#v-pills-external-color"]').tab('show');
	    });
	    $('.btninternalColor').click(function(e){
	        e.preventDefault();
	        $('.colorsubchild').show();
	        $('#v-pills-tab a[href="#v-pills-internal-color"]').tab('show');
	    });
	    $('.btnGlass').click(function(e){
	        e.preventDefault();
	        $('.colorsubchild').hide();
	        $('#v-pills-tab a[href="#v-pills-glass"]').tab('show');
	    });
	    $('.btnFrame').click(function(e){
	        e.preventDefault();
	        $('.framecolorsubchild').hide();
	        $('#v-pills-tab a[href="#v-pills-frame"]').tab('show');
	    });
	    $('.btnHinge').click(function(e){
	        e.preventDefault();
	        $('#v-pills-tab a[href="#v-pills-hing"]').tab('show');
	    });
	    // $('.colortab').click(function(e){
	    //     e.preventDefault();
	    //      $('#v-pills-tab a[href="#v-pills-external-color"]').tab('show');
	    //      $('colortab').removeClass('active');
	    //      $('.btnColor').addClass('active');
	    // });
	    $('.btnFrameGlass').click(function(e){
	        e.preventDefault();
	        $('.framecolorsubchild').hide();
	        $('#v-pills-tab a[href="#v-pills-frame-glass"]').tab('show');
	    });
	    $('.btnFrameexternalColor').click(function(e){
	        e.preventDefault();
	        $('.framecolorsubchild').show();
	        $('#v-pills-tab a[href="#v-pills-frame-external-color"]').tab('show');
	    });
	    $('.btninternalframecolor').click(function(e){
	        e.preventDefault();
	        $('.framecolorsubchild').show()
	        $('#v-pills-tab a[href="#v-pills-frame-internal-color"]').tab('show');
	    });
	    
	    $('.btnFurniture').click(function(e){
	        e.preventDefault();
	        $('#v-pills-tab a[href="#v-pills-furniture"]').tab('show');
	    });
	    $('.owl-builder li button').on('click', function(){
		    $('li button.selected').removeClass('selected');
		    $(this).addClass('selected');
		});
		function getexternalcolors(id)

			{
				
       
            url = "{{url('get_colors')}}";
            console.log(url);
            $.ajax({
           type:'POST',
           url:url,

            data:{
                id:id,  
              
           },
           success:function(result){
			   $('#v-pills-external-color').html(result);
			$("#owl-external-color,#owl-internal-color").owlCarousel({
				items : 6
			});
           }
            });
			get_internalcolors(id)
    }
	function get_internalcolors(id)

		{
		url = "{{url('get_internal_color')}}";
		console.log(url);
		$.ajax({
		type:'POST',
		url:url,

		data:{
			id:id,  
		
		},
		success:function(result){
		$('#v-pills-internal-color').html(result);
		$("#owl-internal-color").owlCarousel({
			items : 6
		});
		}
		});
		get_glasses(id)
		}
	function  get_glasses(id)
	{
		url = "{{url('get_glasses')}}";
		console.log(url);
		$.ajax({
		type:'POST',
		url:url,

		data:{
			id:id,  
		
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
		url = "{{url('get_frames')}}";
		console.log(url);
		$.ajax({
		type:'POST',
		url:url,

		data:{
			id:id,  
		
		},
		success:function(result){
		$('#v-pills-frame').html(result);
		$("#owl-frame").owlCarousel({
				items : 6
			});
		}
		});
		get_hinge(id)
	}
	function get_hinge(id)
	{
		url = "{{url('get_hinge')}}";
		console.log(url);
		$.ajax({
		type:'POST',
		url:url,

		data:{
			id:id,  
		
		},
		success:function(result){
		$('#v-pills-frame').html(result);
		$("#owl-frame").owlCarousel({
				items : 2
			});
		}
		});
	}
	
		
	</script>
	@endsection