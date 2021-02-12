@extends('public/layouts/layouts')
@section('title','Welcome')
@section('content')
<script src="{{('http://code.jquery.com/jquery-1.9.1')}}.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
<script src="{{('https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js')}}/toastr.js"></script>
<div class="main_content">
    @if (session('info'))
    <script type="text/javascript">toastr.success("{{session('info')}}");</script>
    @endif
    <!-- Customize Section -->
    <section class="header-content">

        <div class="container-fluid px-0">

            <div class="owl-slider owl-carousel owl-theme" data-autoplay="true">

                <!--Slide item-->
                <div class="item d-flex align-items-center" style="background-image:url(assets/media/slider/brick-conservatory-new.jpg)">
                    <div class="container">
                        <div class="caption">
                            <div class="animated" data-start="fadeInUp">
                                <div class="promo">
                                    <div class="title title-sm p-0">UPVC Windows</div>
                                </div>
                            </div>
                            <div class="animated" data-start="fadeInUp">
                                Double glaze windows and doors wide range of options choose from <br>different colours ,styles and glazing options.Energy saving <br>incredible 1.4W/m2K U-Value
                            </div>
                            <div class="animated" data-start="fadeInUp">
                                <div class="pt-3">
                                    <a href="#" class="btn btn-fill-out rounded-0 px-4">Customize Your Window</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--Slide item-->
                <div class="item d-flex align-items-center" style="background-image:url(assets/media/slider/slidingdoors4-image-data-scaled.jpg)">
                    <div class="container">
                        <div class="caption">
                            <div class="animated" data-start="fadeInUp">
                                <div class="promo">
                                    <div class="title title-sm p-0">Aluminium Bifold Doors</div>
                                </div>
                            </div>
                            <div class="animated" data-start="fadeInUp">
                                Superb quality aluminium bifold doors available 
                                <br>in array of colours and opening options.
                                <br>Get an instant online quote with our handy 
                                <br>door builder tool.
                            </div>
                            <div class="animated" data-start="fadeInUp">
                                <div class="pt-3">
                                    <a href="#" class="btn btn-fill-out rounded-0 px-4">Customize Your Door</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div> <!--/owl-slider-->
        </div>
    </section>
    <section class="section">
        <div class="container">
            <!--Sec Title-->
            <div class="sec-title text-center pb-4">
                <div class="title-inner">
                    <h2>Choose, Configure and <span class="theme_color">Price Your Order</span> in Seconds!</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="bg_img bg_img2 p-4 p-md-5 rounded-4 overflow-hidden">
                        <div class="title-box">
                            <!--Sec Title-->
                            <div class="text-center">
                                <div class="title-inner text-white">
                                    <h2>PREMIUM QUALITY COMPOSITE DOORS</h2>
                                    <p>Over hundred product lines are just a few clicks away. All prices are transparent and instant: just select your frame, color and glasses into our online customizer.</p>

                                    <a href="#" class="btn btn-fill-out theme_bgcolor2 text-white px-4 rounded-0 py-2 mt-5">Customize Door</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="bg_img bg_img1 p-4 p-md-5 rounded-4 overflow-hidden">
                        <div class="title-box">
                            <!--Sec Title-->
                            <div class="text-center text-white">
                                <div class="title-inner">
                                    <h2>PREMIUM QUALITY UPVC Windows</h2>
                                    <p>Over hundred product lines are just a few clicks away. All prices are transparent and instant: just select your frame, color and glasses into our online customizer.</p>

                                    <a href="#" class="btn btn-fill-out theme_bgcolor2 text-white px-4 rounded-0 py-2 mt-5">Customize Window</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /Customize Section -->

    <!-- Design & Quote Now -->
    <section class="section quote-section theme_bgcolor2 bg_img" style="background-image:url(assets/media/roof-latern-dual.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <a href="#" title="Design & Quote Now" class="btn btn-fill-out rounded-0 px-5 py-2"><i class='bx bx-wifi'></i> Design & Order Now</a>
                </div>
            </div>
        </div>
    </section>
    <!-- /Design & Quote Now -->

    <!-- categories -->
    <section class="section categories-section">
       


            <div class="title-box">
                <div class="container">
                    <!--Sec Title-->
                    <div class="sec-title text-center">
                        <div class="title-inner">
                            <h2>Our <span class="theme_color">Collections</span></h2>
                        </div>
                    </div>
                </div>
            </div>
    
            <div class="lower-section">
                <div class="lower-inner-section">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="brand-carousel owl-carousel">
                                    @foreach ($categories as $category)
                                    <div class="single-logo">
                                        <img src="{{('admin-assets/categories/'.$category->image)}}" alt="">
                                    </div>
                                    @endforeach
                                    
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>
    <!-- categories -->

    <!-- row-title-section -->
    <section class="section row-title-section bg_img bg_img1">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-7">
                    <div class="title-box">
                        <!--Sec Title-->
                        <div class="sec-title text-center">
                            <div class="title-inner">
                                <h2>UPVC Windows & Doors</h2>
                                <p>KÖMMERLING C70 is a proven 70mm upvc double glaze windows and doors system with far better levels of energy efficiency than timber windows and first generation upvc windows.</p>

                                <a href="#" class="btn btn-fill-out theme_bgcolor2 text-white px-4 rounded-0 py-2 mt-5">Learn more</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /row-title-section -->

    <!-- services -->
    <section class="section services-section">
        <div class="container">
            <div class="row align-items-md-center">
                <div class="content-column col-md-6">
                    <div class="inner-column mb-5 mb-md-0">
                        <!--Sec Title-->
                        <div class="sec-title mb-3">
                            <div class="title-inner">
                                <h2>Fitting <span class="theme_color">Services</span></h2>
                                <!-- <h5 class="mt-2">10 Years Guarantee</h5> -->
                            </div>
                        </div>
                        <div class="text">
                            <p>At Glazie Ltd we offer a complete survey,supply and fitting service for all our aluminium,timber and uPvc products.We draw upon our years of experience and utilise our team of highly skilled installers to provide a top class fitting service with 10 years insurance backed guarantee.</p>
                        </div>
                        <a href="#" class="btn btn-fill-out rounded-0 px-4 py-2">Find out more</a>
                    </div>
                </div>
                <div class="image-column col-md-6">
                    <div class="images-wrapper mb-5 mb-md-0">
                        <div class="single_image-wrapper">
                            <img class="rounded-4 img-fluid" src="{{('assets/media/bifold-install.jpg')}}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /services -->

    <!-- guarantee -->
    <section class="section guarantee-section gray_bg">
        <div class="title-box">
            <div class="container">
                <!--Sec Title-->
                <div class="sec-title text-center">
                    <div class="title-inner">
                        <h2>Our <span class="theme_color">Guarantee</span></h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="lower-section">
            <div class="lower-inner-section">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-sm-8 text-center">
                            <div class="guarantee-img mb-4">
                                <img class="img-fluid" src="{{('assets/media/10-year-guatantee-badge.png')}}" alt="10 Year Guatantee">
                            </div>

                            <div class="text">We know the products we sell represent outstanding quality and value. In addition, to offer you total peace of mind, all our supply & fitted products come with 10-years insurance backed guarantee. Click to find out more</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /guarantee -->

    <!-- testimonial -->
    <section class="section feedback-section">
        <div class="title-box">
            <div class="container">
                <!--Sec Title-->
                <div class="sec-title text-center">
                    <div class="title-inner">
                        <h2>Customers <span class="theme_color">Reviews</span></h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="lower-section">
            <div class="lower-inner-section">
                <div class="single-item-carousel owl-theme owl-carousel">
                    <!--Testimonial Block-->
                    <div class="testimonial-block">
                        <div class="inner-box">
                            <div class="image-outer">
                                <div class="image">
                                    <img src="{{('assets/media/testimonial/guarantee-Custom-new.jpg')}}" alt="Peter Duru" />
                                </div>
                                <div class="quote-icon">
                                    <span class="icon icon-flaticon-quote-1"></span>
                                </div>
                            </div>
                            <h3>Peter Duru</h3>
                            <div class="location">@glazie-ltd</div>
                            <div class="text">Fitters were excellent in replacing my front porch door and windows. Glazie was the most competitive in terms of pricing and was quick to respond to my enquiries. They even came during the COVID-19 pandemic and completed the job to an excellent standard. They were also helpful in repairing the side of the wall and re-bricking and pointing the bricks at no extra cost. Thanks for the great work and I look forward to building my conservatory with you in next summer.</div>
                        </div>
                    </div>

                    <!--Testimonial Block-->
                    <div class="testimonial-block">
                        <div class="inner-box">
                            <div class="image-outer">
                                <div class="image">
                                    <img src="{{('assets/media/testimonial/author-5.jpg')}}" alt="Brackley" />
                                </div>
                                <div class="quote-icon">
                                    <span class="icon icon-flaticon-quote-1"></span>
                                </div>
                            </div>
                            <h3>Brackley</h3>
                            <div class="location">@glazie-ltd</div>
                            <div class="text">Glazie supplied and fitted a set of new double glazed aluminium bifold doors.  They also fitted an extra window handle and serviced one of the uPVc door whose hinge was catching on whilst opening/shutting for free as a gesture of good will. The job was done to a good standard and at a reasonable price. Workers were polite, friendly and easy to talk to; explained what they would be doing prior to starting and how long it would take. So top marks from me for customer satisfaction. Will hire again!</div>
                        </div>
                    </div>

                    <!--Testimonial Block-->
                    <div class="testimonial-block">
                        <div class="inner-box">
                            <div class="image-outer">
                                <div class="image">
                                    <img src="{{('assets/media/testimonial/author-6.jpg')}}" alt="Maxyray" />
                                </div>
                                <div class="quote-icon">
                                    <span class="icon icon-flaticon-quote-1"></span>
                                </div>
                            </div>
                            <h3>Maxyray</h3>
                            <div class="location">@glazie-ltd</div>
                            <div class="text">Superb service from start to finish. Excellent advice on what was appropriate for the space and was flexible when we changed our mind about which way the door opened half way through! They got the job done within the day, has left us with an excellent finish and all the old fixings cleared along with a great clean up job. I couldn't recommend glazieltd enough. I got 7 quoted in total and they were the most competitive price wise and used top quality materials.</div>
                        </div>
                    </div>

                    <!--Testimonial Block-->
                    <div class="testimonial-block">
                        <div class="inner-box">
                            <div class="image-outer">
                                <div class="image">
                                    <img src="{{('assets/media/testimonial/author-4.jpg')}}" alt="Susan Elkin" />
                                </div>
                                <div class="quote-icon">
                                    <span class="icon icon-flaticon-quote-1"></span>
                                </div>
                            </div>
                            <h3>Susan Elkin</h3>
                            <div class="location">@glazie-ltd</div>
                            <div class="text">Truly awesome job on our front and back door at an incredibly reasonable price.I am very surprised with the quality of work completed in time.Thanks again Ray for your support will be calling you guys up again at some point in the future for the top floor of the house! I Would strongly recommend to anyone looking for a trustworthy company just go glazie...</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /testimonial -->

    <!-- brands -->
    <section class="section product-section">
        <div class="title-box">
            <div class="container">
                <!--Sec Title-->
                <div class="sec-title text-center">
                    <div class="title-inner">
                        <h2>Our <span class="theme_color">Brands</span></h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="lower-section">
            <div class="lower-inner-section">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="brand-carousel owl-carousel">
                                @foreach ($brands as $brand)
                                <div class="single-logo">
                                    <img src="{{('admin-assets/brands/'.$brand->image)}}" alt="">
                                </div>
                                @endforeach
                                
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- /brands -->
</div>
@endsection
@section('script')
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
    toastr.options = {
    "closeButton": true,
    "debug": false,
    "newestOnTop": false,
    "progressBar": true,
    "positionClass": "toast-top-center",
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
</script>

