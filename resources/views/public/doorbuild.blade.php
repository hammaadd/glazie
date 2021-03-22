<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Customize Your Item</title>
	<meta name="description" content="Bespoke Double glazing supplier and Installer over 25 years experience.Transform your home with premium quality windows and doors contact us.">
	<link rel="icon" href="assets2/media/logo.png">

	<!-- Style Libraries -->
	<link rel="stylesheet" href="assets2/vendors/animate/animate.min.css">
	<link rel="stylesheet" href="assets2/vendors/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets2/vendors/owlcarousel/css/owlcarousel.min.css">
	<!-- <link rel="stylesheet" href="assets2/vendors/fontawesome/css/all.min.css"> -->
	<link rel="stylesheet" href="assets2/vendors/boxicons/css/boxicons.min.css">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Roboto:wght@300;400;500;700&display=swap">
	<link rel="stylesheet" href="assets2/css/style.css">
	<style type="text/css">
		
.colorsubchild,.framecolorsubchild,.sizesubchild{
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
								<a href="index.html">
									<img src="assets2/media/glazie-logo.png" alt="Double Glaze Windows and Doors">
								</a>
							</div>
						</div>
						<div class="col-xl-9 col-md-10 col-sm-6">
							<ul class="navbar-nav text-end">
								<li class="nav-item active">
									<a class="nav-link" href="index.html">Back To Home</a>
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
			       		<li class="list-unstyled nav-item "><a class="nav-link rounded-0 text-white" data-bs-toggle="pill" onclick="showdoortoggle()"  role="tab" aria-controls="v-pills-external-color" aria-selected="true"><img src="assets2/media/svg/color.svg" class="pe-3">Door Color</a></li>
			       		<li class="list-unstyled nav-item colorsubchild"><a class="nav-link rounded-0 text-white text-center" id="v-pills-external-color-tab" data-bs-toggle="pill" href="#v-pills-external-color" role="tab" aria-controls="v-pills-external-color" aria-selected="true"> External Color</a></li>
			        	<li class="list-unstyled nav-item colorsubchild"><a class="nav-link rounded-0 text-white text-center" id="v-pills-internal-color-tab" data-bs-toggle="pill" href="#v-pills-internal-color" role="tab" aria-controls="v-pills-internal-color" aria-selected="true">Internal Color</a></li>
			      		<li class="list-unstyled nav-item"><a class="nav-link rounded-0 text-white" id="v-pills-glass-tab" data-bs-toggle="pill" href="#v-pills-glass" role="tab" aria-controls="v-pills-glass" aria-selected="true"><img src="assets2/media/svg/glass.svg" class="pe-3">Glass</a></li>
			      		<li class="list-unstyled nav-item"><a class="nav-link rounded-0 text-white" id="v-pills-frame-tab" data-bs-toggle="pill" href="#v-pills-frame" role="tab" aria-controls="v-pills-frame" aria-selected="true"><img src="assets2/media/svg/frame.svg" class="pe-3">Frame</a></li>
			      		<li class="list-unstyled nav-item parent-child"><a class="nav-link rounded-0 text-white" onclick="showframetoggle()"  data-bs-toggle="pill"  role="tab"  aria-selected="true"><img src="assets2/media/svg/frame-color.svg" class="pe-3"> Frame Color </a></li>
			       		<li class="list-unstyled nav-item text-center framecolorsubchild"><a class="nav-link rounded-0 text-white float-right" id="v-pills-frame-external-color-tab" data-bs-toggle="pill" href="#v-pills-frame-external-color" role="tab" aria-controls="v-pills-frame-external-color" aria-selected="true"> External Color</a></li>
			      		<li class="list-unstyled nav-item framecolorsubchild"><a class="text-center nav-link rounded-0 text-white" id="v-pills-frame-internal-color-tab" data-bs-toggle="pill" href="#v-pills-frame-internal-color" role="tab" aria-controls="v-pills-frame-color" aria-selected="true"> Internal Color</a></li>
			      		<li class="list-unstyled nav-item"><a class="nav-link rounded-0 text-white" id="v-pills-frame-glass-tab" data-bs-toggle="pill" href="#v-pills-frame-glass" role="tab" aria-controls="v-pills-frame-glass" aria-selected="true"><img src="assets2/media/svg/frame-glass.svg" class="pe-3">Frame Glass</a></li>
			      		<li class="list-unstyled nav-item"><a class="nav-link rounded-0 text-white" id="v-pills-furniture-tab" data-bs-toggle="pill" href="#v-pills-furniture" role="tab" aria-controls="v-pills-furniture" aria-selected="true"><img src="assets2/media/svg/furniture.svg" class="pe-3">Furniture</a></li>
			      		<li class="list-unstyled nav-item"><a class="nav-link rounded-0 text-white" id="v-pills-hing-tab" data-bs-toggle="pill" href="#v-pills-hing" role="tab" aria-controls="v-pills-hing" aria-selected="true"><img src="assets2/media/svg/frame-glass.svg" class="pe-3">Hinge</a></li>
			      		<li class="list-unstyled nav-item d-none"><a class="nav-link rounded-0 text-white" id="v-pills-price-tab" data-bs-toggle="pill" href="#v-pills-price" role="tab" aria-controls="v-pills-price" aria-selected="true"><img src="assets2/media/svg/price.svg" class="pe-3">Price</a></li>
			      		<li class="list-unstyled nav-item"><a class="nav-link rounded-0 text-white text-center pt-4" id="v-pills-refresh-tab" data-bs-toggle="pill" href="#v-pills-refresh" role="tab" aria-controls="v-pills-refresh" aria-selected="true"><img src="assets2/media/svg/refresh.svg" width="30px" height="30px"></a></li>
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
															    <li class="item list-unstyled text-center" onclick="getModalId({{$addon->id}}, {{$addon->price}}, 'model')">
															    	<!-- <input type="hidden" id="" value="model" name="type">
															    	<input type="hidden" id="modal_id" value="{{$addon->id}}" name="modal_id">
														    		<input type="hidden" id="modal_price" value="{{$addon->price}}" name="modal_price"> -->
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

			      			<div class="tab-pane fade" id="v-pills-external-color" role="tabpanel" aria-labelledby="v-pills-external-color-tab">
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
														<div id="owl-external-color" class="owl-builder owl-carousel owl-theme">
														    <li class="item list-unstyled text-center">
														    	<button type="button" class="button-door border-0 bg-transparent my-5 w-100">
														    		<div class="door">
														    			<img class="door-image" src="https://www.apeer.co.uk/cmsfiles/doorbuilder/doors.g/ACDA2__c-ffffff.svg" align="">
														    		</div>
														    	</button>
														    </li>
														    <li class="item list-unstyled text-center">
														    	<button type="button" class="button-door border-0 bg-transparent my-5 w-100">
														    		<div class="door">
														    			<img class="door-image" src="https://www.apeer.co.uk/cmsfiles/doorbuilder/doors.g/ACDA2__c-323232.svg" align="">
														    		</div>
														    	</button>
														    </li>
														    <li class="item list-unstyled text-center">
														    	<button type="button" class="button-door border-0 bg-transparent my-5 w-100">
														    		<div class="door">
														    			<img class="door-image" src="https://www.apeer.co.uk/cmsfiles/doorbuilder/doors.g/ACDA2__c-2D654C.svg" align="">
														    		</div>
														    	</button>
														    </li>
														    <li class="item list-unstyled text-center">
														    	<button type="button" class="button-door border-0 bg-transparent my-5 w-100">
														    		<div class="door">
														    			<img class="door-image" src="https://www.apeer.co.uk/cmsfiles/doorbuilder/doors.g/ACDA2__c-AE1216.svg" align="">
														    		</div>
														    	</button>
														    </li>
														    <li class="item list-unstyled text-center">
														    	<button type="button" class="button-door border-0 bg-transparent my-5 w-100">
														    		<div class="door">
														    			<img class="door-image" src="https://www.apeer.co.uk/cmsfiles/doorbuilder/doors.g/ACDA2__c-bc4078.svg" align="">
														    		</div>
														    	</button>
														    </li>
														    <li class="item list-unstyled text-center">
														    	<button type="button" class="button-door border-0 bg-transparent my-5 w-100">
														    		<div class="door">
														    			<img class="door-image" src="https://www.apeer.co.uk/cmsfiles/doorbuilder/doors.g/ACDA2__c-b0b0a9.svg" align="">
														    		</div>
														    	</button>
														    </li>
														    <li class="item list-unstyled text-center">
														    	<button type="button" class="button-door border-0 bg-transparent my-5 w-100">
														    		<div class="door">
														    			<img class="door-image" src="https://www.apeer.co.uk/cmsfiles/doorbuilder/doors.g/ACDA2__c-07756E.svg" align="">
														    		</div>
														    	</button>
														    </li>
														    <li class="item list-unstyled text-center">
														    	<button type="button" class="button-door border-0 bg-transparent my-5 w-100">
														    		<div class="door">
														    			<img class="door-image" src="https://www.apeer.co.uk/cmsfiles/doorbuilder/doors.g/ACDA2__c-B41E20.svg" align="">
														    		</div>
														    	</button>
														    </li>
														    <li class="item list-unstyled text-center">
														    	<button type="button" class="button-door border-0 bg-transparent my-5 w-100">
														    		<div class="door">
														    			<img class="door-image" src="https://www.apeer.co.uk/cmsfiles/doorbuilder/doors.g/ACDA2__c-3677C0.svg" align="">
														    		</div>
														    	</button>
														    </li>
														    <li class="item list-unstyled text-center">
														    	<button type="button" class="button-door border-0 bg-transparent my-5 w-100">
														    		<div class="door">
														    			<img class="door-image" src="https://www.apeer.co.uk/cmsfiles/doorbuilder/doors.g/ACDA2__c-2D654C.svg" align="">
														    		</div>
														    	</button>
														    </li>
														    <li class="item list-unstyled text-center">
														    	<button type="button" class="button-door border-0 bg-transparent my-5 w-100">
														    		<div class="door">
														    			<img class="door-image" src="https://www.apeer.co.uk/cmsfiles/doorbuilder/doors.g/ACDA2__c-DF8245.svg" align="">
														    		</div>
														    	</button>
														    </li>
														    <li class="item list-unstyled text-center">
														    	<button type="button" class="button-door border-0 bg-transparent my-5 w-100">
														    		<div class="door">
														    			<img class="door-image" src="https://www.apeer.co.uk/cmsfiles/doorbuilder/doors.g/ACDA2__c-CDCD57.svg" align="">
														    		</div>
														    	</button>
														    </li>
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
			      			</div>
			      			<div class="tab-pane fade" id="v-pills-internal-color" role="tabpanel" aria-labelledby="v-pills-internal-color-tab">
						      	<section class="section product-section">
						      		<div class="title-box">
										<div class="container">
											<!--Sec Title-->
											<div class="sec-title text-center">
												<div class="title-inner">
													<h2>Choose Your <span class="theme_color">Internal Color</span></h2>
												</div>
											</div>
										</div>
									</div>

									<div class="lower-section pt-0">
										<div class="lower-inner-section">
											<div class="container">
												<div class="row">
													<div class="col-12">
														<div id="owl-internal-color" class="owl-builder owl-carousel owl-theme">
														    <li class="item list-unstyled text-center">
														    	<button type="button" class="button-door border-0 bg-transparent my-5 w-100">
														    		<div class="door">
														    			<img class="door-image" src="https://www.apeer.co.uk/cmsfiles/doorbuilder/doors.g/ACDA2__c-ffffff.svg" align="">
														    		</div>
														    	</button>
														    </li>
														    <li class="item list-unstyled text-center">
														    	<button type="button" class="button-door border-0 bg-transparent my-5 w-100">
														    		<div class="door">
														    			<img class="door-image" src="https://www.apeer.co.uk/cmsfiles/doorbuilder/doors.g/ACDA2__c-323232.svg" align="">
														    		</div>
														    	</button>
														    </li>
														    <li class="item list-unstyled text-center">
														    	<button type="button" class="button-door border-0 bg-transparent my-5 w-100">
														    		<div class="door">
														    			<img class="door-image" src="https://www.apeer.co.uk/cmsfiles/doorbuilder/doors.g/ACDA2__c-2D654C.svg" align="">
														    		</div>
														    	</button>
														    </li>
														    <li class="item list-unstyled text-center">
														    	<button type="button" class="button-door border-0 bg-transparent my-5 w-100">
														    		<div class="door">
														    			<img class="door-image" src="https://www.apeer.co.uk/cmsfiles/doorbuilder/doors.g/ACDA2__c-AE1216.svg" align="">
														    		</div>
														    	</button>
														    </li>
														    <li class="item list-unstyled text-center">
														    	<button type="button" class="button-door border-0 bg-transparent my-5 w-100">
														    		<div class="door">
														    			<img class="door-image" src="https://www.apeer.co.uk/cmsfiles/doorbuilder/doors.g/ACDA2__c-bc4078.svg" align="">
														    		</div>
														    	</button>
														    </li>
														    <li class="item list-unstyled text-center">
														    	<button type="button" class="button-door border-0 bg-transparent my-5 w-100">
														    		<div class="door">
														    			<img class="door-image" src="https://www.apeer.co.uk/cmsfiles/doorbuilder/doors.g/ACDA2__c-b0b0a9.svg" align="">
														    		</div>
														    	</button>
														    </li>
														    <li class="item list-unstyled text-center">
														    	<button type="button" class="button-door border-0 bg-transparent my-5 w-100">
														    		<div class="door">
														    			<img class="door-image" src="https://www.apeer.co.uk/cmsfiles/doorbuilder/doors.g/ACDA2__c-07756E.svg" align="">
														    		</div>
														    	</button>
														    </li>
														    <li class="item list-unstyled text-center">
														    	<button type="button" class="button-door border-0 bg-transparent my-5 w-100">
														    		<div class="door">
														    			<img class="door-image" src="https://www.apeer.co.uk/cmsfiles/doorbuilder/doors.g/ACDA2__c-B41E20.svg" align="">
														    		</div>
														    	</button>
														    </li>
														    <li class="item list-unstyled text-center">
														    	<button type="button" class="button-door border-0 bg-transparent my-5 w-100">
														    		<div class="door">
														    			<img class="door-image" src="https://www.apeer.co.uk/cmsfiles/doorbuilder/doors.g/ACDA2__c-3677C0.svg" align="">
														    		</div>
														    	</button>
														    </li>
														    <li class="item list-unstyled text-center">
														    	<button type="button" class="button-door border-0 bg-transparent my-5 w-100">
														    		<div class="door">
														    			<img class="door-image" src="https://www.apeer.co.uk/cmsfiles/doorbuilder/doors.g/ACDA2__c-2D654C.svg" align="">
														    		</div>
														    	</button>
														    </li>
														    <li class="item list-unstyled text-center">
														    	<button type="button" class="button-door border-0 bg-transparent my-5 w-100">
														    		<div class="door">
														    			<img class="door-image" src="https://www.apeer.co.uk/cmsfiles/doorbuilder/doors.g/ACDA2__c-DF8245.svg" align="">
														    		</div>
														    	</button>
														    </li>
														    <li class="item list-unstyled text-center">
														    	<button type="button" class="button-door border-0 bg-transparent my-5 w-100">
														    		<div class="door">
														    			<img class="door-image" src="https://www.apeer.co.uk/cmsfiles/doorbuilder/doors.g/ACDA2__c-CDCD57.svg" align="">
														    		</div>
														    	</button>
														    </li>
														</div>
														<div class="customNavigation">
															<a class="btn btn-fill-out theme_bgcolor2 text-white px-4 rounded-0 py-2 btnColor">Prev</a>
														    <a class="btn btn-fill-out theme_bgcolor2 text-white px-4 rounded-0 py-2 float-end btnGlass">Next</a>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
						      	</section>
			      			</div>
			      			<div class="tab-pane fade" id="v-pills-glass" role="tabpanel" aria-labelledby="v-pills-glass-tab">
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
														<div id="owl-glass" class="owl-builder owl-carousel owl-theme">
														    <li class="item list-unstyled text-center">
														    	<button type="button" class="button-door border-0 bg-transparent my-5 w-100">
														    		<div class="door">
														    			<img class="door-image" src="https://www.apeer.co.uk/cmsfiles/doorbuilder/doors.g/ACDA2__c-b0b0a9__g-RG18__m-ACDA2.svg" align="">
														    		</div>
														    	</button>
														    </li>
														    <li class="item list-unstyled text-center">
														    	<button type="button" class="button-door border-0 bg-transparent my-5 w-100">
														    		<div class="door">
														    			<img class="door-image" src="https://www.apeer.co.uk/cmsfiles/doorbuilder/doors.g/ACDA2__c-b0b0a9__g-BO500__m-ACDA2.svg" align="">
														    		</div>
														    	</button>
														    </li>
														    <li class="item list-unstyled text-center">
														    	<button type="button" class="button-door border-0 bg-transparent my-5 w-100">
														    		<div class="door">
														    			<img class="door-image" src="https://www.apeer.co.uk/cmsfiles/doorbuilder/doors.g/ACDA2__c-b0b0a9__g-BO508__m-ACDA2.svg" align="">
														    		</div>
														    	</button>
														    </li>
														    <li class="item list-unstyled text-center">
														    	<button type="button" class="button-door border-0 bg-transparent my-5 w-100">
														    		<div class="door">
														    			<img class="door-image" src="https://www.apeer.co.uk/cmsfiles/doorbuilder/doors.g/ACDA2__c-b0b0a9__g-BO510__m-ACDA2.svg" align="">
														    		</div>
														    	</button>
														    </li>
														    <li class="item list-unstyled text-center">
														    	<button type="button" class="button-door border-0 bg-transparent my-5 w-100">
														    		<div class="door">
														    			<img class="door-image" src="https://www.apeer.co.uk/cmsfiles/doorbuilder/doors.g/ACDA2__c-b0b0a9__g-RG18__m-ACDA2.svg" align="">
														    		</div>
														    	</button>
														    </li>
														    <li class="item list-unstyled text-center">
														    	<button type="button" class="button-door border-0 bg-transparent my-5 w-100">
														    		<div class="door">
														    			<img class="door-image" src="https://www.apeer.co.uk/cmsfiles/doorbuilder/doors.g/ACDA2__c-b0b0a9__g-BO550__m-ACDA2.svg" align="">
														    		</div>
														    	</button>
														    </li>
														    <li class="item list-unstyled text-center">
														    	<button type="button" class="button-door border-0 bg-transparent my-5 w-100">
														    		<div class="door">
														    			<img class="door-image" src="https://www.apeer.co.uk/cmsfiles/doorbuilder/doors.g/ACDA2__c-b0b0a9__g-BO556__m-ACDA2.svg" align="">
														    		</div>
														    	</button>
														    </li>
														    <li class="item list-unstyled text-center">
														    	<button type="button" class="button-door border-0 bg-transparent my-5 w-100">
														    		<div class="door">
														    			<img class="door-image" src="https://www.apeer.co.uk/cmsfiles/doorbuilder/doors.g/ACDA2__c-b0b0a9__g-BO560__m-ACDA2.svg" align="">
														    		</div>
														    	</button>
														    </li>
														    <li class="item list-unstyled text-center">
														    	<button type="button" class="button-door border-0 bg-transparent my-5 w-100">
														    		<div class="door">
														    			<img class="door-image" src="https://www.apeer.co.uk/cmsfiles/doorbuilder/doors.g/ACDA2__c-b0b0a9__g-FT14__m-ACDA2.svg" align="">
														    		</div>
														    	</button>
														    </li>
														    <li class="item list-unstyled text-center">
														    	<button type="button" class="button-door border-0 bg-transparent my-5 w-100">
														    		<div class="door">
														    			<img class="door-image" src="https://www.apeer.co.uk/cmsfiles/doorbuilder/doors.g/ACDA2__c-b0b0a9__g-FT21__m-ACDA2.svg" align="">
														    		</div>
														    	</button>
														    </li>
														    <li class="item list-unstyled text-center">
														    	<button type="button" class="button-door border-0 bg-transparent my-5 w-100">
														    		<div class="door">
														    			<img class="door-image" src="https://www.apeer.co.uk/cmsfiles/doorbuilder/doors.g/ACDA2__c-b0b0a9__g-FT38__m-ACDA2.svg" align="">
														    		</div>
														    	</button>
														    </li>
														    <li class="item list-unstyled text-center">
														    	<button type="button" class="button-door border-0 bg-transparent my-5 w-100">
														    		<div class="door">
														    			<img class="door-image" src="https://www.apeer.co.uk/cmsfiles/doorbuilder/doors.g/ACDA2__c-b0b0a9__g-FT50__m-ACDA2.svg" align="">
														    		</div>
														    	</button>
														    </li>
														</div>
														<div class="customNavigation">
															<a class="btn btn-fill-out theme_bgcolor2 text-white px-4 rounded-0 py-2 btninternalColor">Prev</a>
														    <a class="btn btn-fill-out theme_bgcolor2 text-white px-4 rounded-0 py-2 float-end btnFrame">Next</a>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>						
						      	</section>
			      			</div>
						    <div class="tab-pane fade" id="v-pills-frame" role="tabpanel" aria-labelledby="v-pills-frame-tab">
						      	<section class="section product-section">
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
														    			<img class="door-image" src="assets2/media/doors/frames/1.png" align="">
														    		</div>
														    	</button>
														    </li>
														    <li class="item list-unstyled text-center">
														    	<button type="button" class="button-door border-0 bg-transparent my-5 w-100">
														    		<div class="door">
														    			<img class="door-image" src="assets2/media/doors/frames/2.png" align="">
														    		</div>
														    	</button>
														    </li>
														    <li class="item list-unstyled text-center">
														    	<button type="button" class="button-door border-0 bg-transparent my-5 w-100">
														    		<div class="door">
														    			<img class="door-image" src="assets2/media/doors/frames/3.png" align="">
														    		</div>
														    	</button>
														    </li>
														    <li class="item list-unstyled text-center">
														    	<button type="button" class="button-door border-0 bg-transparent my-5 w-100">
														    		<div class="door">
														    			<img class="door-image" src="assets2/media/doors/frames/4.png" align="">
														    		</div>
														    	</button>
														    </li>
														    <li class="item list-unstyled text-center">
														    	<button type="button" class="button-door border-0 bg-transparent my-5 w-100">
														    		<div class="door">
														    			<img class="door-image" src="assets2/media/doors/frames/5.png" align="">
														    		</div>
														    	</button>
														    </li>
														    <li class="item list-unstyled text-center">
														    	<button type="button" class="button-door border-0 bg-transparent my-5 w-100">
														    		<div class="door">
														    			<img class="door-image" src="assets2/media/doors/frames/1.png" align="">
														    		</div>
														    	</button>
														    </li>
														    <li class="item list-unstyled text-center">
														    	<button type="button" class="button-door border-0 bg-transparent my-5 w-100">
														    		<div class="door">
														    			<img class="door-image" src="assets2/media/doors/frames/2.png" align="">
														    		</div>
														    	</button>
														    </li>
														    <li class="item list-unstyled text-center">
														    	<button type="button" class="button-door border-0 bg-transparent my-5 w-100">
														    		<div class="door">
														    			<img class="door-image" src="assets2/media/doors/frames/3.png" align="">
														    		</div>
														    	</button>
														    </li>
														    <li class="item list-unstyled text-center">
														    	<button type="button" class="button-door border-0 bg-transparent my-5 w-100">
														    		<div class="door">
														    			<img class="door-image" src="assets2/media/doors/frames/4.png" align="">
														    		</div>
														    	</button>
														    </li>
														    <li class="item list-unstyled text-center">
														    	<button type="button" class="button-door border-0 bg-transparent my-5 w-100">
														    		<div class="door">
														    			<img class="door-image" src="assets2/media/doors/frames/5.png" align="">
														    		</div>
														    	</button>
														    </li>
														    <li class="item list-unstyled text-center">
														    	<button type="button" class="button-door border-0 bg-transparent my-5 w-100">
														    		<div class="door">
														    			<img class="door-image" src="assets2/media/doors/frames/1.png" align="">
														    		</div>
														    	</button>
														    </li>
														    <li class="item list-unstyled text-center">
														    	<button type="button" class="button-door border-0 bg-transparent my-5 w-100">
														    		<div class="door">
														    			<img class="door-image" src="assets2/media/doors/frames/2.png" align="">
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
						      	</section>
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
														    			<img class="door-image" src="assets2/media/doors/frame-colors/1.png" align="">
														    		</div>
														    	</button>
														    </li>
														    <li class="item list-unstyled text-center">
														    	<button type="button" class="button-door border-0 bg-transparent my-5 w-100">
														    		<div class="door">
														    			<img class="door-image" src="assets2/media/doors/frame-colors/2.png" align="">
														    		</div>
														    	</button>
														    </li>
														    <li class="item list-unstyled text-center">
														    	<button type="button" class="button-door border-0 bg-transparent my-5 w-100">
														    		<div class="door">
														    			<img class="door-image" src="assets2/media/doors/frame-colors/3.png" align="">
														    		</div>
														    	</button>
														    </li>
														    <li class="item list-unstyled text-center">
														    	<button type="button" class="button-door border-0 bg-transparent my-5 w-100">
														    		<div class="door">
														    			<img class="door-image" src="assets2/media/doors/frame-colors/4.png" align="">
														    		</div>
														    	</button>
														    </li>
														    <li class="item list-unstyled text-center">
														    	<button type="button" class="button-door border-0 bg-transparent my-5 w-100">
														    		<div class="door">
														    			<img class="door-image" src="assets2/media/doors/frame-colors/5.png" align="">
														    		</div>
														    	</button>
														    </li>
														    <li class="item list-unstyled text-center">
														    	<button type="button" class="button-door border-0 bg-transparent my-5 w-100">
														    		<div class="door">
														    			<img class="door-image" src="assets2/media/doors/frame-colors/6.png" align="">
														    		</div>
														    	</button>
														    </li>
														    <li class="item list-unstyled text-center">
														    	<button type="button" class="button-door border-0 bg-transparent my-5 w-100">
														    		<div class="door">
														    			<img class="door-image" src="assets2/media/doors/frame-colors/2.png" align="">
														    		</div>
														    	</button>
														    </li>
														    <li class="item list-unstyled text-center">
														    	<button type="button" class="button-door border-0 bg-transparent my-5 w-100">
														    		<div class="door">
														    			<img class="door-image" src="assets2/media/doors/frame-colors/3.png" align="">
														    		</div>
														    	</button>
														    </li>
														    <li class="item list-unstyled text-center">
														    	<button type="button" class="button-door border-0 bg-transparent my-5 w-100">
														    		<div class="door">
														    			<img class="door-image" src="assets2/media/doors/frame-colors/4.png" align="">
														    		</div>
														    	</button>
														    </li>
														    <li class="item list-unstyled text-center">
														    	<button type="button" class="button-door border-0 bg-transparent my-5 w-100">
														    		<div class="door">
														    			<img class="door-image" src="assets2/media/doors/frame-colors/5.png" align="">
														    		</div>
														    	</button>
														    </li>
														    <li class="item list-unstyled text-center">
														    	<button type="button" class="button-door border-0 bg-transparent my-5 w-100">
														    		<div class="door">
														    			<img class="door-image" src="assets2/media/doors/frame-colors/1.png" align="">
														    		</div>
														    	</button>
														    </li>
														    <li class="item list-unstyled text-center">
														    	<button type="button" class="button-door border-0 bg-transparent my-5 w-100">
														    		<div class="door">
														    			<img class="door-image" src="assets2/media/doors/frame-colors/6.png" align="">
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
														    			<img class="door-image" src="assets2/media/doors/frame-colors/1.png" align="">
														    		</div>
														    	</button>
														    </li>
														    <li class="item list-unstyled text-center">
														    	<button type="button" class="button-door border-0 bg-transparent my-5 w-100">
														    		<div class="door">
														    			<img class="door-image" src="assets2/media/doors/frame-colors/2.png" align="">
														    		</div>
														    	</button>
														    </li>
														    <li class="item list-unstyled text-center">
														    	<button type="button" class="button-door border-0 bg-transparent my-5 w-100">
														    		<div class="door">
														    			<img class="door-image" src="assets2/media/doors/frame-colors/3.png" align="">
														    		</div>
														    	</button>
														    </li>
														    <li class="item list-unstyled text-center">
														    	<button type="button" class="button-door border-0 bg-transparent my-5 w-100">
														    		<div class="door">
														    			<img class="door-image" src="assets2/media/doors/frame-colors/4.png" align="">
														    		</div>
														    	</button>
														    </li>
														    <li class="item list-unstyled text-center">
														    	<button type="button" class="button-door border-0 bg-transparent my-5 w-100">
														    		<div class="door">
														    			<img class="door-image" src="assets2/media/doors/frame-colors/5.png" align="">
														    		</div>
														    	</button>
														    </li>
														    <li class="item list-unstyled text-center">
														    	<button type="button" class="button-door border-0 bg-transparent my-5 w-100">
														    		<div class="door">
														    			<img class="door-image" src="assets2/media/doors/frame-colors/6.png" align="">
														    		</div>
														    	</button>
														    </li>
														    <li class="item list-unstyled text-center">
														    	<button type="button" class="button-door border-0 bg-transparent my-5 w-100">
														    		<div class="door">
														    			<img class="door-image" src="assets2/media/doors/frame-colors/2.png" align="">
														    		</div>
														    	</button>
														    </li>
														    <li class="item list-unstyled text-center">
														    	<button type="button" class="button-door border-0 bg-transparent my-5 w-100">
														    		<div class="door">
														    			<img class="door-image" src="assets2/media/doors/frame-colors/3.png" align="">
														    		</div>
														    	</button>
														    </li>
														    <li class="item list-unstyled text-center">
														    	<button type="button" class="button-door border-0 bg-transparent my-5 w-100">
														    		<div class="door">
														    			<img class="door-image" src="assets2/media/doors/frame-colors/4.png" align="">
														    		</div>
														    	</button>
														    </li>
														    <li class="item list-unstyled text-center">
														    	<button type="button" class="button-door border-0 bg-transparent my-5 w-100">
														    		<div class="door">
														    			<img class="door-image" src="assets2/media/doors/frame-colors/5.png" align="">
														    		</div>
														    	</button>
														    </li>
														    <li class="item list-unstyled text-center">
														    	<button type="button" class="button-door border-0 bg-transparent my-5 w-100">
														    		<div class="door">
														    			<img class="door-image" src="assets2/media/doors/frame-colors/1.png" align="">
														    		</div>
														    	</button>
														    </li>
														    <li class="item list-unstyled text-center">
														    	<button type="button" class="button-door border-0 bg-transparent my-5 w-100">
														    		<div class="door">
														    			<img class="door-image" src="assets2/media/doors/frame-colors/6.png" align="">
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
														    			<img class="door-image" src="assets2/media/doors/frame-glass/7.png" align="">
														    		</div>
														    	</button>
														    </li>
														    <li class="item list-unstyled text-center">
														    	<button type="button" class="button-door border-0 bg-transparent my-5 w-100">
														    		<div class="door">
														    			<img class="door-image" src="assets2/media/doors/frame-glass/7.png" align="">
														    		</div>
														    	</button>
														    </li>
														    <li class="item list-unstyled text-center">
														    	<button type="button" class="button-door border-0 bg-transparent my-5 w-100">
														    		<div class="door">
														    			<img class="door-image" src="assets2/media/doors/frame-glass/7.png" align="">
														    		</div>
														    	</button>
														    </li>
														    <li class="item list-unstyled text-center">
														    	<button type="button" class="button-door border-0 bg-transparent my-5 w-100">
														    		<div class="door">
														    			<img class="door-image" src="assets2/media/doors/frame-glass/7.png" align="">
														    		</div>
														    	</button>
														    </li>
														    <li class="item list-unstyled text-center">
														    	<button type="button" class="button-door border-0 bg-transparent my-5 w-100">
														    		<div class="door">
														    			<img class="door-image" src="assets2/media/doors/frame-glass/7.png" align="">
														    		</div>
														    	</button>
														    </li>
														    <li class="item list-unstyled text-center">
														    	<button type="button" class="button-door border-0 bg-transparent my-5 w-100">
														    		<div class="door">
														    			<img class="door-image" src="assets2/media/doors/frame-glass/7.png" align="">
														    		</div>
														    	</button>
														    </li>
														    <li class="item list-unstyled text-center">
														    	<button type="button" class="button-door border-0 bg-transparent my-5 w-100">
														    		<div class="door">
														    			<img class="door-image" src="assets2/media/doors/frame-glass/7.png" align="">
														    		</div>
														    	</button>
														    </li>
														    <li class="item list-unstyled text-center">
														    	<button type="button" class="button-door border-0 bg-transparent my-5 w-100">
														    		<div class="door">
														    			<img class="door-image" src="assets2/media/doors/frame-glass/7.png" align="">
														    		</div>
														    	</button>
														    </li>
														    <li class="item list-unstyled text-center">
														    	<button type="button" class="button-door border-0 bg-transparent my-5 w-100">
														    		<div class="door">
														    			<img class="door-image" src="assets2/media/doors/frame-glass/7.png" align="">
														    		</div>
														    	</button>
														    </li>
														    <li class="item list-unstyled text-center">
														    	<button type="button" class="button-door border-0 bg-transparent my-5 w-100">
														    		<div class="door">
														    			<img class="door-image" src="assets2/media/doors/frame-glass/7.png" align="">
														    		</div>
														    	</button>
														    </li>
														    <li class="item list-unstyled text-center">
														    	<button type="button" class="button-door border-0 bg-transparent my-5 w-100">
														    		<div class="door">
														    			<img class="door-image" src="assets2/media/doors/frame-glass/7.png" align="">
														    		</div>
														    	</button>
														    </li>
														    <li class="item list-unstyled text-center">
														    	<button type="button" class="button-door border-0 bg-transparent my-5 w-100">
														    		<div class="door">
														    			<img class="door-image" src="assets2/media/doors/frame-glass/7.png" align="">
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
														    			<img class="door-image" src="assets2/media/doors/hinge/2.PNG" align="">
														    		</div>
														    	</button>
														    </li>
														    <li class="item list-unstyled text-center">
														    	<button type="button" class="button-door border-0 bg-transparent my-5 w-100">
														    		<div class="door">
														    			<img class="door-image" src="assets2/media/doors/hinge/1.PNG" align="">
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
														    			<img class="door-image" src="assets2/media/doors/furniture/1.png" align="">
														    		</div>
														    	</button>
														    </li>
														    <li class="item list-unstyled text-center">
														    	<button type="button" class="button-door border-0 bg-transparent my-5 w-100">
														    		<div class="door">
														    			<img class="door-image" src="assets2/media/doors/furniture/2.png" align="">
														    		</div>
														    	</button>
														    </li>
														    <li class="item list-unstyled text-center">
														    	<button type="button" class="button-door border-0 bg-transparent my-5 w-100">
														    		<div class="door">
														    			<img class="door-image" src="assets2/media/doors/furniture/3.png" align="">
														    		</div>
														    	</button>
														    </li>
														    <li class="item list-unstyled text-center">
														    	<button type="button" class="button-door border-0 bg-transparent my-5 w-100">
														    		<div class="door">
														    			<img class="door-image" src="assets2/media/doors/furniture/1.png" align="">
														    		</div>
														    	</button>
														    </li>
														    <li class="item list-unstyled text-center">
														    	<button type="button" class="button-door border-0 bg-transparent my-5 w-100">
														    		<div class="door">
														    			<img class="door-image" src="assets2/media/doors/furniture/2.png" align="">
														    		</div>
														    	</button>
														    </li>
														    <li class="item list-unstyled text-center">
														    	<button type="button" class="button-door border-0 bg-transparent my-5 w-100">
														    		<div class="door">
														    			<img class="door-image" src="assets2/media/doors/furniture/3.png" align="">
														    		</div>
														    	</button>
														    </li>
														    <li class="item list-unstyled text-center">
														    	<button type="button" class="button-door border-0 bg-transparent my-5 w-100">
														    		<div class="door">
														    			<img class="door-image" src="assets2/media/doors/furniture/1.png" align="">
														    		</div>
														    	</button>
														    </li>
														    <li class="item list-unstyled text-center">
														    	<button type="button" class="button-door border-0 bg-transparent my-5 w-100">
														    		<div class="door">
														    			<img class="door-image" src="assets2/media/doors/furniture/2.png" align="">
														    		</div>
														    	</button>
														    </li>
														    <li class="item list-unstyled text-center">
														    	<button type="button" class="button-door border-0 bg-transparent my-5 w-100">
														    		<div class="door">
														    			<img class="door-image" src="assets2/media/doors/furniture/3.png" align="">
														    		</div>
														    	</button>
														    </li>
														    <li class="item list-unstyled text-center">
														    	<button type="button" class="button-door border-0 bg-transparent my-5 w-100">
														    		<div class="door">
														    			<img class="door-image" src="assets2/media/doors/furniture/1.png" align="">
														    		</div>
														    	</button>
														    </li>
														    <li class="item list-unstyled text-center">
														    	<button type="button" class="button-door border-0 bg-transparent my-5 w-100">
														    		<div class="door">
														    			<img class="door-image" src="assets2/media/doors/furniture/2.png" align="">
														    		</div>
														    	</button>
														    </li>
														    <li class="item list-unstyled text-center">
														    	<button type="button" class="button-door border-0 bg-transparent my-5 w-100">
														    		<div class="door">
														    			<img class="door-image" src="assets2/media/doors/furniture/3.png" align="">
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
						    @CSRF
						    <input type="submit" value="Submit" name="final">
						</form>
			      <div class="tab-pane fade" id="v-pills-price" role="tabpanel" aria-labelledby="v-pills-price-tab">
			      </div>
			    </div>
			  </div>
			  <div class="col-md-3 text-center border-start pt-4">
				  	<img src="https://www.apeer.co.uk/cmsfiles/doorbuilder/doors.g/APA2__c-ffffff.svg" width="138px">
				  	<h4 class="custom-price pt-4"><span class="theme_color">Price:</span> &#163;<i id="p_price">0</i></h4>
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
	<!-- JS Libraries -->
	<script src="assets2/js/jquery.min.js"></script>
	<script src="assets2/vendors/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets2/vendors/owlcarousel/js/owlcarousel.min.js"></script>
	<script src="assets2/vendors/videopopup/js/videopopup.js"></script>
	<script src="assets2/js/script.js"></script>
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
	        $('#v-pills-tab a[href="#v-pills-model"]').tab('show');
	    });
	    $('.btnDefaultSize').click(function(e){
	        e.preventDefault();
	        $('.sizesubchild').show();
	        $('#v-pills-tab a[href="#v-pills-external-color"]').tab('show');
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
			"_token": "{{ csrf_token() }}",
			"id":id,  
		
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
		url = "{{url('get_frames')}}";
		console.log(url);
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
			"_token": "{{ csrf_token() }}",
			"id":id,  
		
		},
		success:function(result){
		$('#v-pills-frame').html(result);
		$("#owl-frame").owlCarousel({
				items : 2
			});
		}
		});
	}
	function getModalId(id,price,modal){
		total = 0;
		product_info['modal_id'] = id;
		product_info['modal_price'] = price;
		total = product_info.modal_price;
		product_info['total'] = total
		$('#p_price').html(total);
		console.log(product_info);
	}
	</script>
</body>
</html>