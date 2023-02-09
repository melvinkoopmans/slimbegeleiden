$(document).ready(function() {
	$(".smoothscroll").click(function(e) {
		e.preventDefault();
		var href = $(this).attr("href");
		$("html, body").animate({ scrollTop: $(href).offset().top - 80}, 1000);
	});
});