$( document ).ready(function() {

$('#footer-menu a').each(function() {
   var a = new RegExp('/' + window.location.host + '/');
   if(!a.test(this.href)) {
       $(this).click(function(event) {
           event.preventDefault();
           event.stopPropagation();
           window.open(this.href, '_blank');
       });
   }
});

$(".accordion > li > div").click(function(){
    //$(this).addClass('open');
    if(false == $(this).next().is(':visible')) {
    
        $('.accordion > div > ul').slideUp(300);
        $(this).removeClass('open');
        
    }
    
    $(this).next().slideToggle(300);
});
 
//$('.accordion ul:eq(0)').show();

$('.accordion li a').click(function(){
  $(this).parent().parent().find('.current_page_item').removeClass('current_page_item');
  $(this).parent().addClass('current_page_item');
});

$('li.menu-item-has-children').hover(
   function() {
      $(this).find('ul').stop(true, true).transition({height: 'auto'},300);
   },
   function() {
      $(this).find('ul').stop(true, true).transition({height: 0},300);
   }
);

});

SmartAjax_load('/wp-content/themes/mayashoots_update/javascripts/', function() {

	function siteFunctions() {

		//	$('#menu-main-menu').superfish({
		//		animation: {height:'show'},
		//		delay:		 1200
		//	});
		
		$('a.modal').magnificPopup({
			type: 'inline',
			fixedContentPos: false,
			fixedBgPos: true,
			overflowY: 'auto',
			closeBtnInside: true,
			preloader: false,
			midClick: true,
			removalDelay: 300,
			mainClass: 'my-mfp-slide-bottom',
		});

		$('.photo-gallery .item').magnificPopup({
			delegate: 'a',
			type: 'image',
			removalDelay: 500,
			//delay removal by X to allow out-animation
			callbacks: {
				beforeOpen: function() {
					// just a hack that adds mfp-anim class to markup 
					this.st.image.markup = this.st.image.markup.replace('mfp-figure', 'mfp-figure mfp-with-anim');
					this.st.mainClass = this.st.el.attr('data-effect');
				}
			},
			gallery: {
				enabled: true,
				navigateByImgClick: true,
				preload: [0, 1] // Will preload 0 - before current, and 1 after the current image
			},
			closeOnContentClick: true,
			midClick: true // allow opening popup on middle mouse click. Always set it to true if you don't provide alternative source.
		});

		//	$('.photo-gallery').magnificPopup({
		//		delegate: '.item a',
		//		type: 'image',
		//		tLoading: 'Loading image #%curr%...',
		//		mainClass: 'mfp-img-mobile',
		//		gallery: {
		//			enabled: true,
		//			navigateByImgClick: true,
		//			preload: [0, 1] // Will preload 0 - before current, and 1 after the current image
		//		}
		//	});
		$("#project").delegate(".item", "mouseover mouseout", function(e) {
			if (e.type == 'mouseover') {
				$("#project .item").not(this).dequeue().transition({
					opacity: "0.3"
				}, 300);
			} else {
				$("#project .item").not(this).dequeue().transition({
					opacity: "1"
				}, 300);
			}
		});

	}

	siteFunctions();

	function siteLoad() {

		setTimeout(function() {
			$('.fullscreen, #header, .hentry').transition({
				opacity: 1
			}, 500);
		}, 500)

	}

	siteLoad();

	function bigImg() {

		var ox = $(window).width();
		var oy = $(window).height();

		$('.fullscreen img').each(function() {

			var self = this;
			var img = new Image();
			img.onload = function() {
				var cx = this.width;
				var cy = this.height;

				$(self).parent().css({
					'width': ox,
					'height': oy
				});

				$(self).parent().parent().css({
					'width': ox * 5,
					'height': oy
				});

				$(self).parent().parent().parent().css({
					'width': ox,
					'height': oy
				});

				if (ox / oy > cx / cy) {
					$(self).css({
						'width': ox,
						'height': (ox * cy / cx),
						'left': 0,
						'top': 0.5 * (oy - (ox * cy / cx)),
						'position': 'relative'
					});

				} else {
					$(self).css({
						'width': oy * cx / cy,
						'height': oy,
						'top': 0,
						'left': 0.5 * (ox - (oy * cx / cy)),
						'position': 'relative'
					});
				}
			}
			img.src = $(self).attr('src');
		});

		var wh = $(window).height();

	}

	$(window).resize(function() {
		bigImg();
	}).resize();


	SmartAjax.bind('a:not([href^="mailto:"])', {
		reload: false,
		cache: true,
		containers: [{
			selector: '#content'
		}],
		before: function() {
			$('#content-wrap').transition({
				y: 10,
				opacity: 0,
			}, 400, SmartAjax.proceed);
			$('#loading').fadeIn(400);
		},
		done: function() {
			imagesLoaded(document.querySelector('#content-wrap'), function(instance) {
				$('#content-wrap').transition({
					y: 0,
					opacity: 1
				}, 400);
				$('#loading').fadeOut(400);
			});
			siteFunctions();
			siteLoad();
			bigImg();
		}
	});
	
	SmartAjax.bind('.home a, .logo a, a:not([href^="mailto:"])', {
		reload: false,
		cache: true,
		containers: [{
			selector: '#content'
		}],
		before: function() {
			$('#content-wrap').transition({
				y: 10,
				opacity: 0,
			}, 400, SmartAjax.proceed);
			$('#loading').fadeIn(400);
			$('#header').transition({opacity:0});
		},
		done: function() {
			imagesLoaded(document.querySelector('#content-wrap'), function(instance) {
				$('#content-wrap').transition({
					y: 0,
					opacity: 1
				}, 400);
				$('#loading').fadeOut(400);
			});
			$('#header').transition({opacity:1});
			siteFunctions();
			siteLoad();
			bigImg();
		}
	});

}, true);