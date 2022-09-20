    <?php
    session_start();
    require('fpdf.php');

    $usersid = $_SESSION['userid'];

    if(isset($_GET['name'])){
    $font ="Font.ttf";
    $image =imagecreatefromjpeg("Template.jpg");
    $color =imagecolorallocate($image, 19,21,22);
    $name = $_SESSION['name'];

    $course = $_GET['name'];
    date_default_timezone_set("Asia/Calcutta");
    $date = date('F j,Y');
    
    // Get image dimensions
    $width = imagesx($image);
    $height = imagesy($image);
    // Get center coordinates of image
    $centerX = $width / 2;
    $centerY = $height / 2;
    // Get size of text
    list($left, $bottom, $right, , , $top) = imageftbbox(60, 0, $font, $course);
    // Determine offset of text
    $left_offset = ($right - $left) / 2;
    $top_offset = ($bottom - $top) / 2;
    // Generate coordinates
    $x = $centerX - $left_offset;
    $y = $centerY + $top_offset - 50;
    // Add text to image
    imagettftext($image, 60, 0, $x, $y, $color, $font, $course);

    // ------------------

    $width = imagesx($image);
    $height = imagesy($image);
    $centerX = $width / 2;
    $centerY = $height / 2;
    list($left, $bottom, $right, , , $top) = imageftbbox(40, 0, $font, $name);
    $left_offset = ($right - $left) / 2;
    $top_offset = ($bottom - $top) / 2;
    $x = $centerX - $left_offset;
    $y = $centerY + $top_offset + 380;
    imagettftext($image, 40, 0, $x, $y, $color, $font, $name);

    // ------------------

    $width = imagesx($image);
    $height = imagesy($image);
    $centerX = $width / 2;
    $centerY = $height / 2;
    list($left, $bottom, $right, , , $top) = imageftbbox(30, 0, $font, $date);
    $left_offset = ($right - $left) / 2;
    $top_offset = ($bottom - $top) / 2;
    $x = $centerX - $left_offset;
    $y = $centerY + $top_offset + 520;
    imagettftext($image, 30, 0, $x, $y, $color, $font, $date);

    imagejpeg($image,"certificates/".$name."--".$usersid.".jpg");

    $pdf = new FPDF('L','in',[11.7,8.27]);
    $pdf->AddPage();
    $pdf->Image("certificates/".$name."--".$usersid.".jpg",0,0,11.7,8.27);
    $pdf->Output("certificates/".$name."--".$usersid.".pdf","F");
    imagedestroy($image);
    echo "<script>alert('Ceritificate Generated')</script>";

    header("Content-type:application/pdf");
    header("Content-Disposition: attachment; filename=".$name."--".$usersid.".pdf");
    readfile("certificates/".$name."--".$usersid.".pdf"); 
    }
    ?>
