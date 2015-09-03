$(function() {
	$(".altura").inputmask("9,99");
	$(".peso").inputmask("9[9][9]");

	$(".altura, .peso").keyup(function() {
		imc();
	});

	function imc() {
		var altura = $(".altura").val() || "";
		var peso = $(".peso").val() || "";

		if(altura != "" && peso != "") {
			altura = $(".altura").inputmask('unmaskedvalue');
			if(altura.length == 3) {
				altura = altura / 100;
				peso = $(".peso").inputmask('unmaskedvalue');

				var imc = peso / (altura * altura);
				imc = imc.toFixed(2);

				var tipo = "";

				if(imc < 18.5) {
					tipo = "Você está abaixo do peso ideal";
				} else if(imc >= 18.5 && imc <= 24.9) {
					tipo = "Parabéns — você está em seu peso normal!";
				} else if(imc >= 25 && imc <= 29.9) {
					tipo = "Você está acima de seu peso (sobrepeso)";
				} else if(imc >= 30 && imc <= 34.9) {
					tipo = "Obesidade grau I";
				} else if(imc >= 35 && imc <= 39.9) {
					tipo = "Obesidade grau II";
				} else if(imc >= 40) {
					tipo = "Obesidade grau III";
				}

				$(".calculado span").html("IMC: " + imc + "<br />" + tipo);
				$(".calculado span").show();
			} else {
				$(".calculado span").hide();
			}
		} else {
			$(".calculado span").hide();
		}
	}
});