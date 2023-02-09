$(document).ready(function() {


	$("html").niceScroll();
	
	// $(".navbar-default").delay(1000).addClass("navbar-white", 1000, 'fade');
	$(window).scroll(function() {
		if ($(document).scrollTop() > 100) {
			$(".navbar-default").addClass("navbar-white", 500);
		} else {
			$(".navbar-default").removeClass("navbar-white", 500);
		}
	});

	$('.nav a').on('click', function(){
    	$(".btn-navbar").click(); //bootstrap 2.x
    	$(".navbar-toggle").click() //bootstrap 3.x by Richard
	});

});