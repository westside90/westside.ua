<?php
if (!isset ($_SESSION)) session_start ();
header ('Cache-control:no-cache');

$code = "";
$s = "1234567abcdefg";
$n = strlen ($s);

header ('Content-type:image/gif');
$pic = imagecreatefromgif ('code.gif');

$x = 30;
$y = 70;
$r = 25;
$kol = 4;

for ($i = 0; $i < $kol; $i++)
	{
	$k = $s[mt_rand(0,$n-1)];
	$code.= $k;
	$color = imagecolorclosest ($pic, mt_rand(0,255), mt_rand(0,255), mt_rand(0,255));
	imagettftext ($pic, 30, $r, $x, $y, $color, 'comic.ttf', $k);
	$x += 35;
	$y -= 10;
	$r -= 35;
	}

imagegif($pic);
imagedestroy($pic);
	
$_SESSION['code'] = $code;
?>