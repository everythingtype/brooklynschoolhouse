(function($) {

	jQuery.fn.makeFabAnchor = function() {
		$(this).parents('section').prepend('<a class="fabanchor"></a>');
	}

	jQuery.fn.makeFabLink = function() {
		$(this).append('<a class="fablink material"><span>&darr;</span></a>');
	}

	function setFabAnchorPositions() {

		var headerHeight = $('.fixedheader').outerHeight();

		$('.fabanchor').css({
			'position' : 'relative',
			'top' : '-' + headerHeight + 'px'
		});

	}

	function setupFabs() {

		$('.fabbutton').not(":first").makeFabAnchor();
		setFabAnchorPositions();

		$('.fabbutton').not(":last").makeFabLink();

		$('.fablink').on('click', function(event) {
			event.preventDefault;

			var thisindex = $(this).parents('section').index();

			$.scrollTo(
				'.fabanchor:eq(' + thisindex + ')',
				300
			);

		});

	}


	$(document).ready(function() {
		setupFabs();
	});

})(jQuery);
