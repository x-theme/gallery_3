$(function(){
	var total_links = $(".inner-footer-links .menu-links ul li").length;
	var max_rows, columns, current_row = 1;
	
	footer_max_rows();
	
	$(".prev-nav .footer-prev").click(function(){
		if ( current_row != 1 ) { 
			$('.inner-footer-links .menu-links ul').animate({top: "+=21px"}, 150);
			current_row--;
		}
	});
	
	$(".prev-nav .footer-next").click(function(){
		footer_max_rows();
		if ( current_row != max_rows ) {
			$('.inner-footer-links .menu-links ul').animate({top: "-=21px"}, 150);
			current_row++;
		}
	});
	
	$(".footer-view").click(function(){
		$(".site-title, .menu-links, .prev-nav, .footer-full-links, .footer-view-clicked").toggle();
		$(".footer-full-links").addClass('opened-full');
		$(".footer-links").addClass('selected').find(".inner-footer-links").addClass('clicked').find(".footer-links").css('background','#2d3b64');
		$(".clicked_info").css('display','block');
		window.scrollTo(0, document.body.scrollHeight);
	});
	
	$(".footer-view-clicked").click(function(){
		$(".site-title, .menu-links, .prev-nav, .footer-full-links, .footer-view-clicked").toggle();
		$(".footer-full-links").removeClass('opened-full');
		$(".footer-links").removeClass('selected').find(".inner-footer-links").removeClass('clicked').find(".footer-links").css('background','#47547a');
		$(".clicked_info").css('display','none');
		$('html body').animate({scrollTop:  $('html body').height()},0);
	});
	
	$(".open-footer").click(function(){
		$(window.opera?'html':'html body').animate({scrollTop: 0},0);
		$(".footer-full-links").addClass('opened').css('left',$(window).width()).css('display','block').animate({left: 0},200);
		$(".footer-full-links").promise().done(function(){ $(".layout .content ").css('display','none')});
	});
	
	$('.close_mobile_footer').click(function(){
		$(".layout .content ").css('display','block');
		$(".footer-full-links").removeClass('opened').animate({left: $(window).width()},200);
		$(".footer-full-links").promise().done(function(){ $(".footer-full-links").css('display','none');});
	});
	
	$(".footer-full-links .links-titles").click(function(){
		if ( $(window).width() < 750 ) {
			var imgsrc = $(this).find('img').attr('src');
			var imgpath = imgsrc.substring(imgsrc.lastIndexOf('/'),0);
			$(this).siblings('ul').toggle();
			$(this).parent().toggleClass('closed');
			if ( imgsrc == imgpath+"/footer_menu_close.gif" ) $(this).find('img').attr('src', imgpath+"/footer_menu_open.gif");
			else $(this).find('img').attr('src', imgpath+"/footer_menu_close.gif");
		}
	});
	
	function footer_max_rows() {
		if ( $(window).width() > '985' ) columns = 5;
		else if ( $(window).width() > '850' ) columns = 4;
		else columns = 3;
		max_rows = Math.floor(total_links / columns);
		if ( (total_links % columns) > 0 ) max_rows++;
	};
	
	$(window).resize(function(){
		if( $(window).width() > 750 ){		
			$(".layout .content ").css('display','block');
			$(".opened").removeClass('opened').css('display','none');
		}
		if( $(window).width() < 750 ){	
			$(".opened-full").removeClass('opened-full').css('display','none');
			$(".footer-links.selected").removeClass('selected');
		
		}
		if ( ($(window).width() > '850' && $(window).width() <= '985') && (current_row == max_rows)) {
			$('.inner-footer-links .menu-links ul').css("top", "+=21px");
			current_row--;
		} else if ( ($(window).width() > '985' ) && (current_row == max_rows-1)) {
			$('.inner-footer-links .menu-links ul').css("top", "+=21px");
			current_row--;	
		}
	});

});

	
