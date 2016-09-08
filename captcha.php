<?php 


	header("content-type: image/png");
	$imagen  = imagecreate(55, 33) or die ("Ocurrio un error");
	$color_fondo = imagecolorallocate($imagen, 160, 160, 160);
	$color_texto = imagecolorallocate($imagen, 255, 255, 255);

	function generate_captcha($chars, $length)
	{
		$captcha = null;
		for ($x=0; $x <$length ; $x++) { 
			$rand  = rand(0, count($chars)-1);
			$captcha .= $chars[$rand];

		}
		return $captcha;
	}

	$captcha = generate_captcha(array( '1','2','3','4','5','6','7','8','9','a','b','c','d','e','f','g','h','i','j','k','l','n','m','p','q','r','s','t','u','v','w','x','y','z','G','H','I','J','M','P','Q','R','A','B','C','D'), 4);
	setcookie('captcha', sha1($captcha), time()+60*3);
	imagestring($imagen, 5, 11, 9, $captcha, $color_texto);
	imagepng($imagen);

