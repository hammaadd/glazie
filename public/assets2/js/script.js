(function($) {
	'use strict';

	/*===================================*
	01. LOADING JS
	/*===================================*/
	$(window).on('load', function() {
		setTimeout(function () {
			$(".preloader").delay(700).fadeOut(700).addClass('loaded');
		}, 800);
	});

	/*===================================*
	02. SEARCH JS
	*===================================*/
    
	$(".close-search").on("click", function() {
		$(".search_wrap,.search_overlay").removeClass('open');
		$("body").removeClass('search_open');
	});
	
	var removeClass = true;
	$(".search_wrap").after('<div class="search_overlay"></div>');
	$(".search_trigger").on('click', function () {
		$(".search_wrap,.search_overlay").toggleClass('open');
		$("body").toggleClass('search_open');
		removeClass = false;
		if($('.navbar-collapse').hasClass('show')) {
			$(".navbar-collapse").removeClass('show');
			$(".navbar-toggler").addClass('collapsed');
			$(".navbar-toggler").attr("aria-expanded", false);
		}
	});
	$(".search_wrap form").on('click', function() {
		removeClass = false;
	});
	$("html").on('click', function () {
		if (removeClass) {
			$("body").removeClass('open');
			$(".search_wrap,.search_overlay").removeClass('open');
			$("body").removeClass('search_open');
		}
		removeClass = true;
	});

	/*===================================*
	03. BACKGROUND IMAGE JS
	*===================================*/
	/*data image src*/
	// $(".background_bg").each(function() {
	// 	var attr = $(this).attr('data-img-src');
	// 	if (typeof attr !== typeof undefined && attr !== false) {
	// 		$(this).css('background-image', 'url(' + attr + ')');
	// 	}
	// });

	/*===================================*
	04. FRONT PAGE SLIDER JS
	*===================================*/
    var arrowIcons = [
        '<span class="icon-left-big"></span>',
        '<span class="icon-right-big"></span>'
    ];


    $.each($(".owl-slider"), function (i, n) {

        var $n = $(n);

        $n.owlCarousel({
            autoplay: $n.data("autoplay"),
            autoplayTimeout: 6000,
            autoplayHoverPause: true,
            items: 1,
            loop: true,
            // spacing
            margin: 10,
            stagePadding: 0,
            // navigation
            nav: true,
            dots: false,
            navText: arrowIcons,
            // animation effects
            smartSpeed: 950,
            onTranslated: startAnimation,
            onTranslate: resetAnimation,
            animateIn: 'fadeIn',
            animateOut: 'fadeOut'
        });

        resetAnimation(); // reset effects all on initalization
        startAnimation(); // start animation on first slide

        function startAnimation(event) {
            // find active slide
            var activeItem = $(n).find('.owl-item.active'),
                timeDelay = 100;

            $.each(activeItem.find('.animated'), function (j, m) {
                // catch active slide
                var item = $(m);
                item.css('animation-delay', timeDelay + 'ms');
                timeDelay = timeDelay + 180;
                // add animation
                item.removeClass('fadeOut');
                item.addClass(item.data('start'));
            });
        }

        function resetAnimation(event) {
            // catch all slides
            var items = $(n).find('.owl-item');
                // for each add animation end
                $.each(items.find('.animated'), function (j, m) {
                    var item = $(m);
                    item.removeClass(item.data('start'));
                    item.addClass('fadeOut');
                });
        }
        var navHeight = $('nav').height();

        if ($(n).hasClass('owl-slider-fullscreen')) {
            $('.header-content .item').height($(window).height() - navHeight);
        }

    });


	/*===================================*
	04. Single Item Carousel JS
	*===================================*/
	if ($('.single-item-carousel').length) {
		$('.single-item-carousel').owlCarousel({
			loop:true,
			margin:0,
			nav:true,
			// autoplay:false,
			smartSpeed: 500,
			autoplay: 5000,
			dots: false,
			navText: [ '<span class="icon-left-big"></span>', '<span class="icon-right-big"></span>' ],
			responsive:{
				0:{
					items:1
				},
				600:{
					items:1
				},
				800:{
					items:1
				},
				1024:{
					items:1
				},
				1200:{
					items:1
				},
				1600:{
					items:1
				},
				1920:{
					items:1
				}
			}
		});
	}
	/*===================================*
	05. PRODUCTS SLIDER JS
	*===================================*/
	if ($('.product_slider').length) {
		$('.product_slider').owlCarousel({
			loop:true,
			margin:0,
			nav:false,
			// autoplay:false,
			smartSpeed: 500,
			autoplay: 5000,
			dots: false,
			margin: 20,
			navText: [ '<span class="icon-left-big"></span>', '<span class="icon-right-big"></span>' ],
			responsive:{
				0:{
					items:2
				},
				600:{
					items:2
				},
				992:{
					nav:true,
					items:3
				},
				1024:{
					nav:true,
					items:4,
				},
				1200:{
					nav:true,
					items:4
				},
				1600:{
					nav:true,
					items:4
				},
				1920:{
					nav:true,
					items:4
				}
			}
		});
	}


	/*===================================*
	05. BRANDS SLIDER JS
	*===================================*/
	if ($('.brand-carousel').length) {
		$('.brand-carousel').owlCarousel({
			loop:true,
			margin:0,
			smartSpeed: 500,
			autoplay: 5000,
			// autoplay: false,
			responsive:{
				0:{
					items:2
				},
				600:{
					items:3
				},
				1000:{
					items:5
				}
			}
		});
	}


	// $(function() {
		$('#vidBox').VideoPopUp({
			backgroundColor: "#17212a",
			opener: "video",
			idvideo: "v1",
			pausevideo: false
		});
	// });


})(jQuery);