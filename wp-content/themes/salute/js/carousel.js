$(function() {
	$("#carousel-home").on('slid.bs.carousel', function() {
		var img = $(".item.active img", $(this));
		$(".carousel-description h1").html($(img).data("title"));
		$(".carousel-description h2").html($(img).data("desc"));
	});
});