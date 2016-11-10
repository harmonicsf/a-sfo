<?php
session_start();
$_SESSION['captcha'] = strtoupper(substr(base64_encode(rand(10000,99999)),0, 5));
$img=imagecreatetruecolor(100, 30);
imagefill($img, 0, 0, imagecolorallocate ($img, 255, 255, 255));
imagettftext($img, 12, 0, 30, 20, imagecolorallocate ($img, 0, 0, 0), 'public/captcha.ttf', $_SESSION['captcha']);
header("Content-type: image/jpeg");
imagejpeg($img,null,20);
?>
