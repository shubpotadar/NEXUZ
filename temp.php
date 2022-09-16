<?php
if(isset($_POST['submit'])){

    $font ="Font.ttf";
    $image =imagecreatefromjpeg("Template.jpg");
    $color =imagecolorallocate($image, 19,21,22);
    $name ="SHUBHAM POTADAR";
    $name1 ="NODEJS";
//     $main_width = imagesx($image);
//     $main_width = $main_width/2;
// $main_height = imagesy($image);
// $main_height = $main_height/2;

// Get image dimensions
$width = imagesx($image);
$height = imagesy($image);
// Get center coordinates of image
$centerX = $width / 2;
$centerY = $height / 2;
// Get size of text
list($left, $bottom, $right, , , $top) = imageftbbox($font_size, $angle, $font, $text);
// Determine offset of text
$left_offset = ($right - $left) / 2;
$top_offset = ($bottom - $top) / 2;
// Generate coordinates
$x = $centerX - $left_offset;
$y = $centerY + $top_offset;
// Add text to image
imagettftext($image, $font_size, $angle, $x, $y, $color, $font, $text);


    imagettftext($image, 40, 0, $main_width, 1100, $color, $font, $name);
    imagettftext($image, 60, 0, $main_width, 800, $color, $font, $name1);
    imagejpeg($image,"certificates/shubham.jpg");
    imagedestroy($image);
echo "certificate created";







}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<form method="post">
    <input type="submit" name="submit" value="GENERATE">
</form>
</body>
</html>