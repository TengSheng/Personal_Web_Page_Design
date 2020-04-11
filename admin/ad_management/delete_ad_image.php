<?php
	session_name("admin");
	session_start();
	$name=$_SESSION['name'];
	
    include("../../connect.php");
    
    $image_id=$_GET['image_id'];
    $album_id=$_GET['album_id'];
    
    $sql="DELETE FROM `user_image` WHERE id=".$image_id;
    $result = mysql_query($sql);
    if($result){
   	    echo "<script>alert('照片已经删除！');location='ad_image.php?album_id=".$album_id."';</script>";
    }
    else{
   	    echo "<script>alert('照片删除失败！');location='ad_image.php';</script>";
    }
?>