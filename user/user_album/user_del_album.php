<?php
    session_name("admin");
	session_start();

    $user_name=$_GET['user_name'];
    $name=$_SESSION[$user_name];	
    
    include("../../connect.php");
    
    $album_id=$_GET['album_id'];
    $album_name=$_GET['album_name'];
    
    $sql="DELETE FROM `user_album` WHERE id=".$album_id;
    $result = mysql_query($sql);
    
    $sql_1="SELECT `id`,`name`, `file`, `date`, `type` FROM `user_image` WHERE album_name='$album_name' ";
	$result_1 = mysql_query($sql_1);
	while($row_1 = mysql_fetch_array($result_1))
	{
		$image_id=$row_1['id'];
    
        $sql_2="DELETE FROM `user_image` WHERE id=".$image_id;
        $result_2 = mysql_query($sql_2);
    }
    if($result){
   	    echo "<script>alert('相册已经删除！');location='user_album.php?user_name=".$user_name."';</script>";
    }
    else{
   	    echo "<script>alert('相册删除失败！');location='user_album.php?user_name=".$user_name."';</script>";
    }
?>