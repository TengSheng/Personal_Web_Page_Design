<?php
	session_name("admin");
	session_start();
	
    $img = imagecreatetruecolor(60, 20);
    $black = imagecolorallocate($img, 0x00, 0x00, 0x00);
    $green = imagecolorallocate($img, 0x00, 0xFF, 0x00);
    $white = imagecolorallocate($img, 0xFF, 0xFF, 0xFF);
    imagefill($img,0,0,$white);
    //生成随机的验证码
    $code = '';
    for($i = 0; $i < 4; $i++) {
        $code .= rand(0, 9);
    }
     $_SESSION['code']=$code;                           //存储在session里
    imagestring($img, 5, 10, 5, $code, $black);

    for($i=0;$i<50;$i++) {
        imagesetpixel($img, rand(0, 100) , rand(0, 100) , $black); 
        imagesetpixel($img, rand(0, 100) , rand(0, 100) , $green);
    }
    
    header("content-type: image/png");
    imagepng($img);
    imagedestroy($img);
?>
