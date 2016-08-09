<?php
session_start();
getCode(4,75,28);

function getCode($num,$w,$h) {
	// 去掉了 0 1 O l 等
	$str = "23456789abcdefghijkmnpqrstuvwxyz";
	$code = '';
	for ($i = 0; $i < $num; $i++) {
		$code .= $str[mt_rand(0, strlen($str)-1)];
	}
	//將生成的驗證碼寫入session
	$_SESSION["helloweba_char"] = $code;
	//建立 img
	Header("Content-type: image/PNG");
    $font = imageloadfont('./automatic.gdf');
    $w = 80;
    //$h = 30;
	$im = imagecreate($w, $h);
	$black = imagecolorallocate($im, mt_rand(0, 200), mt_rand(0, 120), mt_rand(0, 120));
	$gray = imagecolorallocate($im, 204, 204, 204);
	$bgcolor = imagecolorallocate($im, 235, 236, 237);

	//background
	imagefilledrectangle($im, 0, 0, $w, $h, $bgcolor);
	//border
	//imagerectangle($im, 0, 0, $w-1, $h-1, $gray);
	//imagefill($im, 0, 0, $bgcolor);


	//干擾數;
	for ($i = 0; $i < 80; $i++) {
		imagesetpixel($im, rand(0, $w), rand(0, $h), $black);
	}
	//將亂碼隨機顯示在img上，亂碼的水平距離和位置都按一定的潑動範圍隨機生成
	$strx = rand(3, 8);
	for ($i = 0; $i < $num; $i++) {
		$strpos = rand(1, 4); 
        imagestring($im, $font, $strx, $strpos, substr($code, $i, 1), $black); 
        $strx += rand(10, 20); 
	}
	imagepng($im);
	imagedestroy($im);
}
?>
