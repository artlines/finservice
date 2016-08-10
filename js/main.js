jQuery(function($){

	var nav = $('#head_menu');
 	$(window).scroll(function(){

		if ( $(this).scrollTop() > 200){
	        nav.addClass("navbar-fixed-top");
	      } else if($(this).scrollTop() < 200 ) {
	        nav.removeClass("navbar-fixed-top");
	    }
	});

	$(window).resize(function(){
		if ($('#map').length) {
		 	$('#map').attr('style','');
		 	initMap();
		 }
	});

	$('#nav').click(function(){
		$('nav ul.container').slideToggle(600);
	});

	$('#head_menu a:not(.sub-menu a)').addClass('hvr-underline-reveal');

	$("#phone").mask("+7 (999) 999-9999");
});
