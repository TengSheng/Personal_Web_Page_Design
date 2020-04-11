<?php
	session_name("admin");
	session_start();
	
    $user_name=$_GET['user_name'];
    $name=$_SESSION[$user_name];
	
    include("../../connect.php");
    
    $id=$_GET['id'];
    if($_GET['id'])
    {
    	$sql="DELETE FROM `user_friends` WHERE id=".$id;
    	$result = mysql_query($sql); 
    	echo "<script>alert('好友删除成功！');history.go(-1);</script>";
    }
?>