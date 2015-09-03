$(function() {
	$(".newsletter-submit").click(function (event) {	
		event.preventDefault();
		var email = $(".newsletter-email").val();

		var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
		if(!re.test(email)) {
			alert("E-mail inválido!");
			$(".newsletter-email").val("");
			return;
		}

		$.post(
			url + '/action/newsletter.php' , {
				"email": email,
			}, function(response) {
				alert("E-mail cadastro com sucesso!");
				$(".newsletter-email").val("");
			}
			);
	});
});