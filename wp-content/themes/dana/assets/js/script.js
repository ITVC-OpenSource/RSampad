// JavaScript Document
jQuery(document).ready(function(jQuery){
	"use strict";
	jQuery('.top-slider-panel').owlCarousel({
		loop:true,
		margin:20,
		nav:false,
		rtl:true,
		items: 1,
		dots: true,
		autoplay:true,
		autoplayTimeout:5000,
		autoplayHoverPause:true,
		responsive:{
        0:{
            items:1
        },
		400:{
            items:1
        },
        600:{
            items:1
        },
        1000:{
            items:1
        }
    }
	});

	jQuery('.pic-page-slider-panel').owlCarousel({
		loop:true,
		margin:20,
		nav:true,
		rtl:true,
		items: 1,
		autoplay:true,
		autoplayTimeout:5000,
		autoplayHoverPause:true,
		navText:['',''],
		responsive:{
        0:{
            items:1
        },
		400:{
            items:1
        },
        600:{
            items:1
        },
        1000:{
            items:1
        }
    }
	});
	jQuery('.voice-car-panel').owlCarousel({
		loop:true,
		margin:20,
		nav:true,
		rtl:true,
		items: 1,
		autoplay:true,
		autoplayTimeout:5000,
		autoplayHoverPause:true,
		responsive:{
        0:{
            items:1
        },
		400:{
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
	jQuery('.newspaper-car-panel').owlCarousel({
		loop:true,
		margin:20,
		nav:false,
		dots:false,
		rtl:true,
		items: 1,
		autoplay:true,
		autoplayTimeout:5000,
		autoplayHoverPause:true,
		responsive:{
        0:{
            items:1
        },
		400:{
            items:1
        },
        600:{
            items:1
        },
        1000:{
            items:1
        }
    }
	});
	jQuery('.pic-car-panel').owlCarousel({
		loop:true,
		margin:20,
		nav:false,
		rtl:true,
		items: 1,
		autoplay:true,
		autoplayTimeout:5000,
		autoplayHoverPause:true,
		responsive:{
        0:{
            items:1
        },
		400:{
            items:2
        },
        600:{
            items:3
        },
        1000:{
            items:3
        }
    }
	});
	jQuery('.vid-car-panel').owlCarousel({
		loop:true,
		margin:20,
		nav:false,
		rtl:true,
		items: 1,
		autoplay:true,
		autoplayTimeout:5000,
		autoplayHoverPause:true,
		responsive:{
        0:{
            items:1
        },
		400:{
            items:2
        },
        600:{
            items:3
        },
        1000:{
            items:3
        }
    }
	});
	jQuery('.nav-search > button').click(function(){
		jQuery('.nav-search form').fadeIn();
		jQuery('.blured').fadeIn();
		jQuery('.menu-search').css({filter: 'blur(2px)'});
	});
	
	
	jQuery('.close-search, .blured').click(function(){
		jQuery('.nav-search form').fadeOut();
		jQuery('.menu-search').css({filter: 'blur(0)'});
		jQuery('.menu-search').attr("style","");
		jQuery('.blured').fadeOut();
	});
	
	
	
	
});
	jQuery('.related-car-panel').owlCarousel({
		loop:true,
		margin:20,
		nav:true,
		rtl:true,
		items: 1,
		autoplay:true,
		autoplayTimeout:5000,
		autoplayHoverPause:true,
		responsive:{
        0:{
            items:1
        },
		400:{
            items:2
        },
        600:{
            items:2
        },
        1000:{
            items:3
        }
    }
	});

jQuery( document ).ready(function(jQuery) {

jQuery( ".cross" ).hide();
jQuery( ".res-link-panel" ).hide();
jQuery( ".hamburger" ).click(function() {
jQuery( ".res-link-panel" ).slideToggle( "slow", function() {
jQuery( ".hamburger" ).hide();
jQuery( ".cross" ).show();
});
});

jQuery( ".cross" ).click(function() {
jQuery( ".res-link-panel" ).slideToggle( "slow", function() {
jQuery( ".cross" ).hide();
jQuery( ".hamburger" ).show();
});
});

});
jQuery('#main-menu > ul > li.menu-item-has-children').hover(function(){
		jQuery(this).find('.main-sub-menu').stop(!0,!1,!0).fadeIn();
		jQuery(this).addClass("active-menu");	
	},function(){
		jQuery(this).find('.main-sub-menu').stop(!0,!1,!0).fadeOut();
		jQuery(this).removeClass("active-menu");
	});
	
	jQuery('.responsive-menu-toggle').click(function() {
        jQuery('.responsive-menu').fadeIn();
    });
    jQuery('.close-menu').click(function() {
        jQuery('.responsive-menu').fadeOut();
    });
    jQuery(document).mouseup(function(e) {
        var container = jQuery(".responsive-menu");
        if (!container.is(e.target) && container.has(e.target).length === 0) {
            jQuery('.responsive-menu').fadeOut();
        }
    });
	
	jQuery('.resmenu .menu-item-has-children > a').after("<span class='sub-arrow'>+</span>");
	
    jQuery('.resmenu .menu-item-has-children .sub-arrow').click(function() {
        jQuery(this).toggleClass('openli');
        if (jQuery(this).hasClass('openli')) {
            jQuery(this).text('-');
        } else {
            jQuery(this).text('+');
        }
    });
    jQuery('.sub-arrow').click(function() {
        jQuery(this).next('ul.sub-menu').slideToggle();
    });
	
	
	jQuery('.mega-menu .menu-col > ul > li.menu-item-has-children > a').before("<span class='has-sub-arrow'><i class='hsd-plus-squared-alt'></i></span>");
	
	jQuery('.mega-menu .menu-col > ul > li.menu-item-has-children > .has-sub-arrow').click(function() {
        jQuery(this).toggleClass('openli');
        if (jQuery(this).hasClass('openli')) {
            jQuery(this).html("<i class='hsd-minus-squared-alt'></i>");
        } else {
            jQuery(this).html("<i class='hsd-plus-squared-alt'></i>");
        }
    });
	
    jQuery('.has-sub-arrow').click(function() {
		var d_id = jQuery(this).parent().parent().parent().parent().attr('data-id');
		jQuery('.menu-row').each(function(){
			if(jQuery(this).attr("data-id") != d_id) {
				jQuery(this).find('.menu-col ul li ul').slideUp();
				jQuery(this).find('.menu-col ul li span.has-sub-arrow').html("<i class='hsd-plus-squared-alt'></i>");
				jQuery(this).find('.menu-col ul li span.has-sub-arrow').removeClass('openli');
			}
		});
		
		if (jQuery(this).find('i').hasClass('hsd-plus-squared-alt')) {
			jQuery(this).next('a').next('ul').slideUp();
		} else {
			jQuery(this).next('a').next('ul').slideDown();
		}
        
    });




	jQuery('#resmenu li>ul').hide();
	jQuery('#resmenu li.menu-item-has-children').each(function(){
		jQuery(this).children('a').after('<span class="arrow">+</span>');
	});
	jQuery('#resmenu li .arrow').click(function(){
		jQuery(this).next('.sub-menu').slideToggle('fast');
	});









var thumbnailSliderOptions =
{
    sliderId: "thumbnail-slider",
    orientation: "vertical",
    thumbWidth: "140px",
    thumbHeight: "70px",
    showMode: 2,
    autoAdvance: false,
    selectable: true,
    slideInterval: 3000,
    transitionSpeed: 900,
    shuffle: false,
    startSlideIndex: 0, //0-based
    pauseOnHover: true,
    initSliderByCallingInitFunc: false,
    rightGap: 0,
    keyboardNav: false,
    mousewheelNav: true,
    before: function (currentIdx, nextIdx, manual) { if (typeof nslider != "undefined") nslider.displaySlide(nextIdx); },
    license: "mylicense"
};


	
jQuery('.wpcarousel').slick({
  slidesToShow: 3,
  slidesToScroll: 1,
  autoplay: true,
  autoplaySpeed: 2000,
  vertical: true,
  verticalSwiping: true,
  prevArrow: '<button type="button" class="slick-prev"></button>',
  nextArrow: '<button type="button" class="slick-next"></button>',
});

jQuery('.wpcarousel2').slick({
  slidesToShow: 4,
  slidesToScroll: 1,
  autoplay: true,
  autoplaySpeed: 2000,
  vertical: true,
  verticalSwiping: true,
  prevArrow: '<button type="button" class="slick-prev"></button>',
  nextArrow: '<button type="button" class="slick-next"></button>',
});

jQuery('.wpcarousel3').slick({
  slidesToShow: 8,
  slidesToScroll: 4,
  autoplay: true,
  autoplaySpeed: 2000,
  vertical: true,
  verticalSwiping: true,
  prevArrow: '<button type="button" class="slick-prev"></button>',
  nextArrow: '<button type="button" class="slick-next"></button>',
});
	
jQuery('.most-view-widget').slick({
  slidesToShow: 8,
  slidesToScroll: 4,
  autoplay: true,
  autoplaySpeed: 2000,
  vertical: true,
  verticalSwiping: true,
  prevArrow: '<button type="button" class="slick-prev"></button>',
  nextArrow: '<button type="button" class="slick-next"></button>',
});

jQuery('.fcarousel').slick({
  slidesToShow: 5,
  slidesToScroll: 1,
  rtl: true,
  autoplay: true,
  autoplaySpeed: 2000,
  prevArrow: '<button type="button" class="slick-prev"></button>',
  nextArrow: '<button type="button" class="slick-next"></button>',
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 4,
        slidesToScroll: 3,
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ]
});	
 var owl = jQuery('.cat-car').owlCarousel({
	 
        items:5,
	 
        rtl: true,
        margin:-55,
        nav: true,
        dots: false,
        loop: true,
        center: true,
        navText: ['<div class="car-arrow"><i class="fam-angle-right"></i></div>','<div class="car-arrow"><i class="fam-angle-left"></i></div>'],
	 autoplay:true,
		autoplayTimeout:5000,
		autoplayHoverPause:true,
        responsive:{
            0:{
                items:2
            },
            600:{
                items:5
            },
            1000:{
                items:3
            }
        }

    });

    jQuery('.center').prev().addClass('beforeCenter');
    owl.on('dragged.owl.carousel', function(event) {
        jQuery('.owl-item').removeClass('beforeCenter');
        jQuery('.center').prev().addClass('beforeCenter');
    });
    owl.on('destroy.owl.carousel', function(event) {
        jQuery('.owl-item').removeClass('beforeCenter');
        jQuery('.center').prev().addClass('beforeCenter');
    });



if(jQuery('#jssor_1').length) {

var jssor_1_SlideshowTransitions = [
              {jQueryDuration:1200,jQueryZoom:1,jQueryEasing:{jQueryZoom:jQueryJeasejQuery.jQueryInCubic,jQueryOpacity:jQueryJeasejQuery.jQueryOutQuad},jQueryOpacity:2},
              {jQueryDuration:1000,jQueryZoom:11,jQuerySlideOut:true,jQueryEasing:{jQueryZoom:jQueryJeasejQuery.jQueryInExpo,jQueryOpacity:jQueryJeasejQuery.jQueryLinear},jQueryOpacity:2},
              {jQueryDuration:1200,jQueryZoom:1,jQueryRotate:1,jQueryDuring:{jQueryZoom:[0.2,0.8],jQueryRotate:[0.2,0.8]},jQueryEasing:{jQueryZoom:jQueryJeasejQuery.jQuerySwing,jQueryOpacity:jQueryJeasejQuery.jQueryLinear,jQueryRotate:jQueryJeasejQuery.jQuerySwing},jQueryOpacity:2,jQueryRound:{jQueryRotate:0.5}},
              {jQueryDuration:1000,jQueryZoom:11,jQueryRotate:1,jQuerySlideOut:true,jQueryEasing:{jQueryZoom:jQueryJeasejQuery.jQueryInExpo,jQueryOpacity:jQueryJeasejQuery.jQueryLinear,jQueryRotate:jQueryJeasejQuery.jQueryInExpo},jQueryOpacity:2,jQueryRound:{jQueryRotate:0.8}},
              {jQueryDuration:1200,x:0.5,jQueryCols:2,jQueryZoom:1,jQueryAssembly:2049,jQueryChessMode:{jQueryColumn:15},jQueryEasing:{jQueryLeft:jQueryJeasejQuery.jQueryInCubic,jQueryZoom:jQueryJeasejQuery.jQueryInCubic,jQueryOpacity:jQueryJeasejQuery.jQueryLinear},jQueryOpacity:2},
              {jQueryDuration:1200,x:4,jQueryCols:2,jQueryZoom:11,jQuerySlideOut:true,jQueryAssembly:2049,jQueryChessMode:{jQueryColumn:15},jQueryEasing:{jQueryLeft:jQueryJeasejQuery.jQueryInExpo,jQueryZoom:jQueryJeasejQuery.jQueryInExpo,jQueryOpacity:jQueryJeasejQuery.jQueryLinear},jQueryOpacity:2},
              {jQueryDuration:1200,x:0.6,jQueryZoom:1,jQueryRotate:1,jQueryDuring:{jQueryLeft:[0.2,0.8],jQueryZoom:[0.2,0.8],jQueryRotate:[0.2,0.8]},jQueryEasing:jQueryJeasejQuery.jQuerySwing,jQueryOpacity:2,jQueryRound:{jQueryRotate:0.5}},
              {jQueryDuration:1000,x:-4,jQueryZoom:11,jQueryRotate:1,jQuerySlideOut:true,jQueryEasing:{jQueryLeft:jQueryJeasejQuery.jQueryInExpo,jQueryZoom:jQueryJeasejQuery.jQueryInExpo,jQueryOpacity:jQueryJeasejQuery.jQueryLinear,jQueryRotate:jQueryJeasejQuery.jQueryInExpo},jQueryOpacity:2,jQueryRound:{jQueryRotate:0.8}},
              {jQueryDuration:1200,x:-0.6,jQueryZoom:1,jQueryRotate:1,jQueryDuring:{jQueryLeft:[0.2,0.8],jQueryZoom:[0.2,0.8],jQueryRotate:[0.2,0.8]},jQueryEasing:jQueryJeasejQuery.jQuerySwing,jQueryOpacity:2,jQueryRound:{jQueryRotate:0.5}},
              {jQueryDuration:1000,x:4,jQueryZoom:11,jQueryRotate:1,jQuerySlideOut:true,jQueryEasing:{jQueryLeft:jQueryJeasejQuery.jQueryInExpo,jQueryZoom:jQueryJeasejQuery.jQueryInExpo,jQueryOpacity:jQueryJeasejQuery.jQueryLinear,jQueryRotate:jQueryJeasejQuery.jQueryInExpo},jQueryOpacity:2,jQueryRound:{jQueryRotate:0.8}},
              {jQueryDuration:1200,x:0.5,y:0.3,jQueryCols:2,jQueryZoom:1,jQueryRotate:1,jQueryAssembly:2049,jQueryChessMode:{jQueryColumn:15},jQueryEasing:{jQueryLeft:jQueryJeasejQuery.jQueryInCubic,jQueryTop:jQueryJeasejQuery.jQueryInCubic,jQueryZoom:jQueryJeasejQuery.jQueryInCubic,jQueryOpacity:jQueryJeasejQuery.jQueryOutQuad,jQueryRotate:jQueryJeasejQuery.jQueryInCubic},jQueryOpacity:2,jQueryRound:{jQueryRotate:0.7}},
              {jQueryDuration:1000,x:0.5,y:0.3,jQueryCols:2,jQueryZoom:1,jQueryRotate:1,jQuerySlideOut:true,jQueryAssembly:2049,jQueryChessMode:{jQueryColumn:15},jQueryEasing:{jQueryLeft:jQueryJeasejQuery.jQueryInExpo,jQueryTop:jQueryJeasejQuery.jQueryInExpo,jQueryZoom:jQueryJeasejQuery.jQueryInExpo,jQueryOpacity:jQueryJeasejQuery.jQueryLinear,jQueryRotate:jQueryJeasejQuery.jQueryInExpo},jQueryOpacity:2,jQueryRound:{jQueryRotate:0.7}},
              {jQueryDuration:1200,x:-4,y:2,jQueryRows:2,jQueryZoom:11,jQueryRotate:1,jQueryAssembly:2049,jQueryChessMode:{jQueryRow:28},jQueryEasing:{jQueryLeft:jQueryJeasejQuery.jQueryInCubic,jQueryTop:jQueryJeasejQuery.jQueryInCubic,jQueryZoom:jQueryJeasejQuery.jQueryInCubic,jQueryOpacity:jQueryJeasejQuery.jQueryOutQuad,jQueryRotate:jQueryJeasejQuery.jQueryInCubic},jQueryOpacity:2,jQueryRound:{jQueryRotate:0.7}},
              {jQueryDuration:1200,x:1,y:2,jQueryCols:2,jQueryZoom:11,jQueryRotate:1,jQueryAssembly:2049,jQueryChessMode:{jQueryColumn:19},jQueryEasing:{jQueryLeft:jQueryJeasejQuery.jQueryInCubic,jQueryTop:jQueryJeasejQuery.jQueryInCubic,jQueryZoom:jQueryJeasejQuery.jQueryInCubic,jQueryOpacity:jQueryJeasejQuery.jQueryOutQuad,jQueryRotate:jQueryJeasejQuery.jQueryInCubic},jQueryOpacity:2,jQueryRound:{jQueryRotate:0.8}}
            ];

            var jssor_1_options = {
              jQueryAutoPlay: 1,
              jQuerySlideshowOptions: {
                jQueryClass: jQueryJssorSlideshowRunnerjQuery,
                jQueryTransitions: jssor_1_SlideshowTransitions,
				 
                jQueryTransitionsOrder: 1
              },
              jQueryArrowNavigatorOptions: {
                jQueryClass: jQueryJssorArrowNavigatorjQuery
              },
              jQueryThumbnailNavigatorOptions: {
                jQueryClass: jQueryJssorThumbnailNavigatorjQuery,
                jQueryRows: 2,
                jQuerySpacingX: 14,
                jQuerySpacingY: 12,
                jQueryOrientation: 2,
                jQueryAlign: 156
              }
            };

            var jssor_1_slider = new jQueryJssorSliderjQuery("jssor_1", jssor_1_options);

            /*#region responsive code  begin*/

            var MAX_WIDTH = 873;

            function ScaleSlider() {
                var containerElement = jssor_1_slider.jQueryElmt.parentNode;
                var containerWidth = containerElement.clientWidth;

                if (containerWidth) {

                    var expectedWidth = Math.min(MAX_WIDTH || containerWidth, containerWidth);

                    jssor_1_slider.jQueryScaleWidth(expectedWidth);
                }
                else {
                    window.setTimeout(ScaleSlider, 30);
                }
            }

            ScaleSlider();

            jQuery(window).bind("load", ScaleSlider);
            jQuery(window).bind("resize", ScaleSlider);
            jQuery(window).bind("orientationchange", ScaleSlider);
            /*#endregion responsive code end*/

}
