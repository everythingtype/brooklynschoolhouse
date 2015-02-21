(function($) {

	var myScrollTop = 0;

	jQuery.fn.hoverClass = function() {
		if (/iPhone|iPad|iPod/i.test(navigator.userAgent)) {
			// Don't do
		} else {
			$(this).hover(function() {
			    $(this).addClass('hover');
			}, function() {
			    $(this).removeClass('hover');
			});
		}
	}

	jQuery.fn.openSubs = function() {
		$(this).addClass('active');
		$(this).html('&uarr;');
		$(this).parent().find('ul').stop().slideDown("fast");
	}

	jQuery.fn.closeSubs = function() {
		$(this).removeClass('active');
		$(this).html('&darr;');
		$(this).parent().find('ul').stop().slideUp("fast");
	}

	jQuery.fn.openLightbox = function() {

		if (/iPhone|iPad|iPod/i.test(navigator.userAgent)) {
			myScrollTop = $('body').scrollTop();

			var wpadminbar = 0; 
			if ($('#wpadminbar').length != 0) {
				wpadminbar = $('#wpadminbar').outerHeight();
			}

			thisOffset = myScrollTop - wpadminbar;
			offsetString = "-" + thisOffset + "px";

			$('.content-area').css({
			    'top': offsetString,
			    'position':'fixed'
			});

		}

		$('body').addClass('haslightbox');
		$(this).stop().slideDown("fast");
	}

	jQuery.fn.closeLightbox = function() {

		if (/iPhone|iPad|iPod/i.test(navigator.userAgent)) {

			$('.content-area').css({
			    'top': "auto",
			    'position':'static'
			});

			$( "body" ).scrollTop( myScrollTop );
			myScrollTop = 0;

		}

		$('body').removeClass('haslightbox');
		$(this).stop().slideUp("fast");
	}

	jQuery.fn.playVideo = function() {

		var videoContent = $(this).parents('.videocontent');
		var iframeid = videoContent.find('iframe').attr('id');
		var iframe = document.getElementById(iframeid);
		var player = $f(iframe); // $f == Froogaloop

		player.api("play");
		videoContent.find('.videoimage').fadeOut('slow');

	}

	jQuery.fn.toggleFold = function() {

		var thisFold = $(this).parents('.accordionfold');

		if ( thisFold.hasClass('activefold') ) {
			// Close
			thisFold.removeClass('activefold');
			thisFold.find('.target').stop().slideUp("fast");
		} else {
			// Open
			thisFold.addClass('activefold');
			thisFold.find('.target').stop().slideDown("fast");
		}

	}

	function setupNavArrows() {
		$('.nav li ul').hide().parent().prepend('<span class="navarrow opensubs">&darr;</span>');
	}

	function setupSliders() {
		$('.flexslider').flexslider({
			'animation' : 'slide',
			'controlNav': false,
			'slideshow' : false,
			'smoothHeight': true,
		});
	}

	function openNav() {
		$('.navtoggle').addClass('active');
		$("#navlightbox").openLightbox();
	}

	function closeNav() {
		$('.navtoggle').removeClass('active');
		$("#navlightbox").closeLightbox();
	}

	function setMargin() {

		var headertop = 0;

		if ($('#wpadminbar').length != 0) {
			headertop =+ $('#wpadminbar').outerHeight();
		}

		$('.header').css({
			'margin-top' : headertop + 'px'
		});

		var topTitle = $('.toptitle').outerHeight();
		$('.headerspacer').css({'height': topTitle + 'px'});

		var navHeight = $('.sitetitle').outerHeight();
		var lightboxTop = headertop + navHeight;
		$('.lightbox').css({'top': lightboxTop + 'px'});

	}

	$(document).ready(function() {
		$('html').addClass('js');

		// Vimeo iframes need IDs for froogaloop autoplay to work
		$('iframe').each(function(){
			var attr = $(this).attr('id');
			if (typeof attr !== typeof undefined && attr !== false) {
				// Don't do
			} else {
				$(this).attr('id', function(i) {
				   return 'frame'+(i+1);
				});
			}
		});

		setMargin();
		setupNavArrows();

		$('.print a').on('click', function(event) {
			event.preventDefault;
			javascript:window.print();
		});

		$('.navtoggle').on("click", function(event) {
			event.preventDefault();

			if ( $(this).hasClass('active') ) {
				closeNav();
			} else {
				openNav();
			}
		});

		$('.navarrow').on("click", function(event) {
			event.preventDefault();

			if ( $(this).hasClass('active') ) {
				$(this).closeSubs();
			} else {
				$(this).openSubs();
			}
		});

		$('.accordionfold .trigger').on("click", function(event) {
			event.preventDefault();
			$(this).toggleFold();
		});

		// Lightboxes
		$('a.linktype-block').on("click", function(event) {
			event.preventDefault();

			var full_url = this.href;
			var parts = full_url.split("#");
			var trgt = parts[1];
			$("#" + trgt).openLightbox();
		});

		$('a.closelightbox').on("click", function(event) {
			event.preventDefault();
			$(this).parents('.lightbox').closeLightbox();
		});

		// Vimeo
		$('.video-block .playbutton').on("click", function(event) {
			event.preventDefault();
			$(this).playVideo();
		});

		// Hover Fixes
		$('.links-block a').hoverClass();
		$('.video-block .playbutton').hoverClass();

	});

	$(window).load(function(){
		setMargin();
		setupSliders();
	});

	$(window).resize(function(){
		setMargin();
		setupSliders();
	});

})(jQuery);

