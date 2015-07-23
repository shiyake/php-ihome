<?php

$string = '';
for ($i = 0; $i < 5; $i++) {
    $string .= chr(rand(97, 122));
}
 
setcookie('vcode', $string);
 
$dir = './fonts/';
$image = imagecreatetruecolor(95, 40); //custom image size
$font = "PlAGuEdEaTH.ttf"; // custom font style
$color = imagecolorallocate($image, 113, 193, 217); // custom color
$white = imagecolorallocate($image, 255, 255, 255); // custom background color
imagefilledrectangle($image,0,0,399,99,$white);
imagettftext ($image, 20, 0, 10, 32, $color, $dir.$font, $string);
 
header("Content-type: image/png");
imagepng($image);
 
?>
