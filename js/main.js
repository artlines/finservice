$(function () {
	var nav = $('#top-menu'),
		headerHeight = nav.offset().top;

	$(window).scroll(function(){
		if ( $(this).scrollTop() > headerHeight ){
			nav.addClass("navbar-fixed-top");
		} else if($(this).scrollTop() < headerHeight ) {
			nav.removeClass("navbar-fixed-top");
		}
	});

	$(window).resize(function(){
		if ($('#map').length) {
			$('#map').attr('style','');
			initMap();
		}
		bodyPadding();
	});

	$('#nav').click(function(){
		$('nav ul.container').slideToggle(600);
	});

	$('#head_menu a:not(.sub-menu a)').addClass('hvr-underline-reveal');

	$("#phone").mask("+7 (999) 999-9999");

	bodyPadding();

	function bodyPadding(){
		$('body').css({'padding-bottom': $('footer').outerHeight() + 50});
	}

	$('#menu-header > li').hover(function () {
		$(this).children('.children').fadeToggle('fast');
    });

	$('#menu-header .cat-item li > ul.children li a').click(function (e) {
        if( $(this).parent('li').find('.children').length ){
            e.preventDefault();
            $(this).parent('li').find('.children').slideToggle('fast');
        }
    });
});



