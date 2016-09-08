$(document).ready(function () {
  //your code here
$("body").on("click", "#refreshimg", function(){
		$.post("newsession.php");
		$("#captchaimage").load("image_req.php");
		return false;
	});

	$("#captchaform").validate({
		rules: {
			captcha: {
				required: true,
				remote: "process.php"
			}
		},
		messages: {
			captcha: "Captcha incorrecto. Este dato es requerido. Click en los caracteres para generar uno nuevo"
		},
		submitHandler: function() {
			alert("Captcha Correcto");
		},
		success: function(label) {
			label.addClass("valid").text("Captcha Valido")
		},
		onkeyup: false
	});

  
});

$(function(){
	$("body").on("click", "#refreshimg", function(){
		$.post("newsession.php");
		$("#captchaimage").load("image_req.php");
		return false;
	});

	$("#captchaform").validate({
		rules: {
			captcha: {
				required: true,
				remote: "process.php"
			}
		},
		messages: {
			captcha: "Captcha incorrecto. Este dato es requerido. Click en los caracteres para generar uno nuevo"
		},
		submitHandler: function() {
			alert("Captcha Correcto");
		},
		success: function(label) {
			label.addClass("valid").text("Captcha Valido")
		},
		onkeyup: false
	});

});
