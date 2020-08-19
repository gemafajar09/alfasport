var active = false;
var hover = false;
var megamenuresponsive = false;
$(document).ready(function() {
	if($(window).width() < 992) {
		megamenuresponsive = true;
	}
	
	$("ul.megamenu > li").each(function () {
		var i = 0;
		$(this).find(".mobile-enabled").each(function () {
			i++;
		});
				
		if(i == 0) {
			$(this).find(".open-menu").addClass("mobile-disabled");
		}
	});
	
	$("ul.megamenu li .sub-menu .content .hover-menu ul li").on("mouseover", function () {
		$(this).children("ul").addClass("active");
	});
	
	$("ul.megamenu li .sub-menu .content .hover-menu ul li").on("mouseleave", function () {
		$(this).children("ul").removeClass("active");
	});
	
	$('.close-categories').on('click', function () {
		$(this).parent().removeClass("active");
		$(this).next().animate({ height:"hide" },400);
		return false;
	});
	
	$('.open-categories').on('click', function () {
		$(".open-categories").parent().removeClass("active");
		$('.open-categories').next().next().animate({ height:"hide" },400);
		
		$(this).parent().addClass("active");
		$(this).next().next().animate({ height:"show" },400);
		return false;
	});
	
	$('.close-menu').on('click', function () {
		$(this).parent().removeClass("active");
		$(this).next().next().next().animate({ height:"hide" },400);
		return false;
	});
	
	$('.open-menu').on('click', function () {
		$("ul.megamenu > li").removeClass("active");
		$("ul.megamenu > li").find(".sub-menu").animate({ height:"hide" },400);
		
		$(this).parent().addClass("active");
		$(this).next().next().animate({ height:"show" },400);
		megamenuresponsive = true;
		return false;
	});
	
	$("ul.megamenu > li.click .content a").on('click', function () {
		window.location = $(this).attr('href');
	});
		
	$("ul.megamenu > li.hover").on("mouseover", function () {
		if(megamenuresponsive == false) {
			active = $(this);
			hover = true;
			$("ul.megamenu > li").removeClass("active");
			$(this).addClass("active");
			$(this).children(".sub-menu").css("right", "auto");	
			var $whatever        = $(this).children(".sub-menu");
			var ending_right     = ($(window).width() - ($whatever.offset().left + $whatever.outerWidth()));
			var $whatever2       = $("ul.megamenu");
			var ending_right2    = ($(window).width() - ($whatever2.offset().left + $whatever2.outerWidth()));
			if(ending_right2 > ending_right) {
				$(this).children(".sub-menu").css("right", "0");
			}
			var widthElement = $(this).children("a").outerWidth()/2;
			var marginElement = $(this).children("a").offset().left-$(this).find(".content").offset().left;
			$(this).find(".content > .arrow").css("left", marginElement+widthElement);
		} 
	});
	
	$("ul.megamenu > li.hover").on("mouseleave", function () {
		if(megamenuresponsive == false) {
			var rel = $(this).attr("title");
			hover = false;
			if(rel == 'hover-intent') {
				var hoverintent = $(this);
				setTimeout(function (){
					if(hover == false) {
						$(hoverintent).removeClass("active");
					}
				}, 500);
			} else {
				$(this).removeClass("active");
			}
		}
	});
	
	$("ul.megamenu > li.click").on('click', function () {
		if($(this).removeClass("active") == true) { return false; }
		active = $(this);
		hover = true;
		$("ul.megamenu > li").removeClass("active");
		$(this).addClass("active");
		$(this).children(".sub-menu").css("right", "auto");
		if(megamenuresponsive == true) $(this).children(".sub-menu").animate({ height:"show" },400);
		var $whatever        = $(this).children(".sub-menu");
		var ending_right     = ($(window).width() - ($whatever.offset().left + $whatever.outerWidth()));
		var $whatever2       = $("ul.megamenu");
		var ending_right2    = ($(window).width() - ($whatever2.offset().left + $whatever2.outerWidth()));
		if(ending_right2 > ending_right) {
			$(this).children(".sub-menu").css("right", "0");
		}
		var widthElement = $(this).children("a").outerWidth()/2;
		var marginElement = $(this).children("a").offset().left-$(this).find(".content").offset().left;
		$(this).find(".content > .arrow").css("left", marginElement+widthElement);
		return false;
	});
	
	$(".megaMenuToggle").on('click', function () {
		if($(this).removeClass("active") == true) {
			$(this).parent().find(".megamenu-wrapper").stop(true, true).animate({ height:"hide" },400);
		} else {
			$(this).parent().find(".megamenu-wrapper").stop(true, true).animate({ height:"toggle" },400);
			$(this).addClass("active");
		}
		return false;
	});
	
	$('html').on('click', function () {
		if(!($(window).width() < 992)) {
			$("ul.megamenu > li.click").removeClass("active");
		}
	});
});

$(window).resize(function() {
	megamenuresponsive = false;
	
	if($(window).width() < 992) {
		megamenuresponsive = true;
	}
});