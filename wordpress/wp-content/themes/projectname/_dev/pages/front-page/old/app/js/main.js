(function($){	

	$(document).ready(function() {

		/* slider */
	    if ($('.model-section .slick').length) {
            var $Slider = $('.model-section .slick');

			var slickOpts = {
				//autoplay: true,
				appendArrows: $('.model-section__controls'),
				prevArrow: $('.model-section__prev'),
				nextArrow: $('.model-section__next'),
				appendDots: $('.model-section__controls'),
				dots: true,
				dotsClass: 'model-section__pager',
				slidesToShow: 3,
				slidesToScroll: 1,			
				easing: 'swing', 
				speed: 700,				
				dotsClass: 'model-section__dots',
				customPaging: function (slider, i) {
					console.log(slider);
					var slideNumber = (i + 1),
						totalSlides = slider.slideCount;
					return '<a class="model-section__dot" role="button" title="' + slideNumber + ' of ' + totalSlides + '"><span class="model-section__string">' + slideNumber + '/' + totalSlides + '</span></a>';
				}				
				
			}
			$Slider.slick(slickOpts);
			//$(window).on("orientationchange resize", slickOpts);		
		}	
		
		//Плавный скролл до блока .div по клику на .scroll
 		$('a.header__link-down').click(function(e) {
			e.preventDefault();
			var scroll = $(this).attr('href');
			$.scrollTo($(scroll), 800, {
				offset: 0  
			});
		}); 
		
		//Кнопка Вверх
/*  		$('.scroll-top').click(function () {
			$('body, html').animate({
				scrollTop: 0
			}, 800);
			return false;
		}); */

		
	});
	
	$(window).on('load', function() {
		
	});	
	
})(jQuery);