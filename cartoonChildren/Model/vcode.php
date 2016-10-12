<?php
function vcode($width = 100, $height = 40, $countElement = 4, $countPixel = 100, $countLine = 4, $fontSize = 20) {
	header('Content-type:image/jpeg');
	$element = array('0','1','2','3','4','5','6','7','8','9','A','B','C','D','E','F','G','H','I','J','K','L','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z');
	$string = '';
	for ($i = 0; $i < $countElement; $i++) {
		$string .= $element[rand(0, count($element) - 1)];
	}
	$img = imagecreatetruecolor($width, $height);
	$colorBg = imagecolorallocate($img, rand(200, 255), rand(200, 255), rand(200, 255));
	$colorBorder = imagecolorallocate($img, rand(200, 255), rand(200, 255), rand(200, 255));
	$colorString = imagecolorallocate($img, rand(10, 100), rand(10, 100), rand(10, 100));
	imagefill($img, 0, 0, $colorBg);
	imagerectangle($img, 0, 0, $width - 1, $height, $colorBorder);
	for ($i = 0; $i < $countPixel; $i++) {
		imagesetpixel($img, rand(0, $width - 1), rand(0, $height - 1), imagecolorallocate($img, rand(100, 200), rand(100, 200), rand(100, 200)));
	}
	for ($i = 0; $i < $countLine; $i++) {
		imageline($img, rand(0, $width / 2), rand(0, $height), rand($width / 2, $width), rand(0, $height), imagecolorallocate($img, rand(100, 200), rand(100, 200), rand(100, 200)));
	}
	imagettftext($img, $fontSize, rand(-5, 5), rand(5, 15), rand(30, 35), $colorString, 'font/Marshmallow-Cracked Normal.ttf', $string);
	imagejpeg($img);
	imagedestroy($img);
	return $string;
}
?>