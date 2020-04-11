<?php
	session_name("admin");
	session_start();
    $user_name=$_GET['user_name'];
    $name=$_SESSION[$user_name];
	
    include("../../connect.php");
    
    $image_id=$_GET['image_id'];
    $album_id=$_GET['album_id'];
    
    $sql="DELETE FROM `user_image` WHERE id=".$image_id;
    $result = mysql_query($sql);
    if($result){
   	    echo "<script>alert('照片已经删除！');location='user_add_img.php?album_id=".$album_id."&user_name=".$user_name."';</script>";
    }
    else{
   	    echo "<script>alert('照片删除失败！');location='user_add_img.php?album_id=".$album_id."&user_name=".$user_name."';</script>";
    }
?>