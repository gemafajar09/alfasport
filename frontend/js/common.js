$(document).ready(function () {
	$(window).scroll(function () {
		if ($(this).scrollTop() > 300) {
			$('.scrollup').fadeIn();
		} else {
			$('.scrollup').fadeOut();
		}
	});

	$('.scrollup').on("click", function () {
		$("html, body").animate({ scrollTop: 0 }, 600);
		return false;
	});

	/* Quatity buttons */

	// 	$('#q_up').on("click", function() {
	// 		var q_val_up=parseInt($("input#quantity_wanted").val(), 10);
	// 		if(isNaN(q_val_up)) {
	// 			q_val_up=0;
	// 		}
	// 		$("input#quantity_wanted").val(q_val_up+1).keyup(); 
	// 		return false; 
	// 	});

	// 	$('#q_down').on("click", function() {
	// 		var q_val_up=parseInt($("input#quantity_wanted").val(), 10);
	// 		if(isNaN(q_val_up)) {
	// 			q_val_up=0;
	// 		}

	// 	if (q_val_up > 1) {
	// 		$("input#quantity_wanted").val(q_val_up - 1).keyup();
	// 	}
	// 	return false;
	// });

	/* Carousel Brands */

	$('#carouselbrands').owlCarousel({
		items: 6,
		autoPlay: 3000,
		navigation: true,
		navigationText: false,
		pagination: true
	});

	/* Latest products Carousel */

	var owl = $(".box #myCarousel1");

	$("#myCarousel1_next").on("click", function () {
		owl.trigger('owl.next');
		return false;
	})
	$("#myCarousel1_prev").on("click", function () {
		owl.trigger('owl.prev');
		return false;
	});

	owl.owlCarousel({
		slideSpeed: 400,
		itemsCustom: [
			[0, 2],
			[480, 3],
			[700, 4],
			[1255, 5],
		]
	});

	/* Featured products Carousel */

	var owl3 = $(".box #myCarousel");

	$("#myCarousel_next").on("click", function () {
		owl3.trigger('owl.next');
		return false;
	})
	$("#myCarousel_prev").on("click", function () {
		owl3.trigger('owl.prev');
		return false;
	});

	owl3.owlCarousel({
		slideSpeed: 400,
		items: 5
	});

	// Ful width box
	function force_full_width() {
		var p = $(".standard-body .full-width .advanced-grid-box-full-width");

		if (p.size() > 0) {
			p.width($('body').width());
			p.css("left", "0px");
			var position = p.offset();
			p.css("left", "-" + position.left + "px");
			p.find(".container").css("padding-left", position.left);
			p.find(".container").css("padding-right", position.left);

		}

		var s = $(".standard-body .fixed .advanced-grid-box-full-width");
		if (s.size() > 0) {
			s.width($('.standard-body .fixed .pattern').width());
			s.css("left", "0px");
			var position = s.offset();
			var position2 = $('.standard-body .fixed .pattern').offset();
			var position3 = position.left - position2.left;
			s.css("left", "-" + position3 + "px");
			s.find(".container").css("padding-left", position3);
			s.find(".container").css("padding-right", position3);
		}

		var c = $(".fixed-body .advanced-grid-box-full-width");
		if (c.size() > 0) {
			c.width($('.fixed-body .main-fixed').width());
			c.css("left", "0px");
			var position = c.offset();
			var position2 = $('.fixed-body .main-fixed').offset();
			var position3 = position.left - position2.left;
			c.css("left", "-" + position3 + "px");
			c.find(".container").css("padding-left", position3);
			c.find(".container").css("padding-right", position3);
		}
	}

	force_full_width();

	$(window).resize(function () {
		force_full_width();
	});
});

/* Camera slider */

var camera_slider = $("#camera_wrap");

camera_slider.owlCarousel({
	slideSpeed: 300,
	lazyLoad: true,
	singleItem: true,
	autoPlay: 7000,
	stopOnHover: true,
	navigation: true
});

$(window).load(function () {
	$("#camera .spinner").fadeOut(200);
	$("#camera_wrap").css("height", "auto");
});	